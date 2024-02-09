<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
@include('includes.header')
<div class="container mt-5">
        <h2 >Louer un véhicule</h2>
        <div class="form-group">
            <h2 style="text-align: center;">{{ $car->name }}</h2>
            <img src="{{ asset('storage/' . $car->image) }}" alt="car image" style="width: 100%; height: auto; object-fit: cover;" >
        </div>
        <form action="{{ route('rent.store') }}" method="post">
            @csrf

            <input hidden value="{{$car->id}}" type="number" class="form-control" id="car_id" name="car_id" required>

            <div class="form-group">
                <label for="pickup_date">Date de récupération</label>
                <input type="date" class="form-control" id="pickup_date" name="pickup_date" required>
            </div>

            <div class="form-group">
                <label for="return_date">Date de retour</label>
                <input type="date" class="form-control" id="return_date" name="return_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Louer</button>
        </form>
    </div>
    </body>
</html>