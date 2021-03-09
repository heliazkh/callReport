<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class RouteAuthorize
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
        $route = $request->route();
        $routeName = $route->getName();
        $user = Auth::user();
        if (!$user->can($this->route2permission($routeName)) && !in_array($routeName,array('dashboard'))) {
            return redirect(URL::previous());
        }
        return $next($request);
    }

    private function route2permission($routeName)
    {
        $routeNameArr = explode('.', $routeName);
        $suffix = $routeNameArr[count($routeNameArr) - 1];

        array_pop($routeNameArr);
        $permissionCode = implode('.', $routeNameArr) . '.';
        switch ($suffix) {
            case 'create':
            case 'store':
                $permissionCode .= 'create';
                break;
            case 'edit':
            case 'update':
                $permissionCode .= 'update';
                break;
            case 'destroy':
                $permissionCode .= 'delete';
                break;
            default:
                $permissionCode .= 'read';
        }

        return substr_replace($routeName, $permissionCode, $suffix);
    }
}
