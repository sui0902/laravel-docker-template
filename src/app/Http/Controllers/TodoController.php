<?php

namespace App\Http\Controllers;

// 追加
use App\Http\Requests\TodoRequest;
use App\Todo;// 追加
// use Illuminate\Http\Request;

class TodoController extends Controller//Routeが実行されたときにインスタンス化
{
    //追加
    private $todo;//プロパティ

    //追加
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // 追加
    public function index()
    {
        $todos = $this->todo->all();//$todosはCollectionインスタンスで、中には各IDのTodoインスタンスが入っている。
        // dd($todos);
        // 追加
        return view('todo.index', ['todos' => $todos]);
        // return view('todo.index', ['todos' => $this->todo->all()]) 上記と同じ
    }

    //追加
    public function create()
    {
        return view('todo.create');
    }

    //追加
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();//$inputsは配列　$requestはインスタンス
        $this->todo->fill($inputs);
        // dd($inputs);
        $this->todo->save();
        // dd($this->todo);
        return redirect()->route('todo.index');

    }
    //URIパラメータが存在するルートは、Controllerメソッドの引数としてその値を受け取る。
    public function show($id)
    {
        $todo = $this->todo->find($id);//$this->todoはただのTodoインスタンス（空）$todoはDBの情報が入ったTodoインスタンス
        // dd($todo,$this->todo);
        // 詳細画面のBladeを作成して、取得したTodoのデータを表示
        return view('todo.show', ['todo' => $todo]);
    }
     // 追加
     public function edit($id)
     {
         $todo = $this->todo->find($id);
         return view('todo.edit', ['todo' => $todo]);
     }
 
     // 追加
     public function update(TodoRequest $request, $id)
     {
         // データ更新の処理
         $inputs = $request->all();
        //  dd($request);
         $todo = $this->todo->find($id);//$todoはtodoインスタンス original:にデータベースに対応した値（更新前）入ってる
         $todo->fill($inputs);//$todoはtodoインスタンス attributes:にリクエストされた値（更新後）入ってる
         $todo->save();//返り値はtrue or false $todoはインスタンスのまま　UPDATE文実行するだけ　saveでDBのデータ更新の
        //  dd($todo);
         return redirect()->route('todo.show', $todo->id);
        //dd($this->todo->id, $todo->id);
 
     }

     // 追加
    public function delete($id)
    {
        // 追加
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');

    }

}
