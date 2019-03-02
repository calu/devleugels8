@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Detail van een dienst</h1>

	<div class="container">
		<div class="row">
			<div class="col-1">
				<div class="text-left text-secondary">Klant : </div>
			</div>
			<div class="col-3">
				<div class="text-left text-secondary">
					{{ $client->voornaam." ".$client->familienaam }}
				</div>
			</div>
		</div>	
		<div class="border">
			<div class="row">
				<div class="col-1">
					soort : 
				</div>
				<div class="col">
					{{ $service->soort }}
				</div>
			</div>
			<div class="row">
				<div class="col-2">kamernummer :</div>
				<div class="col">{{ $hotel->kamernummer }}</div>
			</div>
			<div class="row">
				<div class="col-2">status :</div>
				<div class="col">{{ $service->status }}</div>
			</div>
			<div class="row">
				<div class="col-2">te wissen :</div>
				<div class="col">
					@if ($service->tewissen)
						ja
					@else
						neen
					@endif
				</div>
			</div>
		</div>
	</div>
-->
</div>
@endsection
