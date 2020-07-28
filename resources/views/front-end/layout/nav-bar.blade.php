<nav id="nav" style="height: 63px;"><!--start nav-->
    <div class="container">

        <div class="brand pull-left" id="brand"><!--brand-->
            <h2 id="h2">B E</h2>
        </div>

        <div class="share pull-left"><!--share-->
            <span><i class="fas fa-share"></i> share</span>
            <span><a href="#"><i class="fab fa-twitter fa-2x"></i></a></span>
            <span><a href="https://www.facebook.com/ahmed0salma" target="_blank"><i class="fab fa-facebook fa-2x"></i></a></span>
            <span><a href="#"><i class="fab fa-google fa-2x"></i></a></span>
            <span><a href="https://www.instagram.com/ahmed__samyy/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></span>
        </div>

        <div class="menu pull-right"><!--menu-->
            <span class="glyphicon glyphicon-th hidden-lg hidden-md"></span>
        </div>



        <ul class="list-unstyled navb pull-right"><!--navb-->
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/pharaonic')}}">Pharaonic</a></li>
            <li><a href="{{url('/modern')}}">Modern</a></li>
            <li><a href="{{url('/coptic')}}">Coptic</a></li>
            <li><a href="{{url('/islamic')}}">Islamic</a></li>
            <li><a href="{{url('/contact-us')}}">Connect us</a></li>
            <ul class="navbar-nav ml-auto " >
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <div class="nav-item dropdown-item">
                            <a class="drob-nav" id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div  style="position: absolute">
                                <div style="background-color: #2a363b">

                                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                                <div style="background-color: #2a363b">
                                    @if(auth()->user()->group != 'user')

                                       <li  class="nav-item"> <a target="_blank" class="nav-link" href="{{url('admin/home')}}"> Dashboard</a></li>
                                    @endif
                                </div>

                            </div>
                            </ul>

                        </div>
            
                        @endguest

            </ul>

        </ul>

    </div>

</nav><!--end nav-->
