<!-- resources/views/includes/_header.blade.php -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-primary p-4 pl-5">

<div class="flex">
                

                <!-- Navigation Links -->
                <div class=" space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-light text-xl" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Gestion de location') }}
                    </x-nav-link>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <x-nav-link  class="text-light text-lg" :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Accueil') }}
                    </x-nav-link>
                    <x-nav-link  class="text-light text-lg" :href="route('cars.index')" :active="request()->routeIs('cars.index')">
                        {{ __('Voitures') }}
                    </x-nav-link>
            
            @if(Auth::check())
            <x-nav-link  class="text-light text-lg" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Tableau de bord') }}
                    </x-nav-link>
                    
            @else
               <x-nav-link  class="text-light text-lg" :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Connexion') }}
                    </x-nav-link>
               <x-nav-link  class="text-light text-lg" :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Inscription') }}
                    </x-nav-link>
               
                
            @endif
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
