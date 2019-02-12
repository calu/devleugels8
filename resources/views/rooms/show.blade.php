@extends('hotels.layouts.radissonlayout')

@section('content')
<div class="super-container">
	<div class="container">
		<h1 class="d-flex justify-content-center">kamer {{ $room->kamernummer }} </h1>
		
		<section class="our_room_area">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="room_left">
						<img class="img-fluid" src="{{ asset('storage/kamerfoto/'.$room->foto) }}" alt="">
					</div>
				</div>
				<div class="col-lg-1"> </div>
				<div class="col-lg-6">
					<p class="type"> aantal bedden : {{ $room->aantal_bedden }}</p>
					<p> beschrijving : {{ $room->beschrijving }} </p>
					<p> soort : {{ $room->soort }}</p>
				</div>
			</div>
		</section>
		
		<a class="btn btn-primary" href="/rooms/{{ $room->id }}/edit" title="Wijzig de invoer" role="button">
		edit
		</a>
		
	</div>
</div>
@endsection