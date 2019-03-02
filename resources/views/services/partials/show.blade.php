<div class="container border border-secondary p-3">
	<div class="row">
		<div class="col col-2">service id :</div>
		<div class="col col-2">{{ $service->id }}</div>
	</div>
	
	<div class="row">
		<div class="col col-2">soort :</div>
		<div class="col col-2">{{ $service->soort }}</div>
	</div>
	
	<?php
		$klant = \App\Client::findOrFail($service->user_id);
		
	?>
	<div class="row">
		<div class="col col-2">voor klant :</div>
		<div class="col col-2">{{ $klant->voornaam." ".$klant->familienaam }}</div>
	</div>

	<div class="row">
		<div class="col col-2">status :</div>
		<div class="col col-2">{{ $service->status }}</div>
	</div>

	<div class="row">
		<div class="col col-2">te wissen :</div>
		<div class="col col-2">
			@if ($service->tewissen)
				Ja
			@else
				Neen
			@endif
		</div>
	</div>
</div>