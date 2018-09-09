<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = ['name', 'state_id'];

    public $timestamps = false;

    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

}