@extends('layouts.vleugelslayout')

@section('content')
<div class="super-container">
  <div class="container">
    <div class="mt-4">
      <h1 class="d-flex justify-content-center">
        Een bestaande intake aanpassen
      </h1>
    </div>
    @include('partials.formerror')
  
    {!! Form::model($intake,['method' => 'patch', 'action' => ['IntakeController@update',$intake->id]]) !!}
      @include('intakes.form')
    {!! Form::close() !!}
  </div>
</div>
@endsection