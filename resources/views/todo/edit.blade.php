<x-layout>
    <h1>Edit todo #{{ $todo->id }}</h1>    
    <form method="POST" action="{{ route('todos.update', $todo) }}">
        @method('PUT')
        <x-forms.todo :todo="$todo"/>
        <input type="submit" value="Update">
    </form>
</x-layout>