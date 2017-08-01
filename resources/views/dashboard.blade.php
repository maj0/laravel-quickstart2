@extends('layouts.app')

@section ('assets')
<link href="{{ URL::asset('/css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Last 4 Tasks</div>
                <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                @endif
				@if (count($tasks) > 0)
					<div class="grid grid-pad">
						@foreach ($tasks as $task)
					    <a  href="/task/show/{{$task->id}}" class="col-1-4">
							<div class="module task">
							  <h4>{{$task->name}}</h4>
							</div>
					    </a>
						@endforeach
					</div>
				@endif
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection