<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleModel;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller
{

    private $service;
    private $role;

    public function __construct(RoleModel $roleModel, UserService $userService)
    {
        $this->role = $roleModel;
        $this->service = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->service->all();

        return view('admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all();
        return view('admin/users/create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->service->store($request);

        if($result->getStatusCode() == 201)
            return redirect()->route('users.index')->with('message-success', __('messages.success.store'));
        else
            return redirect()->back()->with('message-error', __('messages.error.store'))->withInput();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $row = User::find($id);
        $roles = $this->role->all();
        $userRoles = $row->roles()->pluck('id')->toArray();

        return view('admin/users/edit', compact('roles', 'row', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->service->update($request, $id);

        if($result->getStatusCode() == 200)
            return redirect()->route('users.index')->with('message-success', __('messages.success.update'));
        else
            return redirect()->back()->with('message-error', __('messages.error.update'))->withInput();
    }

    public function updateMy(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'confirmed',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if ($request->get('password')) {
            $user->password = $request->get('password');
        }
        $user->save();

//        $user->syncRoles($request->get('role'));

        return redirect('admin/users/my')->with('message-success', __('messages.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->revokePermissions();

        if(!is_null($user))
            $user->delete();

        return redirect('admin/users')->with('message-success', __('messages.success.destroy'));
    }

    public function my(){

        $row = Auth::user();
        $roles = $this->role->all();
        $userRoles = $row->roles()->pluck('id')->toArray();

        return view('admin/users/my', compact('roles', 'row', 'userRoles'));
    }
}
