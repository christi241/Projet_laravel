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
<div class="card-body">
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
                    <form action="{{route('programmes.update',$programme->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" value="{{$sect->}}titre" name="titre" id="" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea  value="{{$sect->contenu }}" name="contenu" id="" cols="5" rows="5" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="parti">Document</label>
                        <!-- <input type="text" name="document" id="" class="form-control"> -->
                        <input value="{{$sect->document}}" type="file" name="document" id="" class="form-control" accept=".pdf, .doc, .docx">
                      </div>

                      <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="candidat_id">
                          <option selected>Choisir un Candidat</option>
                          @foreach($candidats as $cand)
                          <option value="{{$cand->id}}">{{$cand->nom}} {{$cand->prenom}}</option>
                          @endforeach
                        </select>
                      </div>
                      <br>
                      <br>
                      <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="secteur_id">
                          <option selected>Choisir un Candidat</option>

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
