<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\Report;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NotificationsService
{

    private $notification;


    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all_user($user_id)
    {
        return $this->notification->where('user_id', $user_id);
    }

    /**
     * @param $id
     * @return mixed
     */

    public function get($id){
        return $this->notification->find($id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = $this->validationNotification($request);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $notification = Report::create($request->all());

            return response()->json($notification, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validationNotification($request, $id);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $post = $request->all();
            $reportUpdate = Report::find($id);
            $reportUpdate->update($post);

            return response()->json(true, Response::HTTP_OK);
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validationNotification($request, $id = null){

        return Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'max:255'
        ]);

    }

}