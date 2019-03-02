<?php

namespace App\Http\Controllers;

use App\Service;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $services = DB::table('services')->paginate(10);
        
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
//        dd("ServiceController@store");
        $helper = new Helper();
        $user = $helper->getUser();
        if (!$user) abort(403,'Je moet aangemeld zijn als klant');
        $user_id = $user->first()->id;
        
        $servicerij = array(
            'soort' => $request->soort,
            'user_id' => $user_id,
            'status' => 'aangevraagd'
        );
        
        $hotelrij = array(
            'kamernummer' => $request->kamernummer,
            'begindatum' => $request->start,
            'einddatum' => $request->einde
        );
        
        $hotel = Hotel::create($hotelrij);
        $service = Service::create($servicerij);
        $hotel->services()->attach($service);
        
        session()->flash('bericht','Je aanvraag werd geregistreerd. Binnenkort krijg je een bevestiging');
        
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = DB::table('services')->where( 'id' , $id )->first();
        $client = DB::table('clients')->where('id', $service->user_id)->first();
 //       $clientname = $client->voornaam." ".$client->familienaam;
 //       $status = $service->status;
 //       echo "naam = ".$clientname."<br />";
 //       echo "status = ".$status."<br />";
        $hotel = \App\Service::find($id)->hotels()->get()->first();
 //       dd($hotels);
        return view('services.show', compact('service', 'client', 'hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        //dd($request);
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $service = Service::findOrFail($id);
        
         $service->update($request->all());
                
        return redirect('service');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        // Je moet verschillende zaken verwijderen
        // a. entry in hotels met id dat je vindt in Hotel_Service
        // b. entry in hotel_service met deze id
        // c. entry in service
 
        $service = Service::find($id);
        $hotel = $service->hotels()->delete();
        $service->delete();
        
        // ga terug naar de klantenfiche
        return redirect('/clients/'.$service->user_id);                      
    }
    
    /**
     * vraagdestroy is aanroepen als een klant vraagt om een
     * dienst te schrappen. De dienst wordt hier niet geschrapt, maar
     * er wordt wel een bericht gestuurd naar de admin en het wordt
     * getoond in de admin diensten.
     */
    public function vraagdestroy($id)
    {
        $service = Service::findOrFail($id);
        $service->tewissen = true;
        $service->save();
        
        session()->flash('bericht', 'De aanvraag werd verstuurd. Binnenkort ontvang je bericht');
        
        return redirect('/clients/'.$service->user_id);
    }
    
    /**
     * roomservice wordt aangeroepen als je op "boek nu" klikt
     * in roomdetail
     */
    public function roomservice(){
        $start = Input::get('start');
        $einde = Input::get('einde');
        $kamernummer = Input::get('kamernummer');
        $soort = Input::get('soort');
        // echo $start." ".$einde." ".$kamernummer." ".$soort;
        // We moeten hier alles opsparen
        //    services krijgt soort, user_id (klant), status = aangevraagd
        //    hotels krijgt kamernummer, begindatum, einddatum
        //    hotel_service krijgt de id's van de 2 voorgaande'
        $helper = new Helper();
        $user = $helper->getUser();
        if (!$user) abort(403,'Je moet aangemeld zijn als klant');
        // dd ("ServiceController@roomservice user = ".$user);
        $user_id = $user->id;
        // dd("ServiceController@roomservice : ".$user_id); 
        
        $servicerij = array(
            'soort' => Input::get('soort'),
            'user_id' => $user_id,
            'status' => 'aangevraagd',
        );
        
        $hotelrij = array(
            'kamernummer' => Input::get('kamernummer'),
            'begindatum' => Input::get('start'),
            'einddatum' => Input::get('einde'),  
        );
        
        $hotel = Hotel::create($hotelrij);
        $service = Service::create($servicerij);
        $hotel->services()->attach($service);
        
        session()->flash('bericht','Je aanvraag werd geregistreerd. Binnenkort krijg je een bevestiging');
        
        return redirect('/');
    }
    
    /**
     * function bevestig plaats de aangevraagd naar actief
     *
     */
    public function bevestig($id)
    {
        
        // De service met de $id moet van status "aangevraagd" naar "actief" worden
        // geplaatst. En dat mag enkel door de admin gebeuren !!
         abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
         
         // Haal de service
         $service = Service::findOrFail($id);
         //dd($service->user_id);
         if ($service->status == "aangevraagd")
         {
             // plaats de status op "actief" en spaar
             $service->status = "actief";
             $service->save();
             
             // stuur een mail naar de contactpersoon
             
             // plaats een flash bericht in de klantenfiche
             session()->flash('bericht', 'De dienst is geactiveerd'); 
             
             
         } else {
             // Er is een fout gebeurd en dus moet je dit melden via een flash
             session()->flash('bericht', 'FOUT - dit is mislukt');
         }
         
         // ga naar de klantenfiche van deze klant
         // $url = '/clients/'.$service->user_id; 
         return redirect('/clients/'.$service->user_id);       
    }
    
    /*
     * de functie detail wordt aanroepen door een klant
     * en zal de service met deze id in detail weergeven
     */
    public function detail($id)
    {
        $service = \App\Service::findOrFail($id);
        
        return view('services.detail', compact('service'));
    }
}
