<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/img/logovleugels.png') }}" width="88" height="48">
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
<!--                    <ul class="navbar-nav mr-auto">

                    </ul>
-->
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('intakes/create') }}">Stel je vraag</a>
                    </li>
                @else
                    @if ( Auth::user()->admin == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/home">top</a>
                        </li>
                        
                        @if ( request()->session()->has('client_id') )
                        <?php
                            $id = Session::get('client_id');
                            try{
                              $client = \App\Client::findOrFail($id);
                            } catch (Exception $e){
                                // dd("voorlopig om te testen");
                            }
                         ?>
                         
                         @isset( $client )
                            <li class="nav-item text-white">
                                <p class="nav-link">voor {{ $client->voornaam." ".$client->familienaam }}</p>
                            </li>
                            &nbsp;
                         @endif
                         @endif
                    @else
                    <!-- hier gewoon als klant aangemeld -->
                        <li class="nav-item">
                            <a class="nav-link" href="/home">top</a>
                        </li>
                    @endif
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </div>
                     </li>
                @endguest
                        
                <li class="nav-item">
                   <a class="nav-link" href="{{ url('/info') }}">Info</a>
                </li>
             </ul>
            </div>
  </div>
</nav>