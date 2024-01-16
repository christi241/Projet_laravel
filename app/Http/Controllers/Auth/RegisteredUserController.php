<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
            $data = $request->all();
            $image = $data['photo'] ?? null;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User($request->all() );

        if(!is_null($image) ){
            $data['photo'] = $image->store('user','public');
            // $file = $request->file('photo');
            //   $extension = $file->getClientOriginalExtension();
            //     $filename = time().'.'.$extension;
            //     $file->move('storage/users/', $filename);

               // Enregistre le nom du fichier dans la base de données
                // $user->photo = $filename;

        }

        // if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        //     $file = $request->file('photo');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('storage/users/', $filename);

        //    // Enregistre le nom du fichier dans la base de données
        //     $user->photo = $filename;
        // }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $data['photo'],
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);




//         $data = $request->all();
//         $data['idCours'] = session('Cours')->id;
//         $data['dateDeDepot']  = Carbon::now()->format('Y-m-d H:i:s');


//         $attribute = [
//             'intitule' => 'l\'intitule',
//             'fichier' => 'fichier',
//         ];

//         $message = [
//             'required' => 'le champ :attribute est obligatoire'
//         ];

//         $validation = Validator::make($data,[
//             'intitule' => 'required',
//             'fichier' => 'required'
//         ],$message);

//         $validation->setAttributeNames($attribute);

//         if ($validation->fails()){
//             return redirect()->with('error',$validation->errors()->first());
//         }

//         if($request ->hasFile('fichier')){
//             $file = $request->file('fichier');
//             if(!is_null($file)){
//                 $file_path = $request->file('fichier')->store('resource/fichier','public');
//                 $data['fichier'] = '/storage/'.$file_path;
//             }
//         }
//         $saved = Ressourcepedagogique::create($data);
//         //Afficher les ressources et telechargement

//         return redirect()->route('ressource.index')->with('success','ressource televerser');

//     

    }
}

