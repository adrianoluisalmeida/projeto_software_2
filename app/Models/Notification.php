<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Notification extends Model
{

    protected $table = 'notifications';
    protected $fillable = ['title', 'content', 'status', 'user_id', 'report_id', 'contact_id'];

    public $timestamps = true;

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function report(){
        return $this->hasOne(Report::class, 'id', 'report_id');
    }

}
