<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingGeneral extends Model
{
    protected $fillable = [
        'unit', 'title', 'owner'
    ];
}
