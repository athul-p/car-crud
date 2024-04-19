<!DOCTYPE html>
<html lang="en">
    <head>
        <title>List All Cars</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="/car-crud/public/js/functions.js"></script>
    </head>
    <body>
        <div class="containe-fluid" style="text-align: right;padding-right: 20px;">
        Name : {{ Auth::user()->name }}
        <br>
        <a class="log_out" href="#">Logout</a>
        </div>
        <div class="container">
            @hasrole('manager')
                <a href="{{route('car.create')}}" class="btn btn-default">Add new car</a>
            @endhasrole
            <table class="table" id="car-table">
                <thead>
                    <tr>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Fuel</th>
                        <th>Seat capacity</th>
                        <th>Stock</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{$car->make}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->year}}</td>
                        <td>{{$car->color}}</td>
                        <td>{{$car->type}}</td>
                        <td>{{$car->fuel}}</td>
                        <td>{{$car->seat_capacity}}</td>
                        <td>{{$car->stock}}</td>
                        <td>{{$car->state_name}}</td>
                        <td>{{$car->city_name}}</td>
                        <td>
                            <a href="{{route('car.edit',$car->id)}}">Edit</a>
                            <a href="#" class="delete" id="{{$car->id}}">Delete</a>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <script type="text/javascript">
            var csrf_token = '{{csrf_token()}}';
            $(document).ready(function(){
                new DataTable('#car-table');
            });
        </script>
        <style>
            .container
            {
                position: relative;
                margin-top:1%;
            }
            a.btn
            {
                position: absolute;
                right: 0;
            }
            #dt-search-0
            {
                width:25%;
            }
        </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.bootstrap5.js"></script>
    </body>
</html>