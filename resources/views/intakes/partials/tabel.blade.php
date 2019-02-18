@if ($soort == 'openstaand')
	<?php $titel = "uit te voeren aanvragen"; ?>
@else
	<?php $titel = "reeds uitgevoerde aanvragen"; ?>
@endif


<div class="container">
	<h2 class="d-flex justify-content-center">{{ $titel }}</h2>
	@if (count($param) > 0)
		<table class="table table-hover table-bordered table-sm table-primary text-dark">
			<thead>
				<th>naam</th>
				<th>rubriek</th>
				<th>vraag</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($param as $intake)
				<tr>
					<td>{{ $intake->voornaam." ".$intake->familienaam }}</td>
					<td>{{ $intake->rubriek }}</td>
					<td>{{ $intake->vraag }}</td>
					<td>
						@if ($soort == 'openstaand')
						<a class="btn btn-primary" href="/intakes/{{ $intake->id }}/edit" title="Wijzig de invoer" role="button">
							edit
						</a>
						
						<a class="btn btn-primary" href="/clients/{{ $intake->id }}/createWithId" title="Wijzig de invoer" role="button">
							intake
						</a>							
						@endif
						
						<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#intakemodal">
							wis
						</button>
						
					</td>
				</tr>
				
				<?php $url = '/intakes/'.$intake->id.'/destroy'; ?>
				@include('partials.modal',['href' => 'intakemodal', 'url' => $url ])		
				
				@endforeach
			</tbody>
		</table>
	@else
		<h3 class="d-flex justify-content-center">Er zijn geen items</h3>
	@endif
</div>


