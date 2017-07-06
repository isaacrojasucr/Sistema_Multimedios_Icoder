<?php

namespace App\Http\Controllers\inscription;

use App\inscription;
use App\padron;
use App\town;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\inscriptionPeople;
use App\inscriptionGrupal;
use App\person;
use App\sport;
use Illuminate\Http\Response;
use Session;
;

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
    public function create(Request $request)
    {
        $usuario = new person();

        $inscriptionGrupal= $request-> session()->get('inscriptionGrupal');

        // print dd($usuario);
        return view('inscription.inscriptiongroup.create',compact('usuario'))->with('inscription',$inscriptionGrupal);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inscriptionPeople= $request-> session()->get('inscriptionpeopleGrupal');

        $inscriptiongrupal=  $request-> session()->get('inscriptionGrupal');
        $perPage = 1;
            $id_card = $request->id_card;
        $personT = person::where('id_card', 'LIKE', "%$id_card%")->paginate($perPage);;

        if (!count($personT)>0) {

            $person =  new person();
            $person->name = $request-> name;
            $person->middlename = $request->middlename;
            $person->lastname = $request->lastname;
            $person->gender = $request->gender;
            $person->id_card = $request->id_card;
            $id_card = $request->id_card;

            if (!empty($request->mail)){
                $person->mail = $request->mail;
            }else{
                $person->mail =  '';
            }

            if (!empty($request->phone)){
                $person->phone = $request->phone;
            }else{
                $person->phone =  '';
            }

            if (!empty($request->width)){
                $person->width = $request->width;
            }else{
                $person->width =  '';
            }

            if (!empty($request->height)){
                $person->height = $request->height;
            }else{
                $person->height =  '';
            }

            if (!empty($request->blood)){
                $person->blood = $request->blood;
            }else{
                $person->blood =  '';
            }

            if (!empty($request->country)){
                $person->country = $request->country;
            }else{
                $person->country =  '';
            }

            if (!empty($request->birthday)){
                $person->birthday = $request->birthday;
            }else{
                $person->birthday =  '';
            }

            if (!empty($request->town)){
                $person->town = $request->town;
            }else{
                $person->town =  '';
            }

            if (!empty($request->town)){
                $person->town = $request->town;
            }else{
                $person->town =  '';
            }

            if (!empty($request->address)){
                $person->address = $request->address;
            }else{
                $person->address =  '';
            }

            if (!empty($request->role)){
                $person->role = $request->role;
            }else{
                $person->role =  '';
            }

            if (!empty($request->file('image'))){
                $person->image = $request->file('image')->store(''.$id_card);
            }else{
                $person->image =  '';
            }

            if (!empty($request->file('id_card_front'))){

                $id_f = $request->file('id_card_front')->store($id_card.'');
                $person->id_card_front = $id_f;
            }else{
                $person->id_card_front =  '';
            }

            if (!empty($request->file('id_card_back'))){
                $id_b = $request->file('id_card_back')->store($id_card.'');
                $person->id_card_back = $id_b;
            }else{
                $person->id_card_back =  '';
            }

            if (!empty($request->city)){
                $person->city = $request->city;
            }else{
                $person->city =  '';
            }

            if (!empty($request->province)){
                $person->province = $request->province;
            }else{
                $person->province =  '';
            }

            $id_persona = $person->id_card;
            $person->save();


        }
        $id_persona = $person->id_card;

        $inscriptionPeople = new inscriptionPeople();
        $inscriptionPeople->id_inscription =  $inscriptiongrupal->id;
        $inscriptionPeople->id_person =  $id_card;

        if (!empty($request->file('id_card_back'))){
            $id_b = $request->file('id_card_back')->store($id_card.'');
            $inscriptionPeople->pase_cantonal = $id_b;
        }else{
            $inscriptionPeople->pase_cantonal =  '';
        }

        $inscriptionPeople->save();








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

        Session::flash('flash_message', 'Participante actualizado correctamente!');

        return view('inscription.inscriptiongroup.show')->with("inscriptiongrupal",  $inscription )->with("inscriptionPeople",  $inscriptionPeople )->with("personas",  $personas )->with("sport", $sport)->with("town", $town);

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


        $data=$request->all();
        $person  = person::findOrFail($id);
        $person->name = $data["nombres"];

        $person->lastname = $data["apellido"];
        $person->gender = $data["genero"];
        $id_card = $person->id_card;

        if (!empty($data["email"])){
            $person->mail = $data["email"];
        }else{
            $person->mail =  '';
        }

        if (!empty($data["telefono"])){
            $person->phone = $data["telefono"];
        }else{
            $person->phone =  '';
        }

        if (!empty($data["peso"])){
            $person->width = $data["peso"];
        }else{
            $person->width =  '';
        }

        if (!empty($data["altura"])){
            $person->height = $data["altura"];
        }else{
            $person->height =  '';
        }

        if (!empty($data["blood"])){
            $person->blood = $data["blood"];
        }else{
            $person->blood =  '';
        }

        if (!empty($data["Canton"])){
            $person->town = $data["Canton"];
        }else{
            $person->town =  '';
        }

        if (!empty($data["fechanacimiento"])){
            $person->birthday = $data["fechanacimiento"];
        }else{
            $person->birthday =  '';
        }

        if (!empty($data["provincia"])){
            $person->province = $data["provincia"];
        }else{
            $person->province =  '';
        }

        if (!empty($data["pais"])){
            $person->city = $data["pais"];
        }else{
            $person->city =  '';
        }


        if (!empty($request->file('image'))){
            $person->image = $request->file('image')->store(''.$id_card);
        }else{
            $person->image =  '';
        }

        if (!empty($request->file('id_card_front'))){

            $id_f = $request->file('id_card_front')->store($id_card.'');
            $person->id_card_front = $id_f;
        }else{
            $person->id_card_front =  '';
        }

        if (!empty($request->file('id_card_back'))){
            $id_b = $request->file('id_card_back')->store($id_card.'');
            $person->id_card_back = $id_b;
        }else{
            $person->id_card_back =  '';
        }

        $id=$person->id;
        $person->update();




        $inscriptionpeople = inscriptionPeople::where('id_person','=',$id)->get();
        foreach ($inscriptionpeople as $ip){
            if (!empty($request->file('id_card_back'))){
                $id_b = $request->file('id_card_back')->store($id_card.'');
                $ip->pase_cantonal = $id_b;
            }else{
                $ip->pase_cantonal =  '';
            }

            $ip->update();
        }







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

        Session::flash('flash_message', 'Participante actualizado correctamente!');

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


        $inscriptionPeople= inscriptionPeople::where('id_person','=',$id)->get();

        foreach ($inscriptionPeople as $ip){

            $id= $ip->id;
            inscriptionPeople::destroy($id);
        }



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
        Session::flash('flash_message', 'Participante eliminado correctamente!');

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

    public function buscarcedula( $id)

    {

       $persona= new person();


        $padron= padron::where('id_card','=',$id)->get();
         $col = new Collection();
        foreach ($padron as $p){

            $col->push($p);

        }


        return $col->toJson();

    }
}


