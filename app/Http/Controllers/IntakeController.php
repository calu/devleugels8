<?php

namespace App\Http\Controllers;

use App\Intake;
use Illuminate\Http\Request;
use App\Http\Requests\IntakeRequest;

class IntakeController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth', ['except' => ['create', 'store']]);
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
        return view('intakes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IntakeRequest $request)
    {
        Intake::create($request->all());
        session()->flash('bericht', 'De gegevens werden verstuurd. We nemen binnenkort contact op');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Intake  $intake
     * @return \Illuminate\Http\Response
     */
    public function show(Intake $intake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Intake  $intake
     * @return \Illuminate\Http\Response
     */
    public function edit(Intake $intake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Intake  $intake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intake $intake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intake  $intake
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intake $intake)
    {
        //
    }
}
