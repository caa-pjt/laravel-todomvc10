<html>
    <head>
        <title>Todo</title>
    </head>
    <body>
        <h1><a href="{{ route('todos.index') }}">Todo</a></h1>
        <a href="{{ route('todos.create') }}">New todo</a>
        <hr/>
        {{ $slot }}
    </body>
</html>