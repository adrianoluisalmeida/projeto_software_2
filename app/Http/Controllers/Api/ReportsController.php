<?php

namespace App\Http\Controllers\Api;

use App\Services\ReportsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    private $service;

    public function __construct(ReportsService $userService)
    {
        $this->service = $userService;
    }

    /**
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id = null)
    {
        if($id){
            return response()->json($this->service->get($id));
        }else{
            return response()->json($this->service->all());
        }
    }

    public function indexEntity($entityId){
        return response()->json($this->service->getEntityReports($entityId));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        //dd($request->all());
        $response = $this->service->update($request, $id);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->service->remove
    }

}