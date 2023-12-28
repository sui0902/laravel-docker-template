<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model//extends 継承 継承元（Model）のメソッドプロパティを継承先（Todo）で使える
{
    //追加
    protected $table = 'todos';
    
    protected $fillable = [ //リクエストから取得した値をtodosテーブルに登録
        'content'
    ];
}
