<!-- resources/views/cars/create.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Création d'une nouvelle voiture</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
@include('includes.header')
<div class="container mt-5">
    <h2>Création d'une nouvelle voiture</h2>

    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Nom de la voiture:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="marque">Marque de la voiture:</label>
            <input type="text" class="form-control" id="marque" name="marque" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="status">Disponible:</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>

        <div class="form-group mb-4">
        <label for="image">Image de la voiture</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

</body>
</html>
