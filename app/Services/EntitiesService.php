<?php

namespace App\Services;

use App\Models\Entity;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EntitiesService
{

    private $entity;

    public function __construct(Entity $entity)
    {
        $this->entity = $entity;
    }


    public function getEntityCity($city){

        $entities = Entity::select('entities.*')
            ->join('cities', 'entities.city_id', '=', 'cities.id')
            ->where('cities.name', '=', $city)
            ->get();

        $entities->load('city');
        $entities->load('city.state');
        return $entities;

    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        $entities = $this->entity->all();
        $entities->load('city');
        $entities->load('city.state');

        return $entities;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = $this->validation($request);

        if ($validator->fails()) {
            \Session::flash('errors', $validator->errors());
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            $entity = Entity::create($request->all());

            return response()->json($entity, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validation($request, $id);
        if ($validator->fails()) {
            \Session::flash('errors', $validator->errors());
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            Entity::find($id)
                ->update($request->all());

            return response()->json(true, Response::HTTP_OK);
        }

    }

    /**
     * @param $request
     * @param null $id
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validation($request, $id = null){

        $validationEmail = is_null($id) ? 'unique:entities,email' :  '';

        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'email|max:255|' . $validationEmail,
            'street' => 'required|max:255',
            'number' => 'required|max:255',
            'complement' => 'required|max:255',
            'city_id' => 'required',
        ]);

    }


}