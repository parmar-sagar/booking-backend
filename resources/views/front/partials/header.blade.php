<nav class="l-navbar js-navbar-scroll + +">
  <a href="{{url('/')}}" class="l-navbar__logo-link-middle">
    <img class="l-navbar__logo" src="{{asset ('assets/front/images/image_2022_11_21T04_57_12_733Z-U-bg.png')}}" alt="Quads Dubai" title="Quads Dubai"/>
  </a>
  <button type="button" class="burger js-burger" aria-label="Open menu">
    <i class="fa-solid fa-bars"></i>
  </button>
  <a class="l-navbar__logo-link" href="{{url('/')}}">
    <img class="l-navbar__logo" src="{{asset ('assets/front/images/image_2022_11_21T04_57_12_733Z-U-bg.png')}}" alt="Quads Dubai" title="Quads Dubai"/>
  </a>
  <div class="l-navbar__menu-wrapper">
    <ul class="l-navbar__menu-right">
      <li class="l-navbar__menu-item">
          <div class="dropdown">
            <a href="{{url('tours')}}">
              <span class="dropbtn l-navbar__menu-link ">Tours</span>
            </a>
            <div class="dropdown-Tour_content">
                @php
                  $tours = App\Models\Tour::has('vehicles')->active()->Sequence()->get();
                @endphp
                @foreach ($tours as $value)
                  <a href="{{url('tours/'.$value->random_id)}}">{{ $value->name }}</a>  
                @endforeach
                <a href="{{url('tours')}}">All Other Tours</a>
            </div>
          </div>
      </li>
      <li class="l-navbar__menu-item">
          <a class="l-navbar__menu-link" href="{{url('deals')}}" title="Deals">Deals</a>
      </li>
      <li class="l-navbar__menu-item">
          <a class="l-navbar__menu-link" href="{{url('about-us')}}" title="About Us">About Us</a>
      </li>
      <li class="l-navbar__menu-item">
          <a class="l-navbar__menu-link" href="{{url('contact-us')}}" title="Contact">Contact</a>
      </li>
      <li class="l-navbar__menu-item">
          <a class="l-navbar__menu-link" href="{{url('cart')}}" title="Cart" id="my_cart">
            @php 
              $cartCollection = Cart::getContent();
              $count = $cartCollection->count(); 
            @endphp
            My Cart ({{$count}})
          </a>
      </li>
    </ul>
  </div>
  @guest
    @if (Route::has('login'))
      <a class="l-navbar__login-link" href="{{url('login')}}" title="Login" aria-label="Login">
        <svg width="36px" height="36px" aria-hidden="true" focusable="false">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-account')}}"></use>
        </svg>
        <span>Login</span>
      </a>
    @endif
  @else
    {{-- <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a class="l-navbar__login-link" title="Logout" aria-label="Logout" onclick="event.preventDefault(); this.closest('form').submit();">
        <i class="fa-solid fa-user"></i>
        <span>Logout</span>
      </a>
    </form> --}}
    <ul class="l-navbar__menu">
    <li class="l-navbar__menu-item">
      <div class="dropdown">
        <a href="javascript:void(0)">
          <span class="dropbtn l-navbar__menu-link ">Account</span>
        </a>
        <div class="dropdown-Tour_content">
            <a href="{{url('account/profile')}}">My Profile</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="javascript:void(0)" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
            </form>
        </div>
      </div>
  </li>
    </ul>
  @endguest
</nav>