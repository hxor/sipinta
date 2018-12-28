<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberDeposit extends Model
{
    protected $fillable = [
        'account', 'member_id', 'deposit_id', 'cash', 'profit', 'status'
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

    /**
     * This Member Deposit has Many Store
     *
     * @return void
     */
    public function store()
    {
        return $this->hasMany(MemberStore::class, 'member_deposit_id', 'id');
    }
}
