<div class="container" id="hotel">
	<div class="row">
		<div class="col">
			<div class="section_title_container text-center">
				<div class="section_text">
					Overnachten in de vleugels kan een aangename verrassing worden.
					Als je geïnteresseerd bent kan je meer info bekomen door het formulier
					in te vullen dat je aangeboden wordt als je op de knop "Stel je vraag" klikt.
				</div>
				<div class="row">
					<div class="col">
						<a class="btn btn-primary" href="{{ url('hotels') }}" role="button">meer detail</a>
					</div>
					<div class="col">
						@include('partials.steljevraag')
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row intro_row">
		<!-- intro image -->
		<div class="col-lg-6">
			<div class="intro_image">
				<img src="{{ asset('img/intro.jpg') }}" alt="https://unsplash.com/@papao03">
			</div>
		</div>
		
		<!-- intro content -->
		<div class="col-lg-6 intro_col">
			<div class="intro_content">
				<div class="quote">
					<img src="{{ asset('img/quote.png') }}" alt="">
				</div>
				<div class="intro_text">
					<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus hendrerit, id lobortis leo luctus nec.</p>
				</div>
				<div class="intro_author d-flex flex-row align-items-center justify-content-start">
					<div class="author_image"><img src="{{ asset('img/author_1.jpg')}}" alt="https://unsplash.com/@onurozkardes">
				</div>
				<div class="intro_author_content">
					<div class="intro_author_name">Michael Williams</div>
					<div class="intro_author_title">client</div>
				</div>
			</div>
		</div>
	</div>
</div>

