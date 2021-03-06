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
        $entities = $request->get('entity');

        if ($validator->fails()) {
            \Session::flash('errors', $validator->errors());
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $user = User::create([
                'name' => $request->get('name'),
                'token_firebase' => $request->get('token_firebase'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password'))
            ]);

            if(!is_null($roles))
                $user->syncRoles($request->get('role'));
            else
                $user->syncRoles([2]); //user group

            $user->entities()->sync($entities);

            return response()->json($user, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $validator = $this->validationUser($request, $user->id);
        $roles = $request->get('role');
        $entities = $request->get('entity');

        if ($validator->fails()) {
            \Session::flash('errors', $validator->errors());
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            $user = User::find($id);
            $user->name = $request->get('name');

            if(is_null($request->get('token_firebase')))
                $user->token_firebase = null;
            elseif($request->get('token_firebase'))
                $user->token_firebase = $request->get('token_firebase');

            if ($request->get('password')) {
                $user->password = Hash::make($request->get('password'));
            }
            $user->save();

            if(!is_null($roles))
                $user->syncRoles($roles);

            if(!is_null($entities))
                $user->entities()->sync($entities);

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

        $validationEmail = is_null($id) ? 'required|unique:users,email' :  '';

        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'email|max:255|' . $validationEmail,
            'password' => 'confirmed'
        ]);

    }


}