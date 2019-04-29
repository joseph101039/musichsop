<div class="nav-bar">
    <nav>
        <ul class="navbar">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="/home">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/browse">BROWSE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">LOGIN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
            </li>
            <li class="auto"></li>
            <li class="right-nav-item"><a>Guest</a></li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="/home">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/browse">BROWSE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cart">CART
                <span class="cart-quantity show-for-large filled">2</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                LOGOUT
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li class="auto"></li>           
            @if(auth()->user()->isAdmin())
                <li class="right-nav-item" id="username" style="background-color: #660000; color:white;"><a >{{ Auth::user()->name }} </a>
                <div id="miniProfile">@include('profile')</div>
            </li>
            @else
                <li class="right-nav-item" id="username"><a >{{ Auth::user()->name}} </a>
                <div id="miniProfile">@include('profile')</div>
            </li>
            @endif
        @endguest

        </ul>     
    </nav>
</div>
