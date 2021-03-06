<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Self_;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Администратор
     */
    const ADMIN = 'admin';

    protected $table = 'kv_users';
    protected $primaryKey = 'id_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'login',
        'email',
        'pass',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->pass;
    }

    public $timestamps = false;

    public function tests()
    {
        return $this->hasMany(Test::class, 'user_id');
    }

    public function usersRole()
    {
        return $this->hasOne(Role::class, 'id_role', 'role');
    }

    public function isAdmin()
    {
        return $this->usersRole->role_name === self::ADMIN;
    }
}
