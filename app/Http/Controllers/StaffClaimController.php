<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffClaim;
use Illuminate\Http\Request;
use DataTables;

class StaffClaimController extends Controller
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
        $this->model = new StaffClaim();
        $this->view = 'pages.admin.transaction.claim';
        $this->route = 'admin.transaction.claim';
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
        $staff = Staff::pluck('name', 'id')->all();
        return view("{$this->view}.form", compact('model', 'staff'));
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
            'staff_id' => 'required',
            'type' => 'required',
            'cash' => 'required',
        ]);

        $model = $this->model->create($request->all());

        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffClaim  $staffClaim
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffClaim  $staffClaim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        $staff = Staff::pluck('name', 'id')->all();
        return view("{$this->view}.form", compact('model', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffClaim  $staffClaim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'staff_id' => 'required',
            'type' => 'required',
            'cash' => 'required',
        ]);
        
        $model = $this->model->findOrFail($id);
        $model->update($request->all());

        return $model;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffClaim  $staffClaim
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
        $model = $this->model->with(['staff']);
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts.admin.partials._action', [
                    'model' => $model,
                    'url_show' => '',
                    'url_edit' => route("{$this->route}.edit", $model->id),
                    'url_destroy' => route("{$this->route}.destroy", $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])->make(true);
    }
}
