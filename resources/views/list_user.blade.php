<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 3/3/16
 * Time: 2:20 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        @forelse($users as $user)
                            @if($user->user_type != 'sys_admin')
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{ $user->name }} :: <small><a href="{{ url('/user/' . $user->id . '/edit') }}">edit</a></small>
                                    </div>
                                    <div class="panel-body">
                                        <div>User type: {{ $user->user_type }}</div>
                                        <div>Branch: {{ $user->branch->name }}</div>
                                        <div>Email: {{ $user->email }}</div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            No records...
                        @endforelse

                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection