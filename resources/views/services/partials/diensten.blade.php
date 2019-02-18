	<?php 
		$diensten = DB::table('services')
	   ->where([['user_id', $client->id],['status', $soort]])->paginate(10);	   
	?>
	
	@if( $diensten->count() <= 0)
		<p class="d-flex justify-content-center">geen diensten</p>
	@else
	<table class="table table-hover table-bordered table-sm table-primary text-dark">
		<thead>
			<th>soort</th>
			<th>klant</th>
			<th>van</th>
			<th>tot</th>
			<th></th>
		</thead>
		<tbody>
		@foreach($diensten as $dienst)
			<?php
				$user = DB::table('clients')->where( 'id', $dienst->user_id)->get()->first();
				$naam = $user->voornaam." ".$user->familienaam;
				
				if ($dienst->soort == 'hotel'){
					// zoek de hotels die passen bij deze dienst
					$hotel_id = DB::table('hotel_service')->where('service_id', $dienst->id)->get()->first()->hotel_id;
					$hotel = DB::table('hotels')->where('id', $hotel_id)->get()->first();
//					dd($hotel->begindatum);
				}
			?>
			<tr>
				<td>{{ $dienst->soort }}</td>
				<td>{{ $naam }}</td>
				<td>{{ $hotel->begindatum }}</td>
				<td>{{ $hotel->einddatum }}</td>
				<td>
					<a class="btn btn-primary" href="#" title="Wijzig de invoer" role="button">
						edit
					</a>
						
						&nbsp;
						<a href="#" title="verwijder deze invoer">
							wis
						</a>
						&nbsp;
						<a href="#" title="bevestig deze invoer">
							bevestig
						</a>
						
				</td>
			</tr>
		@endforeach
		{{ $diensten->links() }}
		</tbody>
	</table>
@endif