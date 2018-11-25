<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        $newSolicitations = Report::where('status', 1)->get()->count();
        $closedSolicitations = Report::where('status', 3)->get()->count();
        
        $newContactsAnswers = DB::table('contacts')->select((DB::raw("(SELECT count(contacts_answers.id) FROM contacts_answers WHERE contacts_answers.contact_id = contacts.id) AS total_answers")))->get()->where('total_answers', '>', 0)->count();
        $newContacts = DB::table('contacts')->select((DB::raw("(SELECT count(contacts_answers.id) FROM contacts_answers WHERE contacts_answers.contact_id = contacts.id) AS total_answers")))->get()->where('total_answers', '=', 0)->count();

        return view('admin/home/index', compact('user', 'newSolicitations', 'closedSolicitations', 'newContactsAnswers', 'newContacts'));
    }
}
