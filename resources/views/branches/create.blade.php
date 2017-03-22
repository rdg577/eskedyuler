<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 3/1/16
 * Time: 8:14 PM
 */
 ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Register a branch</div>

                    <div class="panel-body">
                        {!! Form::open(array('url' => '/register-branch', 'class' => 'form-horizontal', 'role' => 'form')) !!}

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

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', 'Address', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
                                {!! Form::text('address', old('address'), array('class' => 'form-control')) !!}

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}">
                            {!! Form::label('contact_no', 'Contact No.', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
                                {!! Form::text('contact_no', old('contact_no'), array('class' => 'form-control')) !!}

                                @if ($errors->has('contact_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email', array('class' => 'col-md-4 control-label')) !!}

                            <div class="col-md-6">
                                {!! Form::text('email', old('email'), array('class' => 'form-control')) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
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
