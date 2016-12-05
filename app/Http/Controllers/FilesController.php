<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Project;
use App\UploadedFile;
use Auth;
use App\Activity;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id, $file_id)
    {
        $file = UploadedFile::find($file_id);
        $file_path_base = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $file_url = $file_path_base.'projects'.'/'.$file->project->id.'/uploads/'.$file->name;
        $headers = array(
               'application/x-msdownload',
             );

     return response()->download($file_url, $file->name , $headers);
    }


    public function index($id)
    {
        $project = Project::find($id);
        $files = $project->uploadedFiles();
    
        return View('file.index')->with('project', $project);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::find($id);
        return View('file.create')->with('project',$project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $project = Project::find($id);
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            if ($project->uploadedFiles->where('name', $filename)->count()) 
            {
                //Flash::error('File with such name exists');
                return redirect(action('FilesController@create',['id'=> $project->id]));
            }
        $file_path = 'projects'.'/'.$project->id.'/uploads/'.$filename;
        Storage::put($file_path,  File::get($file));
        $newFile = new UploadedFile();
        $newFile->description = $request->description;
        $newFile->user()->associate(Auth::user());
        $newFile->project()->associate($project);
        $newFile->name = $filename;
        $newFile->save();
        $activity = new Activity();
        $activity->user()->associate(Auth::user());
        $activity->type = 'uploadFile';
        $activity->project()->associate($project);
        $activity->file_id = $newFile->id;
        $activity->save();
        return redirect(action('FilesController@index',['id'=> $project->id]));
       }
       else
       {
        //Flash::error('No file.');
        return redirect(action('FilesController@create',['id'=> $project->id]));
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$file_id)
    {
        $file = UploadedFile::find($file_id);
        $project = $file->project;
        return View('file.show')->with('project',$project)->with('file', $file);
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
