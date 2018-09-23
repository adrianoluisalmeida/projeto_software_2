<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Entity;
use App\Models\Report;
use App\Models\User;
use App\Services\ReportsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    private $service;

    public function __construct(ReportsService $reportsService)
    {
        $this->service = $reportsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $entities = $user->entities;

        return view('admin/reports/index', compact('entities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', true)->get();
        $entities = Entity::where('status', true)->get();
        return view('admin/users/create', compact('categories', 'entities'));
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
            return redirect()->route('reports.index')->with('message-success', __('messages.success.store'));
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
        $report = $this->service->get($id);
        $user = User::find($report->user_id);

        return view('admin/reports/view', compact('report', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('status', true)->get();
        $entities = Entity::where('status', true)->get();
        $row = Report::find($id);

        return view('admin/reports/edit', compact('categories', 'entities', 'row'));
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
            return redirect()->route('reports.index')->with('message-success', __('messages.success.update'));
        else
            return redirect()->back()->with('message-error', __('messages.error.update'))->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);

        if(!is_null($report))
            $report->delete();

        return redirect('admin/users')->with('message-success', __('messages.success.destroy'));
    }

}
