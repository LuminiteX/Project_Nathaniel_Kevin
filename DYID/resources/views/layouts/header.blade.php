<div class="header">
    <div class="header-top">
        <img src="{{ url('storage/images/icons/logo.png') }}" alt="">
        <form action="/search" method="GET">
            <input type="text" name="search" placeholder=" Search product...">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="header-bot">
        <ul style="margin-top:10px;">
            <li><a href="/">Home</a></li>

            @guest
                <div class="header-bot-right">
                    @if (Route::has('login'))
                        <li class="header-bot-right-btn"><a href="/login" >Login</a></li>
                    @endif
                    @if (Route::has('register'))
                        <li class="header-bot-right-btn"><a href="/register" >Register</a></li>
                    @endif
                </div>
            @elseif(isset(Auth::user()->id) && (Auth::user()->role == 0))
                <li><a href="/cart">My Cart</a></li>
                <li><a href="/history">History Transaction</a></li>

                <div class="header-bot-right">
                    <li class="header-bot-right-btn">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ url('storage/images/icons/logout.png') }}" alt="">Logout</a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @elseif(isset(Auth::user()->id) && (Auth::user()->role == 1))

                <div class="header-bot-dropdown">
                    <button class="header-bot-dropdown-btn">Manage Product &#9660
                    </button>
                    <div class="header-bot-dropdown-content">
                        <a href="/product">View Product</a>
                        <a href="/product/insert">Add Product</a>
                    </div>
                </div>

                <div class="header-bot-dropdown">
                    <button class="header-bot-dropdown-btn">Manage Category &#9660
                    </button>
                    <div class="header-bot-dropdown-content">
                        <a href="/category">View Category</a>
                        <a href="/category/insert">Add Category</a>
                    </div>
                </div>

                <div class="header-bot-right">
                    <li class="header-bot-right-btn">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ url('storage/images/icons/logout.png') }}" alt="">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
        </ul>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/header.css')}}">
