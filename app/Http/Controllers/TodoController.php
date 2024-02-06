<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\StoreRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // todoを全件取得
    $todos = Todo::all();
    return $todos;
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRequest $request)
  {
    // 新規todoを作成
    $todo = new Todo();
    // $todoの各カラムに値を代入
    $todo->title = $request->get('title');
    $todo->completed = false;
    // todoを保存
    $todo->save();

    return $todo;
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    // $idをもとにtodoを取得
    $todo = Todo::find($id);
    return $todo;
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRequest $request, string $id)
  {
    // $idをもとにtodoを取得
    $todo = Todo::find($id);
    // リクエストをもとに$todoにtitleの値を代入
    $todo->title = $request->get('title');
    // リクエストにcompletedの値があれば$todoにcompletedの値を代入
    if ($request->get('completed')) {
      $todo->completed = $request->get('completed');
    }
    // todoを保存
    $todo->save();

    return $todo;
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //　$idをもとにtodoを取得
    $todo = Todo::find($id);
    // todoを削除
    $todo->delete();

    return response()->json([
      'message' => 'Todo deleted successfully'
  ]);
  }
}
