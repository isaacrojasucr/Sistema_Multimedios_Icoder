<?php

namespace App\Http\Controllers\sport;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\sport;
use Illuminate\Http\Request;
use Session;

class sportController extends Controller
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
            $sport = sport::where('name', 'LIKE', "%$keyword%")
				->orWhere('enable', 'LIKE', "%$keyword%")
				->orWhere('type', 'LIKE', "%$keyword%")
				->orWhere('max_participants', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $sport = sport::paginate($perPage);
        }

        return view('sport.sport.index', compact('sport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sport.sport.create');
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
        
        sport::create($requestData);

        Session::flash('flash_message', 'sport added!');

        return redirect('sport/sport');
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
        $sport = sport::findOrFail($id);

        return view('sport.sport.show', compact('sport'));
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
        $sport = sport::findOrFail($id);

        return view('sport.sport.edit', compact('sport'));
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
        
        $sport = sport::findOrFail($id);
        $sport->update($requestData);

        Session::flash('flash_message', 'sport updated!');

        return redirect('sport/sport');
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
        sport::destroy($id);

        Session::flash('flash_message', 'sport deleted!');

        return redirect('sport/sport');
    }
}
