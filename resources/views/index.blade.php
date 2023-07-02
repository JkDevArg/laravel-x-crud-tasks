@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12 py-4">
        <div class="text-center">
            <h2 class="text-white">CRUD TASKS</h2>
        </div>
        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-dark table-hover">
            <tr class="text-secondary">
                <th>Task</th>
                <th>Description</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td class="fw-bold">{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        {{ $task->due_date }}
                    </td>
                    <td>
                        @if ($task->status == 'Pendiente')
                            <span class="badge bg-warning fs-6">{{ $task->status }}</span>
                        @elseif ($task->status == 'En progreso')
                            <span class="badge bg-info fs-6">{{ $task->status }}</span>
                        @elseif ($task->status == 'Completada')
                            <span class="badge bg-success fs-6">{{ $task->status }}</span>
                        @else
                            <span class="badge bg-secondary fs-6">{{ $task->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center pt-3">
            {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection
