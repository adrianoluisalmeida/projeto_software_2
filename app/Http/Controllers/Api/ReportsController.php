<?php

namespace App\Http\Controllers\Api;

use App\Models\ReportReaction;
use App\Services\ReportsService;
use App\Services\ReportsStatusService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ReportsController extends Controller
{
    private $service;
    private $reportsStatusService;

    public function __construct(ReportsService $userService, ReportsStatusService $reportsStatusService)
    {
        $this->service = $userService;
        $this->reportsStatusService = $reportsStatusService;
    }

    /**
     * @param null $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id = null)
    {
        if($id){
            $result = $this->service->get($id);
            $result->load('positives');
            $result->load('negatives');

            return response()->json($result);
        }else{

            $results = $this->service->all();
            $results->load('positives');
            $results->load('negatives');

            return response()->json($results);
        }
    }

    public function indexEntity($entityId){
        $reports = $this->service->getEntityReports($entityId);
        $reports->load('positives');
        $reports->load('negatives');
        return response()->json($reports);
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
        $response = $this->service->update($request, $id);
        return $response;
    }

    public function updateReact(Request $request, $id)
    {
        $response = $this->service->updateReaction($request, $id);
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

    public function postReact(Request $request){

        $response = $this->service->storeReaction($request);
        return $response;

    }

    public function getReactTotal($id){
        return $this->service->getReactTotal($id);
    }

    public function getReact($id){
        return $this->service->getReact($id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyReact($id)
    {
        $react = ReportReaction::find($id);

        if($react){
            $react->delete();
        }

        return response()->json(null, Response::HTTP_OK);
    }

    public function status($report_id){
        return response()->json($this->reportsStatusService->get($report_id));
    }

}
