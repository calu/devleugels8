<div class="container border border-secondary p-3">
	<?php /*
	Hier tonen we het kamernummer, de begin en einddatum
	*/
	$hotel = \App\Service::findOrFail($service->id)->hotels()->get()->first();
//	dd($hotel);
	?>
	
  <div class="row">
	  <div class="col col-2">kamernummer :</div>
	  <div class="col col-3">{{ $hotel->kamernummer }}</div>
  </div>

  <div class="row">
	  <div class="col col-2">begindatum :</div>
	  <div class="col col-3">{{ $hotel->begindatum }}</div>
  </div>

  <div class="row">
	  <div class="col col-2">einddatum :</div>
	  <div class="col col-3">{{ $hotel->einddatum }}</div>
  </div>
  
</div>
<p>&nbsp;</p>