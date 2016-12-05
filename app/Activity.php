<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
	public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
    public function task()
    {
    	return $this->belongsTo(Task::class);
    }
    public function comment()
    {
    	return $this->belongsTo(Comment::class);
    }
    public function file()
    {
    	return $this->belongsTo(UploadedFile::class);
    }
}
