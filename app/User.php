<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    private $id;

    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nome', 'email', 'password',
    ];


}
