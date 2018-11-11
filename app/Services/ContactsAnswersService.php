<?php
namespace App\Services;

use App\Models\Entity;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\MyNotification;
use App\Models\Contact;
use App\Models\ContactAnswer;

class ContactsAnswersService
{
    private $answer;
    private $contact;

    public function __construct(Contact $contact, ContactAnswer $answer)
    {
        $this->answer = $answer;
        $this->contact = $contact;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->answer->all();
    }

    /**
     * @param $answer_id
     * @return mixed
     */

    public function get($contact_id){
        return $this->answer->where('contact_id', $contact_id)->get();
    }

    /**
     * @param Array $post
     * @return mixed
     */
    public function store($post)
    {

        //dd($post);
        $validator = $this->validation($post);
        $contact_id = $post['contact_id'];
        //dd($validator->errors());
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $status = ContactAnswer::create($post);

            //dd($status);

            //$answer = $this->answer->find($answer_id);
            //$answer->status = $post['status'];
            //$answer->update();

            return response()->json($status, Response::HTTP_CREATED);
        }
    }

    /**
     * @param $post
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validation($post){

        return Validator::make($post, [
            'content' => 'required',
            'contact_id' => 'required',
            'user_id' => 'required'
        ]);

    }

}