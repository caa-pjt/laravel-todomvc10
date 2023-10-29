<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\User;

class TodoApiController extends Controller
{
    public function getToken()
    {
        $u = User::find(1);
        $token = $u->createToken('api');
        return response()->json($token);
    }

    public function index()
    {
        return response()->json(Todo::orderByDesc("created_at")->get());
    }

    public function store(TodoRequest $request)
    {
        $data = $request->validated();
        $todo = Todo::create($data);

        return response()->json($todo, 201);
    }

    public function update(TodoRequest $request, Todo $todo)
    {
        $data = $request->validated();
        $todo->update($data);

        return response()->json($todo, 200);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json([], 204);
    }
}
