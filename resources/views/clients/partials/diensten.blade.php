<div id="container">       
	<h2 class="d-flex justify-content-center">Diensten</h2>
	<?php 
	    // We kennen de klant ($clients) - en zoeke daarmee de services
	//	$services = App\Service::where('user_id', $client->id)->get();
	    $services = DB::table('services')->where('user_id', $client->id)->paginate(10);
		
	//	echo " klant id = ".$client->id;
	//	dd($services->total());
	//	dd($client->id); 
	?>
	
	@if( $services->total() > 0)
	   @include('services.clientservice')
	@else
	   <h3 class="d-flex justify-content-center">Je hebt nog geen diensten besteld</h3>
	@endif
	
	<h3 class="d-flex justify-content-center">Diensten toevoegen</h3>
	<div class="row justify-content-md-center">
		<div class="col-md-auto">
			<a href="/rooms/visualindex">
				<button class="btn btn-primary">een hotelverblijf</button>
			</a>
		</div>
	
		<div class="col-md-auto">
			<a href="#">
				<button class="btn btn-primary">een dagverblijf</button>
			</a>
		</div>
	
		<div class="col-md-auto">
			<a href="#">
				<button class="btn btn-primary">een therapie</button>
			</a>
		</div>
	
	</div>
</div>
