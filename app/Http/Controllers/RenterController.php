<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Renter;
use Illuminate\Http\Request;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pickup_date' => 'required|date',
            'return_date' => 'required|date',
        ]);
    
        // Enregistrez les données dans la table renter
        $renter = new Renter();
        $renter->pickup_date = $request->input('pickup_date');
        $renter->return_date = $request->input('return_date');
        $renter->car_id = $request->input('car_id'); // Assurez-vous d'avoir la relation appropriée dans le modèle Car
        $renter->user_id = auth()->user()->id; // Vous pouvez ajuster cela en fonction de votre logique d'authentification
        $renter->save();

        $car = Car::findOrFail($request->input('car_id'));

        $car->status = "Indisponible";

        $car->update();
    
        // Vous pouvez rediriger l'utilisateur où vous le souhaitez après la location
        return redirect()->route('cars.index')->with('success', 'Location réussie !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Renter $renter)
    {
        
        $renter->final_return_date = now();
        
        $renter->update();

        dd($renter);
    
        $car = Car::findOrFail($renter->car_id);
    
        
        $car->status = "Disponible";
        $car->save();
    
        return redirect()->route('dashboard')->with('success', 'Voiture rendue avec succès !');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
