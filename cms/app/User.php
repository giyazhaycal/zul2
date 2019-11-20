<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "administrator";
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getCid()
    {
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $cid = $randomString;
        $check = self::whereRaw("BINARY `administrator_cid` = ?" ,[$cid])->count();

        if($check == 0)
        {
            return $cid;
        }
        else
        {
            return self::getCid();
        }
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'administrator_role', 'admin_cid', 'role_cid');
    }

    public function roleMenu() 
    {
        return explode(',', $this->role_menu);
    }

    public function isSuperAdmin()
    {
        return $this->roles->where('slug','super-admin')->count() > 0;
    }

    public function hasRole($role)
    {
        $role = $this->roles->where('slug',$role)->count() > 0;

        if($this->isSuperAdmin() OR $role)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
