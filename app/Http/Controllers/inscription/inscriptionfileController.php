<?php

namespace App\Http\Controllers\inscription;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class inscriptionfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { return view('inscription.inscription.inscriptionfile');
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

    public function uploadFile(Request $request)
    {
        $archivo = $request->file('archivo');
        $nombre_original=$archivo->getClientOriginalName();
        $extension=$archivo->getClientOriginalExtension();
        $r1=Storage::disk('archivos')->put($nombre_original,  \File::get($archivo) );
        $ruta  =  storage_path('archivos') ."/". $nombre_original;

if($r1){

            Excel::selectSheetsByIndex(0)->load($ruta, function($hoja) {

                $hoja->each(function($fila) {

                        $usuario=new User();
                        $usuario->nombres= $fila->nombres;
                        echo nombres;
                        $usuario->apellidos= $fila->apellidos;
                        $usuario->email= $fila->email;
                        $usuario->ciudad= $fila->ciudad;




                });

            });


        }


    }
}
