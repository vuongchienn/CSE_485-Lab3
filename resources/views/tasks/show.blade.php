@extends('layout.app')

@section('content')
    <div class = 'container'>
        <h1>Task detail</h1>
        <p><strong>Title:</strong>{{ $task->title }}</p>
        <p><strong>Description:</strong>{{ $task->description }}</p>
        <p><strong>Long description:</strong>{{ $task->long_description }}</p>
        <p><strong>Status:</strong>{{ $task->completed ? 'Completed' : 'Incomplete' }}</p>
        <a href ="{{ route('tasks.index') }}" class = 'btn btn-secondary'>Back</a>
    </div>
@endsection