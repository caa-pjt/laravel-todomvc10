<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;

use App\Models\Todo;

class TodoLive extends Component
{
    public $todos;

    #[Rule('required', onUpdate: false)]    
    public $title;

    public $editTitle;

    public $editingId;

    public function mount() {
    }

    public function render()
    {
        $this->todos = Todo::all()->where('completed', '=', '0')->sortByDesc('created_at');
        return view('livewire.todo-live');
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

    public function edit($id)
    {
        $todo = Todo::find($id);
        $this->editTitle = $todo->title;
        $this->editingId = $id;
    }

    public function cancelEdit()
    {
        $this->editingId = null;
    }

    public function update($id)
    {
        $todo = Todo::find($id);
        $todo->setTitleOrDelete(trim($this->editTitle));
        $this->editingId = null;
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }
}
