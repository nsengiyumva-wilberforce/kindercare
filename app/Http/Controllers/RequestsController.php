<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\RequestActivation;
use Illuminate\Http\Request;


class RequestsController extends Controller
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
            $requestactivation = RequestActivation::where('user_code', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $requestactivation = RequestActivation::latest()->paginate($perPage);
        }

        return view('admin.requests.index', compact('requestactivation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.requests.create');
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
    RequestActivation::create($requestData);

        return redirect('admin/request')->with('flash_message', 'request added!');
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
       
        $requestActivation = RequestActivation::findOrFail($id);

        return view('admin.requests.show', compact('request'));
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
        $requestActivation = RequestActivation::findOrFail($id);

        return view('admin.requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $RequestActivation->all();
        
        $requestActivation = RequestActivation::findOrFail($id);
        $request->update($requestData);

        return redirect('admin/request')->with('flash_message', 'request updated!');
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
        RequestActivation::destroy($id);

        return redirect('admin/request')->with('flash_message', 'Request deleted!');
    }
}
