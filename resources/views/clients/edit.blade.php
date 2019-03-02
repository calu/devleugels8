@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
  <div class="container">
    <div class="mt-4">
      <h1 class="d-flex justify-content-center">
        Een bestaande klant aanpassen
      </h1>
    </div>
	
  <div class="container border">
    <div class="row">
      <div class="col">
        <h2 class="d-flex justify-content-center">De contactpersoon = {{ $intake->voornaam." ".$intake->familienaam }}</2>
      </div>
      <div class="col">
        	<a href="#wijzigen van contactpersoon">
            <button class="btn btn-primary">Contactpersoon wijzigen</button>
          </a>	
      </div>
     </div>
  </div>
  <p>&nbsp;</p>
	<div class="container border">
	    @include('partials.formerror')
	    <?php $items = $mutualities->pluck('naam','id'); ?>
      <?php 
        $client = DB::table('clients')->where('id', $client->id)->get()->first();
        // dd($client); ?>
						
	    {!! Form::model($client,['method' => 'patch', 'action' => ['ClientController@update',$client->id]]) !!} 
      <!-- !! Form::model($client, ['route' => ['clients.update', $client]]) !!} -->
	      @include('clients.form', compact('client','items'))
	    {!! Form::close() !!}
	</div>
  </div>
</div>
@endsection