@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
  <div class="container">
    <div class="mt-4">
      <h1 class="d-flex justify-content-center">
        Een bestaande mutualiteit aanpassen
      </h1>
    </div>
    @include('partials.formerror')
  
    {!! Form::model($mutualities,['method' => 'patch', 'action' => ['MutualityController@update',$mutualities->id]]) !!}
      @include('mutualities.form')
    {!! Form::close() !!}
  </div>
</div>
@endsection