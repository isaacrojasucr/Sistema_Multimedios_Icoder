<?php

namespace App\Http\Controllers\inscription;

use App\person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;

class inscriptionfileController extends Controller
{

    public function getImport(){
        return view('inscription.inscription.uploadFile');
    }

    public function postImport(){



        $datos = new array();
    Excel::load(Input::file('customer'),function ($reader){

        $reader->each(function ($sheet){
            $personemails=person::where("mail","=",$sheet->mail)->first();
            if(count( $personemails)==0) {
                person::create($sheet->toArray());
            }
        });

    });

    return back();

}

    public function postImport2(){



        Excel::load(Input::file('customer'),function ($reader){

            $reader->each(function ($sheet){
                if (empty($sheet->name)) {

                }
                else {
                    person::firstOrCreate($sheet->toArray());
                }
            });

        });

        return back();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas= person::paginate(25);


        return view('inscription.inscription.inscriptionfile')->with("personas", $personas );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function listado_usuarios()
    {




        $personas= person::paginate(25);

        return view('listados.listado_usuarios')->with("personas", $personas );






    }




}
