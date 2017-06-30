<?php

namespace App\Http\Controllers\inscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\inscriptionPeople;
use App\inscriptionGrupal;
use App\person;
class inscriptiongroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user = app()->make('auth');
        $userTown = $user->user()->town_id;

        $inscriptiongrupal = inscriptionGrupal::where('town','=',$userTown)->get();

        return view('inscription.inscriptiongroup.index', compact('inscriptiongrupal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscription = inscriptionGrupal::findOrFail($id);
        $idIns = $inscription->id;
        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$idIns)->get();
        $personas = collect();
        foreach ($inscriptionPeople as $ip){
            $id = $ip->id_person;
            $persona = person::findOrFail($id);
            $personas -> push($persona);

        }


        return view('inscription.inscriptiongroup.edit')->with("inscription",  $inscription )->with("inscriptionPeople",  $inscriptionPeople )->with("personas",  $personas );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function town($id)
    {
        //
    }
}
