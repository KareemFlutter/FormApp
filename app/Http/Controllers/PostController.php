<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class PostController extends Controller
{
    public function index (Request $request) {

        if (isset($request->get_todos)) {
            $todos = Todo::query()->orderBy('id', 'desc')->get();

            return response()->json(['data' => $todos, 'success' => isset($todos)]);
        }

        return view('post.index');
    }

    public function store (Request $request) {
        $data = $request->all();
        $todo = Todo::create($data);

        return response()->json(['data' => $todo, 'success' => isset($todo)]);
    }


}
