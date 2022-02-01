<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pupil;
use Illuminate\Http\Request;


class PupilsController extends Controller
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
            $pupil = Pupil::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('user_code', 'LIKE', "%$keyword%")
                ->orWhere('phone_number', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pupil = Pupil::latest()->paginate($perPage);
        }

        return view('admin.pupils.index', compact('pupil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.pupils.create');
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
    Pupil::create($requestData);

        return redirect('admin/pupil')->with('flash_message', 'Pupil added!');
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
       
        $pupil = Pupil::findOrFail($id);

        return view('admin.pupils.show', compact('pupil'));
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
        $pupil = Pupil::findOrFail($id);

        return view('admin.pupils.edit', compact('pupil'));
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
        
        $requestData = $request->all();
        
        $pupil = Pupil::findOrFail($id);
        $pupil->update($requestData);

        return redirect('admin/pupil')->with('flash_message', 'Pupil updated!');
    }
    /**
     * Deactivate a given pupil
     */
    public function deactivatePupil(Request $request, Pupil $pupil)
    {       
        $requestData = $request->all();
        $requestData['status'] = !$pupil['status'];
        $pup = Pupil::findOrFail($pupil['id']);
       $pup->update($requestData);
        return redirect('admin/pupil')->with('flash_message', 'Pupil Deactivated!');
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
        Pupil::destroy($id);

        return redirect('admin/pupil')->with('flash_message', 'Pupil deleted!');
    }
}
