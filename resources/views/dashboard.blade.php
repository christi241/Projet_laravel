<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100%;">
            <div class="col-md-6 text-center">
                <h1 class="text-white mb-4">Élection Présidentielle Sénégal</h1>
                <div class="mb-4">
                    <!-- Bouton pour voir les candidats -->
                    <a href="{{ route('candidat.store') }}" class="btn btn-primary btn-lg mr-2">Voir les Candidats</a>
                    

                </div>
            </div>
        </div>
    </div>



    <div class="row">
    <!--browser stats-->
    <div class="card">
    @foreach($programmes as $programme)
        <div class="card-body">
        <h1 style="background-color: #3498db; color: white; padding: 10px; margin: 10px 0;">
    {{$programme->secteur->nom}}
</h1>


            <div class="row py-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between pb-3 border-bottom">
                        <div>
                            <img class="mr-2" src="{{ asset('uploads/candidats/'.$programme->candidat->photo)}}" alt="{{$programme->candidat->nom}}" style="max-width: 150px; height: auto;">
                            <span class="font-weight-bold">{{$programme->candidat->nom}} </span>
                            <span class="">{{$programme->candidat->prenom}} </span>
                        </div>
                        <p class="mb-0">{{$programme->candidat->biografie}} </p>
                    </div>

                    <p>{{$programme->titre}}</p>
                    <p>{{$programme->contenu}}</p>

                    <div class="d-flex justify-content-between">
                        <a href="{{ asset('images/' . $programme->document) }}" class="btn btn-primary" download>Télécharger le Document</a>
                        <a href="{{route('candidat.show',$programme->candidat->id)}}" value="{{$programme->candidat->id}}" class="btn btn-info">Voir détails</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>




                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © tout droit reserve</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="#" target="_blank">christopher</a> Mangounbou</span>
            </div>
          </footer>
        </div>

</x-app-layout>
