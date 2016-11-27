<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    public function user()
	{
	    return $this->belongsTo(User::class);
	}
	public function project()
	{
	    return $this->belongsTo(Project::class);
	}
	protected $fillable = [
        'desciption', 'name',
    ];
}
