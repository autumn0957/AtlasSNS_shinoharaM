<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

  //  public function Post(){
    //    return $this->hasMany('App\Post');
   // }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   /* public function posts(){
        return $this -> hasMany('App\Post');
    }*/

    //フォロワー⇒フォロー
    public function followUsers(){
        return $this -> belongsToMany('App\User', 'follow_users', 'followed_user_id', 'following_user_id');
    }

    //フォロー⇒フォロワー
    public function follows(){
        return $this -> belongsToMany('App\User', 'follow_users', 'following_user_id', 'followed_user_id');
    }
}
