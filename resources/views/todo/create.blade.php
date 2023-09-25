<x-layout>
    <form method="POST" action="/todos">
        @csrf
        @method('POST')
        Title
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="title" value="{{ old('title') }}">
        <input type="submit" value="Add">
    </form>
</x-layout>