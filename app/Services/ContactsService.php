<?php

namespace App\Services;


use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsService
{

    private $contact;
    
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all_user($user_id)
    {
        return $this->contact->where('user_id', $user_id)->get();
    }

    public function getTotalContacts($user_id, $status){
        $contacts = $this->contact->where('user_id', $user_id)->where('status', $status)->get();
        return count($contacts);
    }

    /**
     * @param $id
     * @return mixed
     */

    public function get($id){
        return $this->contact->find($id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = $this->validationContact($request);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            $contact = Contact::create($request->all());
            return response()->json($contact, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validationContact($request, $id);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {

            $post = $request->all();
            $reportUpdate = Contact::find($id);
            $reportUpdate->update($post);

            return response()->json(true, Response::HTTP_OK);
        }
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validationContact($request, $id = null){

        return Validator::make($request->all(), [
            'subject' => 'required|max:255',
            'content' => 'max:255'
        ]);

    }

}