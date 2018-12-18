<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function autoMember(Request $request)
    {
        $data = [];

        if($request->has('q')) {
            $search = $request->q;
            $data = DB::table('members')
                    ->select('id', 'name', 'idnumber')
                    ->where('name', 'LIKE', "%$search%")
                    ->get();
        }

        return response()->json($data);
    }
}
