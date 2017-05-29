<?php

namespace App\Http\Controllers\inscription;

use App\category;
use App\challenge;
use App\edition;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\inscription;
use App\person;
use Illuminate\Http\Request;
use Session;

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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $inscription = inscription::where('sport', 'LIKE', "%$keyword%")
				->orWhere('category', 'LIKE', "%$keyword%")
				->orWhere('proof', 'LIKE', "%$keyword%")
				->orWhere('inscription', 'LIKE', "%$keyword%")
				->orWhere('pase_cantonal', 'LIKE', "%$keyword%")
				->orWhere('edition', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $inscription = inscription::paginate($perPage);
        }

        return view('inscription.inscription.index', compact('inscription'));
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
            $challenges = array_add($challenges,''.$category->id.'',$challenge);
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

        $id_card = $person->id_card;

        if (!empty($request->file('image'))){
            $person->image = $id_card;
            $id = $request->file('image')->storePubliclyAs('',$id_card);
        }

        if (!empty($request->file('id_card_front'))){
            $person->id_card_front = $id_card.'_f';
            $id_f = $request->file('id_card_front')->storePubliclyAs('',$id_card.'_f');
        }

        if (!empty($request->file('id_card_back'))){
            $person->id_card_back = $id_card.'_b';
            $id_b = $request->file('id_card_back')->storePubliclyAs('',$id_card.'_b');
        }




        $person->city = $request->city;
        $person->province = $request->province;



        $inscription = new inscription();
        $inscription->sport =  $request->sport;
        $inscription->category = $request->category;
        $inscription->edition = $request->edition;
        $inscription->state = 1;


        if (!empty($request->file('pase_cantonal'))){
            $inscription->pase_cantonal = $id_card.'pc';
            $pase_cantonal = $request->file('pase_cantonal');
        }

        Session::flash('flash_message', 'inscription added!');

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
}
