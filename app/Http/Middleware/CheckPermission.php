<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Permission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $permission = Permission::where('name', $permission)->first();

        if ($request->user()->hasPermission($permission)) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
