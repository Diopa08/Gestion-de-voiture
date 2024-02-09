<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Renter;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function home()
    {
        return view('welcome');
    }

    public function location(Car $car)
   {
        return view('cars.location' , compact('car'));
   }

public function showRenters(Car $car)
{
    $renters = $car->renters; // Assurez-vous d'avoir défini la relation appropriée dans le modèle Car

    return view('cars.showRenters', compact('renters', 'car'));
}
// CarController.php


    public function index()
    {
        $car = Car::paginate(10);

        return view('cars.index', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255|required',
            'marque' => 'string|required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validation de l'image
        ]);

        $car = new Car();
        
        $car->name = $request->input("name");
        $car->marque = $request->input("marque");
        $car->description = $request->input("description");
        $car->price = $request->input("price");
        $car->status = $request->input("status");
// Traitement de l'image
        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $car->image = $imagePath;
        $car->save();
        return redirect()->route('cars.index')->with('success', 'Car created successfully');
    
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car = Car::all();

        return view('cars.index', compact('car'));
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        
        $carId = $car->id;
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->name = $request->input("name");
        $car->description = $request->input("description");
        $car->price = $request->input("price");
        $car->user_id = $request->input("user_id");
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $car->image = $imagePath;
        }
        $car->update();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index');
     }
    
}
