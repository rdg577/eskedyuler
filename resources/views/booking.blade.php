@extends('layouts.app')

@section('content')
<style>
    span.required { background-color: #FF0000; color: #ffff00;}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="booking_status" />

            <div class="panel panel-default">
                <div class="panel-heading">Book Services</div>

                <div class="panel-body">

                    <h4 style="background-color: #00ff00; padding: 5px;">Service Detail</h4>

                    <div class="form-group">
                        <label for="services" class="control-label">Services: (you can select multiple services) <span class="required">&nbsp;!required&nbsp;</span></label>
                        <select id="services" multiple="multiple" required></select>
                        <script>
                            var dataSource = new kendo.data.DataSource({
                              transport: {
                                read: {
                                  url: "{{ \Illuminate\Support\Facades\URL::asset('listServices') }}",
                                  dataType: "json"
                                }
                              }
                            });

                            $("#services").kendoMultiSelect({
                              dataSource: dataSource,
                              dataTextField: "titulo",
                              dataValueField: "id"
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="staffs" class="control-label">Preferred Staff: <span class="required">&nbsp;!required&nbsp;</span></label><br>
                        <input id="staffs" required />
                        <script>
                            var dataSource = new kendo.data.DataSource({
                              transport: {
                                read: {
                                  url: "{{ \Illuminate\Support\Facades\URL::asset('listStaffs') }}",
                                  dataType: "json"
                                }
                              }
                            });

                            $("#staffs").kendoDropDownList({
                              dataSource: dataSource,
                              dataTextField: "fullname",
                              dataValueField: "id"
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="event_date_time" class="control-label">Date and Time: (click the time icon to set time) <span class="required">&nbsp;!required&nbsp;</span></label><br>
                        <input id="event_date_time" required />
                        <script>
                        $("#event_date_time").kendoDateTimePicker({
                            format: "MM/dd/yyyy hh:mm tt"
                        });
                        </script>
                    </div>

                    <h4 style="background-color: #f3ae04; padding: 5px;">Client Detail</h4>



                    <div class="form-group">
                        <label for="firstname" class="control-label">Firstname: <span class="required">&nbsp;!required&nbsp;</span></label>
                        <input type="text" name="firstname" id="firstname" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="control-label">Lastname: <span class="required">&nbsp;!required&nbsp;</span></label>
                        <input type="text" name="lastname" id="lastname" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="control-label">Mobile Number: <span class="required">&nbsp;!required&nbsp;</span></label><br>
                        <input id="mobile" required />
                        <script>
                        $("#mobile").kendoMaskedTextBox({
                            mask: "(000) 000-0000"
                        });
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gender" class="control-label">Gender:</label><br>

                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="gender" id="gender" value="male" autocomplete="off"> Male
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="gender" id="gender" value="female" autocomplete="off"> Female
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="note" class="control-label">Booking Notes</label><br>
                        <textarea name="note" id="note" cols="50" rows="5"></textarea>
                    </div>


                    <button id="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#submit").click(function() {
        bootbox.confirm({
            message: "<p>Done reviewing the data?</p><p>Click YES to continue.</p>",
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
                    savingData();
                }
            }
        });
    });

    function savingData() {
        /** EXTRACTION OF DATA */
        var services = $('#services').val();
        var staff = $('#staffs').val();
        var event_date_time = $('#event_date_time').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var gender = $('#gender').val();
        var mobile = $('#mobile').val();
        var email = $('email').val();
        var note = $('#note').val();

        if(services == null || staff == null || event_date_time == null ||
            firstname == null || lastname == null || mobile == null ||
            services.length == 0 || staff.length == 0 || event_date_time.length == 0 ||
            firstname.length == 0 || lastname.length == 0 || mobile.length == 0) {
            bootbox.alert("One or more required fields is empty.");
        } else
            // INSERT DATA TO TABLE
            $.ajax({
                type: "GET",
                url: "{{ \Illuminate\Support\Facades\URL::asset("/book_now") }}",
                data: {
                    services : services,
                    staff : staff,
                    event_date_time : event_date_time,
                    firstname : firstname,
                    lastname : lastname,
                    gender : gender,
                    mobile : mobile,
                    email : email,
                    note : note
                },
                success: function (data) {
                    if("no_error" == data) {
                        $('#booking_status').html("<h3 class='well well-lg' style='color: #008000'>Booking successful!</h3>");
                    } else {
                        $('#booking_status').html("<h3 class='well well-lg' style='color: #8b0000'>Booking not successful!</h3>");
                    }
                    /*window.location.href = '{{ \Illuminate\Support\Facades\URL::asset("/") }}';*/
                    /*console.log('data=' + data);*/
                },
                error: function(errMsg) {
                    console.log('error=' + errMsg.responseText);
                }
            });
    }
</script>
@endsection
