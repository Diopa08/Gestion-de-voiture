<!-- resources/views/cars/index.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des individu ayant louer une voiture</title>
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
<div class="container mt-5">
    <h2>Liste des individu ayant louer une voiture</h2>

    <div class="row">
        @foreach($renter as $renter)
            <div class="col-md-4 mb-4">
            <div class="card h-100"> 
                <div class="card-body">
                        <h5 class="card-title">{{ $renter->user->name}}</h5>
                        
                            <form action="{{ route('list_cars_locate', ['id' => $renter->user->id])}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-danger">Voir les voitures loués</button>
                            </form>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  
</div>
                   
</body>
</html>
