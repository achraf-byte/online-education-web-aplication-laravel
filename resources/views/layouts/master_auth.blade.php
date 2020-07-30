


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/searchit.js') }}" defer></script>
    <script>
    function searchit() {


        alert('You clicked the top text');


        }</script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9878ae1854.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/style_prof.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}">
   
</head>
<body>
<div id="app" class="haad">
    <div class="moving">
    <nav class="navbar navbar-light  w-100  justify-content-betwen">
        <a class="navbar-brand  ml-3" href="/{{ url('/') }}">
            <img src="{{ asset('dec/logo.png') }}" class="logo">
        </a>
        
    
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link  coll" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <label class="coll">Hi There</label>  
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/{{ route('logout') }}"
                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            
        </div>
       
    </nav>
        
    </div>
   

   
</div>
<main class=" backk mw-100 w-100 " >

        @yield('content')
    </main>
</body>
</html>