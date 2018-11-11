<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class ContactAnswer extends Model
{

    protected $table = 'contacts_answers';
    protected $fillable = ['subject', 'content', 'user_id', 'contact_id'];

    public $timestamps = true;

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function contact(){
        return $this->hasOne(User::class, 'id', 'contact_id');
    }

}
