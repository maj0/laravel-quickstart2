@extends('layouts.app')

@section('content')
    <a href='/task'>Add New Task</a>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <!-- Current flash message -->
			@if (Session::has('flash_message'))
				<div class="alert alert-success">
				{{ Session::get('flash_message') }}
				</div>
			@endif

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                        <table id="example" class="table displaay">
                            <thead>
                             <tr>
                                <th>Task</th>
                                <th>&nbsp;</th>
                             </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div title="{{ $task->description }}">{{ $task->name }}</div></td>

                                        <td align=right>
					    <table><tr><td>
                                            <!-- Task Show Button -->
                                            <form action="{{url('task/show/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" id="edit-task-{{ $task->id }}" class="btn btn-show">
                                                    <i class="fa fa-btn fa-info"></i>Show
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            @endif
        </div>
    </div>
@endsection
