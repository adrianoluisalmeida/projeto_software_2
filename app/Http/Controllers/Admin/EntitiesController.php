<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Services\EntitiesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntitiesController extends Controller
{

    private $service;
    private $city;

    public function __construct(EntitiesService $entitiesService, City $city)
    {
        $this->service = $entitiesService;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entities = $this->service->all();

        return view('admin/entities/index', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = $this->city->pluck('name', 'id')->toArray();
        return view('admin/entities/create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $result = $this->service->store($request);

        if($result->getStatusCode() == 201)
            return redirect()->route('entities.index')->with('message-success', __('messages.success.store'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
