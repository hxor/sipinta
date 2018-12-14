<?php

namespace App\Http\Controllers;

use App\Models\SettingGeneral;
use Illuminate\Http\Request;

class SettingGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = SettingGeneral::first();
        return view('pages.admin.setting.general.index', compact('model'));
    }

    public function store(Request $request)
    {
        $setting = SettingGeneral::updateOrCreate(['id' => 1], $request->all());
        return redirect()->route('admin.setting.general.index');
    }
}
