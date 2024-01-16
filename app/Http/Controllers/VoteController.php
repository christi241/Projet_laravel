<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function votez1(Request $request)
    {
            $electeur = Auth::user();
            $vote = DB::table('votes')->where([
                ['user_id', '=', $electeur->id],
                ['programme_id', '=',$request->progamme_id ],
            ])->get();


            if(!empty($vote)){
                return redirect()->back()->with("error","vous ne pouvais plus votez");
            }else{
                $vote = new Vote();
                $vote->user_id= $electeur->id;
                $vote->programme_id= $request->programme_id;
                $vote->avis=1;
                $vote->save();
                return redirect()->back()->with("success","vous avez bien votez");
            }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }

}
