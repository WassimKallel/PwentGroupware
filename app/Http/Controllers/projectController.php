<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Project;
use Auth;
use Carbon\Carbon;
use Image;
use App\Activity;
use Session;    
use Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $projects = Project::all();
        return view('project.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project($request->all());
        $project->user()->associate(Auth::user());
        if($request->hasFile('header')){
            $header = $request->file('header');
            $filename = time() . '.' . $header->getClientOriginalExtension();
            Image::make($header)->save(public_path('uploads/projects/header_images/'.$filename ) );
            $project->header_image_path = $filename;
        }
        $project->save();
        $activity = new Activity();
        $activity->user()->associate(Auth::user());
        $activity->type = 'addProject';
        $activity->project()->associate($project);
        $activity->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return View('project.show')->with('project', $project);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return View('project.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => 'required',
            'description' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('projects/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $project = Project::find($id);
            $project->name = $request->name;
            $project->description = $request->description;
            $project->status = $request->status;
            
            $project->save();
            // redirect
            Session::flash('message', 'Successfully updated project!');
            return Redirect::to('projects/' . $id);
        }
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
