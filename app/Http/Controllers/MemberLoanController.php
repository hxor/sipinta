<?php

namespace App\Http\Controllers;

use App\Models\PackageLoan;
use App\Models\Member;
use App\Models\MemberLoan;
use App\Models\MemberSaving;
use Illuminate\Http\Request;
use DataTables;

class MemberLoanController extends Controller
{
    /**
     * Global model in this controller
     *
     * @var private
     */
    private $model;
    private $view;
    private $route;

    /**
     * Fill this model
     */
    public function __construct()
    {
        $this->model = new MemberLoan();
        $this->view = 'pages.admin.transaction.loan';
        $this->route = 'admin.transaction.loan';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("{$this->view}.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;
        $loan = PackageLoan::pluck('title', 'id')->all();
        $day = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        return view("{$this->view}.form", compact('model', 'loan', 'day'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'member_id' => 'required',
            'loan_id' => 'required',
            'debt' => 'required',
            'day' => 'required'
        ]);

        $package = PackageLoan::find($request->loan_id);
        $member = Member::find($request->member_id);
        $memberLastDeposit = $member->deposit()->latest()->first();
        $lastInput = MemberLoan::whereDate('created_at', date('Y-m-d'))->latest()->first();

        $prefix = 'PIN-'. date('Ymd') .'-';
        if($lastInput) {
            $last = explode('-',$lastInput->invoice);
            $increment = $last[2] + 1;
        } else {
            $increment = 1;
        }
        $invoice = $prefix.$increment;
        $costService = ($request->debt*$package->cost_service)/100;
        $credit = $request->debt+$costService;
        $costOffice = ($request->debt*$package->cost_office)/100;
        $costGift = ($request->debt*$package->cost_gift)/100;
        $costSaving = ($request->debt*$package->cost_saving)/100;
        $drop = ($request->debt) - ($costOffice+$costGift+$costSaving);
        $payment = $credit/$package->installment;

        $data = [
            'invoice' => $invoice,
            'member_id' => $request->member_id,
            'loan_id' => $request->loan_id,
            'debt' => $request->debt,
            'cost_service' => $costService,
            'credit' => $credit,
            'cost_office' => $costOffice,
            'cost_gift' => $costGift,
            'cost_saving' => $costSaving,
            'drop' => $drop,
            'payment' => $payment,
            'payment_left' => $credit,
            'day' => $request->day
        ];

        $model = $this->model->create($data);
        
        $member->deposit()->create([
            'date' => date('Y-m-d'),
            'type' => 'in',
            'cash' => $costSaving,
            'saldo' => $memberLastDeposit ? $memberLastDeposit->saldo + $costSaving : $costSaving
        ]);
        return $model;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->model->findOrFail($id);
        return view("{$this->view}.show", compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        $loan = PackageLoan::pluck('title', 'id')->all();
        $day = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        return view("{$this->view}.form", compact('model', 'loan', 'day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'loan_id' => 'required',
            'debt' => 'required',
            'day' => 'required'
        ]);

        $package = PackageLoan::find($request->loan_id);

        $costService = ($request->debt*$package->cost_service)/100;
        $credit = $request->debt+$costService;
        $costOffice = ($request->debt*$package->cost_office)/100;
        $costGift = ($request->debt*$package->cost_gift)/100;
        $costSaving = ($request->debt*$package->cost_saving)/100;
        $drop = ($request->debt) - ($costOffice+$costGift+$costSaving);
        $payment = $credit/$package->installment;

        $data = [
            'loan_id' => $request->loan_id,
            'debt' => $request->debt,
            'cost_service' => $costService,
            'credit' => $credit,
            'cost_office' => $costOffice,
            'cost_gift' => $costGift,
            'cost_saving' => $costSaving,
            'drop' => $drop,
            'payment' => $payment,
            'payment_left' => $credit,
            'day' => $request->day
        ];

        $model = $this->model->findOrFail($id);
        $model->update($data);
        $deposit = Member::find($model->member->id)->deposit()->latest()->limit(2)->get();
        $lastDeposit = MemberSaving::find($deposit[0]->id);
        if ($deposit->count() == 2) {
            $lastDeposit->update([
                'cash' => $costSaving,
                'saldo' => $deposit[1]->saldo + $costSaving
            ]);
        } else {
            $lastDeposit->update([
                'cash' => $costSaving,
                'saldo' => $costSaving,
            ]);
        }
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
    }

    /**
     * Get Data Model
     * Into datatables format
     *
     * @return void
     */
    public function getTable()
    {
        $model = $this->model->with(['member', 'loan']);
        return DataTables::of($model)
            ->addColumn('stor', function ($model) {
                return '<a href="' .route('admin.transaction.loan.payment.index', $model->id). '"><span class="fa fa-edit"></span></a>';
            })
            ->addColumn('print', function ($model) {
                return '<a href="' .route('admin.transaction.loan.print', $model->id). '"><span class="fa fa-print"></span></a>';
            })
            ->addColumn('action', function ($model) {
                return view('layouts.admin.partials._action', [
                    'model' => $model,
                    'url_show' => route("{$this->route}.show", $model->id),
                    'url_edit' => route("{$this->route}.edit", $model->id),
                    'url_destroy' => route("{$this->route}.destroy", $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['stor', 'print','action'])->make(true);
    }

    public function print($id)
    {
        $model = $this->model->findOrFail($id);
        $day = [
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        ];
        $model['hari'] = $day[$model->day];

        return view("{$this->view}.print", compact('model'));
    }
}
