<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Models\Programme;
class CandidatCantroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liste_ca =  Candidat::all();
        return view('welcome',['liste_ca'=>$liste_ca]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('candidats.candidat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                  // dd($request->all()); // Valide les données du formulaire
                  $request->validate([
                    'nom' => 'required',
                    'prenom' => 'required',
                    'parti' => 'required',
                    'biografie' => 'required',
                    'validate' => 'required',
                    'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assurez-vous que le champ 'photo' est une image valide
                ],
            [
                'nom.required' => 'veuillez rensegnez le nom',
                'prenom.required'=> 'veuillez rensegnez le prenom',
                'pratie.required'=> 'veuillez rensegnez le prarti',
                'validate' =>'veuillez VALIDE le vote',
                'biografie.required'=> 'veuillez rensegnez la biographie',
                'photo.required'=> 'veuillez rensegnez la photo',
            ]);

                // // Crée un nouvel objet Candidat avec les données du formulaire
                 $candidat = new Candidat($request->all());

                // Vérifie si la photo est présente et valide
                if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                    $file = $request->file('photo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $file->move('uploads/candidats/', $filename);

                   // Enregistre le nom du fichier dans la base de données
                    $candidat->photo = $filename;
                }

                // Enregistre le candidat dans la base de données
                $candidat->save();




    // Redirige vers la liste des candidats avec un message de succès
       return  redirect()->route('candidat.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       // dd($id);
         // Recherche du programme par son ID
         $candidat = Candidat::find($id);

    return view('candidats.showCandidat', compact('candidat'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $candidat = Candidat::find($id);
        return view('candidats.updateCandidat',['candidat'=>$candidat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $candidat = Candidat::find($id);
        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->parti = $request->parti;
        $candidat->Biographie = $request->Biographie;
        $candidat->Validate = $request->Validate;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            $file->move($destination, $file->getClientOriginalName());
            // $filename = time().'.'.$extension;
            // $file->move('downloads',$filename);
            $candidat->photo=$filename;
            }else{
                return $request;
                $candidat->photo = '';
            }
        $candidat->update();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->route('candidats.index')->with('success','Candidat Modifier');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy( $id)
    {
        $candidat = Candidat::find($id);
       $candidat->delete();
       return redirect()->back();
    }
}
