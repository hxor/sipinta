<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberSaving extends Model
{
    protected $fillable = [
        'member_id',
        'type', 'date', 'cash', 'saldo'
    ];


    /**
     * This Member Saving
     * Belongs To Member
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
