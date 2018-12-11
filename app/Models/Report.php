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

    public function reactions(){
        return $this->hasMany(ReportReaction::class);
    }

    public function statusDescr(){
        switch ($this->status){
            case 1: return 'Aberta';
            case 2: return 'Em andamento';
            case 3: return 'Concluída';
        }
        return '';
    }

    public function score(){
        $pc = sizeof($this->positives);
        $nc = sizeof($this->negatives);
        return $pc - $nc;
    }

    public function positivesCount(){
        return sizeof($this->positives);
    }

    public function negativesCount(){
        return sizeof($this->negatives);
    }
}
