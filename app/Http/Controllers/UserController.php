<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function update_avatar(Request $request)
    {
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/profiles/avatars/' . $filename ) );
            $user = Auth::user();
            $user->avatar_path = $filename;
            $user->save();
        }
        if($request->hasFile('header')){
            $header = $request->file('header');
            $filename = time() . '.' . $header->getClientOriginalExtension();
            Image::make($header)->save(public_path('uploads/profiles/header_images/' . $filename ) );
            $user = Auth::user();
            $user->header_image_path = $filename;
            $user->save();
        }
        return back();
        //return view('profile', array('user' => Auth::user()) );
    }

    public function index()
    {
        return View('profile.index')->with('user', Auth::user())->with('editableProfile', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user == Auth::user()){
            $editableProfile = true;
        }
        else{
            $editableProfile = false;
        };
        return View('profile.index')->with('user',$user)->with('editableProfile', $editableProfile);
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
