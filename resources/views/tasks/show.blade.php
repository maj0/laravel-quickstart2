@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Show Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('tasks') }}" method="GET" class="form-horizontal">
                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}" disabled>
                            </div>
                        </div>

                        <!-- Task Description -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="task-description" class="form-control" disabled>{{ $task->description }}</textarea>
                            </div>
                        </div>

                        <!-- Add Task Buttons -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
				    <table><tr><td>
				    <!-- Show all tasks  button -->
				    <form action="{{url('tasks/')}}" method="GET">
					<button type="submit" id="show-task-{{ $task->id }}" class="btn btn-info">
					    <i class="fa fa-btn fa-show"></i>Show all tasks
					</button>
				    </form>
				    </td><td>
				    <!-- Task Edit Button -->
				    <form action="{{url('task/edit/' . $task->id)}}" method="POST">
					{{ csrf_field() }}
					<button type="submit" id="edit-task-{{ $task->id }}" class="btn btn-info">
					    <i class="fa fa-btn fa-edit"></i>Edit
					</button>
				    </form>
				    </td><td>
				    <!-- Task Delete Button -->
				    <form action="{{url('task/' . $task->id)}}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
					    <i class="fa fa-btn fa-trash"></i>Delete
					</button>
				    </form>
				    </td></tr></table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
