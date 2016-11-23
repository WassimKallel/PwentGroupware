<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'status',
    ];
   	public function posts()
   	{
   		return $this->hasMany(Post::class);
   	}
   	public function user()
   	{
   		return $this->belongsTo(User::class);
   	}
    protected $dates = ['created_at'];
}
