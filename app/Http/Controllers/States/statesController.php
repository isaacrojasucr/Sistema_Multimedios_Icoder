<?php

namespace App\Http\Controllers\States;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\state;
use Illuminate\Http\Request;
use Session;

class statesController extends Controller
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
            $states = state::where('name', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $states = state::paginate($perPage);
        }

        return view('states.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('states.states.create');
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
        
        state::create($requestData);

        Session::flash('flash_message', 'state added!');

        return redirect('states/states');
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
        $state = state::findOrFail($id);

        return view('states.states.show', compact('state'));
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
        $state = state::findOrFail($id);

        return view('states.states.edit', compact('state'));
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
        
        $state = state::findOrFail($id);
        $state->update($requestData);

        Session::flash('flash_message', 'state updated!');

        return redirect('states/states');
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
        state::destroy($id);

        Session::flash('flash_message', 'state deleted!');

        return redirect('states/states');
    }
}
