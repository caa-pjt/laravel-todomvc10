<x-layout>
    <table>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Todo</th>
            <th>Completed</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($todos as $todo)
        <tr>    
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->created_at->format('d.m.Y') }}</td>
            <td>{{ $todo->title }}</td>
            <td><input type="checkbox" {{ $todo->completed ? 'checked' : '' }} disabled></td>
            <td><a href="{{ route('todos.edit', $todo) }}">Edit</a></td>
            <td>
                <form method="POST" action="{{ route('todos.destroy', $todo) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
</x-layout>