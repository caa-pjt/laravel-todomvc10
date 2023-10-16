<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;

use App\Models\Todo;

class TodoLive extends Component
{
    public $todos;

    #[Rule('required')] 
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
        $this->validate();
        Todo::create([
            'title' => trim($this->title),
        ]);
        $this->reset();
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->completed = true;
        $todo->save();
    }
}
