 @extends('layouts.vleugelslayout')
 
 @section('content')
 
    <div class="footer">
     <footer class="pt-4 my-md-5 pt-md-5 border-top bg-dark text-white">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="{{ asset('img/logovleugels.png') }}" alt="de vleugels">
            <small class="d-block mb-3 .bg-dark">&copy; 2018-2019</small>
          </div>
          <div class="col-6 col-md">
            <h5>Suggesties</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool</a></li>
              <li><a class="text-muted" href="#">Willekeurig</a></li>
              <li><a class="text-muted" href="#">Overzicht</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Bronnen</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="https://www.devleugels.be/nl">De Vleugels</a></li>
              <li><a class="text-muted" href="https://www.devleugels.be/nl/kalender">Vleugelkalender</a></li>
              <li><a class="text-muted" href="https://www.devleugels.be/nl/fotos">Foto's</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Over ons</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Ons team</a></li>
              <li><a class="text-muted" href="#">De Ligging</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>
      </div>
 @endsection