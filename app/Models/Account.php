<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

    protected $table = 'accounts';

    protected $fillable = [
        'nama_lengkap',
        'username',
        'email',
        'password',
        'role',
        'is_active',
        'last_login_at'
    ];


    public $timestamps = true;

    protected $casts = [
        'is_active'     => 'boolean',
        'last_login_at' => 'datetime',
    ];

    public function getNameAttribute()
    {
        return $this->nama_lengkap ?? $this->username;
    }
}
