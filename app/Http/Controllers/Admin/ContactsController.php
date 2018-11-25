<?php
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Entity;
use App\Models\Contact;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Notification;
use App\Services\ContactsService;
use App\Services\ContactsAnswersService;

class ContactsController extends Controller
{
    private $service;
    private $serviceUpdate;

    public function __construct(ContactsService $contactsService, ContactsAnswersService $contactsAnswersService)
    {
        $this->service = $contactsService;
        $this->serviceUpdate = $contactsAnswersService;

        define('API_ACCESS_KEY', 'AAAAmZCHlIU:APA91bFVKodA_sb2KVuxZvo2pKXQ9cR8LqNR2paolWzkThYKCiRW7RsQm1YI6yO6qGk4qAifAWFAqeWuMgxvv-Fl_L3P2yIAMfL4ZTz0gTPd_GtMMRvBsUF36EFE8q-uP8pS_PSSMuXa');
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

        return view('admin/contacts/index', compact('entities'));
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
       /** $result = $this->service->store($request);

        if ($result->getStatusCode() == 201)
            return redirect()->route('reports.index')->with('message-success', __('messages.success.store'));
        else
            return redirect()->back()->with('message-error', __('messages.error.store'))->withInput();

        **/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->service->get($id);
        $contacts_answers = $this->serviceUpdate->get($contact->id);
        $user = User::find($contact->user_id);

        return view('admin/contacts/view', compact('contact', 'user', 'contacts_answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**$categories = Category::where('status', true)->get();
        $entities = Entity::where('status', true)->get();
        $row = Report::find($id);

        return view('admin/reports/edit', compact('categories', 'entities', 'row')); **/
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

        $validator = $this->service->validationContact($request);

        //dd($validator->fails());
     
        //dd($validator->fails());

        if ($validator->fails()) {
            \Session::flash('errors', $validator->errors());
            return redirect()->back()->with('message-error', __('messages.error.update'))->withInput();
        }else{
            $this->saveNotification($post);

            $post['user_id'] = $user->id;
    
            $result = $this->serviceUpdate->store($post);
            if ($result->getStatusCode() == 201)
                return redirect()->back()->with('message-success', __('messages.success.update'));
            else
                return redirect()->back()->with('message-error', __('messages.error.update'))->withInput();
        }
        
    }

    public function getArrayNotification($post, $title, $user_id)
    {
        return [
            'title' => $title,
            'contact_id' => (int) $post['contact_id'],
            'content' => $post['content'],
            'user_id' => $user_id
        ];
    }

    public function saveNotification($post)
    {
        $titleNotification = "Resposta de Contato";

        //Informações do relato principal
        //$report = Report::find($post['report_id']);
        
        $contact = Contact::find($post['contact_id']);

        //Monta array com o usuário
        $array = $this->getArrayNotification($post, $titleNotification, $contact->user_id);
        //Envia a notificação
        $this->notification($array);
        //Salva a Notificação
        //dd($array);
        Notification::create($array);

        return true;

    }

    public function notification($info)
    {

        $user = User::find($info['user_id']);

        if (!is_null($user->token_firebase)) {

            $msg = array
            (
                'body' => $info['content'],
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
     
    public function destroy($id)
    {
        $report = Report::find($id);

        if (!is_null($report))
            $report->delete();

        return redirect('admin/users')->with('message-success', __('messages.success.destroy'));
    }
*/
}
