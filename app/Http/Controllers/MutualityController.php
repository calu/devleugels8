<?php

namespace App\Http\Controllers;

use App\Mutuality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MutualityController extends Controller
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
        
        $mutualities = DB::table('mutualities')->paginate(10);
        return view('mutualities.index',compact('mutualities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        return view('mutualities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $request->validate([
           'naam' => 'required | unique:mutualities,naam', 
        ]);
        
        Mutuality::create($request->all());
        session()->flash('bericht', 'De nieuwe mutualiteit werd toegevoegd');
        return redirect('mutualities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mutuality  $mutuality
     * @return \Illuminate\Http\Response
     */
    public function show(Mutuality $mutuality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mutuality  $mutuality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $mutualities = Mutuality::findOrFail($id);
        return view('mutualities.edit', compact('mutualities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mutuality  $mutuality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        $mutuality = Mutuality::findOrFail($id);
        $mutuality->update($request->all());
        
        return redirect('mutualities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mutuality  $mutuality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(\Auth::check() && \Auth::User()->isAdmin(), 403);
        
        Mutuality::destroy($id);
        return redirect('mutualities');    }
}
