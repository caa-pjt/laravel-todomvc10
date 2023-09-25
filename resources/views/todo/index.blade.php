<x-layout>
    <table>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Todo</th>
            <th>Completed</th>
        </tr>
    @foreach ($todos as $todo)
        <tr>    
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->created_at->format('d.m.Y') }}</td>
            <td>{{ $todo->title }}</td>
            <td><input type="checkbox" {{ $todo->completed ? 'checked' : '' }} disabled></td>
        </tr>
    @endforeach
    </table>
</x-layout>