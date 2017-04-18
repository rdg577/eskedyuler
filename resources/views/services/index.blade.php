<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 3/6/16
 * Time: 1:40 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Services</div>

                    <div class="panel-body">

                        {{-- Add new service --}}
                        <div class="panel panel-default">
                            <div class="panel-heading"><a data-toggle="collapse" href="#new-service">Add new service</a></div>
                            <div id="new-service" class="panel-collapse {{ count($errors) == 0 ? 'collapse':'' }}">
                                <div class="panel-body">
                                {{-- New service entry form --}}
                                {!! Form::open(array('url' => '/services', 'class' => 'form-horizontal', 'role' => 'form')) !!}

                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        {!! Form::label('title', 'Title', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::text('title', old('title'), array('class' => 'form-control')) !!}

                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        {!! Form::label('description', 'Description', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::text('description', old('description'), array('class' => 'form-control')) !!}

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('minutes') ? ' has-error' : '' }}">
                                        {!! Form::label('minutes', 'Total Minutes', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::number('minutes', old('minutes'), array('class' => 'form-control', 'step' => 0.1)) !!}

                                            @if ($errors->has('minutes'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('minutes') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                        {!! Form::label('price', '', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::number('price', old('price'), array('class' => 'form-control', 'step' => 0.1)) !!}

                                            @if ($errors->has('price'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                        {!! Form::label('type', '', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::text('type', old('type'), array('class' => 'form-control')) !!}
                                            {{--{!! Form::select(
                                                'type',
                                                array('Express' => 'Express', 'Ordinary' => 'Ordinary'),
                                                null,
                                                array('class' => 'form-control')
                                            ) !!}--}}

                                            @if ($errors->has('type'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-success">
                                                {{--<i class="fa fa-btn fa-user"></i>--}}Submit
                                            </button>
                                            <button type="reset" class="btn btn-default">Clear fields</button>
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                        {{-- List of services --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">List of services</div>
                            <div class="panel-body">

                                {{--<div class="row">--}}

                                    @forelse($services as $service)
                                        <div class="col col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    {{ $service->name }} :: <small><a href="{{ url('/service/' . $service->id . '/edit') }}">edit</a></small>
                                                </div>
                                                <div class="panel-body">
                                                    <div>Description: <b>{{ $service->description }}</b></div>
                                                    <div>Amount: <b>Php {{ number_format($service->price, 2) }}</b></div>
                                                    <div>Type: <b>{{ $service->type }}</b></div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="panel-body">No records...</div>
                                    @endforelse

                                {{--</div>--}}

                                {!! $services->links() !!}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
