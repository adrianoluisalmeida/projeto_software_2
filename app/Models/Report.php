<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = ['description', 'photo', 'address', 'lat', 'lng', 'closing_date', 'category_id', 'entity_id', 'user_id', 'status'];

    public $timestamps = true;


    public function positives()
    {
        return $this->hasMany(ReportReaction::class)->where('reaction', true);
    }

    public function negatives()
    {
        return $this->hasMany(ReportReaction::class)->where('reaction', false);
    }

}
