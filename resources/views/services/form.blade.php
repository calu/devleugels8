<div class="container border border-secondary">
  <div class="form-row d-flex">
    <div class="form-group ">
      {!! Form::label('id', 'id :') !!}
    </div>
    <div class="form-group col-md-1">
      {!! Form::number('id', $service->id, ['class' => 'form-control', 'readonly' => 'true']) !!}
    </div> 
  </div>
  
  <div class="form-row d-flex">
    <div class="form-group">
      {!! Form::label('soort', 'soort dienst :') !!}
    </div>
    <div class="form-group col-md-2">
      {!! Form::text('soort', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
    </div> 
  </div>
  
  <?php
    $client = DB::table('clients')->where('id', $service->user_id)->get()->first();
  ?>
  {!! Form::hidden('user_id', $service->user_id) !!}
  
  <div class="form-row d-flex">
    <div class="form-group">
      {!! Form::label('klant', 'klant :') !!}
    </div>
    <div class="form-group col-md-2">
      <p>{{ $client->voornaam." ".$client->familienaam }}
    </div> 
  </div>
  
  <?php
    $statuslijst = array(
      'aangevraagd' => 'aangevraagd',
      'actief' => 'actief',
      'voorbij' => 'voorbij'
    );
  ?>
  
  <div class="form-row d-flex">
    <div class="form-group">
      {!! Form::label('status', 'status :') !!}
    </div>
    <div class="form-group col-md-2">
      {!! Form::select('status', $statuslijst, $service->status,['class' => 'form-control']) !!}
    </div> 
  </div>

  <div class="form-row d-flex">
    <div class="form-group col-md-2">
      {!! Form::label('tewissen', 'te wissen :') !!}
    </div>
    <div class="form-group col-md-3">    
      {!! Form::radio('tewissen','0',['class' => 'form-control']) !!} Neen
     </div>
    <div class="form-group col-md-3">
      &nbsp;
      {!! Form::radio('tewissen','1',['class' => 'form-control']) !!} Ja
    </div> 
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <button type="submit" class="btn btn-primary">spaar</button>
    </div>
  </div>  
</div>




