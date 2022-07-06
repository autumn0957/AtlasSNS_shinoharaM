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
        'username', 'mail', 'password', 'images',
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

    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    public function follow_each(){
        //ユーザがフォロー中のユーザを取得
        $userIds = $this->follows()->pluck('users.id')->toArray();
       //相互フォロー中のユーザを取得
        $follow_each = $this->followers()->whereIn('users.id', $userIds)->pluck('users.id')->toArray();
       //相互フォロー中のユーザを返す
        return $follow_each;
    }
}
