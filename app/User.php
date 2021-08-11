<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'address', 'phone_number', 'department', 'image', 'education','description','gender'
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

    public function role() {
        return $this->hasOne('App\Role','id','role_id');
    }

    public function userAvatar($request) {
        $image = $request->file('image'); // insert image into variable
        $name = $image->hashName(); // hash image name in DB
        $destination = public_path('/images'); // public path destination for uploaded images 
        $image->move($destination, $name); // move image to destination
        return $name;
    }

}
