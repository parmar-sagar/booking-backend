<nav class="l-navbar js-navbar-scroll + +">
    <a href="{{url('/')}}" class="l-navbar__logo-link-middle">
      <img
        class="l-navbar__logo"
        src="{{asset ('assets/front/images/image_2022_11_21T04_57_12_733Z-U-bg.png')}}"
        alt="Quads Dubai"
        title="Quads Dubai"
      />
    </a>
    <button type="button" class="burger js-burger" aria-label="Open menu">
      <svg width="36px" height="36px">
        <use
          xmlns:xlink="http://www.w3.org/1999/xlink"
          xlink:href="images/icons.svg#icon-menu"
        ></use>
      </svg>
    </button>
    <a class="l-navbar__logo-link" href="index.html">
      <img
        class="l-navbar__logo"
        src="{{asset ('assets/front/images/image_2022_11_21T04_57_12_733Z-U-bg.png')}}"
        alt="Quads Dubai"
        title="Quads Dubai"
      />
    </a>
    <div class="l-navbar__menu-wrapper">
      <ul class="l-navbar__menu-right">
        <li class="l-navbar__menu-item">
          <a
            class="l-navbar__menu-link"
            href="book-a-backpacking-tour.html"
            title="Tours"
          >
            Tours
          </a>
        </li>
        <li class="l-navbar__menu-item">
          <a class="l-navbar__menu-link" href="tour-deals.html" title="Deals">
            Deals
          </a>
        </li>
        <li class="l-navbar__menu-item">
          <a
            class="l-navbar__menu-link"
            href="about-us.html"
            title="About Us"
          >
            About Us
          </a>
        </li>
        <li class="l-navbar__menu-item">
          <a class="l-navbar__menu-link" href="contact.html" title="Contact">
            Contact
          </a>
        </li>
      </ul>
    </div>
    <a
      class="l-navbar__login-link"
      href="{{url('login')}}"
      title="Login"
      aria-label="Login"
    >
    <i class="fa-solid fa-user"></i>
      <span>Login</span>
    </a>
  </nav>