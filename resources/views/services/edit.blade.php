<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 3/7/16
 * Time: 11:33 AM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit service</div>

                    <div class="panel-body">
                        {{-- Edit service entry form --}}
                        {!! Form::model($service, array('url' => '/services/' . $service->id, 'method' => 'PATCH', 'class' => 'form-horizontal', 'role' => 'form')) !!}

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

                        <div class="form-group{{ $errors->has('isActive') ? ' has-error' : '' }}">
                            {!! Form::label('isActive', 'Is Active', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
                                {{--{!! Form::text('type', old('type'), array('class' => 'form-control')) !!}--}}
                                {!! Form::select(
                                    'isActive',
                                    array('0' => 'No', '1' => 'Yes'),
                                    old('isActive'),
                                    array('class' => 'form-control')
                                ) !!}

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update service
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
