<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Models\PermissionModel;

class AuthorizeMiddleware
{

    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var PermissionModel
     */
    private $permission;

    public function __construct(Guard $auth, PermissionModel $permission)
    {
        $this->auth = $auth;
        $this->permission = $permission;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->auth->user();
        $permissions = $this->permission->all();

        $uri = $request->route()->uri();


        foreach ($permissions as $permission) {
//            var_dump('<pre>',$uri, $permission->name, '</pre>');

            if ($permission) {
                if (!$user->roleHasPermission($uri) && ($permission->name) == $uri) {
                    abort(403);
                }
            }
        }

        return $next($request);
    }
}
