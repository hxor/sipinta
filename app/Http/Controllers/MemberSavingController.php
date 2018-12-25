<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberSaving;
use Illuminate\Http\Request;
use DataTables;

class MemberSavingController extends Controller
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
        $this->model = new MemberSaving();
        $this->view = 'pages.admin.member.deposit';
        $this->route = 'admin.deposit';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $member = Member::find($id);
        $model = $this->model;
        return view("{$this->view}.index", compact('member', 'model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($memberId)
    {
        $model = $this->model;
        $member = Member::find($memberId);
        return view("{$this->view}.form", compact('model', 'member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $memberId)
    {
        $this->validate($request, [
            'type' => 'required',
            'cash' => 'required',
            'date' => 'required'
        ]);

        $member = Member::find($memberId);
        $model = $this->model->latest()->first();

        if ($request->type == 'in') {
            $request['saldo'] = $model->saldo + $request->cash;
        } else {
            $request['saldo'] = $model->saldo - $request->cash;
        }

        $member->deposit()->create($request->all());

        return;
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
        return view("{$this->view}.form", compact('model'));
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
            'title' => 'required|string|max:255',
        ]);

        $model = $this->model->findOrFail($id);
        $model->update($request->all());
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
    public function getTable($id)
    {
        $model = $this->model->where('member_id', $id);
        return DataTables::of($model)
            ->addIndexColumn()->make(true);
    }
}
