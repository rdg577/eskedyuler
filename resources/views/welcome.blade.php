@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <p>This is the online booking site of our spa.</p>
                    <a href="{{ url('/book') }}" class="btn btn-success">Book now...</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
