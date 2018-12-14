<?php

namespace App\Http\Controllers;

use App\Models\SettingCost;
use Illuminate\Http\Request;

class SettingCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = SettingCost::first();
        return view('pages.admin.setting.cost.index', compact('model'));
    }

    public function store(Request $request)
    {
        $setting = SettingCost::updateOrCreate(['id' => 1], $request->all());
        return redirect()->route('admin.setting.cost.index');
    }
}
