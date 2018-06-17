<?php

namespace App;

use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
=======
use Spatie\Permission\Traits\HasRoles;
>>>>>>> francisco
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
<<<<<<< HEAD
=======
    use HasRoles;
>>>>>>> francisco

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
=======

    protected $table = 'Usuario';

    protected $primaryKey = 'usu_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = [
        'password', 'usu_nombre', 'fk_rol'
    ];

     /** The attributes that should be hidden for arrays.
>>>>>>> francisco
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
