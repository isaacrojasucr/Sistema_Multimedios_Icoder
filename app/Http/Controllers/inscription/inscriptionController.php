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
                                    c.name as prueba, cc.year as categoria, s.name as deporte, i.stade as estado,
                                    if(i.inscription = \'\' or p.mail = \'\' or p.phone=\'\' or p.height = \'\' or p.width = \'\' or p.image = \'\' or p.id_card_front = \'\' or p.id_card_back = \'\' or p.city = \'\' or p.province = \'\' or p.address = \'\',0, 1) as ins
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

        $person->save();

        $id = person::max('id');

        $inscription = new inscription();

        if (!empty($request->sport)){
            $inscription->sport = $request->sport;
        }else{
            $inscription->sport =  '';
        }

        if (!empty($request->category)){
            $inscription->category = $request->category;
        }else{
            $inscription->category =  '';
        }

        if (!empty($request->edition)){
            $inscription->edition = $request->edition;
        }else{
            $inscription->edition =  '';
        }

        if (!empty($request->proof)){
            $inscription->proof = $request->proof;
        }else{
            $inscription->proof =  '';
        }

        $inscription->stade = 1;
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
        $person = $inscription->person;
        $person = person::finOrFail($person);
        $inscription->name = $person->name;
        $inscription->middlename = $person->middlename;
        $inscription->lastname = $person->lastname;
        $inscription->gender = $person->gender;
        $inscription->id_card = $person->id_card;
        $inscription->mail = $person->mail;
        $inscription->phone = $person->phone;
        $inscription->height = $person->height;
        $inscription->width = $person->width;
        $inscription->blood = $person->blood;
        $inscription->country = $person->country;
        $inscription->birthday = $person->birthday;
        $inscription->town = $person->town;
        $inscription->address = $person->address;
        $inscription->role = $person->role;
        $inscription->city = $person->city;
        $inscription->province = $person->province;

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
        $person = $inscription->person;
        $person = person::finOrFail($person);
        
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
