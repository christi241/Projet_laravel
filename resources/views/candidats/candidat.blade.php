<!DOCTYPE html>
<html>

<head>
    <title>Liste des candidats</title>
</head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- END Bootstrap -->

<!-- additional  CSS  -->
<link rel="stylesheet" href="{{url('css/style.css')}}">

</html>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ajouter un candidats') }}
        </h2>

    </x-slot>







     <!-- End Navbar
     afficher les errors facon 2
@if($errors )
    @foreach($errors->all() as $e)
    {{$e}}
    @endforeach
@endif
      <div class="container-fluid"> -->
        <!-- Utilisez la directive Blade pour générer le formulaire -->
        <div class="container">

        <form action="{{ route('candidat.store') }}" method="post"  enctype="multipart/form-data" class="col-md-5 offset-3">
           @csrf
           <fieldset>
            <legend class="text-center bg-info text-white p-2">Ajouter un Candidat</legend>

          <div class="form-group">
            <label for="nom">Nom </label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" value="{{old('nom')}}">
            <span class="text-danger"> @error ('nom')
            {{$message}}


            @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom"  value="{{old('prenom')}}">
            <span class="text-danger"> @error ('prenom')
            {{$message}}


            @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="parti">Parti :</label>
            <input type="text" class="form-control" id="parti" name="parti" placeholder="Entrez le nom du parti"  value="{{old('parti')}}">
            <span class="text-danger"> @error ('parti')
            {{$message}}


            @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="biographie">Biographie :</label>
            <textarea class="form-control" id="biographie" name="biografie" rows="3" placeholder="Entrez votre biographie"></textarea>
            <span class="text-danger"> @error ('biografie')
            {{$message}}


            @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="valide_vote">Valide Vote :</label>
            <input type="radio"   class="form-control"id="validate" name="validate" value="1">
            <span class="text-danger"> @error ('validate')
            {{$message}}


            @enderror
            </span>
          </div>
          <div class="form-group">
            <label for="photo">Photo :</label>
            <input type="file" class="form-control-file" id="photo" name="photo"accept="image/*">
           <span class="text-danger"> @error ('photo')
            {{$message}}


            @enderror
            </span>
            <br>
            <br>
          </div class="form-group">
          <button type="submit" class="btn btn-primary"  class="form-control">Soumettre</button>
          <fieldset>
        </form>
      </div>




</x-app-layout>
</body>
