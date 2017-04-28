<?php

namespace App\Http\Controllers\town;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\town;
use Illuminate\Http\Request;
use Session;

class townController extends Controller
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
            $town = town::where('name', 'LIKE', "%$keyword%")
				->orWhere('enable', 'LIKE', "%$keyword%")
				->orWhere('state_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $town = town::paginate($perPage);
        }

        return view('town.town.index', compact('town'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('town.town.create');
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
        
        town::create($requestData);

        Session::flash('flash_message', 'town added!');

        return redirect('town/town');
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
        $town = town::findOrFail($id);

        return view('town.town.show', compact('town'));
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
        $town = town::findOrFail($id);

        return view('town.town.edit', compact('town'));
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
        
        $town = town::findOrFail($id);
        $town->update($requestData);

        Session::flash('flash_message', 'town updated!');

        return redirect('town/town');
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
        town::destroy($id);

        Session::flash('flash_message', 'town deleted!');

        return redirect('town/town');
    }
}
