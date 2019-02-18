<div class="container">
	<h2 class="d-flex justify-content-center">Aangevraagde diensten</h2>
	<?php $soort = 'aangevraagd'; ?>
	@include('services.partials.diensten')
	<h2 class="d-flex justify-content-center">actieve diensten</h2>
	<?php $soort = 'actief'; ?>
	@include('services.partials.diensten')
	<h2 class="d-flex justify-content-center">voorbije diensten</h2>	
	<?php $soort = 'voorbij'; ?>
	@include('services.partials.diensten')
</div>