<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.basislayout')
    
    <style>
    html, body {
          font-size : 1.1rem;
          font-weight : 400;
          height : 100%;
    }
    
    .vlinder{
        background-image: url('{{ asset('img/vlinder.jpg') }}'); 
        background-repeat : no-repeat; 
        background-size : cover;
    }
    
    </style>
    @yield('style')     
</head>
<body>
    <div id="app">
        
        @include('partials.navbar')
        
        <main class="py-4">
            @yield('content')
        </main>
		
		@include('partials.footer')
        @yield('script')
    </div>
</body>
</html>