<?php

namespace App;

use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    protected $table = 'role_user';
    protected $fillable = [
        'user_id','role_id'
    ];
}
