    <!-- Features -->
    <div class="container tm-features-section" id="features">
        <div class="row tm-features-row">
            <section class="col-md-6 col-sm-12 tm-feature-block">
                <header class="tm-feature-header">
                    <!--i class="fas fa-5x fa-anchor tm-feature-icon"></i-->
                    <i class="fa fa-5x fa-anchor"></i>
                    <h3 class="tm-feature-h">Contactpersoon : {{ $intake->voornaam." ".$intake->familienaam }}</h3>
                </header>
                <div class="row">
                    <div class="col-sm">
                        <b>straat :</b>{{ $intake->straat.",".$intake->huisnummer }}
                    </div>
                    <?php if (strlen($intake->bus) > 0){ 
                        echo ('<div class="col-sm"><b>bus : </b>'.$intake->bus.'</div>'); } 
                    else echo (""); ?>
                    <div class="col-sm">
                        <b>gemeente : </b> {{ $intake->postcode." ".$intake->gemeente }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <b>telefoon : </b> {{ $intake->telefoon }} 
                    </div>
                    <div class="col-sm">
                        <b>gsm :</b> {{ $intake->gsm }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <b>e-mail :</b> {{ $intake->email }}  
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        @if (Auth::user()->isAdmin())
                            <a href="#" class="btn btn-primary">Read More</a>   
                        @endif  
                    </div>
                </div>
                
            </section>
            <section class="col-md-6 col-sm-12 tm-feature-block">
                <header class="tm-feature-header">
                    <i class="fa fa-5x fa-child"></i>
                    <h3 class="tm-feature-h">Klant : {{ $client->voornaam." ".$client->familienaam }}</h3>
                </header>


               <div class="row">              
                      <div class="tm-activity-block-text">
                          <b>straat :</b> {{ $client->straat.",".$client->huisnummer }}
                          <?php if (strlen($client->bus) > 0){ echo ('<b>bus : </b>'.$client->bus); } else echo (""); ?>
                          &nbsp;<b>gemeente : </b> {{ $client->postcode." ".$client->gemeente }}
                      </div>
               </div>
               <div class="row">
                   <div class="tm-activity-block-text">
                       <b>telefoon : </b> {{ $client->telefoon }} <b>gsm :</b> {{ $client->gsm }}
                   </div>
               </div>
               <div class="row">
                   <div class="tm-activity-block-text">
                       <b>e-mail :</b> {{ $client->email }} 
                   </div>
               </div>
                <div class="row">
                   <div class="tm-activity-block-text">
                       <b>geboortedatum :</b> {{ $client->geboortedatum }} &nbsp;
                       <b>RijksRegisterNummer :</b>  {{ $client->RRN }} 
                   </div>
               </div>
               @if (Auth::user()->isAdmin())
               <a href="#" class="btn btn-primary">Read More</a> 
               @endif

            </section>
        </div>
    </div>
