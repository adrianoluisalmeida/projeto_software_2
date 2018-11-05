<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Contact extends Model
{

    protected $table = 'contacts';
    protected $fillable = ['subject', 'content', 'user_id', 'entity_id'];

    public $timestamps = true;

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
