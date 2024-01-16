

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <title>parrianage</title>

        @livewireStyles
    </head>
    <body>




            <nav class="navbar navbar-light bg-light justify-content-between">


            @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><button class="btn-primary">Dashboard</button></a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><button class="btn-primary">Log in</button></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><button class="btn-success">Register</button></a>
                        @endif
                    @endauth

            @endif

  <form class="form-inline">
  <div class="row">
    <div class="col-md-6">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </div>
    <div class="col-md-2">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </div>
</div>

  </form>

</nav>




@livewire('counter')
    </div>


    <div class="container text-center mt-5">
        <h1 class="bg-primary text-white p-3">Faire un parrainage de votre choix</h1>
    </div>

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
    <marquee behavior="scroll" direction="left">
        <h5 class="text-center text-primary">Liste des Candidats</h5>
    </marquee>
    <div class="container row">
    @foreach($liste_ca as $candidat)
        <div class="card col-md-4 mt-3 mb-3">
            <img class="card-img-top rounded-circle p-2 w-100 h-50" src="{{ asset('uploads/candidats/'.$candidat->photo)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $candidat->nom }} {{ $candidat->prenom }}</h5>
                <p class="card-text">{{ $candidat->biografie }}</p>
            </div>
            <div class="card-footer">
            <a href="{{route('candidat.show',$candidat->id)}}"><button class="btn btn-info" value="{{$candidat->id}}">Voir détails</button></a>
                @if (Route::has('login'))
                    @auth
                        @if(Illuminate\Support\Facades\Auth::user()->role=="admin")
                        <a href="{{ route('candidat.edit', $candidat->id) }}"><button class="btn btn-success">Modifier</button></a>
                        <form action="{{ route('candidat.destroy', $candidat->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Voulez-vous vraiment supprimer le candidat?')" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                        </form>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    @endforeach
</div>

<footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © tout droit reserve</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="#" target="_blank">christopher</a> Mangounbou</span>
            </div>
          </footer>



          @livewireScripts

    </body>

