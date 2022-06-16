<header class="shadow-sm">
    <div class="logo-text">
        <h2 class="logo-text">
            <a class="menu" href="{{ route('/') }}">Doctalk</a>
        </h2>
    </div>
    <nav class="navigation-bar">
        <ul class="menu-list">
            <li class="menu-item">
                <a class="menu" href="{{ route('doctor') }}">Find Doctors</a>
            </li>
            @foreach($headerCategories as $category)
            <li class="menu-item">
                <a class="menu" href="{{ route('category.products', $category->slug) }}">{{ $category->title }}</a>
            </li>
            @endforeach
            <li class="menu-item">
                <a class="menu" href="#">Lab Tests</a>
            </li>
        </ul>
    </nav>
    <div class="navigation-right">
        <a class="button-left">Upload Prescription</a>
        @if(auth()->user())
            <a class="user-name" href="#" data-bs-toggle="dropdown">
                {{ auth()->user()->name }} <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                
                <a class="dropdown-item" href="#">
                    <i class="ti-power-off text-primary"></i>
                    Notification
                </a>
                <a class="dropdown-item" href="#">
                    <i class="ti-power-off text-primary"></i>
                    My Orders
                </a>
                <a class="dropdown-item" href="#">
                    <i class="ti-power-off text-primary"></i>
                    Dashboard
                </a>
                @if(auth()->user()->role == 'doctor')
                    <a class="dropdown-item" href="{{ route('user.setting') }}">
                        <i class="ti-power-off text-primary"></i>
                        Settings
                    </a>
                @endif
                <a class="dropdown-item" href="{{ route('cart') }}">
                    <i class="ti-power-off text-primary"></i>
                    Cart
                    <span class="badge bg-primary rounded-pill">{{ count(auth()->user()->cart) }}</span>
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ti-power-off text-primary"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @else
            <a class="button-right" href="{{ route('login') }}">Login</a>
            <a class="button-right" href="{{ route('register') }}">Register</a>
        @endif
    </div>
</header>