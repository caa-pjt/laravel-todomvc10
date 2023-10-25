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
        return response()->json(Todo::all()->sortByDesc('created_at'));
    }

    public function store(TodoRequest $request)
    {
        $t = Todo::create($request->except('_token', '_method'));
        return response()->json($t);
    }

    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->except('_token', '_method'));
        return response()->json($todo);                
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(['success' => 'success'], 200);  
    }
}
