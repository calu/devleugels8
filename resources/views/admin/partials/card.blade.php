		@if($header == "intake aanvragen")
		  <?php
			  // hier zullen we kijken of er aanvragen zijn die nog niet zijn behandeld
			  $nrintakes = DB::table('intakes')->where('openstaand', true)->count();
			  $header = 'intake aanvragen   ('.$nrintakes.')';
		  ?>	
		@endif
		
		<div class="card col-md-4">
			<div class="card-header">
				<i class="fa {{ $icon }}"></i>
				{{ $header }}
			</div>
			<div class="card-body">
				<div class="card-text">
					{{ $text }}
				</div>
				<a href="{{ $href }}" class="btn btn-outline-primary">{{ $button }}</a>
			</div>
		</div>