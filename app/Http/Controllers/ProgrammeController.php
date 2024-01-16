<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Secteur;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programmes = new Programme();
        $programmes =  Programme::all();
        // $candidat = Candidat::pluck(['id','nom']);
        $candidats = Candidat::all();
        $secteur = Secteur::all();
        return view('programmes.liste', compact('programmes','candidats','secteur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programmes = new Programme();
        // $candidat = Candidat::pluck(['id','nom']);
        $candidats = Candidat::all();
        $secteur = Secteur::all();
        return view('programmes.add', compact('programmes','candidats','secteur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'document' => 'required',
            'candidat_id' => 'required',
            'secteur_id' => 'required'

        ]);


        $programme = new Programme();
        $programme->titre = $request->titre;
        $programme->contenu = $request->contenu;
        $programme->document = $request->document;
        $programme->candidat_id = $request ->candidat_id;
        $programme->secteur_id = $request ->secteur_id;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "images";
            // $filename = time().'.'.$extension;
            $file->move($destination,$filename);
            $programme->document=$filename;
            }else{
                return $request;
                $programme->document = '';
            }
        $programme->save();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->route('programmes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        $programme = new Programme();
        $programmes =  Programme::all();
        // $candidat = Candidat::pluck(['id','nom']);
        $candidats = Candidat::all();
        $secteur = Secteur::all();
        return view('programmes.liste', compact('programmes','candidats','secteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $programme = Programme::find($id);
        $programme->titre = $request->titre;
        $programme->contenu = $request->contenu;
        $programme->candidat_id = $request->candidat_id;
        $programme->secteur_id = $request ->secteur_id;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            // $filename = time().'.'.$extension;
            $file->move($destination,$filename);
            $programme->document=$filename;
            }else{
                $programme->document = '';
                return $request;

            }
        $programme->update();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->route('programmes.index')->with('success','Programme Modifier');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $programme =  Programme::find($id);
        $programme->delete();
       return redirect()->back();
    }
}
