<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Post;
use Carbon\Carbon;
use Auth;
use App\Activity;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project = Project::find($id);
        return view('post.index')->with('project', $project);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        $post = new Post($request->all());
        $project = Project::find($id);
        $post->project()->associate($project);
        Auth::user()->Posts()->save($post);
        $activity = new Activity();
        $activity->user()->associate(Auth::user());
        $activity->type = 'addPost';
        $activity->project()->associate($project);
        $activity->post()->associate($post);
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
        $post = Post::find($id);
        $creationDate = $post->created_at;
        $project = $post->project;
        return   view('post.show')->with('post', $post)->with('project',$project);
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
