<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'address_street',
        'address_city',
        'address_country',
        'language',
        'phone_mobile',
        'work_mobile',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the systems for the user post.
     */
    public function systems()
    {
        return $this->hasMany(System::class, 'assigned_user_id');
    }

    function isAdmin()
    {
        return $this->is_admin;
    }

    public static function getActiveUsers()
    {
        return User::where('status', '=', 'Active')->get();
    }

    public static function getAllUsers()
    {
        return User::get();
    }
}
