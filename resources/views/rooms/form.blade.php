<div class="form-row">
  <div class="form-group col-md-6">
    {!! Form::label('kamernummer', 'kamernummer :') !!}
    {!! Form::text('kamernummer', null, [ 'class' => 'form-control']) !!}
  </div>

</div>

<div class="form-row">
   <div class="form-group col-md-6">
    {!! Form::label('soort', 'soort :') !!}
    {!! Form::text('soort', null, [ 'class' => 'form-control']) !!}
  </div>
 
  <div class="form-group col-md-10">
    {!! Form::label('aantal_bedden', 'aantal bedden:') !!}
    {!! Form::text('aantal_bedden', null, [ 'class' => 'form-control']) !!}
  </div>
</div>

 <div class="form-row">
   <div class="form-group col-md-12">
     {!! Form::label('beschrijving', 'beschrijving:') !!}
     {!! Form::textarea('beschrijving', null, [ 'class' => 'form-control']) !!}
   </div>

  </div>

<div class="form-row">
  <div class="form-group col-md-6">
    @isset($rooms)
    <img class="img-fluid" src="{{ asset('storage/kamerfoto/'.$rooms->foto) }}" alt="">
    @endisset
  </div>
</div>


 <div class="form-row">
   <div class="form-group col-md-3">
     {!! Form::label('foto', 'foto:') !!}
     {!! Form::file('foto', null, [ 'class' => 'form-control']) !!}
   </div>
  </div>

<div class="form-row">
  <div class="form-group col-md-3">
    <button type="submit" class="btn btn-primary">spaar</button>
  </div>
</div>
 </div>


