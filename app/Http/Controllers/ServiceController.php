<?php

namespace App\Http\Controllers;

use App\Service;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Helper;

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
    public function store(ServiceRequest $request)
    {
        $helper = new Helper();
        $user = $helper->getUser();
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
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
