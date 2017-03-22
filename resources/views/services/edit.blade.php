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

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), array('class' => 'form-control')) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            {!! Form::label('amount', '', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
                                {!! Form::number('amount', old('amount'), array('class' => 'form-control')) !!}

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
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

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            {!! Form::label('type', '', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
                                {!! Form::select(
                                'type',
                                array('Express' => 'Express', 'Ordinary' => 'Ordinary'),
                                null,
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
                                    {{--<i class="fa fa-btn fa-user">--}}</i>Update service
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
