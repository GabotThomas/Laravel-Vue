<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function getAllTodoList()
    {
        $todoLists = TodoList::all();
        return response([
            "todoLists" => $todoLists,
        ], 200);
    }

    public function postTodoList(Request $request)
    {
        $todoList = new TodoList();
        $todoList->value = $request->value;
        $todoList->save();
        return response([
            "todoList" => $todoList,
            "message" => 'Ajouter'
        ], 200);
    }

    public function deleteTodoList(Request $request)
    {
        $message = TodoList::find($request->id);
        $message->delete();
        return response([
            "message" => 'Supprimer'
        ], 200);
    }
}
