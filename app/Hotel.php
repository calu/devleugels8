<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'kamernummer', 'begindatum', 'einddatum'
    ];
    
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }    
    
}
