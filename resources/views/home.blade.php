@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12   ">
            <div id="status" />

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">

                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#tab_tentatives">Tentative</a></li>
                      <li><a data-toggle="tab" href="#tab_confirmed">Confirmed</a></li>
                      <li><a data-toggle="tab" href="#tab_no_show">No Show</a></li>
                    </ul>

                    <div class="tab-content">

                      <div id="tab_tentatives" class="tab-pane fade in active">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($tentative_bookings as $booking)
                                    <?php
                                    $bg_color = $booking->status_id == 1 ? "orange" : "lightgreen";
                                    $dt = \Carbon\Carbon::parse($booking->event_date_time);
                                    ?>
                                    <tr style="background-color: {{ $bg_color }}">
                                        <td>{{ $dt->toFormattedDateString() }}</td>
                                        <td>{{ $dt->format('h:i:s A') }}</td>
                                        <td>{{ $booking->clientFullname() }}</td>
                                        <td>
                                            <ul>
                                            @foreach($booking->details as $detail)
                                                <li>{{ $detail->service->title }}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $booking->status->type }}</td>
                                        <td>
                                        @if($booking->status->id == 1)
                                            <button id="confirmed" class="btn btn-primary" onclick="verifyConfirmation({{ $booking->id }})">Confirmed</button>
                                            <button id="reschedule" class="btn btn-primary" onclick="reschedule({{$booking->id}})">Reschedule</button>
                                            <button id="no_show" class="btn btn-primary" onclick="verifyNoShow({{ $booking->id }})">No Show</button>
                                        @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records...</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="6">{!! $tentative_bookings->links() !!}</td>
                                </tr>
                            </tfoot>
                        </table>
                      </div> {{--tentatives--}}

                      <div id="tab_confirmed" class="tab-pane fade">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($confirmed_bookings as $booking)
                                    <?php
                                    $bg_color = $booking->status_id == 1 ? "orange" : "lightgreen";
                                    $dt = \Carbon\Carbon::parse($booking->event_date_time);
                                    ?>
                                    <tr style="background-color: {{ $bg_color }}">
                                        <td>{{ $dt->toFormattedDateString() }}</td>
                                        <td>{{ $dt->format('h:i:s A') }}</td>
                                        <td>{{ $booking->clientFullname() }}</td>
                                        <td>
                                            <ul>
                                            @foreach($booking->details as $detail)
                                                <li>{{ $detail->service->title }}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $booking->status->type }}</td>
                                        <td>
                                        @if($booking->status->id == 1)
                                            <button id="confirmed" class="btn btn-primary" onclick="verifyConfirmation({{ $booking->id }})">Confirmed</button>
                                            <button id="reschedule" class="btn btn-primary" onclick="reschedule({{$booking->id}})">Reschedule</button>
                                            <button id="no_show" class="btn btn-primary" onclick="verifyNoShow({{ $booking->id }})">No Show</button>
                                        @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records...</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="6">{!! $confirmed_bookings->links() !!}</td>
                                </tr>
                            </tfoot>
                        </table>
                      </div> {{--confirmed--}}

                      <div id="tab_no_show" class="tab-pane fade">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Service</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($no_show_bookings as $booking)
                                    <?php
                                    $bg_color = "red";
                                    $dt = \Carbon\Carbon::parse($booking->event_date_time);
                                    ?>
                                    <tr style="background-color: {{ $bg_color }}">
                                        <td>{{ $dt->toFormattedDateString() }}</td>
                                        <td>{{ $dt->format('h:i:s A') }}</td>
                                        <td>{{ $booking->clientFullname() }}</td>
                                        <td>
                                            <ul>
                                            @foreach($booking->details as $detail)
                                                <li>{{ $detail->service->title }}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $booking->status->type }}</td>
                                        <td>
                                        @if($booking->status->id == 1)
                                            <button id="confirmed" class="btn btn-primary" onclick="verifyConfirmation({{ $booking->id }})">Confirmed</button>
                                            <button id="reschedule" class="btn btn-primary" onclick="reschedule({{$booking->id}})">Reschedule</button>
                                            <button id="no_show" class="btn btn-primary" onclick="verifyNoShow({{ $booking->id }})">No Show</button>
                                        @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No records...</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="6">{!! $no_show_bookings->links() !!}</td>
                                </tr>
                            </tfoot>
                        </table>
                      </div> {{--no show--}}

                    </div>

                </div> {{--panel-body--}}


            </div>

        </div>
    </div>
</div>
<script>$('#event_date_time').kendoDateTimePicker({format: "MM/dd/yyyy hh:mm tt"});</script>
<script>
    function BootboxContent(){
        var frm_str = '<form id="some-form">'
                       + '<div class="form-group">'
                          + '<input id="date" class="date span2 form-control input-md" size="16" placeholder="Select date and time" type="text">'
                          + '</div>'
                       + '</form>';

        var object = $('<div/>').html(frm_str).contents();

        object.find('.date').kendoDateTimePicker({format: "MM/dd/yyyy hh:mm tt"});

         return object
    }

    function reschedule(id) {
        bootbox.confirm({
                title: "Reschedule Booking",
                message: BootboxContent,
                buttons: {
                    confirm: {
                        label: 'Submit',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-danger'
                    }
                },
                callback: function(btnConfirm) {
                    if (btnConfirm) {
                        // var event_date_time = new Date($('#date').val());

                        var event_date_time = $('#date').val();

                        $.ajax({
                                type: "GET",
                                url: "{{ \Illuminate\Support\Facades\URL::asset("/book_reschedule") }}",
                                data: {
                                    id : id,
                                    event_date_time : event_date_time
                                },
                                success: function (data) {
                                    window.location.reload(true);

                                    if("no_error" == data) {
                                        $('#status').html("<h3 class='well well-lg' style='color: #008000'>Booking was rescheduled!</h3>");
                                    } else {
                                        $('#status').html("<h3 class='well well-lg' style='color: #8b0000'>Booking was not updated!</h3>");
                                    }
                                },
                                error: function(errMsg) {
                                    console.log('error=' + errMsg.responseText);
                                }
                            });
                    }
                }
            });
    }

    function verifyConfirmation(id) {
        bootbox.confirm({
                message: "<p>Truly confirmed?</p>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function(btnConfirm) {
                    if (btnConfirm) {
                        updateStatus(id, 2); // 2 - is confirmed
                    }
                }
            });
    }

    function verifyNoShow(id) {
        bootbox.confirm({
                message: "<p>No show? Really?</p>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function(btnConfirm) {
                    if (btnConfirm) {
                        updateStatus(id, 3); // 3 - is no show
                    }
                }
            });
    }

    function updateStatus(id, status_id) {
        $.ajax({
                type: "GET",
                url: "{{ \Illuminate\Support\Facades\URL::asset("/book_confirmation") }}",
                data: {
                    id : id,
                    status_id : status_id
                },
                success: function (data) {
                    window.location.reload(true);

                    if("no_error" == data) {
                        $('#status').html("<h3 class='well well-lg' style='color: #008000'>Booking was updated!</h3>");
                    } else {
                        $('#status').html("<h3 class='well well-lg' style='color: #8b0000'>Booking was not updated!</h3>");
                    }
                },
                error: function(errMsg) {
                    console.log('error=' + errMsg.responseText);
                }
            });

    }
</script>
@endsection
