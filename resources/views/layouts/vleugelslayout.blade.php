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
//        margin-top : 0px;
//        border-top : 0px;
//        padding-top : 0px;
//        position : inherit;
    }
    
    </style>
        
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
     
</head>
<body>
    <div id="app">
        
        @include('partials.navbar')
        
        <main class="py-4">
            @yield('content')
        </main>
		
		@include('partials.footer')
    </div>
</body>
</html>