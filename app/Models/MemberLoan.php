<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberLoan extends Model
{
    protected $fillable = [
        'invoice', 'member_id', 'loan_id',
        'debt', 'cost_service', 'credit', 
        'cost_office', 'cost_gift', 'cost_saving',
        'drop', 'payment', 'payment_left', 'day',
        'status'
    ];

    public function getStatusLoanAttribute()
    {
        return $this->status == '1' ? 'Ya' : 'Tidak';
    }

    /**
     * This Member Loans belongs to Member
     *
     * @return void
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    /**
     * This Member Lonas belongs to package loan
     *
     * @return void
     */
    public function loan()
    {
        return $this->belongsTo(PackageLoan::class, 'loan_id', 'id');
    }
}
