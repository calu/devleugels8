@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Overzicht van de mutualiteiten</h1>
		
	<table class="table table-hover table-bordered table-sm table-primary text-dark">
		<thead>
			<th>naam</th>
			<th></th>
		</thead>
		<tbody>
		@foreach($mutualities as $mut)
			<tr>
				<td>{{ $mut->naam }}</td>
				<td>
					<a class="btn btn-primary" href="/mutualities/{{ $mut->id }}/edit" title="Wijzig de invoer" role="button">
						edit
					</a>
						
						&nbsp;
						<a href="/mutualities/{{ $mut->id }}/destroy" title="verwijder deze invoer">
							wis
						</a>
				</td>
			</tr>
		@endforeach
		{{ $mutualities->links() }}
		</tbody>
	</table>

	<a href="mutualities/create">
		<button class="btn btn-primary">Mutualiteit toevoegen</button>
	</a>	
</div>
@endsection