<?php

namespace App\Http\Controllers;

use App\projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = projects::all();
        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        // Validation: If not successfull then the form will be reloaded and an error-object comes back
        $request->validate(
            [
                'projectname' => 'required|min:3', // field is required and at least 3 chars long
                'description' => 'required|min:5'
            ]
        );
        $project = new projects(
            [
                'projectname' => $request->projectname,
                'description' => $request->description
            ]
        );
        $project->save();
//        return redirect('/projects');

        //adds the variable $msg_success to view of index
        return $this->index()->with(
            [
          'msg_success' => '<span style="font-weight: bold; text-transform: capitalize;">' . $project['projectname'] . '</span> hinzugefügt'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $project)
    {
        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $project)
    {
        return view('projects.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $project)
    {
        // Validation: If an error occurs, then the variabel $error is sendet to the view
        $request->validate(
            [
                'projectname' => 'required|min:3', // field is required and at least 3 chars long
                'description' => 'required|min:5'
            ]
        );

//        dd($request);

        $project->update(
            [
                'projectname' => $request->projectname,
                'description' => $request->description
            ]
        );

        //"with" adds the variable $msg_success to view of index
        return $this->index()->with(
            [
                'msg_success' => '<span style="font-weight: bold; text-transform: capitalize;">' . $request->projectname . '</span> angepasst'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}
