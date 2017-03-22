<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 3/12/16
 * Time: 5:06 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Receipts</div>

                    <div class="panel-body">

                        {{-- Add new receipt --}}
                        <div class="panel panel-default">
                            <div class="panel-heading"><a data-toggle="collapse" href="#new-receipt">Add new receipt</a></div>
                            <div id="new-receipt" class="panel-collapse {{ count($errors) == 0 ? 'collapse':'' }}">
                                <div class="panel-body">
                                {{-- New receipt entry form --}}
                                {!! Form::open(array('url' => '/receipts', 'class' => 'form-horizontal', 'role' => 'form')) !!}

                                    <div class="form-group{{ $errors->has('starting_number') ? ' has-error' : '' }}">
                                        {!! Form::label('starting_number', '', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::number('starting_number', old('starting_number'), array('class' => 'form-control')) !!}

                                            @if ($errors->has('starting_number'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('starting_number') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('ending_number') ? ' has-error' : '' }}">
                                        {!! Form::label('ending_number', '', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::number('ending_number', old('ending_number'), array('class' => 'form-control')) !!}

                                            @if ($errors->has('ending_number'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('ending_number') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('series_number') ? ' has-error' : '' }}">
                                        {!! Form::label('series_number', '', array('class' => 'col-md-4 control-label')) !!}

                                        <div class="col-md-6">
                                            {!! Form::text('series_number', old('series_number'), array('class' => 'form-control')) !!}

                                            @if ($errors->has('series_number'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('series_number') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{--<i class="fa fa-btn fa-user"></i>--}}Add new receipt/s
                                            </button>
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                        {{-- List of receipts --}}
                        <div class="panel panel-default">
                            <div class="panel-heading">List of receipts</div>
                            <div class="panel-body">

                                <div class="row">

                                    @forelse($receipts_series as $series)
                                        <div class="col col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><a data-toggle="collapse" href="#{{ $series->number }}">Series number: {{ $series->number }}</a></div>
                                                <div id="{{ $series->number }}" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <?php
                                                        $receipts = \App\Receipt::where('series_number', $series->number)->get();
                                                        ?>

                                                        @forelse($receipts as $receipt)
                                                            <div class="col col-md-4">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        Receipt #: {{ $receipt->number }} :: <small><a href="{{ url('/receipt/' . $receipt->id . '/edit') }}">edit</a></small>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <div>Is used?: {{ $receipt->is_used ? 'Yes':'No' }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="panel-body">No records...</div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>

                                            {!! $receipts_series->links() !!}
                                        </div>
                                    @empty
                                        <div class="panel-body">No records...</div>
                                    @endforelse

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
