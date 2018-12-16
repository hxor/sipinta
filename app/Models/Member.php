<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'staff_id', 'idnumber', 'name', 'gender',
        'phone', 'address', 'village', 'subdistrict', 'city', 'province', 'zipcode',
        'status'
    ];

    /**
     * This Member belongs to Staff
     *
     * @return void
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }
}
