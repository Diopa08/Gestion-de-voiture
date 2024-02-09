<!-- resources/views/cars/index.blade.php -->

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
        },

       
    .admin-button-container {
        float: right;
    margin-right: 10px; /* Ajustez la marge droite selon vos besoins */
    margin-top: 10px; /* Ajustez la marge supérieure selon vos besoins */
    z-index: 100;
       
    }


    </style>
<body>
@include('includes.header')
<div class="container mt-5">
    <h2>Liste des voitures</h2>
    @auth
    @if(Auth::user()->is_admin)
    
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-right mb-5">
            <form action="{{ route('cars.create') }}" method="get">
                @csrf
                <button type="submit" class="btn btn-danger">Ajouter une nouvelle voiture</button>
            </form>
        </div>
    </div>
</div>

    @endif
@endauth
    <div class="row">
        @foreach($car as $car)
            <div class="col-md-4 mb-4">
            <div class="card h-100"> 
                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="Car Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">{{ $car->description }}</p>
                        <p class="card-text"><strong>Prix:</strong> {{ $car->price }} $</p>
                        <p class="card-text"><strong>Disponibilité:</strong> {{$car->status ? 'Disponible' : 'Indisponible'}}</p>
                        @if($car->status == 'Disponible')
                            <form action="{{ route('location', $car->id)}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-danger">Louer</button>
                            </form>
                        @else
                            <span class="badge badge-warning">Indisponible</span>
                        @endif
                        @auth
                    @if(Auth::user()->is_admin)
                    <div class=" mt-4 d-flex justify-content-between">
                       <form action="{{ route('cars.edit', $car) }}" method="get">
                         <button type="submit" class="btn btn-danger">Modifier</button>
                       </form>

                       <form action="{{ route('cars.destroy', $car) }}" method="post">
                          @csrf
                        @method('DELETE')
                          <button type="submit" class="btn btn-danger">Supprimer</button>
                       </form>
                   </div>
                    @endif
                    @endauth

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
                   
</body>
</html>
