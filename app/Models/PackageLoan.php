<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageLoan extends Model
{
    protected $fillable = [
        'title', 'installment', 'cost_service', 'cost_office', 'cost_gift', 'cost_saving'
    ];
}
