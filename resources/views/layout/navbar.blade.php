<nav>
    <h1>NFL Shop</h1>
    <ul>
        @guest
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('product') }}">Product</a></li>
            <li><a href="{{ url('login') }}"><strong>Login</strong></a></li>
            <li><a href="{{ url('register') }}"><strong>Register</strong></a></li>
        @endguest
        @auth
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('product') }}">Product</a></li>
            <li>
                <?php
                $main_cart = \App\Models\Cart::where('user_id', Auth::user()->id)
                    ->where('status', 0)
                    ->first();
                if (!empty($main_cart)) {
                    $notif = \App\Models\CartDetail::where('cart_id', $main_cart->id)->count();
                }
                ?>
                <a class="nav-link" href="{{ url('check-out') }}">
                    <i class="fa fa-shopping-cart"></i>
                    @if (!empty($notif))
                        <span class="badge badge-danger">{{ $notif }}</span>
                    @endif
                </a>
            </li>
            <li><a href="{{ url('logout') }}"><strong>Logout</strong></a></li>
        @endauth
    </ul>
</nav>
