<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'group_id', 'idnumber', 'name', 'gender', 'phone', 'address', 'is_leader', 'status'
    ];

    /**
     * This staff has many
     * Member
     */
    public function member()
    {
        return $this->hasMany(Member::class, 'staff_id', 'id');
    }

    /**
     * this staff belongs to group
     *
     * @return void
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
