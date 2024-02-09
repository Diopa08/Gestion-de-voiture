<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
        /* Ajoutez des styles CSS personnalisés ici si nécessaire */
        .card-img-top {
            height: 300px; /* Ajustez la hauteur selon vos besoins */
            object-fit: cover;
        }
    </style>
<x-app-layout>
    <x-slot name="header">
        <h4' class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h4'>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h5 class="text-3xl font-bold mb-4">Bienvenue sur le Tableau de bord</h5>
 @auth
    @if(Auth::user()->is_admin)
    
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-right mb-5">
            <form action="{{ route('list_users_locate') }}" method="get">
                @csrf
                <button type="submit" class="btn btn-danger">Voir les utilisateurs ayant loués une voiture</button>
            </form>
        </div>
    </div>
</div>

    @endif
@endauth
                    <!-- Liste des voitures louées -->
                    <div class="mb-8">
                        <h5 class="text-2xl font-semibold mb-2">Voitures Louées</h5>
                       
                    </div>

                    
     <div class="row">
@foreach ($renter as $renter)
@if ($renter->final_return_date == NULL && $renter->user_id == Auth::user()->id)
               <div class="col-md-4 mb-4">
            <div class="card h-100"> 
            <img src="{{ asset('storage/' . $renter->car->image) }}" class="card-img-top" alt="Car Image">
            <p>Nom de la voiture : {{ $renter->car->name }}</p>
        <p>Date de location de la voiture : {{ $renter->pickup_date }}</p>
        <p>Date de location de la voiture : {{ $renter->return_date }}</p>
        <!-- Ajoutez d'autres informations sur la voiture si nécessaire -->
        <form action="{{ route('terminate', $renter->id) }}" method="get">
        
       
            <button type="submit" class="bg-red-500 text-center hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Rendre la voiture
            </button>
        </form>
    </div>
    </div>
       @endif
@endforeach
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
