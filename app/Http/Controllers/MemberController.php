<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Member;
use Illuminate\Http\Request;
use DataTables;

class MemberController extends Controller
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
        $this->model = new Member();
        $this->view = 'pages.admin.member';
        $this->route = 'admin.member';
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
        $staff = Staff::where('status', true)->pluck('name', 'id')->all();
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
            'idnumber' => 'required|unique:members,idnumber', 
            'name' => 'required', 
            'gender' => 'required',
            'phone' => 'required', 
            'address' => 'required', 
            'village' => 'required', 
            'subdistrict' => 'required', 
            'city' => 'required', 
            'province' => 'required', 
            'zipcode' => 'required',
            'status' => 'required'
        ]);
        $model = $this->model->create($request->all());
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
        $staff = Staff::where('status', true)->pluck('name', 'id')->all();
        return view("{$this->view}.form", compact('model', 'staff'));
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
            'idnumber' => 'required|unique:members,idnumber,'.$id, 
            'name' => 'required', 
            'gender' => 'required',
            'phone' => 'required', 
            'address' => 'required', 
            'village' => 'required', 
            'subdistrict' => 'required', 
            'city' => 'required', 
            'province' => 'required', 
            'zipcode' => 'required',
            'status' => 'required'
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
    public function getTable()
    {
        $model = $this->model->with('staff');
        return DataTables::of($model)
            ->addColumn('saving_button', function ($model) {
                return '<a href="' .route('admin.saving.index', $model->id). '"><span class="fa fa-edit"></span></a>';
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
            ->rawColumns(['action', 'saving_button'])->make(true);
    }
}
