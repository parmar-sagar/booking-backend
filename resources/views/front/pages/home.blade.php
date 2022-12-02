<x-front.master-layout>
  <div id="barba-wrapper">
      <div class="barba-container">
        <header class="l-header l-header--full-height l-header--curtain">
          <div class="bg-media bg-media--video"
            data-static-img="https://backpacking-tours.imgix.net/images/tmp/beach-rock-jump.jpg?w=768">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                @foreach($imgVideo as $key => $imgVideos)
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" class="{{ $loop->first ? 'active' : '' }}"
                  aria-current="true" aria-label="Slide 1" style="visibility: hidden;"></button>
               @endforeach
              </div>
              @foreach($imgVideo as $imgVideos)
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                  @if(isset($imgVideos->image_video) && $imgVideos->type ==0)
                  <img
                  src="{{ asset('admin/uploads/slider/' . $imgVideos->image_video) }}"
                  class="d-block w-100" style="width:100%;max-width:100%;" alt="...">
                  @elseIf(isset($imgVideos->image_video) && $imgVideos->type ==1)
                  <video class="img-fluid" autoplay loop muted>
                    <source src="{{ asset('admin/uploads/slider/' . $imgVideos->image_video) }}" type="video/mp4" />
                  </video>
                  @endif
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
              @endforeach
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev" style="visibility: hidden;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next" style="visibility: hidden;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="container l-header__container">
            <div class="l-header__content">
              <div class="l-header__content-left">
                <h1 class="headline-1 color-white animation-fadeInRightBig">
                  Desert Advanture for solo Travellers
                </h1>
                <p class="headline-7 color-white animation-fadeInRightBig animation-delay-1">
                  Travel & Make New Friends!
                </p>
              </div>
            </div>
            <a class="l-header__btn" href="#tours" title="Explore Tours" aria-label="Explore Tours">
              <div class="l-header__btn-icon">
                <svg width="40" height="20" aria-hidden="true" focusable="false">
                  <use xlink:href="images/icons.svg#icon-select-dropdown-icon"></use>
                </svg>
              </div>
              <span class="l-header__btn-text"> Explore Tours </span>
            </a>
          </div>
        </header>
        <main id="main" class="l-main mt-5em">
          <section class="section section--p-none-bottom">
            <div class="headline-container">
              <h2 class="headline-10 headline-pad-mob text-center">
                Our Tours
              </h2>
            </div>
            <div class="tab-box">
              <ul class="tab-box-nav js-tab-box-nav container-extra-large">
              @php $i = 0; @endphp
              @foreach($tourVehicles as $value)
              @php ++$i; 
              @endphp

                <li class="tab-box-nav__item js-tabBtn {{ $loop->first ? 'active' : '' }}" data-name="tab-{{$value['tour_id']}}">
                  <button class="tab-box-btn tab-box-btn--blue{{$i}}" type="button">
                    <span class="tab-box-btn__icon tab-box-btn__icon--blue{{$i}}">
                      <svg>
                        <use xlink:href="images/icons.svg#icon-vietnam"></use>
                      </svg>
                    </span>
                    {{$value['tour_name']}}
                  </button>
                </li>
                @endforeach
              </ul>
              @php $colors = ['bg-blue','bg-green','bg-yellow','bg-orange','bg-pink','bg-navy']; @endphp
              @foreach($tourVehicles as $key => $value)
          
              <div class="tab-box-content tab-box-content--{{ $loop->first ? 'active' : '' }} {{$colors[$key];}} border-img-top border-img-top--blue border-img-bottom border-img-bottom--blue js-tabContent"  data-content="tab-{{$value['tour_id']}}" >
                <div class="container-extra-large bg-backpack-right bg-backpack-right--sm-none bg-backpack-right--to-rt swiper swiper--trip js-trip-slider">
                  <div class="js-trip-slider-pagination swiper-pagination swiper-pagination--top"></div>
                  <div class="swiper-wrapper">
                    @foreach($value['veh'] as $key => $vehicle)
                    <div class="swiper-slide">
                      <div class="flex-box align-items-center">
                        <div
                          class="flex-box__col flex-box__col-30 pr-10em text-center"
                        >
                          <a
                            href="https://www.youtube.com/watch?v=5vP29nxEZCg"
                            class="play-video play-video--bordered play-video--no-cover rotate-left js-video animation-rollInLeft"
                            title="Watch video"
                            aria-label="Watch video"
                          >
                          <picture>
                            <img
                              src="{{ asset('admin/uploads/vehicle/' . $vehicle['image'])}}"
                              media="(max-width: 420px)"
                            />
                          </picture>
                                <img
                                  class="play-video__icon play-video__icon--width lazy"
                                  data-src="{{asset ('assets/front/images/icons/play-button.svg')}}"
                                  alt="Play Video"
                                />
                              </a>
                              <svg width="200">
                                <use
                                  xlink:href="{{asset ('assets/front/images/icons.svg#icon-watch-the-video')}}"
                                />
                              </svg>
                        </div>
                        <div
                          class="flex-box__col flex-box__col-40 animation-fadeInUp"
                        >
                          <div
                            class="card card--no-border card--shadow-blue bg-white"
                          >
                            <div
                              class="card__content card__content--padding-xl"
                            >
                              <div
                                class="card__headline card__headline--with-chip-mob card__headline--price-top-mob card__headline--with-price"
                              >
                                <div class="headline-wave">
                                  <h3 class="headline-3">{{$vehicle['name']}}</h3>
                                  <svg
                                    width="100px"
                                    height="16px"
                                    class="stroke-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xlink:href="images/icons.svg#icon-wave-squiggle"
                                    />
                                  </svg>
                                </div>
                                <div
                                  class="card__headline-price-wrapper card__headline-price-wrapper--flex-col mt-5em"
                                >
                                  <div class="card__headline-price-values">
                                    <div
                                      class="card__headline-price-main bg-blue"
                                    >
                                    {{$value['location']}}
                                      {{-- <span
                                        class="card__headline-price-was text-upper bg-blueDark"
                                      >
                                        From
                                      </span> --}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <p>Ultimate adventure!</p>
                              <ul
                                class="list-tour-info list-tour-info--two-cols"
                              >
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-calendar-range"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Length</b> <span>23 Days</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-baby-face-outline"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Avg. Age</b> <span>18-39</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-rowing"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>No. Of Activities</b> <span>30+</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-silverware-fork-knife"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>No. Of Meals</b> <span>28</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-account-multiple"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Avg. Group Size</b> <span>14 - 20</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-star"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Operator</b>
                                    <span>Quads Dubai</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-map"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Starting Point</b> <span>Hanoi</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg
                                    width="36px"
                                    height="36px"
                                    class="fill-blue"
                                    aria-hidden="true"
                                    aria-focusable="false"
                                  >
                                    <use
                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                      xlink:href="images/icons.svg#icon-map"
                                    ></use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Ending Point</b> <span>Ho Chi Minh</span>
                                  </div>
                                </li>
                              </ul>
                              <div
                                class="card__footer card__footer--with-chip pt-20em"
                              >
                                {{-- <div>
                                  <span class="chip chip--blue">
                                    Group Tour
                                  </span>
                                </div> --}}
                                <a
                                  class="btn btn--purple"
                                  href="{{url('view-detail/'.$vehicle['id'])}}"
                                  title="View now"
                                >
                                  View Detail
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="flex-box__col flex-box__col-30 pl-10em">
                          <div class="fb-review text-center">
                            <picture>
                              <img
                                class="fb-review__img rotate-right lazy animated rollInRight active loaded"
                                src="{{ asset('admin/uploads/vehicle/' . $vehicle['banner_img']) }}"
                                media="(max-width: 420px)"
                              />
                            </picture>
                            <div class="fb-review__comment">
                              <p>
                                {{$vehicle['description']}}
                              </p>
                              {{-- <p class="headline-8">
                                Mike,<br />
                                Facebook, 29 Oct 2021
                              </p> --}}
                            </div>
                            {{-- <p
                              class="headline-5 mt-10em flex flex--middle flex--center"
                            >
                              <svg
                                width="22px"
                                height="22px"
                                class="fill-white"
                                aria-hidden="true"
                                aria-focusable="false"
                              >
                                <use
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  xlink:href="images/icons.svg#icon-star"
                                ></use>
                              </svg>
                              <svg
                                width="22px"
                                height="22px"
                                class="fill-white"
                                aria-hidden="true"
                                aria-focusable="false"
                              >
                                <use
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  xlink:href="images/icons.svg#icon-star"
                                ></use>
                              </svg>
                              <svg
                                width="22px"
                                height="22px"
                                class="fill-white"
                                aria-hidden="true"
                                aria-focusable="false"
                              >
                                <use
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  xlink:href="images/icons.svg#icon-star"
                                ></use>
                              </svg>
                              <svg
                                width="22px"
                                height="22px"
                                class="fill-white"
                                aria-hidden="true"
                                aria-focusable="false"
                              >
                                <use
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  xlink:href="images/icons.svg#icon-star"
                                ></use>
                              </svg>
                              <svg
                                width="22px"
                                height="22px"
                                class="fill-white"
                                aria-hidden="true"
                                aria-focusable="false"
                              >
                                <use
                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                  xlink:href="images/icons.svg#icon-star"
                                ></use>
                              </svg>
                            </p> --}}
                            {{-- <span class="headline-9 underline">
                              Rated <span>5</span>/5 by
                              <a
                                class="color-white"
                                target="_blank"
                                href="https://www.facebook.com/backpackingtours/"
                                rel="noopener nofollow"
                              >
                                <span>1000</span> Travellers on Facebook
                              </a>
                            </span> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <button
                    class="js-trip-slider-prev swiper-button swiper-button--prev"
                    aria-label="Previous tour"
                    type="button"
                  >
                    <svg width="24" height="24">
                      <use xlink:href="images/icons.svg#icon-play-button"></use>
                    </svg>
                  </button>
                  <button
                    class="js-trip-slider-next swiper-button"
                    aria-label="Next tour"
                    type="button"
                  >
                    <svg width="24" height="24">
                      <use xlink:href="images/icons.svg#icon-play-button"></use>
                    </svg>
                  </button>
                  <div
                    class="js-trip-slider-pagination swiper-pagination"
                  ></div>
                </div>
                <p class="text-center">
                  <a
                    class="btn btn--black"
                    href="book-a-backpacking-tour8130.html?country=Vietnam"
                  >
                  View All {{$value['tour_name']}} Tours
                  </a>
                </p>
              </div>
              @endforeach
            </div>
          </section>
          <section
            class="bg-green border-img border-img-top border-img-top--green border-img-bottom border-img-bottom--green border-img--jaw"
          >
            <div class="container">
              <div class="box-photo bg-backpack-left">
                <div class="box-photo__left shadow animated fadeInUp active">
                  <div class="card"  style="border: none;">
                  <div class="card-body">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="" aria-label="Slide 1" style="visibility: hidden;" ></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" class="" style="visibility: hidden;" ></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true" style="visibility: hidden;"></button>
                      </div>
                     {{-- group discount slider --}}
                     
                      <div class="carousel-inner">
                        @foreach($discount as $discounts)
                        <div class="carousel-item active">              
                          <div class="headline-wave">
                            <h3 class="headline-2">Group Tour Deals</h3> <svg width="100px" height="16px" class="stroke-green">
                              <use xlink:href="/images/icons.svg#icon-jaw-squiggle"></use>
                            </svg>
                          </div> 
                          <p>Book a tour today and enjoy exclusive savings on any future trip you book!&nbsp;There’s no time limit
                            or expiry date on these savings.</p>
                          <div class="box-multi box-multi--line-behind">
                            <div class="box-multi__item box-multi__item--left border--green"> <span
                                class="box-multi__headline">{{$discounts->discount}}%</span><br>Discount on {{$discounts->no_of_vehicle}} Vehicles </div>
                            <div class="box-multi__item box-multi__item--right border--green"> <span
                                class="box-multi__headline">{{$discounts->discount}}%</span><br>Discount on {{$discounts->no_of_vehicle}} Vehicles </div>
                          </div> 
                            <a class=" btn btn--black " href="/tour-deals" title="Find Out More"> Find Out More </a>
                      </div>
                      @endforeach
                     
                      {{-- end --}}
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev" style="visibility:hidden;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden" style="visibility: hidden;">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next" style="visibility:hidden;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden" style="visibility: hidden;">Next</span>
                      </button>
                    </div>
                  </div>
                </div>
                </div>
                </div>
                <div class="box-photo__right box-photo-img">
                  <div class="box-photo-img__item lazy" id="image1-1669719281">
                    <img src="{{asset ('assets/front/images/kid2.jpg')}}" />
                  </div>
                  <div class="box-photo-img__item lazy" id="image2-1669719281">
                    <img src="{{asset ('assets/front/images/image-107754_2012_Yamaha_YFZ.jpg')}}" />
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section
            class="section border-img-bottom border-img-bottom--whiteOff border-img--jaw"
          >
            <div class="container-extra-large">
              <div class="fly-elements bg-backpack-right">
                <div class="fly-elements__item">
                </div>
                <div class="fly-elements__item fly-elements__item--circled">
                  <div class="circle circle--orange">
                    <svg
                      class="circle__svg circle__svg--orange"
                      id="circle-orange"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 413.808 194.818"
                    >
                      <path
                        id="Path_390"
                        data-name="Path 390"
                        d="M-14227.713,4383.438s-123.527,23.8-110.222-201.043,120.478-156.715,129.463-151.667,57.358,20.173,45.235,200.393c-5.8,86.325-33.748,90.077-54.317,117.017-22.226,29.108-36.328,56.439-38.849,74.921"
                        transform="translate(-4507.233 -13996.752) rotate(-92)"
                        fill="none"
                        stroke="#FFC132"
                        stroke-width="3"
                      />
                    </svg>
                    <p class="circle__text circle__text--pos-1">
                      Book with spread payments
                    </p>
                  </div>
                </div>
                <div class="fly-elements__item fly-elements__item--circled">
                  <div class="circle circle--blue circle--bt-lg">
                    <svg
                      class="circle__svg circle__svg--blue"
                      id="circle-blue"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 352.494 174.443"
                    >
                      <path
                        id="Path_389"
                        data-name="Path 389"
                        d="M-12927.428,3656.919s-130.209,8.949-152.374,51.9-13.343,67.706,6.34,86.322,60.453,37.69,166.963,32.289,148.719-26.519,159.068-54.121,1.979-78.218-34.775-88.658-117.82-20.336-170.39-8.35"
                        transform="translate(-12741.824 3829.863) rotate(180)"
                        fill="none"
                        stroke="#36e0dc"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="3"
                      />
                    </svg>
                    <p class="circle__text circle__text--rotate-1">
                      Sleep &amp; travel in comfort
                    </p>
                  </div>
                </div>
                <div class="fly-elements__item fly-elements__item--circled">
                  <div class="circle circle--green circle--bt-sm">
                    <svg
                      class="circle__svg circle__svg--green"
                      id="circle-green"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 336.716 197.956"
                    >
                      <path
                        id="Path_388"
                        data-name="Path 388"
                        d="M-14130.036,4193.739s-232.008,11.473-207.02-96.921,226.282-75.551,243.156-73.118,107.735,9.725,84.966,96.608c-10.907,41.616-63.39,43.425-102.021,56.413-41.743,14.033-68.23,27.208-72.965,36.119"
                        transform="translate(14340.465 -4015.586)"
                        fill="none"
                        stroke="#0fba68"
                        stroke-width="3"
                      />
                    </svg>
                    <p class="circle__text">Local, English speaking guides</p>
                  </div>
                </div>
                <div class="fly-elements__item animation-fadeInUp">
                  <div class="card card--shadow-purple bg-white">
                    <div class="card__content">
                      <div class="headline-wave">
                        <h3 class="headline-3 text-upper">About Quads Dubai</h3>
                        <svg width="100px" height="16px" class="stroke-purple">
                          <use
                            xlink:href="images/icons.svg#icon-wave-squiggle"
                          />
                        </svg>
                      </div>
                      <p>
                        We started off in 2013 with a 21-day Thailand tour.
                        Today, we offer tours in Thailand, Vietnam, Cambodia,
                        Bali, and Sri Lanka with plans to add exciting new tours
                        each year! 
                      </p>
                      <a
                        class="btn btn--black"
                        href="about.html"
                        title="Meet The Team"
                      >
                        Meet The Team
                      </a>
                    </div>
                  </div>
                </div>
                <div class="fly-elements__item">
                </div>
                <div class="fly-elements__item fly-elements__item--circled">
                  <div class="circle circle--blurple">
                    <svg
                      class="circle__svg circle__svg--blurple"
                      id="circle-blurple"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 310.56 187.691"
                    >
                      <path
                        id="Path_387"
                        data-name="Path 387"
                        d="M-13469.2,4258.492s-159.661,45.118-138.472,120.245,156.841,67.376,195.889,59.847,134.482-41.5,103.52-129.467-193.671-29.285-193.671-29.285"
                        transform="translate(13611.119 -4256.993)"
                        fill="none"
                        stroke="#f94171"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="3"
                      />
                    </svg>
                    <p class="circle__text circle__text--rotate-2">
                      Fully licensed tour operator
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="section mt-20em bg-white-top-jaw">
            <div
              class="container-extra-large bg-backpack-right bg-backpack-right--sm-none bg-backpack-right--to-rt swiper swiper--trip js-trip-slider">
              <div class="js-trip-slider-pagination swiper-pagination swiper-pagination--top"></div>
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="flex-box align-items-center ">
  
  
                    <div class="row pt-50em "
                      style="justify-content: center;align-items: center;padding-top:100px;justify-content: space-between !important;">
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand">
                          <!--<div
                                class="card__image lazy"
                                id="recent-article_01669719281"
                                data-name="recent-article_01669719281"
                                data-style="    @media screen and (max-width:420px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:1441px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }   "
                              ></div>-->
  
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand" >
                          <!--<div
                                class="card__image lazy"
                                id="recent-article_01669719281"
                                data-name="recent-article_01669719281"
                                data-style="    @media screen and (max-width:420px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:1441px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }   "
                              ></div>-->
  
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand" style="border: none;">
                          <!--<div
                                class="card__image lazy"
                                id="recent-article_01669719281"
                                data-name="recent-article_01669719281"
                                data-style="    @media screen and (max-width:420px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:1441px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }   "
                              ></div>-->
  
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="flex-box align-items-center ">
                    <div class="row pt-50em"
                      style="justify-content: center;align-items: center;padding-top:100px;justify-content: space-between !important;">
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand">
                          <!--<div
                                class="card__image lazy"
                                id="recent-article_01669719281"
                                data-name="recent-article_01669719281"
                                data-style="    @media screen and (max-width:420px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }    @media screen and (min-width:1441px) {  #recent-article_01669719281 {  background-image: url('images/iyylp09p2xc17zpk8uzz.webp')  } }   "
                              ></div>-->
  
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand">
  
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand">
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="flex-box align-items-center ">
  
                    <div class="row pt-50em "
                      style="justify-content: center;align-items: center;padding-top:100px;justify-content: space-between !important;">
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand">
  
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand">
                          <img src="images/DSC_9798-915x612-1.webp">
  
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-3 animation-delay-0 animated fadeInUp active">
                        <a class="card card--flex card--shadow-orange" href="blog/vaccines-to-travel-to-thailand.html"
                          title="Vaccines to travel to Thailand">
                          <img src="images/DSC_9798-915x612-1.webp">
                          <div class="card__content card__content--with-footer">
                            <div>
                              <p class="headline-5 color-orange">Dubai</p>
                              <div class="headline-wave">
                                <h4 class="headline-4">Dune Buggies</h4>
                                <svg width="100px" height="16px" class="stroke-orange">
                                  <use xlink:href="#icon-wave-squiggle"></use>
                                </svg>
                              </div>
                              <div class="content mt-10em">
                                Contact your local GP or hospital to make an
                                appointment as soon as possible. Ideally at least
                                four weeks before you leave. Your local GP or
                                hospital will have your vaccine history and advice
                                you on what you will need to take.
                              </div>
                            </div>
                            <div class="card__footer">
                              <div>
                                <span class="chip chip--orange">General Info</span>
                              </div>
                              <span class="btn-link">Read More</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button class="js-trip-slider-prev swiper-button swiper-button--prev" aria-label="Previous tour"
                type="button">
                <svg width="24" height="24">
                  <use xlink:href="images/icons.svg#icon-play-button"></use>
                </svg>
              </button>
              <button class="js-trip-slider-next swiper-button" aria-label="Next tour" type="button">
                <svg width="24" height="24">
                  <use xlink:href="images/icons.svg#icon-play-button"></use>
                </svg>
              </button>
              <div class="js-trip-slider-pagination swiper-pagination"></div>
            </div>
            <p class="text-center">
              <a class="btn btn--black" href="book-a-backpacking-tour8130.html?country=Vietnam">
                See All Popular Tours
              </a>
            </p>
          </section>
        </main>
      </div>
    </div>
  </x-front.master-layout>