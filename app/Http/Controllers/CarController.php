<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Make;
use App\Models\Fuel;
use App\Models\Type;
use App\Models\State;
use App\Models\City;


use Illuminate\Http\Request;
use Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cars = Car::select('cars.*','makes.make','fuels.fuel','types.type','states.state_name','cities.city_name')
                ->leftjoin('makes','cars.make','=','makes.id')
                ->leftjoin('fuels','cars.fuel','=','fuels.id')
                ->leftjoin('types','cars.type','=','types.id')
                ->leftjoin('states','cars.state','=','states.state_code')
                ->leftjoin('cities','cars.city','=','cities.city_id')
                ->get();
        return view('cars.index')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->hasAnyRole(['manager']))
        {
            return redirect(route('car.index'));
        }
        $makes = Make::get();
        $fuels = Fuel::get();
        $types = Type::get();
        return view('cars.create')->with('makes',$makes)->with('fuels',$fuels)->with('types',$types);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::user()->hasAnyRole(['manager']))
        {
            return redirect(route('car.index'));
        }
        $validated = $request->validate([            
            'make' => 'required|max:100',
            'model' => 'required|max:100',
            'year' => 'required|integer|between:1980,'.date('Y').'',
            'color' => 'required|max:100',
            'type' => 'required',
            'fuel' => 'required',
            'seat_capacity' => 'required|integer|between:1,10',
            'stock' => 'required|integer|min:0',
            'state' => 'required',
            'city' => 'required'
        ]);

        $car = new Car();
            $car->make = $request->make;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->color = $request->color;
            $car->type = $request->type;
            $car->fuel = $request->fuel;
            $car->seat_capacity = $request->seat_capacity;
            $car->stock = $request->stock;
            $car->state = explode('-',$request->state)[0];
            $car->city = explode('-',$request->city)[0];
        $car->save();

            State::firstOrCreate(['state_code' => explode('-',$request->state)[0],'state_name' => explode('-',$request->state)[1]]);
            City::firstOrCreate(['city_id' => explode('-',$request->city)[0]],['city_id' => explode('-',$request->city)[0],'city_name' => explode('-',$request->city)[1]]);

        return redirect(route('car.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $makes = Make::get();
        $fuels = Fuel::get();
        $types = Type::get();
        $car = Car::select('cars.*','states.state_name','cities.city_name')
            ->leftjoin('states','cars.state','=','states.state_code')
            ->leftjoin('cities','cars.city','=','cities.city_id')
            ->find($id);
        return view('cars.edit')->with('car',$car)->with('makes',$makes)->with('fuels',$fuels)->with('types',$types);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Auth::user()->hasAnyRole(['manager']))
        {
            $validated = $request->validate([            
                'make' => 'required|max:100',
                'model' => 'required|max:100',
                'year' => 'required|integer|between:1980,'.date('Y').'',
                'type' => 'required',
                'color' => 'required|max:100',
                'fuel' => 'required',
                'seat_capacity' => 'required|integer|between:1,10',
                'stock' => 'required|integer|min:0',
                'state' => 'required',
                'city' => 'required'
            ]);
        }
        elseif(Auth::user()->hasAnyRole(['mechanic']))
        {
            $validated = $request->validate([            
                'color' => 'required|max:100',
                'fuel' => 'required',
                'seat_capacity' => 'required|integer|between:1,10',
                'stock' => 'required|integer|min:0'
            ]);
        }
        elseif(Auth::user()->hasAnyRole(['warehouse','sales']))
        {
            $validated = $request->validate([            
                'stock' => 'required|integer|min:0'
            ]);
        }

        $car = Car::find($id);

        if(Auth::user()->hasAnyRole(['manager']))
        {
            $car->make = $request->make;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->type = $request->type;
            $car->state = explode('-',$request->state)[0];
            $car->city = explode('-',$request->city)[0];

            State::firstOrCreate(['state_code' => explode('-',$request->state)[0],'state_name' => explode('-',$request->state)[1]]);
            City::firstOrCreate(['city_id' => explode('-',$request->city)[0]],['city_id' => explode('-',$request->city)[0],'city_name' => explode('-',$request->city)[1]]);
         }
        if(Auth::user()->hasAnyRole(['manager','mechanic',]))
        {
            $car->color =
            $request->color;
            $car->fuel = $request->fuel;
            $car->seat_capacity = $request->seat_capacity;
        }
         if(Auth::user()->hasAnyRole(['manager','mechanic','warehouse','sales']))
        { 
            $car->stock =$request->stock;
        } 
        $car->save();

        return redirect(route('car.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::find($id)->delete();
    }

    public function logout()
    {
        Auth::logout();
    }
}
