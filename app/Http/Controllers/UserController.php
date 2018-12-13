<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Auth;

class UserController extends Controller
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
        $this->model = new User();
        $this->view = 'pages.admin.user';
        $this->route = 'admin.user';
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
        $role = Role::pluck('title', 'id')->all();
        return view("{$this->view}.form", compact('model', 'role'));
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role_id' => 'required',
        ]);

        $request['username'] = str_replace(' ', '', strtolower($request->username));
        $request['password'] = bcrypt($request->password);
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
        $role = Role::pluck('title', 'id')->all();
        return view("{$this->view}.form", compact('model', 'role'));
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role_id' => 'required',
        ]);

        $model = $this->model->findOrFail($id);

        $request['username'] = str_replace(' ', '', strtolower($request->username));
        if ($request->password) {
            $request['password'] = bcrypt($request->password);
        } else {
            $request['password'] = $model->password;
        }
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
        $model = $this->model->with('roles');
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts.admin.partials._action', [
                    'model' => $model,
                    'url_show' => route("{$this->route}.show", $model->id),
                    'url_edit' => route("{$this->route}.edit", $model->id),
                    'url_destroy' => route("{$this->route}.destroy", $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])->make(true);
    }


    public function profileIndex()
    {
        $model = Auth::user();
        return view("{$this->view}.profile", compact('model'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $model = $this->model->findOrFail($user->id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $model->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $model->id,
        ]);

        $request['username'] = str_replace(' ', '', strtolower($request->username));
        if ($request->password) {
            $request['password'] = bcrypt($request->password);
        } else {
            $request['password'] = $model->password;
        }
        $model->update($request->all());

        return redirect()->route('admin.profile.index');
    }
}
