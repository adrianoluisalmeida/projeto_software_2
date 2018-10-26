<?php

namespace App\Http\Controllers\Api;

use App\Models\ReportReaction;
use App\Services\NotificationsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NotificationsController extends Controller
{
    private $service;

    public function __construct(NotificationsService $userService)
    {
        $this->service = $userService;
    }

    /**
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $result = $this->service->get($id);


        return response()->json($result);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        $user = Auth::user();
        $result = $this->service->all_user($user->id);


        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->service->store($request);
        return $response;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $response = $this->service->update($request, $id);
        return $response;
    }


}
