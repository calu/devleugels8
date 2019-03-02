@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Overzicht van de klanten</h1>
	<div class="container">
		@if ( request()->session()->has('client_id'))
			<?php $client_id = Session::get('client_id'); ?>
			<a class="btn btn-danger" href="/clients/{{ $client_id }}/afmelden" role="button">afmelden</a>
		@endif		
	</div>
	<p>&nbsp;</p>
	<table class="table table-hover table-bordered table-sm table-primary text-dark">
		<thead>
			<th>naam klant</th>
			<th>geboortedatum</th>
			<th>contactpersoon</th>
		</thead>
		<tbody>
		@foreach($clients as $client)
		<?php  
			$intake = \App\Client::find($client->id)->intake()->get()->first() ;
//			dd($intake->voornaam." ".$intake->familienaam);
		?>
			<tr>
				<td>{{ $client->voornaam." ".$client->familienaam }}</td>
				<td>{{ $client->geboortedatum }}</td>
				<td>{{ $intake->voornaam." ".$intake->familienaam }}
				<td>
					@if ( request()->session()->has('client_id') )
					   <?php
						$id_aangemeld = Session::get('client_id');
						
						//dd($id_aangemeld) ;
						?>
						@if ($id_aangemeld == $client->id)
							<a class="btn btn-danger" href="/clients/{{ $client->id }}/afmelden" role="button">afmelden</a>
						@else
							<a class="btn btn-primary" href="/clients/{{ $client->id }}/aanmelden" role="button">aanmelden</a>
						@endif
					@else
					  <a class="btn btn-primary" href="/clients/{{ $client->id }}/aanmelden" role="button">aanmelden</a>
					@endif
					
					<a class="btn btn-primary" href="/clients/{{ $client->id }}/showAsAdmin" title="Wijzig de invoer" role="button">
						edit
					</a>
						
						&nbsp;
						<a href="/clients/{{ $client->id }}/destroy" title="verwijder deze invoer">
							wis
						</a>
				</td>
			</tr>
		@endforeach
		{{ $clients->links() }}
		</tbody>
	</table>
	
	<div class="container border">
		<p>Een klant toevoegen kan niet zomaar. Het moet gebeuren via een intake gesprek met
			de contactpersoon</p>
	</div>

</div>
@endsection