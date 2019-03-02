<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $events = [];
        
        // hier kom je alleen als je admin bent
        // haal nu alle hotelkamer info uit hotels
        $reservaties = DB::table('hotels')->get();
        foreach ($reservaties as $reservatie){
            $kamer = $reservatie->kamernummer;
            $begindatum = $reservatie->begindatum;
            $einddatum = $reservatie->einddatum;
            $service_id = DB::table('hotel_service')->first()->service_id;
            $service = DB::table('services')->where('id', $service_id)->first();
            $status = $service->status;
            $user = DB::table('clients')->where('id', $service->user_id)->first();
            $username = $user->voornaam." ".$user->familienaam;
            
            // maak nu de kleur ( rood = aangevraagd, groen = actief, geel = voorbij)
            if ($status == 'aangevraagd') $kleur = 'red';
            if ($status == 'actief') $kleur = 'green';
            if ($status == 'voorbij') $kleur = 'yellow';
            
            $url = '/service/'.$service_id;
            // maak nu een event aan
            $events[] = Calendar::event(
              $kamer.":".$username, 
              true,
              new \DateTime($begindatum),
              new \DateTime($einddatum),
              null,
              // add color and link on event
              [
                  'color' => $kleur,
                  'url' => $url,
              ]  
            );
        }

        $calendar = Calendar::addEvents($events);
        return view('fullcalendar', compact('calendar'));
    }
}
