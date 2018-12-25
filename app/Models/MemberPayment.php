<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPayment extends Model
{
    protected $fillable = [
        'member_loan_id', 'payment', 'date'
    ];

    /**
     * this payment belongs to member loan
     *
     * @return void
     */
    public function memberLoan()
    {
        return $this->belongsTo(MemberLoan::class, 'member_loan_id', 'id');
    }
}
