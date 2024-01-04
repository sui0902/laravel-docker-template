<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //削除処理でdeleted_atに日付を入れるUPDATE文が発行される+すべての取得処理でdeleted_at IS NULLが追加される

class Todo extends Model//extends 継承 継承元（Model）のメソッドプロパティを継承先（Todo）で使える
{
    //追加
    // protected $table = 'todos';
    
    // protected $fillable = [ //リクエストから取得した値をtodosテーブルに登録
    //     'content'
    // ];
    use SoftDeletes; //論理削除にする。

    protected $table = 'todos';

    protected $fillable = [
        'content'
    ];
}
