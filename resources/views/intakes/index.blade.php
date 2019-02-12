@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Overzicht van de intake aanvragen</h1>
		
	@include(
	   'intakes.partials.tabel',
	   ['param' => $openstaand, 'soort' => 'openstaand']
	)
	
	@include(
		'intakes.partials.tabel',
		['param' => $uitgevoerd, 'soort' => 'uitgevoerd'])
</div>
@endsection