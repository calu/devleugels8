@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
  <div class="container">
    <div class="mt-4">
      <h1 class="d-flex justify-content-center">
        Een bestaande kamer aanpassen
      </h1>
    </div>
    @include('partials.formerror')
  
    {!! Form::model($rooms,['method' => 'patch', 'action' => ['RoomController@update',$rooms->id], 'files' => true]) !!}
      @include('rooms.form')
    {!! Form::close() !!}
  </div>
</div>
@endsection