<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title', 'role'
    ];

    /**
     * This Role Has Many Users
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
