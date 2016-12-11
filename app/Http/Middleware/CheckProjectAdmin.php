<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Project;

class CheckProjectAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $project = Project::find($request->id);
        if($project->user != Auth::user())
        {
           return redirect('/projects/'.$project->id);
        }
        return $next($request);
    }
}
