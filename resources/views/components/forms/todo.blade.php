@csrf
Title
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<input type="text" name="title" value="{{ old('title', $todo->title) }}">