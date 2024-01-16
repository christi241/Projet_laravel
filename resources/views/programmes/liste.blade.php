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
            {{ __('') }}
        </h2>

    </x-slot>



<body>
    <br>
    <br>
<div class="container">
<a href="{{route('programmes.create')}}">
    <button type="button" class="btn btn-primary">
        Ajouter programme des candidats
    </button>
    </a>
    <br>
    <br>
            <!-- content -->
            @foreach($programmes as $programme)
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header bg-info text-white">Liste des Programmes</div>

                    <div class="card-body">


                            <div class="mb-4">
                            <h1 class="btn btn-success"> {{$programme->secteur->nom}}</h1>
                                <h5 class="card-title">{{ $programme->titre }}</h5>
                                <p class="card-text">{{ $programme->contenu }}</p>
                                @if($programme->document)
                                    <a href="{{ asset('images/' . $programme->document) }}" class="btn btn-primary" download>Télécharger le Document</a>
                                @else
                                    <p>Aucun document disponible</p>
                                @endif
                            </div>
                            <hr>
                            <h1> {{$programme->candidat->nom}} {{$programme->candidat->prenom}}</h1>
                            <img class="mr-2" src="{{ asset('uploads/candidats/'.$programme->candidat->photo)}}" alt="{{$programme->candidat->nom}}" style="max-width: 150px; height: auto;">
                    </div>

                </div>
            </div>
            <br>
             <br>
            @endforeach
        </div>

</body>
</html>

</x-app-layout>
