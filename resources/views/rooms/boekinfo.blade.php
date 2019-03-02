
@extends('hotels.layouts.radissonlayout')

@section('content')
<div class="super-container">

	<h1>boekinfo rooms</h1>
	<?php 
		// we moeten $rooms geven ipv $freerooms
		// We zullen dus alle info over elke kamer in $freerooms in $rooms stoppen
		foreach ($freerooms as $key => $value){
			$room = DB::table('rooms')->where('kamernummer', $key)->first();
			$rooms[] = $room;
		}
		
		// Je moet ook aangeven dat dit een boeking is en geen overzicht! 
		$choice = true;
				
		// We moeten nu ook de begin- en einddatum doorgeven. 
		// Deze staat in de Request
		$periode = [ $request->CheckIn, $request->CheckOut ];
	?>
	@include('rooms.partials.tabel')
</div>
@endsection