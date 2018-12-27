<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDeposit extends Model
{
    protected $fillable = [
        'title', 'period', 'profit', 'minimum'
    ];
}
