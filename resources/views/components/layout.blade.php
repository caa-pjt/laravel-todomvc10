<html>
    <head>
        <title>Todo</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <section class="todoapp">
            {{ $slot }}
        </section>
    </body>
</html>