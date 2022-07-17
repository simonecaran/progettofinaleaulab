<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Announcement;
use Illuminate\Http\Request;

class CheckIfAnnouncementIsAccepted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->route('announcement')->is_accepted) {
            
            return $next($request);
        }
        return abort(404);
       
    }

}
