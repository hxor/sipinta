<?php

namespace App\Http\Controllers;

use App\Models\MemberLoan;
use App\Models\MemberPayment;
use Illuminate\Http\Request;
use DataTables;

class MemberPaymentController extends Controller
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
        $this->model = new MemberPayment();
        $this->view = 'pages.admin.transaction.loan.payment';
        $this->route = 'admin.transaction.loan.payment';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $memberloan = MemberLoan::find($id);
        return view("{$this->view}.index", compact('memberloan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($loanId)
    {
        $model = $this->model;
        $loan = MemberLoan::find($loanId);
        return view("{$this->view}.form", compact('model', 'loan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $loanId)
    {
        $this->validate($request, [
            'payment' => 'required'
        ]);

        $loan = MemberLoan::find($loanId);
        $model = $loan->payment()->create($request->all());

        if (($request->payment - $loan->payment_left) == 0) {
            $loan->update([
                'payment_left' => $loan->payment_left - $request->payment,
                'status' => false
            ]);
        }

        $loan->update([
            'payment_left' => $loan->payment_left - $request->payment
        ]);
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function show(MemberPayment $memberPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function edit($loanId, $id)
    {
        $model = $this->model->findOrFail($id);
        $loan = MemberLoan::find($loanId);
        return view("{$this->view}.form", compact('model', 'loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $loanId, $id)
    {
        $this->validate($request, [
            'payment' => 'required'
        ]);

        $loan = MemberLoan::find($loanId);
        $model = $this->model->findOrFail($id);

        $loan->update([
            'payment_left' => ($loan->payment_left + $model->payment) - $request->payment,
            'status' => true
        ]);

        if ($loan->payment_left == 0) {
            $loan->update([
                'status' => false
            ]);
        }

        $model->update($request->all());
        return $model;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy($loanId, $id)
    {
        $loan = MemberLoan::find($loanId);
        $model = $this->model->findOrFail($id);
        $loan->update([
            'payment_left' => $loan->payment_left + $model->payment,
            'status' => true
        ]);
        $model->delete();
    }

    /**
     * Get Data Model
     * Into datatables format
     *
     * @return void
     */
    public function getTable($id)
    {
        $model = $this->model->where('member_loan_id', $id);
        return DataTables::of($model)
            ->addColumn('action', function ($model) use ($id) {
                return view('layouts.admin.partials._action', [
                    'model' => $model,
                    'url_show' => '',
                    'url_edit' => route("{$this->route}.edit", [$id, $model->id]),
                    'url_destroy' => route("{$this->route}.destroy", [$id, $model->id])
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])->make(true);
    }
}
