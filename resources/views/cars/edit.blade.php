<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Car</title>
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
            <h2>Edit Car</h2>
            <form action="{{route('car.update',$car->id)}}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                @hasrole('manager')
                <div class="form-group">
                    <label for="make">Make:</label>
                    <select type="text" class="form-control" id="make" name="make">
                        <option value="">Select make of car</option>
                    @foreach($makes as $make)
                        <option value="{{$make->id}}" {{($make->id == old('make',$car->make))?"selected":""}}>{{$make->make}}</option>
                    @endforeach
                    </select>
                    @error('make')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="model">Model:</label>
                    <input type="text" class="form-control" id="model" placeholder="" name="model" value="{{$car->model}}">
                    @error('model')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>    
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control" id="year" placeholder="" name="year" value="{{$car->year}}">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select type="text" class="form-control" id="type" placeholder="" name="type">
                    <option value="">Select type of car</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{($type->id == old('type',$car->type))?"selected":""}}>{{$type->type}}</option>
                    @endforeach
                    </select>
                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endrole
                @hasanyrole('manager|mechanic')
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" id="color" placeholder="" name="color" value="{{$car->color}}">
                    @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="seat_capacity">Seat Capacity:</label>
                    <input type="text" class="form-control" id="seat_capacity" placeholder="" name="seat_capacity" value="{{$car->seat_capacity}}">
                    @error('seat_capacity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fuel">Fuel:</label>
                    <select type="text" class="form-control" id="fuel" placeholder="" name="fuel" value="{{$car->fuel}}">
                        <option value="">Select fuel of car</option>
                    @foreach($fuels as $fuel)
                        <option value="{{$fuel->id}}" {{($fuel->id == old('fuel',$car->fuel))?"selected":""}}>{{$fuel->fuel}}</option>
                    @endforeach
                    </select>
                </div>
                @endhasanyrole
                @hasanyrole('manager|warehouse|mechanic|sales')
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text" class="form-control" id="stock" placeholder="" name="stock" value="{{$car->stock}}">
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endhasanyrole
                @hasrole('manager')
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
                @endhasrole
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <script>            
            var csrf_token = '{{csrf_token()}}';
            load_states('{{$car->state.'-'.$car->state_name}}');
            
            $("#state").change(function()
            {   
                if($(this).val().split('-')[0] != '{{$car->state}}')
                {
                    load_city($(this).val().split('-')[0],0);
                }
                else
                {
                    load_city('{{$car->state}}','{{$car->city.'-'.$car->city_name}}');
                }
            });
        </script>
    </body>
</html>
