<?php

namespace App\Http\Controllers\Project;

use App\Http\Requests\ProjectFormRequest;
use App\Project;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($teamId)
    {
        $collaborators = Team::all()->except($teamId);
        return view('dashboard.project.create', compact('collaborators'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($teamId, ProjectFormRequest $request)
    {
        $teamOwner = Team::whereId($teamId)->firstOrFail();
        $project = new Project(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ));
        $project->owner()->associate($teamOwner);
        $project->save();

        //$project->owner()->associate($teamOwner);
        $project->collaborators()->sync($request->get('collaborators'));

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($teamId, $projectId)
    {
        $project = Project::whereId($projectId)->firstOrFail();

        return view('dashboard.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
