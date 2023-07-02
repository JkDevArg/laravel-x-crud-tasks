@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12 pb-3">
        <div>
            <h2>Create Task</h2>
        </div>
        <div>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        Ups...<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Task" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description..."></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Due Date:</strong>
                    <input type="date" name="due_date" class="form-control" id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Select Status--</option>
                        <option value="Pendiente">Pending</option>
                        <option value="En progreso">In Progress</option>
                        <option value="Completada">Completed</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
