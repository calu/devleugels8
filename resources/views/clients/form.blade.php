<div class="form-row">
  <div class="form-group col-md-6">
    {!! Form::label('voornaam', 'Voornaam klant:') !!}
    {!! Form::text('voornaam', null, [ 'class' => 'form-control', 'required'] ) !!}
  </div>

  <div class="form-group col-md-6">
    {!! Form::label('familienaam', 'Familienaam klant:') !!}
    {!! Form::text('familienaam', null, [ 'class' => 'form-control', 'required']) !!}
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-10">
    {!! Form::label('straat', 'Straat:') !!}
    {!! Form::text('straat', null, [ 'class' => 'form-control'], 'required') !!}
  </div>

  <div class="form-group col-md-2">
    {!! Form::label('huisnummer', 'Huisnummer:') !!}
    {!! Form::text('huisnummer', null, [ 'class' => 'form-control'], 'required') !!}
  </div>
</div>

 <div class="form-row">
   <div class="form-group col-md-2">
     {!! Form::label('bus', 'Bus:') !!}
     {!! Form::text('bus', null, [ 'class' => 'form-control']) !!}
   </div>

   <div class="form-group col-md-2">
     {!! Form::label('postcode', 'Postcode:') !!}
     {!! Form::text('postcode', null, [ 'class' => 'form-control', 'required']) !!}
   </div>


   <div class="form-group col-md-4">
     {!! Form::label('gemeente', 'Gemeente:') !!}
     {!! Form::text('gemeente', null, [ 'class' => 'form-control', 'required']) !!}
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

   <div class="form-group col-md-3">
     {!! Form::label('geboortedatum', 'Geboortedatum :') !!}
     {!! Form::date('geboortedatum', null, [ 'class' => 'form-control', 'required']) !!}
   </div>
 </div>

<div class="form-row">
  <div class="form-group col-md-3">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, [ 'class' => 'form-control', 'required']) !!}
  </div>

   <div class="form-group col-md-3">
     {!! Form::label('password', 'wachtwoord :', ['class' => 'text-white', 'value' => old('password')]) !!}
     {!! Form::text('password', null, [ 'class' => 'form-control', 'required']) !!}
   </div>

   <div class="form-group col-md-3">
     {!! Form::label('password_confirmation', 'herhaal wachtwoord:') !!}
     {!! Form::text('password_confirmation', null, [ 'class' => 'form-control', 'required']) !!}
   </div>
</div>

   <div class="form-row">
     <div class="form-group col-md-6">
       {!! Form::label('RRN', 'RRN:') !!}
       {!! Form::text('RRN', null, [ 'class' => 'form-control', 'required']) !!}
     </div>

     <div class="form-group col-mid-3">
       {!! Form::label('mutualiteit', 'mutualiteit:') !!}
       {!! Form::select('mutualiteit', $items, null,['required']) !!}
     </div>
   </div>

  <button type="submit" class="btn btn-primary">volgende</button>
