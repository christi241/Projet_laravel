<!DOCTYPE html>
<html>

<head>
    <title>L'affichage du candidat</title>
    <!-- Lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Candidats') }}
            </h2>
        </x-slot>

        <div class="container mt-5">

        <div class="container text-center mt-5">
        <h1 class="bg-primary text-white p-3">information du candidants {{$candidat->nom}}</h1>
    </div>
    <br>
    <br>
    @if (Route::has('login'))
                    @auth
                        @if(Illuminate\Support\Facades\Auth::user()->role=="admin")

            <a href="{{ route('candidat.create') }}">
                <button type="button" class="btn btn-primary">
                    Ajouter candidats
                </button>
            </a>
            @endif
                    @endauth
                @endif
            </div>
            <br>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <marquee behavior="scroll" direction="left">
                <h1 class="text-center">List du Candidat et tous ces programes</h1>
            </marquee>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top img-circle p-2 w-100 h-50" src="{{ asset('uploads/candidats/'.$candidat->photo) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidat->nom }} {{ $candidat->prenom }}</h5>
                            <p class="card-text">{{ $candidat->biografie }}</p>
                        </div>
                        @if (Route::has('login'))
                             @auth
                                @if(Illuminate\Support\Facades\Auth::user()->role=="admin")
                        <div class="card-footer">
                            <a href="{{ route('candidat.edit', $candidat->id) }}"><button class="btn btn-success">Modifier</button></a>
                            <form action="{{ route('candidat.destroy', $candidat->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Voulez-vous vraiment supprimer le candidat?')" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                            </form>
                        </div>
                        @endif
                    @endauth
                @endif
                    </div>

                </div>
                @foreach ($candidat->programmes as $programme)
                <div class="col-md-8 ">

                    <div class="card mb-3">
                        <div class="card-body">
                                            <h5 class="card-title">
                            <span class="font-weight-bold" style="background-color: #3498db; color: white; padding: 5px;">
                                {{ $programme->secteur->nom }}
                            </span>
                        </h5>
                            <h5 class="card-txt">{{ $programme->titre }}</h5>
                            <p class="card-text">{{ $programme->contenu }}</p>
                            <p class="card-text">{{ $programme->document }}</p>
                            <a href="{{ asset('images/'.$programme->document) }}" class="btn btn-primary" download>Télécharger le Document</a>

                            <form action="{{ route('votez.index') }}" method="post">
                                @csrf
                                <input type="hidden" name="programme_id" value="{{ $programme->id }}">
                                <button onclick="return confirm('Voulez-vous voter pour le candidat?')" type="submit" class="btn btn-success mt-3">liker</button>
                            </form>
                            <br>
                            <br>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </div>









    </x-app-layout>
    <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © tout droit reserve</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="#" target="_blank">christopher</a> Mangounbou</span>
            </div>
          </footer>

    <!-- Lien vers Bootstrap JS (doit être inclus après Bootstrap CSS) -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
