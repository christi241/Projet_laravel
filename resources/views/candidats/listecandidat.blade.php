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


    <h1>candidats</h1>


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
        <h5 class="text-center">Liste des Candidats</h1>
    </marquee>
    <div class="contenaire row">
            @foreach($liste_ca as $candidat)

                <!-- <td>{{ $candidat->parti}}</td> -->

                <!-- <td>{{ $candidat->validate}}</td> -->
        <div class="card col-md-4 mt-3 mb-3">
    <img class="card-img-top img-circle p-2 w-100 h-50" style=""  src="{{ asset('uploads/candidats/'.$candidat->photo)}}"  stalt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ $candidat->nom}}</h5>
      <h5 class="card-title">{{ $candidat->prenom}}</h5>
      <p class="card-text"> {{ $candidat->biografie}}This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    <div class="card-footer">

<a href="{{ route('candidat.show', ['id' => $candidat->id]) }}" class="btn btn-info"><button class="btn btn-info">voir detaille</button></a>

    <a href="{{route('candidat.edit',$candidat->id)}}"><button class="btn btn-success" >modifier</button></a>
    <form action="{{route('candidat.destroy',$candidat->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Voulez-vous vraiment supprimer le candidat?')" href="{{route('candidat.destroy',$candidat->id)}}" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                                    </form>

    </div>
  </div>
            @endforeach
</div>


</body>

</html>
</x-app-layout>
