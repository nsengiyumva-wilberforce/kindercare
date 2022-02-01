<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Score;
use Illuminate\Http\Request;


class ScoreController extends Controller
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
            $score = Score::where('User Code', 'LIKE', "%$keyword%")
                ->orWhere('assignment_id', 'LIKE', "%$keyword%")
                ->orWhere('score', 'LIKE', "%$keyword%")
                ->orWhere('time_taken', 'LIKE', "%$keyword%")
                ->orWhere('comments', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $score = Score::latest()->paginate($perPage);
        }

        return view('admin.scores.index', compact('score'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.scores.create');
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
    Score::create($requestData);

        return redirect('admin/score')->with('flash_message', 'Score added!');
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
       
        $score = Score::findOrFail($id);

        return view('admin.scores.show', compact('score'));
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
        $score = Score::findOrFail($id);

        return view('admin.scores.edit', compact('score'));
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
        
        $score = Score::findOrFail($id);
        $score->update($requestData);

        return redirect('admin/score')->with('flash_message', 'score updated!');
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
        Score::destroy($id);

        return redirect('admin/score')->with('flash_message', 'Score deleted!');
    }
}
