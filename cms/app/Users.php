<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'users_cid';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    
}
