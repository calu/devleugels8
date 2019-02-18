<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use Illuminate\Support\Facades\DB;
use App\Helper;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => 'visualindex']);
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $rooms = DB::table('rooms')->paginate(10);
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

        $originelenaam = $request->foto->getClientOriginalName();
        $puntpos = strchr($originelenaam,'.');
        $bestandnaam = "kamer".$request->kamernummer.$puntpos;
        $request->file('foto')->storeAs('public/kamerfoto/', $bestandnaam);
                
        $room = Room::create($request->all());
        $room_id = $room->id;

        DB::table('rooms')
            -> where('id', $room_id)
            -> update(['foto' => $bestandnaam]);

        session()->flash('bericht', 'De gegevens werden verstuurd. We nemen binnenkort contact op');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $rooms = Room::findOrFail($id);
        return view('rooms.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);

         $room = Room::findOrFail($id);
         $room->update($request->all());

       if (isset($request->foto)){
        $originelenaam = $request->foto->getClientOriginalName();
        $puntpos = strchr($originelenaam,'.');
        $bestandnaam = "kamer".$request->kamernummer.$puntpos;
        $request->file('foto')->storeAs('public/kamerfoto/', $bestandnaam);

        DB::table('rooms')
            -> where('id', $id)
            -> update(['foto' => $bestandnaam]);
       }
         
         return redirect()->action('RoomController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        Room::destroy($id);
        return redirect('rooms'); 
    }
    
    /**
     * de visual index biedt dezelfde informatie als index,
     * maar ditmaal in een zeer visuele voorstelling
     */
    public function visualindex()
    {
        $rooms = DB::table('rooms')->paginate(10);
        return view('rooms.visualindex', compact('rooms'));
    }
    
    /**
     * In de functie boekinfo zullen we berekenen welke
     * kamers er vrij zijn op de opgegeven data, maar
     * ook dan kijken welke kamers voor een bepaald type klant
     * kan gekozen worden
     */
     
     public function boekinfo(Request $request)
     {
         $helper = new Helper();
         $freerooms = $helper->calcFreeRooms($request);

         // Bekijk hier of de resterende kamers voor deze
         // klant voldoen
         
         return view('rooms.boekinfo', compact('freerooms','request'));
         
     }
     
}
