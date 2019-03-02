@extends('hotels.layouts.radissonlayout')

@section('content')
<div class="super-container">
	<!-- de onderstaande variabele betekent dat er nog niet gevraagd 
	     is om te bestellen, maar gewoon een overzicht -->
	<?php $choice = false; ?>
	@include('hotels.partials.banner')
	@include('rooms.partials.warning')
	@if (!auth()->guest())
		@include('rooms.partials.beschikbaarheid')
	@endif
	@include('rooms.partials.tabel')
	
</div>
@endsection