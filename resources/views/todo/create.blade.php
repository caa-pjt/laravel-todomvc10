<x-layout>
    <h1>New todo</h1>
    <form method="POST" action="/todos">
        @method('POST')
        <x-forms.todo :todo="$todo"/>
        <input type="submit" value="Add">
    </form>
</x-layout>