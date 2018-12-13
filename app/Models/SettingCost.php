<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingCost extends Model
{
    protected $fillable = [
        'cost_target', 'cost_cash'
    ];
}
