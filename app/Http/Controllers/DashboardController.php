<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Programme;


class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les informations du candidat (ajustez cela selon vos besoins)
        $candidat = Candidat::first();

        // Récupérer la liste de tous les candidats
        $candidats = Candidat::all();
        $programmes =  Programme::all();

        // Passer les données à la vue
        return view('dashboard', compact('programmes','candidats'));
    }
}
