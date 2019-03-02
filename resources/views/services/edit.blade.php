@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
  <div class="container">
    <div class="mt-4">
      <h1 class="d-flex justify-content-center">
        Een bestaande dienst aanpassen
      </h1>
    </div>
    
    @include('rooms.partials.show')
    
    <div class="container">
      <?php 
        // Er zijn 3 velden : soort, status en user_id
        // We kunnen soort en user_id niet wijzigen ... wel de status
        // haal nu de klant (user_id)
        $client = \App\Client::findOrFail($service->user_id);
//        dd($service); 
      ?>
    </div>
    @include('partials.formerror')
  
    {!! Form::model($service,['method' => 'patch', 'action' => ['ServiceController@update',$service->id]]) !!}
      @include('services.form')
    {!! Form::close() !!}
  </div>
</div>
@endsection