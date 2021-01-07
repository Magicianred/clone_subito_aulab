


<nav id="navbar" class="navbar navbar-expand-md navbar-light fixed-top">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-logo">
            <img src="\img\logo.png" style="width: 150px" alt="logo">
        </a>
        
        <button class="navbar-toggler btn bg-second" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            
            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item">
                    <x-locale
                    lang="it"
                    nation="it"
                    />
                    
                </li>
                <li class="nav-item">
                    <x-locale
                    lang="en"
                    nation="gb"
                    />
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                
                @guest
                <li class="nav-item">
                    <form class="form-inline " action="{{route('search')}}" method="GET">
                        <input class="form-control form-control-sm mr-sm-1" name="q" type="search" aria-label="Search">
                        <button class="btn  my-2 my-sm-0" type="submit"><i class="fas fa-search font-white"></i>
                        </button>
                    </form>
                </li>
                
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link font-white font-weight-bold "  href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link font-white font-weight-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="categoriesDropdown" class="nav-link dropdown-toggle font-white font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{__('ui.categorie')}} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-third" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                        <a  href="{{route('public.announcements.category',[$category->name, $category->id])}}" class="nav-link font-white font-weight-bold">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <form class="form-inline " action="{{route('search')}}" method="GET">
                        <input class="form-control form-control-sm mr-sm-1" name="q" type="search" aria-label="Search">
                        <button class="btn  my-2 my-sm-0" type="submit"><i class="fas fa-search font-white"></i>
                        </button>
                    </form>
                </li>
                
                <li class="nav-item dropdown">
                    <a id="categoriesDropdown" class="nav-link dropdown-toggle font-white font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Categorie <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-third" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                        <a  href="{{route('public.announcements.category',[$category->name, $category->id])}}" class="dropdown-item  font-white font-weight-bold">{{$category->name}}</a>
                        @endforeach
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle font-white font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-third" aria-labelledby="navbarDropdown">
                        
                        
                        <a class="dropdown-item font-white font-weight-bold " href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    
                    @if (Auth::user()->is_revisor)
                    
                    <div class="dropdown-item">
                        <a class="font-white font-weight-bold text-decoration-none" href="{{route('revisor.revisor')}}">Da revisionare <span class="badge badge-pill bg-second">{{\App\Models\Announcement::ToBeRevisionedCount()}}</span></a>
                    </div>
                    @endif 
                    
                    
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>

</nav>

