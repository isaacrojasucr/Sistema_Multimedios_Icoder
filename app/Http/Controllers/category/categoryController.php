<?php

namespace App\Http\Controllers\category;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\category;
use Illuminate\Http\Request;
use Session;

class categoryController extends Controller
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
            $category = category::where('year', 'LIKE', "%$keyword%")
				->orWhere('enable', 'LIKE', "%$keyword%")
				->orWhere('branch', 'LIKE', "%$keyword%")
				->orWhere('sport_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $category = category::paginate($perPage);
        }

        return view('category.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('category.category.create');
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
        
        category::create($requestData);

        Session::flash('flash_message', 'category added!');

        return redirect('category/category');
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
        $category = category::findOrFail($id);

        return view('category.category.show', compact('category'));
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
        $category = category::findOrFail($id);

        return view('category.category.edit', compact('category'));
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
        
        $category = category::findOrFail($id);
        $category->update($requestData);

        Session::flash('flash_message', 'category updated!');

        return redirect('category/category');
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
        category::destroy($id);

        Session::flash('flash_message', 'category deleted!');

        return redirect('category/category');
    }
}
