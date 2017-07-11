<?php

namespace App\Http\Controllers\inscription;

use App\edition;
use App\Http\Controllers\town\townController;
use App\inscription;
use App\padron;
use App\town;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\inscriptionPeople;
use App\inscriptionGrupal;
use App\person;
use PDF;
use App\sport;
use App\state;
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

        $user = app()->make('auth');
        $user = $user->user()->town_id;



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
        $towns = town::all();
        $inscriptionGrupal= $request-> session()->get('inscriptionGrupal');

        // print dd($usuario);
        return view('inscription.inscriptiongroup.create',compact('usuario'))->with('inscription',$inscriptionGrupal)->with('towns',$towns);
    }

    public function createinscription(Request $request)
    {

        $towns = town::all();
       $id=edition::max('id');
        $edition = edition::findOrFail($id);;
        $sport = sport::all();

        $user = app()->make('auth');
        $userTown =$user->user()->town_id;
        $town= town::findorFail($userTown);
        $inscriptionGrupal = new inscriptionGrupal();
        $inscriptionGrupal->sport= 5;
        $inscriptionGrupal->category=3;
        $inscriptionGrupal->proof=10;
        $inscriptionGrupal->inscription="";
        $inscriptionGrupal->edition=$edition->id;
        $inscriptionGrupal->stade=0;
        $inscriptionGrupal->town=$userTown;
        $inscriptionGrupal->save();

        $idIns = $inscriptionGrupal::max('id');
        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$idIns)->get();
        $personas = collect();
        foreach ($inscriptionPeople as $ip){
            $id = $ip->id_person;
            $persona = person::findOrFail($id);
            $personas -> push($persona);

        }




        // print dd($usuario);
        return view('inscription.inscriptiongroup.createinscription',compact('personas'))->with('inscriptiongrupal',$inscriptionGrupal)->with('town',$town)->with('edition',$edition)->with('sport',$sport);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $inscriptionPeople= $request-> session()->get('inscriptionpeopleGrupal');

        $inscriptiongrupal=  $request-> session()->get('inscriptionGrupal');
        $perPage = 1;
            $id_card = $data["cedula"];
        $personT = person::where('id_card', 'LIKE', "%$id_card%")->paginate($perPage);;

        if (!count($personT)>0) {

            $person =  new person();
            $person->name = $data["nombres"];
            $person->middlename = "";
            $person->lastname = $data["apellido"];

            if ($data["genero"]==1)
            {
                $person->gender = 'M';
            }else{
                $person->gender = 'F';
            }

            $person->id_card = $data["cedula"];
            $id_card = $data["cedula"];

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

            if (!empty($data["ciudad"])){
                $person->country = $data["ciudad"];
            }else{
                $person->country =  '';
            }
            if (!empty($data["ciudad"])){
                $person->province = $data["ciudad"];
            }else{
                $person->province =  '';
            }
            if (!empty($data["birthday"])){
                $person->birthday = $data["birthday"];
            }else{
                $person->birthday =  '';
            }
            $user = app()->make('auth');
            $userTown =$user->user()->town_id;

            if (!empty($userTown)){
                $person->town = $userTown;
            }else{
                $person->town =  '';
            }
            if (!empty(!empty($data["pais"]))){
                $person->country = !empty($data["pais"]);
            }else{
                $person->country =  '';
            }

            $town= town::findOrFail($userTown);;
             $idstate = $town->state_id;





            $city= state::where('id','=',$idstate)->get();

            foreach ($city as $c){
                $person->province =  $c->id;
            }




            if (!empty($request->address)){
                $person->address = $request->address;
            }else{
                $person->address =  '';
            }


                $person->role =  1;


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





            $id_persona = $person->id_card;
            $person->save();
            $id_persona=person::max('id');

        }else{
            foreach ( $personT as $p) {
                $id_persona = $p->id;
            }
        }


        $inscriptionPeople = new inscriptionPeople();
        $inscriptionPeople->id_inscription =  $inscriptiongrupal->id;
        $inscriptionPeople->id_person =  $id_persona;

        if (!empty($request->file('id_pase_cantonal'))){
            $id_b = $request->file('id_pase_cantonal')->store($id_card.'');
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


        //change stade inscriptiongroup

        $stade = false;
        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$id)->get();
        $p = collect();
        foreach ($inscriptionPeople as $ip)
        {
            $id = $ip->id_person;
            $p = person::findOrFail($id);
            if(!($p->name=="" or $p->lastname=="" or $p->gender=="" or $p->id_card=="" or $p->mail=="" or $p->phone=="" or $p->height=="" or $p->width== "" or $p->blood=="" or $p->country=="" or $p->town==""  or $p->image=="" or $p->id_card_front=="" or $p->id_card_back=="" or $ip->pase_cantonal=="" ))
            {
                $stade=true;
            }else{
                $stade=false;
            }

        }
        if ($stade)
        {
            $inscription->stade=1;
            $inscription->update();
        }






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
        $idedition=edition::max('id');
        $edition = edition::findOrFail($idedition);;
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


        return view('inscription.inscriptiongroup.show')->with("inscriptiongrupal",  $inscription )->with("inscriptionPeople",  $inscriptionPeople )->with("personas",  $personas )->with("sport", $sport)->with("town", $town)->with('edition',$edition);

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

        $user = app()->make('auth');
        $userTown =$user->user()->town_id;

        if (!empty($userTown)){
            $person->town = $userTown;
        }else{
            $person->town =  '';
        }

        if (!empty($data["fechanacimiento"])){
            $person->birthday = $data["fechanacimiento"];
        }else{
            $person->birthday =  '';
        }

        $town= town::findOrFail($userTown);;

        $city= state::findOrFail($town->state_id);;

        $person->province =  $city->id;



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




        //change stade inscriptiongroup
       $inscriptiogroup =   $request-> session()->get('inscriptionGrupal');
        $stade = false;
        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$inscriptiogroup->id)->get();
        $p = collect();
        foreach ($inscriptionPeople as $ip)
        {
            $id = $ip->id_person;
            $p = person::findOrFail($id);
            if(!($p->name=="" or $p->lastname=="" or $p->gender=="" or $p->id_card=="" or $p->mail=="" or $p->phone=="" or $p->height=="" or $p->width== "" or $p->blood==""  or $p->town==""  or $p->image=="" or $p->id_card_front=="" or $p->id_card_back=="" or $ip->pase_cantonal=="" ))
            {
                $stade=true;
            }else{
                $stade=false;
            }

        }
        if ($stade)
        {
            $inscriptiogroup->stade=1;
            $inscriptiogroup->update();
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

    public function deletegroup(Request $request, $id)
    {
        $inscriptiogroup = inscriptionGrupal::where('id','=',$id)->get();
        $id="";
        foreach ($inscriptiogroup as $ig){

            $id= $ig->id;
            inscriptionGrupal::destroy($id);
        }

        $inscriptionPeople= inscriptionPeople::where('id_inscription','=',$id)->get();

        foreach ($inscriptionPeople as $ip){

            $id= $ip->id;
            inscriptionPeople::destroy($id);
        }


        return redirect('inscriptiongroup');
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

            $state = false;
            $edition = edition::max('id');


            $ins= inscriptionGrupal::where('edition','=',$edition)->get();

            foreach ($ins as $i)
            {
                $personab = person::where('id_card','=',$id)->get();

                foreach ($personab as $p) {

                    $idcard = $p->id;
                }

                $inscriptionpeople= inscriptionPeople::where('id_person','=',$idcard)->where('id_inscription','=',$i->id)-> get();

                foreach ($inscriptionpeople as $insp) {
                    $state=true;
                }
            }

            if ($state)
            {
                $persona= new person();
                $persona->name = "";
                $col= new Collection();
                $col->push($persona);
               
                return $col->toJson();
            }else  {

                $persona= new person();


                $padron= padron::where('id_card','=',$id)->get();
                $col = new Collection();
                foreach ($padron as $p){

                    $col->push($p);

                }





                return $col->toJson();
            }






    }

    public function inscribir($id)
    {
        $inscription = inscriptionGrupal::findOrFail($id);
        $inscription->stade = 2;
        $inscription->update();
        return redirect('inscriptiongroup');
    }

    public function getPDF($id)
    {

        $idedition=edition::max('id');
        $edition = edition::findOrFail($idedition);;
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



        $pdf=PDF::loadView('inscription.inscriptiongroup.pdf',['inscriptiongrupal'=>$inscription,'inscriptionPeople'=>$inscriptionPeople,'personas'=>$personas,'sport'=>$sport,'town'=>$town,'edition'=>$edition,]);

       return  $pdf->stream('inscription.pdf');


    }
}


