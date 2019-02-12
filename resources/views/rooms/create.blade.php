@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<div class="container">
		<h1 class="d-flex justify-content-center">Een nieuwe kamer toevoegen</h1>
		
		<div class="align-items-center justify-content-start">
			<div class="row">
				<div class="col">
					@include('partials.formerror')
				</div>
			</div>
			<div class="row">
				<div class="col">
					{!! Form::open(['url' => 'rooms', 'enctype' => 'multipart/form-data']) !!}
						@include('rooms.form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection