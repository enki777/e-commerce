<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structures extends Model
{
    protected $variable = ['name'] ;
    
    public function teams()
    {
        return $this->hasMany(Teams::class);
    }
}
