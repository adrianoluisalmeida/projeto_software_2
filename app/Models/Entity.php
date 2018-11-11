<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Entity extends Model
{
    protected $table = 'entities';

    protected $fillable = ['name', 'phone', 'email', 'street', 'number', 'complement', 'city_id'];

    public $timestamps = true;

    public function city(){
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function reports(){
        return $this->hasMany(Report::class, 'entity_id', 'id');
    }

    public function contacts(){
        return $this->hasMany(Contact::class, 'entity_id', 'id');
    }
}
