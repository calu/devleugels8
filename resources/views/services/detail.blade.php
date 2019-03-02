@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Overzicht van een dienst</h1>
	
	 @include('rooms.partials.show')
	 @include('services.partials.show')
</div>
@endsection