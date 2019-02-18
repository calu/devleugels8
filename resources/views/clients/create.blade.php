@extends('layouts.vleugelslayout')

@section('content')
<div class="super_container">
	<div class="search-box">
		<div class="container">
			<h1 class="d-flex justify-content-center">het intake gesprek</h1>
			<div class="row">
				<div class="col">
					<table class="table table-sm">
						<tbody>
							<tr class="table-primary">
								<td>
      <p>
      In dit formulier vul je de gegevens in van de klant. We hebben
      deze gegevens nodig om de juiste prijsberekening te kunnen maken en
      de administratieve formaliteiten te kunnen uitvoeren. Ook worden
      een e-mail adres en een wachtwoord gevraagd, zodat je je kan 
      aanmelden om de status van de diensten voor de klant
      te kunnen nagaan. (Het e-mail adres mag een fictief, maar geldig, adres zijn)		  	  
	  </p>
								</td>
							</tr>
							<tr>
								<td>
    <p class="d-flex justify-content-center bg-success font-weight-bold text-white">
      De contactpersoon = {{ "$intake->voornaam $intake->familienaam" }}
    </p>
									
								</td>
							</tr>
						</tbody>
					</table>
					<div class="search-box-container d-flex flex-row align-items-center justify-content-start">
						<div class="search_form_container">
							@include('partials.formerror')
							<?php $items = $mutualities->pluck('naam','id'); ?>
							{!! Form::open(['url' => 'clients']) !!}
							    <input type='hidden' name='intake_id' value='{{ $intake->id }}' />
								@include('clients.form', compact('items'))
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection