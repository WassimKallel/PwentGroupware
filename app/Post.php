<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body',
    ];
    protected $dates = ['created_at','updated_at'];
    public function comments()
   	{
   		return $this->hasMany(Comment::class);
   	}
	public function project()
	{
	    return $this->belongsTo(Project::class);
	}
	public function user()
	{
	    return $this->belongsTo(User::class);
	}
}
