<?php

namespace App\Http\Controllers\inscription;

use App\category;
use App\challenge;
use App\edition;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\padron;
use Illuminate\Support\Facades\DB;
use App\inscription;
use App\person;
use Illuminate\Http\Request;
use Session;
use Exception;


class inscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $user = app()->make('auth');
        $user = $user->user()->town_id;

            $people = \DB::select('select p.id_card as cedula, concat(p.name,\' \',p.lastname) as nombre, p.gender as rama, 
                                    c.name as prueba, cc.year as categoria, s.name as deporte, i.stade as estado
                                    from inscriptions as i
                                    inner join challenges as c on c.id = i.proof
                                    inner join people as p on p.id = i.person
                                    inner join sports as s on s.id = i.sport
                                    inner join categories as cc on cc.id = i.category
                                    where p.town = ?', [$user]);

        return view('inscription.inscription.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function creation ($id,$name)
    {
        $categories = category::where('sport_id','=',$id)->get();

        $challenges = array();
        foreach ($categories as $category) {
            $temp = challenge::where('cat_id','=',$category->id)->get();

            $challenge =  array();
            foreach ($temp as $i) {
                $challenge =  array_add($challenge,$i->id . '', $i->name );
            }
            $challenges = $challenge;

        }

        $category = array();
        foreach ($categories as $cat){
            $category = array_add($category,$cat->id,'Sub.'.$cat->year );
        }
        
        $edition = edition::all();


        return view('inscription.inscription.create', compact('category','id', 'name', 'challenges', 'edition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        inscription::create($requestData);

        Session::flash('flash_message', 'inscription added!');

        return redirect('inscription/inscription');
    }


    public function save (Request $request){

        $person =  new person();
        $person->name = $request-> name;
        $person->middlename = $request->middlename;
        $person->lastname = $request->lastname;
        $person->gender = $request->gender;
        $person->id_card = $request->id_card;
        $person->mail = $request->mail;
        $person->phone = $request->phone;
        $person->height = $request->height;
        $person->width = $request->width;
        $person->blood = $request->blood;
        $person->country = $request->country;
        $person->birthday = $request->birthday;
        $person->town = $request->town;
        $person->address = $request->address;
        $person->role= $request->role;

        $id_card = $request->id_card;

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

        $person->city = $request->city;
        $person->province = $request->province;
        $person->save();

        $id = person::max('id');





        $inscription = new inscription();
        $inscription->sport =  $request->sport;
        $inscription->category = $request->category;
        $inscription->edition = $request->edition;
        $inscription->stade = 1;
        $inscription->proof = $request->proof;
        $inscription->person = $id;


        if (!empty($request->file('pase_cantonal'))){
            $inscription->pase_cantonal = $request->file('pase_cantonal')->store($id_card.'');
        }else{
            $inscription->pase_cantonal = '';
        }

        if (!empty($request->file('inscription'))){
            $inscription->inscription = $request->file('inscription')->store($id_card.'');
        }else{
            $inscription->inscription = '';
        }

        $inscription->save();




        return redirect('inscription/inscription');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $inscription = inscription::findOrFail($id);

        return view('inscription.inscription.show', compact('inscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $inscription = inscription::findOrFail($id);

        return view('inscription.inscription.edit', compact('inscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $inscription = inscription::findOrFail($id);
        $inscription->update($requestData);

        Session::flash('flash_message', 'inscription updated!');

        return redirect('inscription/inscription');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        inscription::destroy($id);

        Session::flash('flash_message', 'inscription deleted!');

        return redirect('inscription/inscription');
    }

    public function cargarPorCedula()
    {
        $persona = padron::all();

        return response()->json(
            $persona->toArray()
            );
    }
}
