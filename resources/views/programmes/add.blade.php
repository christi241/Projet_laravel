<!DOCTYPE html>
<html>

<head>
    <title>Liste des programes</title>
</head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- END Bootstrap -->

<!-- additional  CSS  -->

</html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>



<body>
    <br>


<div class="card-body">
<a href="{{route('programmes.index')}}">
    <button type="button" class="btn btn-primary">
        voir la liste des programme des candidats
    </button>
    </a>
    <br>
    <br>
              <!-- content -->
              <div class="container">
                @if(session('success'))
                <div class="alert alert-success mt-3">
                  {{session('success')}}
                </div>
                @endif
                <div class="card">
                  <div class="card-header bg-info text-white">Ajouter un Programme</div>
                  <div class="card-body">
                    <form action="{{route('programmes.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" id="" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea name="contenu" id="" cols="5" rows="5" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="parti">Document</label>
                        <!-- <input type="text" name="document" id="" class="form-control"> -->
                        <input type="file" name="document" id="" class="form-control" accept=".pdf, .doc, .docx">
                      </div>

                      <div class="form-group">
                        <select class="form-select" value=" Choisir un Candidat" aria-label="Default select example" name="candidat_id">
                          @foreach($candidats as $cand)
                          <option value="{{$cand->id}}">{{$cand->nom}} {{$cand->prenom}}</option>
                          @endforeach
                        </select>
                      </div>
                      <br>
                      <br>
                      <div class="form-group">
                        <select class="form-select" value=" Choisir un Secteur" aria-label="Default select example" name="secteur_id">
                          @foreach($secteur  as $sect )
                          <option value="{{$sect->id}}">{{$sect->nom}} </option>
                          @endforeach
                        </select>
                      </div>
                      <br><br>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

</body>
</html>

</x-app-layout>
