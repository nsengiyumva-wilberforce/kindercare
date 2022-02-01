<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Assignment;
use Illuminate\Http\Request;


class AssignmentsController extends Controller
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
            $assignment = Assignment::where('assignment_title', 'LIKE', "%$keyword%")
                ->orWhere('characters', 'LIKE', "%$keyword%")
                ->orWhere('start_time', 'LIKE', "%$keyword%")
                ->orWhere('end_time', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $assignment = Assignment::latest()->paginate($perPage);
        }

        return view('admin.assignments.index', compact('assignment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.assignments.create');
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
    Assignment::create($requestData);

        return redirect('admin/assignment')->with('flash_message', 'Assignment added!');
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
       
        $assignment = Assignment::findOrFail($id);

        return view('admin.assignments.show', compact('assignment'));
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
        $assignment = Assignment::findOrFail($id);

        return view('admin.assignments.edit', compact('assignment'));
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
        
        $assignment = Assignment::findOrFail($id);
        $assignment->update($requestData);

        return redirect('admin/assignment')->with('flash_message', 'assignment updated!');
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
        Assignment::destroy($id);

        return redirect('admin/assignment')->with('flash_message', 'Assignment deleted!');
    }
}
