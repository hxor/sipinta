<?php

namespace App\Http\Controllers;

use App\Models\PackageDeposit;
use App\Models\Member;
use App\Models\MemberDeposit;
use Illuminate\Http\Request;
use DataTables;

class MemberDepositController extends Controller
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
        $this->model = new MemberDeposit();
        $this->view = 'pages.admin.transaction.deposit';
        $this->route = 'admin.transaction.deposit';
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
        $deposit = PackageDeposit::pluck('title', 'id')->all();
        return view("{$this->view}.form", compact('model', 'deposit'));
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
            'deposit_id' => 'required',
            'cash' => 'required',
            'account' => 'required|unique:member_deposits,account'
        ]);

        $package = PackageDeposit::find($request->deposit_id);

        $request['profit'] = (($request->cash * $package->period) * $package->profit) / 100;

        if ($request->cash >= $package->minimum) {
            $model = $this->model->create($request->all());
            return $model;
        }

        return false;
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
        $deposit = PackageDeposit::pluck('title', 'id')->all();
        return view("{$this->view}.form", compact('model', 'deposit'));
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
            'deposit_id' => 'required',
            'cash' => 'required',
            'account' => 'required|unique:member_deposits,account,'.$id
        ]);


        $model = $this->model->findOrFail($id);
        $package = PackageDeposit::find($request->deposit_id);

        $request['profit'] = (($request->cash * $package->period) * $package->profit) / 100;

        return $request->all();

        if ($request->cash >= $package->minimum) {
            $model = $model->update($request->all());
            return $model;
        }

        return false;
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
        $model = $this->model->with(['member', 'deposit']);
        return DataTables::of($model)
            ->addColumn('stor', function ($model) {
                return '<a href="' .route('admin.transaction.deposit.store.index', $model->id). '"><span class="fa fa-edit"></span></a>';
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
            ->rawColumns(['stor', 'action'])->make(true);
    }
}
