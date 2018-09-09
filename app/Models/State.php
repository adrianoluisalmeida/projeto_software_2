<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = ['name', 'uf'];

    public $timestamps = false;

    public function cities(){
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}
