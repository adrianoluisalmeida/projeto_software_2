<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ReportUpdate extends Model
{
    protected $table = 'report_update';
    protected $fillable = ['description', 'user_id', 'report_id', 'status'];

    public $timestamps = true;


    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
    }
}
