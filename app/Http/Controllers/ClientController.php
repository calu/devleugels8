<?php

namespace App\Http\Controllers;

use App\Client;
use App\Intake;
use App\Mutuality;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
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
        //
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
    public function store(ClientRequest $request)
    {   
       abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
                          
       $items = $request->all();            
       // We bergen nu alle data op
       // We beginnen met de User die we aanmaken, als die nog niet bestaat
       //   de validation hiervoor voor e-mail zou moeten zorgen dat het uniek is
       $naam = $items['voornaam']." ".$items['familienaam'];
       $crypted_password = bcrypt($items['password']);
       $user = array(
                 'name' => $naam,
                 'email' => $items['email'],
                 'password' => $crypted_password,
                 'admin' => 0
                );
       $thisUser = User::create($user);
             
       // We moeten straks de mutualiteit_id kennen en dus vragen we die op
       //  $mut = Mutuality::findOrFail($items['mutualiteit'] + 1);
       $contact = \Auth::User()->id;             
       $klant = array(
                 'voornaam' => $items['voornaam'],
                 'familienaam' => $items['familienaam'],
                 'straat' => $items['straat'],
                 'huisnummer' => $items['huisnummer'],
                 'bus' => $items['bus'],
                 'postcode' => $items['postcode'],
                 'gemeente' => $items['gemeente'],
                 'telefoon' => $items['telefoon'],
                 'gsm' => $items['gsm'],
                 'email' => $items['email'],
                 'wachtwoord' => $crypted_password,
                 'geboortedatum' => $items['geboortedatum'],
                 'RRN' => $items['RRN'],
                 'mutualiteit_id' => $items['mutualiteit'] + 1,
                 'user_id' => $thisUser->id,
                 'intake_id' => $items['intake_id'],              
                );
           
       // nu wegschrijven
       $client = Client::create($klant);
             
       // vermits we hier admin zijn en we verder zullen gaan
       // met de gegevens van een client moeten we deze client
       // bewaren in de session!
       session(['client_id' => $client->id]);
             
       // keren gaan we verder naar de volgende keuze
       return redirect()->action('ClientController@show', ['id' => $client->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session(['client_id' => $id]);
        $client = Client::findOrFail($id);
        $intake = \App\Intake::findOrFail( $client->intake_id);       
        return view('clients.show', compact('client','intake'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
    
    /**
     * Hier kom je van het intake overzicht. Je zal hier de
     * gegevens van de Klant verwerken.
     */
    public function createWithID($id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $intake = Intake::findOrFail($id);
        $mutualities = Mutuality::all();
        return view('clients.create', compact('intake', 'mutualities'));         
    }

}
