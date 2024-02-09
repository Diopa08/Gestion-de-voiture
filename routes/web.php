<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RenterController;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Renter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('cars', CarController::class);

Route::resource('rent', RenterController::class);

Route::get('car/list', function(){
    $car = Car::all();

    return view('cars.listeCars', ['car' => $car]);
});





Route::get('/admin/{id}', function($id) {
    
    $user = user::findOrFail($id);

    $user->is_admin = true;

    $user->update();

    return Redirect::back()->with('success','Now is admin');

})->name('admin');


Route::get('/not_admin/{id}', function($id) {
    
    $user = user::findOrFail($id);

    $user->is_admin = false;

    $user->update();

    return Redirect::back()->with('success','Now is admin');

})->name('not_admin');


Route::get('/acceuil', function () {
    return view('welcome');
})->name('home');

Route::get('list/location/{id}', function ($id) {
    $user = User::findOrFail($id);

    $renter = Renter::with('car')->where('user_id', $user->id)->paginate(10);

    //dd($location);

    return view('cars.showRenters', 
    [
        'renter' => $renter,
       
    ]);
})->name('list_cars_locate');

// Afficher tous les utilisateurs ayant effectué au moins aune location

Route::get('nma', function(){

    $renter = Renter::with('user')->get()->groupBy('user_id')->map->first()->values();
    
    return view('listRenter', compact('renter'));
})->name('list_users_locate');



Route::get('terminate/{id}', function ($id) {

    $renter = Renter::findOrFail($id);

    $renter->final_return_date = now();
        
        $renter->update();
    
        $car = Car::findOrFail($renter->car_id);
        
        $car->status = "Disponible";
        $car->save();
    
        return redirect()->route('dashboard')->with('success', 'Voiture rendue avec succès !');
})->name('terminate');

Route::get('/dashboard', function () {

    $renter = Renter::latest()->paginate(20);
    
    return view('dashboard', compact('renter'));
    
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('location/{id}', function ($id) {

        $car = Car::findOrFail($id);
    
        return view('cars.location' , compact('car'));
    })->name('location');

});

require __DIR__.'/auth.php';