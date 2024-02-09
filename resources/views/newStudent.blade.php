<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Formaulaire d'ajout d'un étudiant</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        
    </head>
    <body>

    <h3> Ajout d'un étudiant </h3>

    <div class="row px-2">
        <div class="col-10">
            <form action="{{ route('saveStudent') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group mb-4">
                    <label for="matricule" class="form-label">Matricule</label>
                    <input id="matricule" required class="form-control" type="text" name="matricule" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="lastname" class="form-label">Nom</label>
                    <input id="lastname" required class="form-control" type="text" name="lastname" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input id="firstname" required class="form-control" type="text" name="firstname" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="sex" class="form-label">Sexe</label>
                    <input id="sex" class="form-control" type="text" name="sex" value="">
                </div>

                <div class="form-group mb-4">
                    <label for="adress" class="form-label">Adresse</label>
                    <input id="adress" class="form-control" type="text" name="adress" value="">
                </div>

                
                <div class="form-group mb-4">
                    <label for="parentSousMenu">Choissez une université</label>
                    <select name="university" required class="form-control" id="university">
                        <option value="">--</option>
                        
                        @foreach($universities as $univ )
                            <option value="{{ $univ->id }}"> {{ $univ->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="reset" value="Annuler" class="btn btn-default">
                    &nbsp;&nbsp;
                    <input type="submit" value="Enregistrer" class="btn btn-success">
                </div>

            </form>
        </div>
    </div>

    </body>
</html>