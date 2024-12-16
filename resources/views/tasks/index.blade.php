@extends('layout.app')

@section('content')
    
@php
    
    $id = 0
@endphp

<table class="table">
    @csrf
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        @foreach($tasks as $task)
      <tr>
        <th scope="row" class ='text-center'>{{ ++$id }}</th>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->completed ? 'completed' : 'incomplete' }}</td>
        <td class ='text-center'><a href = "{{ route('tasks.show',$task->id) }}"><i class="bi bi-eye-fill"></i></a></td>
        <td class ='text-center'><a href = "{{ route('tasks.edit',$task->id) }}"><i class="bi bi-pencil-fill"></i></a></td>
        <td class ='text-center'>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Do you sure delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link p-0">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </form>
        </td>
        
        
      </tr>
        @endforeach
     
    </tbody>

  </table>

  <div class="pagination">
    {{ $tasks->links('pagination::bootstrap-5') }}
</div>

@endsection