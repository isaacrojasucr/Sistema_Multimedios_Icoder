<?php

namespace App\Http\Controllers\inscription;

use App\inscription;
use App\town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\inscriptionPeople;
use App\inscriptionGrupal;
use App\person;
use App\sport;
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
    public function show(Request $request, $id)
    {
        $sport = sport::all();
        $inscription = inscriptionGrupal::findOrFail($id);
        $town = town::findOrFail($inscription->town);
        $idIns = $inscription->id;
        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$idIns)->get();
        $personas = collect();
        foreach ($inscriptionPeople as $ip){
            $id = $ip->id_person;
            $persona = person::findOrFail($id);
            $personas -> push($persona);

        }
        $request-> session()->put('inscriptionpeopleGrupal', $inscriptionPeople);
        $request-> session()->put('personaIGrupal', $personas);
        $request-> session()->put('inscriptionGrupal', $inscription);


        return view('inscription.inscriptiongroup.show')->with("inscriptiongrupal",  $inscription )->with("inscriptionPeople",  $inscriptionPeople )->with("personas",  $personas )->with("sport", $sport)->with("town", $town);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {


        $usuario = person::findOrFail($id);



        // print dd($usuario);
        return view('inscription.inscriptiongroup.edit',compact('usuario'));


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



        //Cargar retorno
        $sport = sport::all();
        $inscription=  $request-> session()->get('inscriptionGrupal');

        $town = town::findOrFail($inscription->town);
        $idIns = $inscription->id;
        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$idIns)->get();
        $personas = collect();
        foreach ($inscriptionPeople as $ip){
            $id = $ip->id_person;
            $persona = person::findOrFail($id);
            $personas -> push($persona);

        }
        $request-> session()->put('inscriptionpeopleGrupal', $inscriptionPeople);
        $request-> session()->put('personaIGrupal', $personas);
        $request-> session()->put('inscriptionGrupal', $inscription);

        return view('inscription.inscriptiongroup.show')->with("inscriptiongrupal",  $inscription )->with("inscriptionPeople",  $inscriptionPeople )->with("personas",  $personas )->with("sport", $sport)->with("town", $town);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {




        
        //Cargar retorno
        $sport = sport::all();
        $inscription=  $request-> session()->get('inscriptionGrupal');

        $town = town::findOrFail($inscription->town);
        $idIns = $inscription->id;
        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$idIns)->get();
        $personas = collect();
        foreach ($inscriptionPeople as $ip){
            $id = $ip->id_person;
            $persona = person::findOrFail($id);
            $personas -> push($persona);

        }
        $request-> session()->put('inscriptionpeopleGrupal', $inscriptionPeople);
        $request-> session()->put('personaIGrupal', $personas);
        $request-> session()->put('inscriptionGrupal', $inscription);

        return view('inscription.inscriptiongroup.show')->with("inscriptiongrupal",  $inscription )->with("inscriptionPeople",  $inscriptionPeople )->with("personas",  $personas )->with("sport", $sport)->with("town", $town);


    }
    public function town($id)
    {
        //
    }

    public function destroygroup(Request $request, $id)
    {
        $val  = $request->session()->get('persona');
        $usuario = collect();
        foreach ( $val as $p){
            if($p->id == $id && !empty($p->name))
            {


            }else {
                $usuario-> push($p);
            }

        }

        $request->session()->forget('persona');

        $request-> session()->put('persona', $usuario);


        return redirect('inscriptionfile');
    }

    public function editagroup(Request $request, $id)
    {


        $usuario = person::findOrFail($id);



        // print dd($usuario);
        return view('inscription.inscriptiongroup.edit',compact('usuario'));

    }

    public function changeSport(Request $request, $id)

    {

        $inscriptiont=  $request-> session()->get('inscriptionGrupal');
        $inscription = inscriptionGrupal::findOrFail($inscriptiont->id);
        $inscription->sport=$id;
        $inscription->update();

    }
}
