<?php

namespace App\Http\Controllers\Admin;



use App\Models\RoleModel;
use App\Models\PermissionModel;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;

class PermissionsRolesController extends Controller
{
    /**
     * @var Guard
     */
    private $auth;

    /**
     * @var RoleModel
     */
    private $role;
    /**
     * @var PermissionModel
     */
    private $permission;

    public function __construct(RoleModel $role, PermissionModel $permission, Guard $auth)
    {
        $this->auth = $auth;
        $this->permission = $permission;
        $this->role = $role;

    }

    public function index(){

        $roles = $this->role->all();
        $permissions = $this->permission->all();

        return view('admin.permissions.roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request){
        $input = $request->all();
        $roles = $this->role->all();
        foreach ($roles as $role) {
            $permissions_sync = isset($input['roles'][$role->id]) ? $input['roles'][$role->id]['permissions'] : [];
            $role->perms()->sync($permissions_sync);
        }

        return redirect('admin/permissions/roles')->with('message-success', __('message.success.edit'));

    }
}
