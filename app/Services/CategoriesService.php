<?php

namespace App\Services;

use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoriesService
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->category->all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = $this->validation($request);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            $entity = Category::create($request->all());

            return response()->json($entity, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validation($request, $id);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            Category::find($id)
                ->update($request->all());

            return response()->json(true, Response::HTTP_OK);
        }

    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validation($request){

        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

    }

}