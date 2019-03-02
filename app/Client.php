<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
      'voornaam', 'familienaam', 'straat', 'huisnummer', 'bus',
      'postcode', 'gemeente', 'telefoon', 'gsm', 'email',
      'wachtwoord', 'geboortedatum', 'RRN', 'mutualiteit_id',
      'user_id', 'service_id','intake_id'  
    ];

    public function user()
    {
        // De Klant - geen admin - bezit een entry in User en dus
        // zoeken we de User die hoort bij deze Client
  //      dd( $this->hasOne(Client::class));
        return $this->hasOne(User::class);
    }

    public function mutuality()
    {
      return $this->belongsTo('\App\Mutuality');
    }
    
    public function intake()
    {
      return $this->belongsTo(Intake::class);
    }
}
