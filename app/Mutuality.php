<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutuality extends Model
{
    protected $fillable = ['naam'];
    
    public function clients(){
        return $this->hasMany('\App\Mutuality');
    }    
}
