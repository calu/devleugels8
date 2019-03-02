@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Overzicht van de diensten</h1>
		
	<table class="table table-hover table-bordered table-sm table-primary text-dark">
		<thead>
			<th>soort dienst</th>
			<th>periode</th>
			<th>kamer</th>
			<th>status</th>
			<th>klant</th>
		</thead>
		<tbody>
		@foreach($services as $service)
			<?php 
				$client = \App\Client::findOrFail($service->user_id);
				$hotel = \App\Service::findOrFail($service->id)->hotels()->get()->first();
				$periode = $hotel->begindatum." tot ".$hotel->einddatum;
				
	//			dd($client->voornaam." ".$client->familienaam); 
			?>
			<tr>
				<td>{{ $service->soort }}</td>
				<td>{{ $periode}}</td>
				<td>
					@if ( $service->soort == 'hotel')
						{{ $hotel->kamernummer }}
					@endif
				</td>
				<td>{{ $service->status }}</td>
				<td>{{ $client->voornaam." ".$client->familienaam }}</td>
				<td>
					<a class="btn btn-primary" href="/service/{{ $service->id }}/edit" title="Wijzig de invoer" role="button">
						edit
					</a>
						
					<!-- ER worden 2 zaken bij het wissen in rekening gebracht
					  1. Als de klant het wissen heeft aangevraagd veranderen
					     we de tekst van wis, naar "wissen aangevraagd" en
						 kleuren we het rood.
					  2. We voegen hier een modal toe, zodat we zeker zijn
					     dat de admin aandacht besteed aan deze opdracht -->
					<?php 
						$url = '/service/'.$service->id.'/destroy'; 
						$wistekst = "wissen";
						$class = "btn btn-primary";
						if ($service->tewissen)
						{
							$wistekst = "wissen aangevraagd";
							$class = "btn btn-danger";
						}
					?>
					@include('partials.modal', ['href' => 'servicemodal', 'url' => $url ])
					
					<button type="button" class="{{ $class }}" data-toggle="modal" data-target="#servicemodal">
					{{ $wistekst }}
					</button>							
				</td>
			</tr>
		@endforeach
		{{ $services->links() }}
		</tbody>
	</table>
	<p>&nbsp;</p>
	<div class="container border">
		<p>Een dienst toevoegen kan niet zomaar. Het moet gebeuren via een klant</p>
	</div>

</div>
@endsection