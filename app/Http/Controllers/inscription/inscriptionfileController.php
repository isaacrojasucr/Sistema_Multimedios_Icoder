<?php

namespace App\Http\Controllers\inscription;

use App\padron;
use App\person;
use App\sport;
use App\inscriptionGrupal;
use App\inscriptionPeople;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use function MongoDB\BSON\toJSON;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Stmt\Foreach_;
use Session;
use DB;
use Excel;
use Illuminate\Config;

class inscriptionfileController extends Controller
{


    public function getImport(Request $request){

        return view('inscription.inscriptionfile.uploadFile');
    }


    public function postImport(Request $request){


        $results = Excel::load(Input::file('file'),function ($reader)
        {  $reader->all();

        })->get();

        $infor = collect();

        $id = 1;
        foreach ($results as $p){

            if (!empty($p->id_card)){

                $perPage = 1;
                $key=$p->id_card;

                $padron = padron::where('id_card', "$key")
                    ->paginate($perPage);

                foreach ($padron as $pad){
                    $p->name= $pad->name;
                    $p->lastname= $pad->lastname;
                    if($pad->gender= 1)
                    $p->gender= "M";
                    else{$p->gender= "F";}

                }

                if (!empty($p->id_card)) {


                    $p->id=$id;
                } else {
                    $p->id=$id;
                }
                $infor -> push($p);
                $id+=1;
            }
        }

        $request->session()->forget('persona');

        $request-> session()->put('persona', $infor);


        return redirect('inscriptionfile')->with("personas",  $infor );


    }







    public function listado(Request  $request)
    {


        $value = $request->session()->get('persona');


        return view('inscription.inscriptionfile.formlist')->with("personas", $value );

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $personas= null;
        $sport = sport::all();
        $request-> session()->put('sport', $sport);
        $sport = $request->session()->get('sport');
        $personas = $request->session()->get('persona');
        return view('inscription.inscriptionfile.inscriptionfile')->with("personas", $personas )->with("sport", $sport );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function editar(Request $request)
    {
        $val  = $request->session()->get('persona');
        $data=$request->all();
        $id = $data["id_usuario"];
        foreach ( $val as $p ){

            if($p->id == $id )
            {
                $p=$p;
                $p->name  =  $data["nombres"];
                $p->lastname=$data["apellido"];
                $p->gender  =  $data["genero"];
                $p->mail=$data["email"];
                $p->phone=$data["telefono"];
                $p->height  =  $data["altura"];
                $p->width=$data["peso"];
                $p->birthday  =  $data["fechanacimiento"];
                $p->town=$data["Canton"];
                $p->province=$data["provincia"];
            }
        }
        $request->session()->forget('persona');

        $request-> session()->put('persona', $val);

        if(true){

           // Session::flash('flash_message','Datos actualizados Correctamente');
            return back();

        }
        else
        {
            Session::flash('flash_message','hubo un error vuelva a intentarlo');
            return back();
        }
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Crear inscripcion y guardarla

        $inscription = new inscriptionGrupal();
        $inscription->sport =  5;
        $inscription->category =  3;
        $inscription->edition =  2017;
        $inscription->proof =  10;
        $inscription->stade = 1;
        $inscription->inscription = '';
        $inscription->save();

        $idInscription = inscriptionGrupal::max('id');

        $val  = $request->session()->get('persona');
        foreach ( $val as $p){
            $perPage = 1;

            $key= $p->id_card;
            $personT = person::where('id_card', 'LIKE', "%$key%")->paginate($perPage);;

            if (!count($personT)>0){

                $person = new person();
                $person->name = $p->name;

                $person->lastname = $p->lastname;
                $person->gender = $p->gender;
                $person->id_card = $p->id_card;
                $id_card = $p->id_card;
                if (! empty($p->middlename)) {
                    $person->middlename = $p->middlename;
                } else {
                    $person->mail = '';
                }
                if (! empty($p->mail)) {
                    $person->mail = $p->mail;
                } else {
                    $person->mail = '';
                }

                if (! empty($p->phone)) {
                    $person->phone = $p->phone;
                } else {
                    $person->phone = '';
                }

                if (! empty($p->width)) {
                    $person->width = $p->width;
                } else {
                    $person->width = '';
                }

                if (! empty($p->height)) {
                    $person->height = $p->height;
                } else {
                    $person->height = '';
                }

                if (! empty($p->blood)) {
                    $person->blood = $p->blood;
                } else {
                    $person->blood = '';
                }

                if (! empty($p->country)) {
                    $person->country = $p->country;
                } else {
                    $person->country = '';
                }

                if (! empty($p->birthday)) {
                    $person->birthday = $p->birthday;
                } else {
                    $person->birthday = '';
                }

                if (! empty($p->town)) {
                    $person->town = $p->town;
                } else {
                    $person->town = '';
                }

                if (! empty($p->town)) {
                    $person->town = $p->town;
                } else {
                    $person->town = '';
                }

                if (! empty($p->address)) {
                    $person->address = $p->address;
                } else {
                    $person->address = '';
                }

                if (! empty($p->role)) {
                    $person->role = $p->role;
                } else {
                    $person->role = '';
                }

                $person->image = '';

                $person->id_card_front = '';

                $person->id_card_back = '';

                if (! empty($p->city)) {
                    $person->city = $p->city;
                } else {
                    $person->city = '';
                }

                if (! empty($p->province)) {
                    $person->province = $p->province;
                } else {
                    $person->province = '';
                }

                $person->save();
                $id = person::max('id');
            }else{


                         $id = $p->id;


            }


            //Guardar inscriptionpersona

            $inscriptionPeople = new inscriptionPeople();
            $inscriptionPeople->id_inscription =  $idInscription;
            $inscriptionPeople->id_person =  $id;
            $inscriptionPeople->pase_cantonal =  "";
            $inscriptionPeople->save();


        }


        $request->session()->forget('persona');

        Session::flash('message','Creado correctamente');
        return redirect('inscriptionfile');
    }
    public function save(Request $request)
    {

        echo "Se guardo todito";
    }

    public function creation (Request $request,$id,$name)
    {

        $request-> session()->put('sport', $id);

        $personas= new person();


        return view('inscription.inscriptionfile.inscriptionfile')->with("personas", $personas );

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

       $val  = $request->session()->get('persona');

        foreach ( $val as $p){
            if($p->id == $id)
            {
                $usuario= $p;
            }
        }

       // print dd($usuario);
        return view('inscription.inscriptionfile.editIF',compact('usuario'));

    }

    public function delete(Request $request,$id)
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


        return view('inscription.inscriptionfile.formlist')->with("personas", $usuario );

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

        $val  = $request->session()->get('persona');
        $data=$request->all();
        $id = $data["id_usuario"];
        foreach ( $val as $p ){

            if($p->id == $id )
            {
                $p=$p;
                $p->name  =  $data["nombres"];
                $p->lastname=$data["apellido"];
                $p->gender  =  $data["genero"];
                $p->mail=$data["email"];
                $p->phone=$data["telefono"];
                $p->height  =  $data["altura"];
                $p->width=$data["peso"];
                $p->birthday  =  $data["fechanacimiento"];
                $p->town=$data["Canton"];
                $p->province=$data["provincia"];
            }
        }
        $request->session()->forget('persona');

        $request-> session()->put('persona', $val);

        if(true){

            Session::flash('flash_message','Datos actualizados Correctamente');
            return redirect('inscriptionfile');

        }
        else
        {
            Session::flash('flash_message','hubo un error vuelva a intentarlo');
            return redirect('inscriptionfile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
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




}
