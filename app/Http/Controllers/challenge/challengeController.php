<?php

namespace App\Http\Controllers\challenge;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\challenge;
use Illuminate\Http\Request;
use Session;

class challengeController extends Controller
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
            $challenge = challenge::where('name', 'LIKE', "%$keyword%")
				->orWhere('cat_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $challenge = challenge::paginate($perPage);
        }

        return view('challenge.challenge.index', compact('challenge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('challenge.challenge.create');
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
        
        challenge::create($requestData);

        Session::flash('flash_message', 'challenge added!');

        return redirect('challenge/challenge');
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
        $challenge = challenge::findOrFail($id);

        return view('challenge.challenge.show', compact('challenge'));
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
        $challenge = challenge::findOrFail($id);

        return view('challenge.challenge.edit', compact('challenge'));
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
        
        $challenge = challenge::findOrFail($id);
        $challenge->update($requestData);

        Session::flash('flash_message', 'challenge updated!');

        return redirect('challenge/challenge');
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
        challenge::destroy($id);

        Session::flash('flash_message', 'challenge deleted!');

        return redirect('challenge/challenge');
    }
}
