<?php

namespace App\Http\Controllers\inscription;

use App\person;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use function MongoDB\BSON\toJSON;
use phpDocumentor\Reflection\Types\Null_;
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

            if (!empty($p->name)){
                $p->id=$id;

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
        $personas= new person();


        return view('inscription.inscriptionfile.inscriptionfile')->with("personas", $personas );

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

    }
    public function guardar(Request $request)
    {
        $request->session()->forget('persona');
        echo "Se guardo todito";
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
      return view('inscription.inscriptionfile.editIF')->with("usuario", $usuario );

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





}
