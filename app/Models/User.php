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
            case UserRole::JAMAAH:
                return 'Jamaah';
                break;
            case UserRole::SEKRE:
                return 'Sekretaris';
                break;
            case UserRole::ADMIN:
                return 'Admin';
                break;
            default:
                return NULL;
                break;
        }
    }

    /**
     * Check if user has a role.
     * @var int
     * @return bool
     */
    public function hasAnyRole($role){
        return null !== $this->userRoles()->where('role_id', $role)->first();
    }
    public function isAdmin(){
        return $this->hasAnyRole(UserRole::ADMIN);
    }
    public function isSekre(){
        return $this->hasAnyRole(UserRole::SEKRE);
    }
    public function isJamaah(){
        return $this->hasAnyRole(UserRole::JAMAAH);
    }

    /**
     * Check if user has either of any role. Unused atm.
     * @var array
     * @return bool
     */
    public function hasAnyRoles($role){
        return null !== $this->userRoles()->whereIn('role_id', $role)->first();
    }

}
