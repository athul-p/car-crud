<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create New Car</title>
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
            <h2>Add New Car</h2>
            <form action="{{route('car.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="make">Make:</label>
                    <select type="text" class="form-control" id="make" name="make" value="{{old('make')}}">
                        <option value="">Select make of car</option>
                    @foreach($makes as $make)
                        <option value="{{$make->id}}" {{(old('make')==$make->id)?"selected":""}}>{{$make->make}}</option>
                    @endforeach
                    </select>
                    @error('make')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="model">Model:</label>
                    <input type="text" class="form-control" id="model" placeholder="" name="model" value="{{old('model')}}">
                    @error('model')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>    
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control" id="year" placeholder="" name="year" value="{{old('year')}}">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" id="color" placeholder="" name="color" value="{{old('color')}}">
                    @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select type="text" class="form-control" id="type" placeholder="" name="type" value="{{old('type')}}">
                    <option value="">Select type of car</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{(old('type')==$type->id)?"selected":""}}>{{$type->type}}</option>
                    @endforeach
                    </select>
                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fuel">Fuel:</label>
                    <select type="text" class="form-control" id="fuel" placeholder="" name="fuel">
                        <option value="">Select fuel of car</option>
                    @foreach($fuels as $fuel)
                        <option value="{{$fuel->id}}" {{(old('fuel')==$fuel->id)?"selected":""}}>{{$fuel->fuel}}</option>
                    @endforeach
                    </select>
                    @error('fuel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="seat_capacity">Seat Capacity:</label>
                    <input type="text" class="form-control" id="seat_capacity" placeholder="" name="seat_capacity" value="{{old('seat_capacity')}}">
                    @error('seat_capacity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text" class="form-control" id="stock" placeholder="" name="stock" value="{{old('stock')}}">
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <select type="text" class="form-control" id="state" placeholder="" name="state">
                        <option value="">Select State</option>
                    </select>
                    @error('state')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select type="text" class="form-control" id="city" placeholder="" name="city">
                        <option value="">Select City</option>
                    </select>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <script>
            var csrf_token = '{{csrf_token()}}';
            load_states(0);
            $("#state").change(function()
            {
                load_city($(this).val().split('-')[0],0);
            });
        </script>
    </body>
</html>
