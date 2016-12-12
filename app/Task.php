<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'details', 'name',
    ];
    public function user()
   	{
   		return $this->belongsTo(User::class);
   	}
   	public function project()
   	{
   		return $this->belongsTo(User::class);
   	}
}
