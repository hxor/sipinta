<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\MemberLoan;
use App\Models\SettingCost;
use Illuminate\Http\Request;

class StaffBillController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = 'pages.admin.transaction.loan.bill';
    }

    public function index()
    {
        $staff = Staff::pluck('name', 'id')->all();
        $day = [
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        ];
        return view("{$this->view}.index", compact('staff', 'day'));
    }

    public function result(Request $request)
    {
        $member = [];
        $total = 0;
        $settingCost = SettingCost::first();
        $day = [
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        ];
        $staff = Staff::find($request->staff_id);
        $memberLoan = MemberLoan::where('day', $request->day)->where('status', true)->get();
        foreach($memberLoan as $key => $value) {
            if ($value->member()->where('staff_id', $request->staff_id)->first()) {
                $value->member['tagihan'] = $value->payment;
                $value->member['sisa_hutang'] = $value->payment_left;
                $value->member['storan_ke'] = $value->payment()->count() + 1;
                $value->member['invoice'] = $value->invoice;
                $member[] = $value->member;
                $total += $value->payment;
            }
        }

        $data = [
            'member' => $member,
            'target_total' => $total,
            'target_minim' => ($total * $settingCost->cost_target) / 100,
            'info_hari' => $day[$request->day],
            'info_tanggal' => date('d/m/Y'),
            'info_staff' => $staff->name
        ];
        
        return view("{$this->view}.bill", compact('data'));
    }
}
