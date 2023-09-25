<x-layout>
    <h1>Edit todo #{{ $todo->id }}</h1>    
    <form method="POST" action="{{ route('todos.update', $todo) }}">
        @csrf
        @method('PUT')
        Title
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="title" value="{{ old('title', $todo->title) }}">
        <input type="submit" value="Update">
    </form>
</x-layout>