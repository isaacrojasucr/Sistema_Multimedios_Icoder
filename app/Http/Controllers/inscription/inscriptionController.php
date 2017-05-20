<?php

namespace App\Http\Controllers\inscription;

use App\category;
use App\challenge;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\inscription;
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
            $temp = challenge::where('cat_id','=',$category->id);
            $challenges = array_add($challenges,''.$category->id.'',$temp);
        }



        return view('inscription.inscription.create', compact('categories','id', 'name', 'challenges'));
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
