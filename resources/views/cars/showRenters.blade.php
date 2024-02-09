<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
        /* Ajoutez des styles CSS personnalisés ici si nécessaire */
        .card-img-top {
            height: 300px; /* Ajustez la hauteur selon vos besoins */
            object-fit: cover;
        }
    </style>
<body>
@include('includes.header')
<div class="mb-8">
                        <h2 class="text-2xl font-semibold mb-2">Voitures Louées par cet utilisateur</h2>
                       
                    </div>

                    
     <div class="row">
@foreach ($renter as $renter)

       
       <div class="col-md-4 mb-4">
            <div class="card h-100"> 
            <img src="{{ asset('storage/' . $renter->car->image) }}" class="card-img-top" alt="Car Image">
            <p>Nom de la voiture : {{ $renter->car->name }}</p>
        <p>Date de location de la voiture : {{ $renter->pickup_date }}</p>
        <p>Date de fin delocation de la voiture :
        @if($renter->final_return_date == NULL)
         {{ $renter->return_date }}
        @else
        {{ $renter->final_return_date }}
        @endif
    </p>
        
    <!-- Ajoutez d'autres informations sur la voiture si nécessaire -->
    @if($renter->final_return_date == NULL)
    <form action="{{ route('terminate', $renter->id) }}" method="get">
        
       <button type="submit" class="btn btn-danger ml-2 mb-2">
            
                Terminer la location
            </button>
        </form>
        @endif
    </div>
    </div>
       
@endforeach
</div>
    </body>
</html>