@extends('layouts.app')

@section ('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                @endif
                <form action="" method="post" role="form" class="form-horizontal">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Your Name">
                            </div>
                        </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Your Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-md-4 control-label">Message</label>

                                <div class="col-md-6">
                                    <textarea id="message" class="form-control" name="message" placeholder="Your Message"></textarea>
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </div>
                        </div>
                </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection