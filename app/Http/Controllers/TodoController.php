<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\StoreRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
  /**
   * todoの一覧を表示する
   * 
   * @return \Illuminate\Http\JsonResponse
   */
  public function index(): \Illuminate\Http\JsonResponse
  {
    // todoを全件取得
    $todos = Todo::all();
    // json形式で返す
    return response()->json($todos);
  }

  /**
   * 新しいtodoを作成する
   * 
   * @param \App\Http\Requests\Todo\StoreRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
  {
    // 新規todoを作成
    $todo = new Todo();
    // $todoの各カラムに値を代入
    $todo->title = $request->get('title');
    $todo->completed = false;
    // todoを保存
    $todo->save();

    return response()->json($todo);
  }

  /**
   * 指定されたtodoを更新する
   * 
   * @param \App\Http\Requests\Todo\UpdateRequest $request
   * @param string $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(UpdateRequest $request, string $id): \Illuminate\Http\JsonResponse
  {
    // $idをもとにtodoを取得
    $todo = Todo::find($id);
    // リクエストにcompletedの値があれば$todoにcompletedの値を代入
    if ($request->has('completed')) {
      $todo->completed = $request->get('completed');
    }
    // todoを保存
    $todo->save();

    return response()->json($todo);
  }

  /**
   * 指定されたtodoを削除する
   * 
   * @param string $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy(string $id): \Illuminate\Http\JsonResponse
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
