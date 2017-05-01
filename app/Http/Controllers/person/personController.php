<?php

namespace App\Http\Controllers\person;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\person;
use Illuminate\Http\Request;
use Session;

class personController extends Controller
{
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
            $person = person::where('name', 'LIKE', "%$keyword%")
				->orWhere('middlename', 'LIKE', "%$keyword%")
				->orWhere('lastname', 'LIKE', "%$keyword%")
				->orWhere('id_card', 'LIKE', "%$keyword%")
				->orWhere('mail', 'LIKE', "%$keyword%")
				->orWhere('phone', 'LIKE', "%$keyword%")
				->orWhere('height', 'LIKE', "%$keyword%")
				->orWhere('width', 'LIKE', "%$keyword%")
				->orWhere('blood', 'LIKE', "%$keyword%")
				->orWhere('country', 'LIKE', "%$keyword%")
				->orWhere('birthday', 'LIKE', "%$keyword%")
				->orWhere('state', 'LIKE', "%$keyword%")
				->orWhere('town', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->orWhere('role', 'LIKE', "%$keyword%")
				->orWhere('image', 'LIKE', "%$keyword%")
				->orWhere('id_card_front', 'LIKE', "%$keyword%")
				->orWhere('id_card_back', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $person = person::paginate($perPage);
        }

        return view('person.person.index', compact('person'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('person.person.create');
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
        
        person::create($requestData);

        Session::flash('flash_message', 'person added!');

        return redirect('person/person');
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
        $person = person::findOrFail($id);

        return view('person.person.show', compact('person'));
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
        $person = person::findOrFail($id);

        return view('person.person.edit', compact('person'));
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
        
        $person = person::findOrFail($id);
        $person->update($requestData);

        Session::flash('flash_message', 'person updated!');

        return redirect('person/person');
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
        person::destroy($id);

        Session::flash('flash_message', 'person deleted!');

        return redirect('person/person');
    }
}
