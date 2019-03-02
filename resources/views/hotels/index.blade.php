@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Overzicht van de hotelkamers</h1>
	
	<?php // dd($hotels->all()); ?>
	@if(count($hotels->all()) > 0)
	
	@if(Auth::user()->admin)
	<a class="btn btn-primary" href="/events" title="kalender">kalender</a>
	<p>&nbsp;</p> 
	@endif
	<table class="table table-hover table-bordered table-sm table-primary text-dark">
		<thead>
			<th>kamernummer</th>
			<th>begindatum</th>
			<th>einddatum</th>
			<th></th>
		</thead>
		<tbody>
		@foreach($hotels as $hotel)
			<tr>
				<td>{{ $hotel->kamernummer }}</td>
				<td>{{ $hotel->begindatum }}</td>
				<td>{{ $hotel->einddatum }}</td>
				<td>
					<a class="btn btn-primary" href="/hotels/{{ $hotel->id }}/edit" title="Wijzig de invoer" role="button">
						edit
					</a>
						
						&nbsp;
						<a href="/hotels/{{ $hotel->id }}/destroy" title="verwijder deze invoer">
							wis
						</a>
				</td>
			</tr>
		@endforeach
		{{ $hotels->links() }}
		</tbody>
	</table>
	@else
		<h2 class="d-flex justify-content-center">Nog geen kamerbezetting</h2>
	@endisset

	<a href="hotels/create">
		<button class="btn btn-primary">kamerbezetting toevoegen</button>
	</a>	
</div>
@endsection

