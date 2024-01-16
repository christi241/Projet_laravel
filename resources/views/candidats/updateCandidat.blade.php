<!DOCTYPE html>
<html>

<head>
    <title>Liste des apprenant</title>
</head>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- END Bootstrap -->

<!-- additional  CSS  -->
<link rel="stylesheet" href="{{url('css/style.css')}}">
</html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidats') }}
        </h2>

    </x-slot>
<body>
<div class="card">
                  <div class="card-header bg-info text-white">Editer un Candidat</div>
                  <div class="card-body">
                    <form action="{{route('candidat.update',$candidat->id)}}"  method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="" class="form-control" value="{{$candidat->nom}}">
                      </div>

                      <div class="form-group">
                        <label for="nom">Prénom</label>
                        <input type="text" name="prenom" id="" class="form-control" value="{{$candidat->prenom}}">
                      </div>

                      <div class="form-group">
                        <label for="parti">Parti</label>
                        <input type="text" name="parti" id="" class="form-control" value="{{$candidat->parti}}">
                      </div>

                      <div class="form-group">
                        <label for="Biographie">Biographie</label>
                        <textarea name="Biographie" id="" cols="5" rows="5" class="form-control">{{$candidat->Biographie}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="Validate">Validation Candidature</label>
                        <!-- <select class="form-select form-control" name="Validate" aria-label="Default select example">
                          <option disabled>Validation Candidat</option>
                          <option value="1">Approuver</option>
                          <option value="0">Refuser</option>
                        </select> -->
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="radio" name="Validate" role="switch" value="1">
                          <label class="form-check-label" for="Validate">Accepter</label>
                        </div>

                        <div class="form-check form-switch">
                          <input class="form-check-input" type="radio" name="Validate" role="switch" value="0">
                          <label class="form-check-label" for="Validate">Refuser</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="photo">Photo Candidat : </label>
                        <!-- <input type="text" name="photo" required class="form-control" value="{{$candidat->photo}}"> -->
                        <input type="file" class="form-control" accept=".jpeg, .jpg, .png"  name="photo" value="{{$candidat->photo}}">
                      </div> <br>

                      <div class="form-group">
                        <button class="btn btn-success">Modifier</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
    </body>
</x-app-layout>
