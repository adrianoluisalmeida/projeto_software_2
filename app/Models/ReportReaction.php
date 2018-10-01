<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportReaction extends Model
{
    protected $table = 'report_reaction';
    protected $fillable = ['reaction', 'comment', 'user_id', 'report_id'];

    public $timestamps = false;


}
