<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Todo;

class TodoLive extends Component
{
    public $todos;

    public $title;

    public function mount() {
    }

    public function render()
    {
        $this->todos = Todo::all()->where('completed', '=', '0')->sortByDesc('created_at');
        return view('livewire.todo-live');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }

    public function store()
    {
        Todo::create($this->only(['title']));
        $this->reset();
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->completed = true;
        $todo->save();
    }
}
