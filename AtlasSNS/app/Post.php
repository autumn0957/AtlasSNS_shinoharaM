<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //一覧画面
    //public function getTimeLines(Int $user_id, Array $follow_ids){
        //自身とフォローしているユーザーIIDを結合
      //  $follow_ids[] = $user_id;
        //return $this->whereIN('user_id', $follow_ids)->orderBy('created_at', 'DEsc')->paginate(50);
    //}
    protected $fillable = [
        'user_id', 'post',
    ];

}
