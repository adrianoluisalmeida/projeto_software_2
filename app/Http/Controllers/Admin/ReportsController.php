<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Entity;
use App\Models\Report;
use App\Models\ReportReaction;
use App\Models\User;
use App\Services\ReportsService;
use App\Services\ReportsStatusService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Notification;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->service->store($request);

        if ($result->getStatusCode() == 201)
            return redirect()->route('reports.index')->with('message-success', __('messages.success.store'));
        else
            return redirect()->back()->with('message-error', __('messages.error.store'))->withInput();


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->service->update($request, $id);

        if ($result->getStatusCode() == 200)
            return redirect()->route('reports.index')->with('message-success', __('messages.success.update'));
        else
            return redirect()->back()->with('message-error', __('messages.error.update'))->withInput();
    }

    public function updateStatus(Request $request)
    {
        $user = Auth::user();

//       dd($this->notification('cEnNEzuafwU:APA91bHo1ZcoJKUByHwFDdX4W3uG3btp62vJcqB1JTaG2-0JnzmmlCUAs9goZZ7-yoAxQKE3f3XZulA3KdyiVjjtK48BKv-1wREeRZqd9gBqz6C9PYqCZbFN60_3rUAur_C8jsLVdKfI'));

        $post = $request->all();

        $this->saveNotification($post);

        $post['user_id'] = $user->id;

        $result = $this->serviceUpdate->store($post);

        if ($result->getStatusCode() == 201)
            return redirect()->back()->with('message-success', __('messages.success.update'));
        else
            return redirect()->back()->with('message-error', __('messages.error.update'))->withInput();
    }

    public function getArrayNotification($post, $title, $user_id)
    {
        return [
            'title' => $title,
            'report_id' => $post['report_id'],
            'content' => $post['content'],
            'user_id' => $user_id
        ];
    }

    public function saveNotification($post)
    {
        $titleNotification = "Alteração de Relato";

        //Informações do relato principal
        $report = Report::find($post['report_id']);

        //Monta array com o usuário
        $array = $this->getArrayNotification($post, $titleNotification, $report->user_id);
        //Envia a notificação
        $this->notification($array);
        //Salva a Notificação
        Notification::create($array);

        $reactions = ReportReaction::where('report_id', $post['report_id']);

        foreach ($reactions as $reaction){
            //Monta array com o usuário
            $array = $this->getArrayNotification($post, $titleNotification, $reaction->user_id);
            //Envia a notificação
            $this->notification($array);
            //Salva a Notificação
            Notification::create($array);
        }

        return true;

    }

    public function notification($info)
    {

        $user = User::find($info['user_id']);

        if (!is_null($user->token_firebase)) {

            define('API_ACCESS_KEY', 'AAAAmZCHlIU:APA91bFVKodA_sb2KVuxZvo2pKXQ9cR8LqNR2paolWzkThYKCiRW7RsQm1YI6yO6qGk4qAifAWFAqeWuMgxvv-Fl_L3P2yIAMfL4ZTz0gTPd_GtMMRvBsUF36EFE8q-uP8pS_PSSMuXa');

            $msg = array
            (
                'body' => $info['description'],
                'title' => $info['title'],

            );
            $fields = array
            (
                'to' => $user->token_firebase,
                'notification' => $msg
            );


            $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );


            #Send Reponse To FireBase Server
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            echo $result;
            curl_close($ch);

        }

        return true;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);

        if (!is_null($report))
            $report->delete();

        return redirect('admin/users')->with('message-success', __('messages.success.destroy'));
    }

}
