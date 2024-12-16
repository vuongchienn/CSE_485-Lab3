@extends('layout.app')

@section('content')
<div class = "container"> 
    <h1>Add a new task</h1>
<form action = "{{ route('tasks.store') }}" method = "POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name = 'title' required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name = 'description' required></textarea>
    </div>
    <div class="mb-3">
        <label for="long_description" class="form-label">Long description</label>
        <textarea class="form-control" id="long_description" name = 'long_description'></textarea>
    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="completed" name="completed">
        <label class="form-check-label" for="completed">Completed</label>
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
  <a href ="{{ route('tasks.index') }}" class = 'btn btn-secondary'>Back</a>
</div>

@endsection