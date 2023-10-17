<div>
    <header class="header">
        <h1>todos</h1>
        <form wire:submit="store">
            <input class="new-todo" placeholder="What needs to be done?" name="title" wire:model="title" autofocus>
        </form>
    </header>
    @if(($activeTodoCounter > 0) or ($completedTodoCounter > 0))
        <section class="main">
            <input id="toggle-all" class="toggle-all" type="checkbox" wire:click="toggleAll" @if($activeTodoCounter == 0) checked @endif>
            <label for="toggle-all">Mark all as complete</label>
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
            <span class="todo-count"><strong>{{ $activeTodoCounter }}</strong> {{ Str::plural('item', $activeTodoCounter) }} left</span>
            <ul class="filters">
                <li>
                    <a href="#" class="{{ $filterString == '' ? 'selected' : '' }}" wire:click.prevent="filter('')">All</a>
                </li>
                <li>
                    <a href="#" class="{{ $filterString == 'active' ? 'selected' : '' }}" wire:click.prevent="filter('active')">Active</a>
                </li>
                <li>
                    <a href="#" class="{{ $filterString == 'completed' ? 'selected' : ''}}" wire:click.prevent="filter('completed')">Completed</a>
                </li>                
            </ul>    
            @if($completedTodoCounter > 0)        
                <button class="clear-completed" style="display: block;" wire:click="clearCompleted">Clear completed</button>
            @endif
        </footer>
    @endif
</div>
