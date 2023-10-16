<div>
    <header class="header">
        <h1>todos</h1>
        <form wire:submit="store">
            <input class="new-todo" placeholder="What needs to be done?" name="title" wire:model="title" autofocus>
        </form>
    </header>
    @if(count($todos) > 0)
        <section class="main">
            <ul class="todo-list">
            @foreach ($todos as $todo)
                <li wire:key="{{ $todo->id }}" class="@if($editingId == $todo->id) editing @endif">
                    <div class="view">
                        <input type="checkbox"
                                value="{{ $todo->completed }}"
                                wire:click="complete({{ $todo->id}})"
                                class="toggle"
                                @if($todo->completed) checked @endif />                    
                        <label x-on:dblclick="$wire.edit({{ $todo->id }})">{{ $todo->title }}</label>
                    </div>
                    <form wire:submit="update({{ $todo->id }})">
                        <input class="edit" wire:model="editTitle" value="{{ $todo->title }}" @click.away="$wire.cancelEdit">
                    </form>
                    @if($editingId != $todo->id)
                        <button class="destroy" wire:click="destroy({{ $todo->id }})"></button>
                    @endif
                </li>
            @endforeach
            </ul>
        </section>
        <footer class="footer">
            <span class="todo-count"><strong>{{ count($todos) }}</strong> item left</span>
        </footer>
    @endif
</div>
