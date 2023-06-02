<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = ['role_id'];

    /** stand-in for role's number */
    const JAMAAH = 13;
    const PENGURUS = 24;
    const ADMIN = 35;

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
