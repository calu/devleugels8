	<section class="our_room_area">

			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="room_left">
						<?php $foto = "storage/kamerfoto/".$room->foto; ?>
						<img class="img-fluid mx-auto" src="{{ asset($foto)}}" alt="">
					</div>
				</div>
				<div class="col-lg-6">
					<!--div class="owl-carousel owl-room" -->
						<div class="room_right">
							@include('rooms.partials.prijs')
							<h1 class="type">
								Kamer {{ $room->kamernummer }}
							</h1>
							<p>{{ $room->beschrijving }}</p>
							<p>aantal bedden : {{ $room->aantal_bedden }}
							<div class="row">
								<div class="col-lg-6 col-md-5">
									<ul>
										<li>Air Condition</li>
										<li>Car Parking</li>
										<li>Swimming Pool</li>
									</ul>
								</div>
								<div class="col-lg-6 col-md-5">
									<ul>
										<li>Restaurant & Bar</li>
										<li>Vehicle Rental</li>
										<li>Complementary Meal</li>
									</ul>
								</div>
							</div>
							@if ($choice)
								@include('partials.formerror')
								{!! Form::open(['url' => 'service']) !!}
								<?php // dd($periode[0]) ?>
									{!! Form::hidden('start', $periode[0]) !!}
									{!! Form::hidden('einde', $periode[1]) !!}
									{!! Form::hidden('kamernummer', $room->kamernummer) !!}
									{!! Form::hidden('soort', 'hotel') !!}
									<button type="submit" class="btn btn-primary">boek nu</button>
   								<!-- a class="btn btn-primary" href="/service" role="button">boek nu</a -->
								{!! Form::close() !!}
							@else
   								<a class="btn btn-primary" href="#beschikbaarheid" role="button">bekijk beschikbaarheid</a>
							@endif

						</div>
					<!-- /div -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Our Room Area -->