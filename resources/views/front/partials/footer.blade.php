<footer class="l-footer">
  <div class="l-footer__logo">
    <a href="{{ url('/') }}" title="Quads Dubai" aria-label="Quads Dubai Homepage">
      <img width="250px" height="70px" class="l-navbar__logo" src="{{asset ('assets/front/images/image_2022_11_21T04_57_12_733Z-U-bg-color.png')}}" alt="Quads Dubai" title="Quads Dubai"/>
    </a>
    <div class="l-footer__social">
      <ul class="social-media">
        <li class="social-media__item">
          <a class="l-footer__social-link social-media__link" target="_blank" rel="noopener noreferrer" href="#" aria-label="Our Facebook" title="Our Facebook">
            <svg width="43.14px" height="43.14px" class="social-media__icon">
              <use xlink:href="{{asset('assets/front/images/icons.svg#icon-facebook')}}"></use>
            </svg>
          </a>
        </li>
        <li class="social-media__item">
          <a class="l-footer__social-link social-media__link" target="_blank" rel="noopener noreferrer" href="#" aria-label="Our Instagram" title="Our Instagram">
            <svg width="43.14px" height="43.14px" class="social-media__icon">
              <use xlink:href="{{asset('assets/front/images/icons.svg#icon-instagram')}}"></use>
            </svg>
          </a>
        </li>
        <li class="social-media__item">
          <a class="l-footer__social-link social-media__link" target="_blank" rel="noopener noreferrer" href="#" aria-label="Our YouTube" title="Our YouTube">
            <svg width="43.14px" height="43.14px" class="social-media__icon">
              <use xlink:href="{{asset('assets/front/images/icons.svg#icon-youtube')}}"></use>
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="l-footer__nav">
    <ul class="l-footer__menu">
      <li class="l-footer__menu--item">
        <span class="headline-4 l-footer__menu-list-link l-footer__menu-list-link--main">
          Tours
        </span>
        <ul class="l-footer__menu-list">
          @php
            $tours = App\Models\Tour::has('vehicles')->active()->Sequence()->get();
          @endphp
          @foreach ($tours as $value)
            <li class="l-footer__menu-list-item">
              <a class="l-footer__menu-list-link" href="{{url('tours/'.$value->random_id)}}" title="{{ $value->name }}">
                {{ $value->name }}
              </a>
            </li>  
          @endforeach
          <li class="l-footer__menu-list-item">
            <a class="l-footer__menu-list-link" href="{{url('tours')}}" title="All Other Tours">
              All Other Tours
            </a>
          </li> 
        </ul>
      </li>
      <li class="l-footer__menu--item">
        <span class="headline-4 l-footer__menu-list-link l-footer__menu-list-link--main">
          About Us
        </span>
        <ul class="l-footer__menu-list">
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('about-us')}}" title="About Us" > About Us </a> 
          </li>
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('why-choose-us')}}" title="Why Choose Us" > Why Choose Us </a> 
          </li>
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('refund-policy')}}" title="Refund Policy" > Refund Policy </a> 
          </li>
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('contact-us')}}" title="Contact Us" > Contact Us </a> 
          </li>
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('privacy-policy')}}" title="privacy-policy" > Privacy & Policy </a> 
          </li>
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('terms-and-conditions')}}" title="terms & conditions" > Terms & Conditions </a> 
          </li>
        </ul>
      </li>
      <li class="l-footer__menu--item"> 
        <span class="headline-4 l-footer__menu-list-link l-footer__menu-list-link--main" > Useful pages </span> 
        <ul class="l-footer__menu-list"> 
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('faqs')}}" title="FAQs" > FAQs </a> 
          </li>
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('deals')}}" title="Deals" > Deals </a> 
          </li>
          <li class="l-footer__menu-list-item">
            <a class="l-footer__menu-list-link" href=" @if (Auth::check()){{url('my-account')}}@else {{url('login')}}@endif" title="My Account">
                My Account
            </a>
          </li>
          <li class="l-footer__menu-list-item"> 
            <a class="l-footer__menu-list-link" href="{{url('reviews')}}" title="Reviews" > Reviews </a> 
          </li>
        </ul> 
      </li>
    </ul>
    <div class="l-footer__copy">
      <p>© 2022. All Rights Reserved. Design by Quadas Dubai</p>
    </div>
  </div>
</footer>
<div class="border-img-bottom border-img-bottom--purple barba-transition barba-transition--hide">
</div>
<img class="barba-transition__logo js-barba-logo" data-src="/images/barba-logo-new.png" alt=""/>