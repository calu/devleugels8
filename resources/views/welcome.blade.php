@extends('layouts.vleugelslayout')

@section('content')
<div class="super_container">
    <!--div class="modal fade" role="dialog" aria-hidden="false" -->
    @include('cookieConsent::index') 
    <!--/div -->
    @include('welcome.home')
    @include('welcome.hotel')
    @include('welcome.dagverblijf')
    @include('welcome.therapie')
    @include('welcome.nieuwsbrief')
    @include('welcome.footer')

</div>
@endsection 