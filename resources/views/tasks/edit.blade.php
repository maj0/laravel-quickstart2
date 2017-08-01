@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- Edit Task Form -->
                    <form action="{{ url('task/update/' . $task->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            </div>
                        </div>

                        <!-- Task Description -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <textarea name="description" id="task-description" class="form-control">{{ $task->description }}</textarea>
                            </div>
                        </div>

                        <!-- Edit Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <!--button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-save"></i>Save Task
                                </button-->
                                <table><tr><td>
                                <!-- Show all tasks  button -->
                                <form action="{{url('tasks/')}}" method="GET">
                                    <button type="submit" id="show-task-{{ $task->id }}" class="btn btn-info">
                                        <i class="fa fa-btn fa-show"></i>Show all tasks
                                    </button>
                                </form>
                                </td><td>
                                <!-- Task Edit Button -->
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-save"></i>Save Task
                                </button>
                                </td></tr></table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
