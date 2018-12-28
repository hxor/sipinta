<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberStore extends Model
{
    protected $fillable = [
        'member_deposit_id', 'store', 'date'
    ];

    /**
     * this payment belongs to member loan
     *
     * @return void
     */
    public function memberDeposit()
    {
        return $this->belongsTo(MemberDeposit::class, 'member_deposit_id', 'id');
    }
}
