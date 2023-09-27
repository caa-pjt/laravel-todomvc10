<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todo.index', ['todos' => Todo::all()->sortByDesc('created_at')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $t = new Todo();
        return view('todo.create', ['todo' => $t]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        Todo::create($request->except('_token', '_method'));
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update($request->except('_token', '_method'));
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
