<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Location de Voitures</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        .jumbotron {
            background-color: #007bff;
            color: #fff;
            padding: 4rem;
            margin-bottom: 2rem;
        }
        .car-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 2rem;
        }
        .car-card {
            width: 18rem;
            margin-bottom: 1.5rem;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
    </style>
</head>
<body>

@include('includes.header')


<div class="jumbotron jumbotron-fluid text-center" style="background-image: url('/téléchargement3.jpeg'); background-size: cover; color: black; padding: 100px 0;">
<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="display-4">Bienvenue sur notre service de location de voitures</h1>
                    <p class="lead">Découvrez notre large gamme de voitures disponibles pour répondre à vos besoins de déplacement.</p>
                    <hr class="my-4">
                    <p>Que vous ayez besoin d'une voiture pour un voyage, un déplacement professionnel ou autre, nous avons ce qu'il vous faut.</p>
                    <a class="btn btn-warning btn-lg mt-3" href="{{ route('cars.index') }}" role="button">Voir les voitures disponibles</a>
                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
