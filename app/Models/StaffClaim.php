<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffClaim extends Model
{
    protected $fillable = [
        'staff_id', 'type', 'cash'
    ];

    /**
     * This Claim has many staff
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }
}
