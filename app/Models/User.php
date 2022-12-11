<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /** In-model roles */
    const JAMAAH = 13;
    const SEKRE = 24;
    const ADMIN = 35;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRoles()
    {
        return $this->hasMany('App\Models\UserRole', 'user_id');
    }

    /**
     * Calling role's name with value.
     * @var int
     * @return string
     */
    public function callRoleName($key){
        switch ($key) {
            case USER::JAMAAH:
                return 'Jamaah';
                break;
            case USER::SEKRE:
                return 'Sekretaris';
                break;
            case USER::ADMIN:
                return 'Admin';
                break;
            default:
                return NULL;
                break;
        }
    }

}
