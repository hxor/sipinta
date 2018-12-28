<?php

namespace App\Http\Controllers;

use App\Models\MemberDeposit;
use App\Models\MemberStore;
use Illuminate\Http\Request;
use DataTables;

class MemberStoreController extends Controller
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
        $this->model = new MemberStore();
        $this->view = 'pages.admin.transaction.deposit.store';
        $this->route = 'admin.transaction.deposit.store';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $memberdeposit = MemberDeposit::find($id);
        return view("{$this->view}.index", compact('memberdeposit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($depositId)
    {
        $model = $this->model;
        $deposit = MemberDeposit::find($depositId);
        return view("{$this->view}.form", compact('model', 'deposit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $depositId)
    {
        $this->validate($request, [
            'store' => 'required'
        ]);

        $deposit = MemberDeposit::find($depositId);
        $model = $deposit->store()->create($request->all());

        $total = $deposit->cash * $deposit->deposit->period;

        if ($deposit->store->sum('store') >= $total) {
            $deposit->update([
                'status' => false
            ]);
        }

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
    public function edit($depositId, $id)
    {
        $model = $this->model->findOrFail($id);
        $deposit = MemberDeposit::find($depositId);
        return view("{$this->view}.form", compact('model', 'deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $depositId, $id)
    {
        $this->validate($request, [
            'store' => 'required'
        ]);

        $deposit = MemberDeposit::find($depositId);
        $model = $this->model->findOrFail($id);
        $model->update($request->all());

        $total = $deposit->cash * $deposit->deposit->period;

        if ($deposit->store->sum('store') >= $total) {
            $deposit->update([
                'status' => false
            ]);
        } else {
            $deposit->update([
                'status' => true
            ]);
        }

        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberPayment  $memberPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy($depositId, $id)
    {
        $deposit = MemberDeposit::find($depositId);
        $model = $this->model->findOrFail($id);
        $deposit->update([
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
        $model = $this->model->where('member_deposit_id', $id);
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
