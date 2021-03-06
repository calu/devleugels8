@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
	<h1 class="d-flex justify-content-center">Dashboard van de beheerder</h1>
	<div class="row">

 		@include(
			'admin.partials.card', 
			[
				'header' => 'intake aanvragen', 
               	'icon' => 'fa-envelope',
               	'text' => 'Een overzicht van alle aanvragen. Je kan deze editeren, aanvullen bij het intake gesprek of verwijderen',
               	'button' => 'aanvragen',
               	'href' => '/intakes'
           	])

        @include(
            'admin.partials.card',
            [
                'header' => 'mutualiteiten',
                'icon' => 'fa-folder-open',
                'text' => 'In dit onderdeel voer je alle bewerkingen uit op mutualiteiten (edit, delete, add)',
                'button' => 'bewerk mutualiteiten',
                'href' => '/mutualities'
            ]
        )	
        
        @include(
            'admin.partials.card',
            [
                'header' => 'kamers',
                'icon' => 'fa-home',
                'text' => 'Hier kan je de kamers bewerken. Let wel : wijzig geen kamer als er diensten geprogrammeerd staan.',
                'button' => 'bewerk kamers',
                'href' => '/rooms'
            ]
        )		
	</div>
    <div class="row">
        @include(
            'admin.partials.card',
            [
                'header' => 'hotel',
                'icon' => 'fa-hotel',
                'text' => 'Hier kan je de kamerbezetting bekijken. Let wel : wijzig geen kamer als er diensten geprogrammeerd staan.',
                'button' => 'bewerk hotel',
                'href' => '/hotels'
            ]
        )		
 
        @include(
            'admin.partials.card',
            [
                'header' => 'klanten',
                'icon' => 'fa-wheelchair',
                'text' => 'een overzicht van de klanten - met link naar contactpersoon',
                'button' => 'bewerk klanten',
                'href' => '/clients'
            ]
        )		
 
        @include(
            'admin.partials.card',
            [
                'header' => 'diensten',
                'icon' => 'fa-shopping-cart',
                'text' => 'een overzicht van alle diensten',
                'button' => 'bewerk diensten',
                'href' => '/service'
            ]
        )		
    </div>

</div>
@endsection