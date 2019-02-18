<!-- Hier plaatsen we een drukknop dat ons doorverwijst naar een 
berekening van de vrije kamers en daarin de kamers die geschikt zijn
voor deze klant -->
	<!--================Booking Area =================-->
	<section class="container">
		<div class="inboeken" id="beschikbaarheid">
			@include('partials.formerror')


			{!! Form::open(['url' => 'rooms/boekinfo']) !!}
				<div class="form-row">
					<div class="col-lg-3 col-sm-6 col-6">
					    {!! Form::label('CheckIn', 'aankomst:', ['class' => 'text-black']) !!}
					    {!! Form::date('CheckIn', null, [ 'class' => 'form-control']) !!}						
					</div>
					<div class="col-lg-3 col-sm-6 col-6">
					    {!! Form::label('CheckOut', 'vertrek:', ['class' => 'text-black']) !!}
					    {!! Form::date('CheckOut', null, [ 'class' => 'form-control']) !!}						
					</div>

					<div class="col-lg-3 col-sm-6 col-6 coupon-code">
						<div class="booking_item">

							<button type="submit" 
							   class="main_btn text-uppercase">bekijk beschikbaarheid</button>
						</div>
					</div>
				</div>
			{!! Form::close() !!}

		</div>
	</section>
	<!--================End Booking Area =================-->