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
                <li wire:key="{{ $todo->id }}">
                    <div class="view">
                        <input type="checkbox"
                                value="{{ $todo->completed }}"
                                wire:click="complete({{ $todo->id}})"
                                class="toggle"
                                @if($todo->completed) checked @endif />                    
                        <label>{{ $todo->title }}</label>
                    </div>                    
                    <button class="destroy" wire:click="destroy({{ $todo->id }})"></button>
                </li>
            @endforeach
            </ul>
        </section>
        <footer class="footer">
            <span class="todo-count"><strong>{{ count($todos) }}</strong> item left</span>
        </footer>
    @endif
</div>
