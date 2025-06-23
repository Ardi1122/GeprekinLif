@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Cart;

    $cartCount = 0;
    if (Auth::check()) {
        $cartCount = Cart::where('user_id', Auth::id())->count();
    }
@endphp
<nav class="navbar navbar-expand-lg py-3">
    <div class="container menu-container ">
        <a class="navbar-brand" href="#!">Geprekin<span>Lif</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <!-- Kiri -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-2">
                <li class="nav-item">
                    @if (Route::is('login'))
                        @auth
                            @if (Auth::user()->role == 'admin')
                                <a class="nav-link" aria-current="page" href="/admin">Dahboard</a>
                            @endif

                        @endauth
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Semua</a></li>
                        <li><a class="dropdown-item" href="#!">Ayam Geprek</a></li>
                        <li><a class="dropdown-item" href="#!">Minuman</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Tentang</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        <a href="/cart" class="cart text-decoration-none"><span>Cart</span></a>
                        @if ($cartCount > 0)
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $cartCount }}</span>
                        @endif
                    </button>
                </form>
                <!-- Kanan -->
                <div class="d-flex align-items-center justify-content-between gap-3">
                    @if (Route::has('login'))
                        @auth
                            <!-- Dropdown Profile Bootstrap -->
                            <div class="dropdown">
                                <button class="btn btn-white dropdown-toggle d-inline-flex align-items-center"
                                    type="button" id="dropdownProfileButton" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownProfileButton">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Log Out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="btn-login">
                                <a href="{{ route('login') }}" class="btn btn-link">Login</a>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
