<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserService
{

    private $user;

    public function __construct(User $user)
    {

        $this->user = $user;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->user->all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = $this->validationUser($request);

        $roles = $request->get('role');

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password'))
            ]);

            if(!is_null($roles))
                $user->syncRoles($request->get('role'));
            else
                $user->syncRoles([2]); //user group

            return response()->json($user, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {

        $validator = $this->validationUser($request, $id);
        $roles = $request->get('role');

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if ($request->get('password')) {
                $user->password = bcrypt($request->get('password'));
            }
            $user->save();

            if(!is_null($roles))
                $user->syncRoles($roles);

//            else
//                $user->syncRoles([2]); //user group

            return response()->json(true,
                Response::HTTP_OK);
        }


    }

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validationUser($request, $id = null){

        $validationEmail = is_null($id) ? 'unique:users,email' :  'unique:users,email,' . $id;
//        dd($validationEmail);

        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|' . $validationEmail,
            'password' => 'confirmed'
        ]);

    }


}