@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Book Services</div>

                <div class="panel-body">
                    <div class="">
                        <select id="services" multiple="multiple"></select>
                        <button id="submit" class="btn btn-primary">Submit</button>
                        <script>
                            var dataSource = [ { ProductName: "Orange", ProductID: 1 },
                                               { ProductName: "Apple", ProductID: 2 } ];
                            /*
                            var dataSource = new kendo.data.DataSource({
                              transport: {
                                read: {
                                  url: "{{ \Illuminate\Support\Facades\URL::asset('services') }}"
                                  dataType: "json"
                                }
                              }
                            });
                            */
                            $("#services").kendoMultiSelect({
                              dataSource: dataSource,
                              dataTextField: "ProductName",
                              dataValueField: "ProductID"
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#submit').click(function() {
        console.log($('#services').val());
    });
</script>
@endsection
