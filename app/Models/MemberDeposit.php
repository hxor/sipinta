<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberDeposit extends Model
{
    protected $fillable = [
        'invoice', 'member_id', 'deposit_id', 'cash', 'interest', 'status'
    ];

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
    public function deposit()
    {
        return $this->belongsTo(PackageDeposit::class, 'deposit_id', 'id');
    }
}
