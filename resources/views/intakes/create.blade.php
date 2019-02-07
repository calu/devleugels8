@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<div class="container">
		<div class="row">
			<div class="col">
				<table class="table table-sm">
					<tbody>
						<tr class="table-primary">
							<td>
								<p style="font-size : 1.3rem">Beste contactpersoon,<br />
								In dit formulier vragen we heel wat persoonlijke gegevens, maar
								we willen je graag contacteren om een intake gesprek te hebben zodat
								we beter kunnen op je vragen kunnen antwoorden.<br />
								Het is onze bedoeling om zo de gepaste diensten te kunnen leveren</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="align-items-center justify-content-start">
			<div class="row">
				<div class="col">
					@include('partials.formerror')
				</div>
			</div>
			<div class="row">
				<div class="col">
					{!! Form::open(['url' => 'intakes']) !!}
						@include('intakes.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection