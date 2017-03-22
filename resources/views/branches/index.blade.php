<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 3/2/16
 * Time: 5:15 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Branches</div>

                    <div class="panel-body">

                        <div class="row">

                            @forelse($branches as $branch)
                                <div class="col col-md-6">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            {{ $branch->name }} :: <small><a href="{{ url('/branch/' . $branch->id . '/edit') }}">edit</a></small>
                                        </div>
                                        <div class="panel-body">
                                            <div>Address: {{ $branch->address }}</div>
                                            <div>Contact No.: {{ $branch->contact_no }}</div>
                                            <div>Email: {{ $branch->email }}</div>
                                        </div>
                                    </div>

                                </div>
                            @empty
                                No records...
                            @endforelse

                            {!! $branches->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
