<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">E-commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('frontend.index') }}">Product</a>
        </li>
        <li class="nav-item">
          <a style="margin-right:5px;"class="nav-link" href="{{ route('frontend.contact.index') }}">Contact</a>
        </li>
        <form class="form-inline my-2 my-lg-0" action="{{ route('frontend.product.search') }}" method="GET">
            <input type="text"  name ="search" class="form-control" placeholder="search" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fas fa-search-minus"></i></button>
            </div>

        </form>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('cart.index') }}">
                <button class="btn badge-danger">
                    <span class="mt-1">
                       Cart
                    </span>
                    <span class="badge badge-warning" id="totalItems">
                        {{ App\Models\Cart::totalItems() }}
                    </span>
                </button>

            </a>
          </li>
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width: 50px;" alt="">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                    My Dashboard
                 </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

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
