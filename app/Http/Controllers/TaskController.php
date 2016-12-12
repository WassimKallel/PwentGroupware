<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Task;
use App\User;
use Auth;

class TaskController extends Controller
{
    public function index($id)
    {
    	$project = Project::find($id);
    	$projectAdmin = false;
    	if(Auth::user() == $project->user)
    	{
    		$projectAdmin = true ;
    	}
    	return View('task.index')->with('project', $project)->with('projectAdmin', $projectAdmin);
    }
    public function store($id,Request $request)
    {
    	$task = new Task($request->all());
    	$user = User::find($request->user);
    	$project = Project::find($id);
    	$task->user()->associate($user);
    	$task->project()->associate($project);
    	$task->progress = 0;
    	$task->save();
        $activity = new Activity();
        $activity->user()->associate($user);
        $activity->type = 'addComment';
        $project = $post->project;
        $activity->project()->associate($project);
        $activity->post()->associate($post);
        $activity->save();
    	return back();
    }
    public function update($id,Request $request)
    {
        $task = Task::find($id);
        $task->progress = $request->progress;
        $task->save();
        return back();
    }
}
