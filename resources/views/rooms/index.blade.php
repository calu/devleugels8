@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Overzicht van de kamers</h1>
		
	<table class="table table-hover table-bordered table-sm table-primary text-dark">
		<thead>
			<th>kamernummer</th>
			<th>aantal bedden</th>
			<th>soort</th>
			<th></th>
		</thead>
		<tbody>
		@foreach($rooms as $room)
			<tr>
				<td>{{ $room->kamernummer }}</td>
				<td>{{ $room->aantal_bedden }}</td>
				<td>{{ $room->soort }}</td>
				<td>
					<a href="/rooms/{{ $room->id }}" title="toon de details">detail</a>
					<a class="btn btn-primary" href="/rooms/{{ $room->id }}/edit" title="Wijzig de invoer" role="button">
						edit
					</a>
						
						&nbsp;
						<a href="/rooms/{{ $room->id }}/destroy" title="verwijder deze invoer">
							wis
						</a>
				</td>
			</tr>
		@endforeach
		{{ $rooms->links() }}
		</tbody>
	</table>

	<a href="rooms/create">
		<button class="btn btn-primary">kamer toevoegen</button>
	</a>	
</div>
@endsection