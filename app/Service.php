<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
      'soort', 'user_id', 'status', 'tewissen'  
    ];
    
    public function hotels()
    {
        return $this->belongsToMAny(Hotel::class)->withPivot('hotel_id');
    }  
    
    public function user()
    {
        return $this->hasOne(User::class);
    }  
    
}
