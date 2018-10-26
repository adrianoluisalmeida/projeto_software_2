<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Entity;
use App\Models\Report;
use App\Models\User;
use App\Services\ReportsService;
use App\Services\ReportsStatusService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class ReportsController extends Controller
{
    private $service;
    private $serviceUpdate;

    public function __construct(ReportsService $reportsService, ReportsStatusService $reportsStatusService)
    {
        $this->service = $reportsService;
        $this->serviceUpdate = $reportsStatusService;
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
        $reportStatus = $this->serviceUpdate->get($id);

        return view('admin/reports/view', compact('report', 'user', 'reportStatus'));
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

    public function updateStatus(Request $request){
        $user = Auth::user();

       dd($this->notification($request->description));
       

        $post = $request->all();
        $post['user_id'] = $user->id;

        $result = $this->serviceUpdate->store($post);

        if($result->getStatusCode() == 201)
            return redirect()->back()->with('message-success', __('messages.success.update'));
        else
            return redirect()->back()->with('message-error', __('messages.error.update'))->withInput();
    }

    public function notification($title)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
             'registration_ids' => ['AAAAWmh2tis:APA91bGrO9jvpujMs0I8BYyajFgS9hv31IuL4zFum3P0A8YZlKyGLGbEzoORqdJdFi-0QYCEF2moibMjQ0uSHEHszPcVF8rWltSY5c1U0qHtLDj8gaSsalbGIYyRPt8v-CMujasrQf8Q'],
             'data' => array("message" => " FCM PUSH NOTIFICATION TEST MESSAGE")
    
            );
        $headers = array(
            'Authorization:key = AAAAWmh2tis:APA91bGrO9jvpujMs0I8BYyajFgS9hv31IuL4zFum3P0A8YZlKyGLGbEzoORqdJdFi-0QYCEF2moibMjQ0uSHEHszPcVF8rWltSY5c1U0qHtLDj8gaSsalbGIYyRPt8v-CMujasrQf8Q',
            'Content-Type: application/json'
        );
       $ch = curl_init(); 
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
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
