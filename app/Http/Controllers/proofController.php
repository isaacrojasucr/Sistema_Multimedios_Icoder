<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\proof;
use Illuminate\Http\Request;
use Session;

class proofController extends Controller
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
            $proof = proof::where('name', 'LIKE', "%$keyword%")
				->orWhere('enable', 'LIKE', "%$keyword%")
				->orWhere('cat_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $proof = proof::paginate($perPage);
        }

        return view('proof--controller-namespace=proof.proof.index', compact('proof'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('proof--controller-namespace=proof.proof.create');
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
        
        proof::create($requestData);

        Session::flash('flash_message', 'proof added!');

        return redirect('proof/proof');
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
        $proof = proof::findOrFail($id);

        return view('proof--controller-namespace=proof.proof.show', compact('proof'));
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
        $proof = proof::findOrFail($id);

        return view('proof--controller-namespace=proof.proof.edit', compact('proof'));
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
        
        $proof = proof::findOrFail($id);
        $proof->update($requestData);

        Session::flash('flash_message', 'proof updated!');

        return redirect('proof/proof');
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
        proof::destroy($id);

        Session::flash('flash_message', 'proof deleted!');

        return redirect('proof/proof');
    }
}
