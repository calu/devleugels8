<div class="form-row">
  <div class="form-group col-md-6">
    {!! Form::label('voornaam', 'Voornaam contactpersoon:') !!}
    {!! Form::text('voornaam', null, [ 'class' => 'form-control']) !!}
  </div>

  <div class="form-group col-md-6">
    {!! Form::label('familienaam', 'Familienaam contactpersoon:') !!}
    {!! Form::text('familienaam', null, [ 'class' => 'form-control']) !!}
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-10">
    {!! Form::label('straat', 'Straat:') !!}
    {!! Form::text('straat', null, [ 'class' => 'form-control']) !!}
  </div>

  <div class="form-group col-md-2">
    {!! Form::label('huisnummer', 'Huisnummer:') !!}
    {!! Form::text('huisnummer', null, [ 'class' => 'form-control']) !!}
  </div>
</div>

 <div class="form-row">
   <div class="form-group col-md-2">
     {!! Form::label('bus', 'Bus:') !!}
     {!! Form::text('bus', null, [ 'class' => 'form-control']) !!}
   </div>

   <div class="form-group col-md-2">
     {!! Form::label('postcode', 'Postcode:') !!}
     {!! Form::text('postcode', null, [ 'class' => 'form-control']) !!}
   </div>


   <div class="form-group col-md-4">
     {!! Form::label('gemeente', 'Gemeente:') !!}
     {!! Form::text('gemeente', null, [ 'class' => 'form-control']) !!}
   </div>
 </div>

 <div class="form-row">
   <div class="form-group col-md-3">
     {!! Form::label('telefoon', 'Telefoon:') !!}
     {!! Form::text('telefoon', null, [ 'class' => 'form-control']) !!}
   </div>

   <div class="form-group col-md-3">
     {!! Form::label('gsm', 'GSM:') !!}
     {!! Form::text('gsm', null, [ 'class' => 'form-control']) !!}
   </div>

   <div class="form-group col-md-6">
     {!! Form::label('email', 'E-mail:') !!}
     {!! Form::text('email', null, [ 'class' => 'form-control']) !!}
   </div>
 </div>

 <div class="form-row">
   <div class="form-group">
   {!! Form::label('rubriek','Rubriek : ',['class' => 'text-dark']) !!}

   {!! Form::label('hotel', 'Hotel :',['class' => 'radio-inline control-label']) !!}
   {!! Form::radio('rubriek', 'hotel', isset($intake)? 'hotel':null,[ 'class' => 'form-check form-check-inline'] ) !!}

   {!! Form::label('dagverblijf', 'Dagverblijf :') !!}
   {!! Form::radio('rubriek', 'dagverblijf', isset($intake)? 'dagverblijf':null,[ 'class' => 'form-check form-check-inline'] ) !!}

   {!! Form::label('therapie', 'Therapie :') !!}
   {!! Form::radio('rubriek', 'therapie', isset($intake)? 'therapie':null,[ 'class' => 'form-check form-check-inline'] ) !!}


   {!! Form::label('ander', 'Andere vraag :') !!}
   {!! Form::radio('rubriek', 'ander', isset($intake)? 'ander':null,[ 'class' => 'form-check form-check-inline'] ) !!}
   </div>

 </div>

 <div class="form-row">
   <div class="form-group col-md-12">

       {!! Form::label('vraag', 'Vraag:') !!}
       {!! Form::textarea('vraag', null, [ 'class' => 'form-control']) !!}

   </div>
 </div>

  <button type="submit" class="btn btn-primary">spaar</button>
