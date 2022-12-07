<x-front.master-layout>
    <div id="barba-wrapper">
        <div class="barba-container">
            <nav class="l-submenu l-submenu--blurple border-img-bottom border-img-bottom--blurple">
                <div class="l-submenu__scroll row row--10 align-items-center justify-content-start">
                    <div class="col-6 p-3">
                    </div>
                </div>
            </nav>
            <main>
                <div class="section" style="padding-top:unset;">
                    <div class="row row--g-10">
                        <div class="col-12 col-lg-7 col-xl-7 col-xxl-5 offset-xxl-1">
                            <header>
                                <div class="headline-wave animation-fadeInLeft">
                                    <h1 class="headline-2">{{$singlePrdct->name}}</h1> <svg width="100px" height="16px"
                                        class="stroke-blurple">
                                        <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                    </svg>
                                </div>
                                <div class="content mt-10em animation-fadeInLeft animation-delay-1">
                                    <p>{{$singlePrdct->description}}</p>
                                </div>
                            </header>
                            <div class="video-images">
                                <figure class="video-images__left-img">
                                    <picture>
                                            <img class=" "
                                            src="{{ asset('admin/uploads/vehicle/' . $singlePrdct->image)}}"
                                            alt="">
                                    </picture>
                                </figure>
                                <figure class="video-images__main-img">
                                        <picture>
                                            <img class=" "
                                                src="{{ asset('admin/uploads/vehicle/' . $singlePrdct->banner_img)}}"
                                                alt="">
                                        </picture> 
                                        </figure>
                                <figure class="video-images__right-img">
                                    <picture>
                                        <img class=" "
                                            src="{{ asset('admin/uploads/vehicle/' . $singlePrdct->image)}}"
                                            alt="">
                                    </picture>
                                </figure>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-5">
                                    <div class="list-icon-wrapper">
                                        <ul class="list-icon list-icon--tick">
                                            @foreach($include as $includes)
                                            <li>{{$includes->title}}</li>
                                            @endforeach
                                        </ul>
                                        <ul class="list-icon list-icon--cross">
                                            @foreach($notInclude as $notInclude)
                                            <li>{{$notInclude->title}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                              
                                <div class="col-md-7">
                                    <blockquote class="blockquote blockquote--margin-sm blockquote--blurple">
                                        <ul
                                        class="list-tour-info list-tour-info--two-cols"
                                      >
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Min Age</b> <span>{{$list->min_age}}Yrs</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Pickup & Drop off</b> <span>{{$list->pickup_and_drop}}</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Ride Duration</b> 
                                            @foreach($time as $times)
                                            <span>{{$times->time}}@if($times->time_type == 'Minutes'){{ 'Mins'}} @else {{'Hours'}} @endif</span>
                                            @endforeach
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Convoy Leader</b> <span>{{$list->convoy_leader}}</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Tour Guide</b> <span>{{$list->tour_guide}}</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Safety Gears</b>
                                            @foreach($refreshment as $refreshments)
                                            <span>{{$refreshments->title}}</span>
                                            @endforeach
                                            
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Refreshments</b>
                                            @foreach($saftyGear as $saftyGears)
                                            <span>{{$saftyGears->title}}</span>
                                            @endforeach
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                          <div class="list-tour-info__item-desc">
                                            <b>Available Everyday</b> <span>Sunrise to Sunset</span>
                                          </div>
                                        </li>
                                      </ul>
                                    </blockquote>
                                </div>
                            </div>
                            <a class="btn btn--purple" href="{{url('add-to-cart/'.$singlePrdct->random_id)}}" title="View Tour Dates"> Book Now </a>
                        </div>
                        <div class="col-12 col-lg-5 col-xl-5 col-xxl-4 offset-xxl-1">
                            <div class="animation-fadeInUp mb-30em">
                                <div class="card card--shadow-blurple">
                                    <div class="card__content">
                                        <div
                                            class="card__headline card__headline--with-price card__headline--extra-bottom-margin">
                                            <div class="card__headline-left headline-wave">
                                                <h2 class="headline-3 text-upper">{{$singlePrdct->name}}</h2> <svg width="100px"
                                                    height="16px" class="stroke-blurple">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle" />
                                                </svg>
                                            </div>
                                            <div class="card__headline-price-wrapper">
                                                <div
                                                    class="card__headline-price-values card__headline-price-values--align-right">
                                                    <div
                                                        class="card__headline-price-main card__headline-price-main--large bg-blurple">
                                                        £1460 <span
                                                            class="card__header-price-label bg-blurpleDark text-upper">from</span>
                                                    </div> <b class="card__headline-price-info-pay">Pay £250 deposit</b>
                                                    <div class="card__headline-price-info"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="content mt-10em mb-10em">
                                            <p> Absolutely epic! Cliff temples in Uluwatu, sunset at Tanah Lot, SUP in
                                                Nusa Lembongan, so many waterfalls, snorkel with sea turtles, Gili T
                                                beaches and more. </p>
                                        </div> --}}
                                        {{-- <ul class="list-tour-info list-tour-info--two-cols">
                                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-calendar-range"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b>Length</b> <span>18
                                                        Days</span> </div>
                                            </li>
                                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-rowing"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b>No. Of Activities</b>
                                                    <span>30+</span> </div>
                                            </li>
                                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-silverware-fork-knife"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b>No. Of Meals</b>
                                                    <span>23</span> </div>
                                            </li>
                                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-account-multiple"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b>Avg. Group Size</b> <span>16
                                                        - 24</span> </div>
                                            </li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card card--shadow-purple bg-purple animation-fadeInUp">
                                <div class="card__content">
                                    <div class="headline-wave">
                                        <h3 class="headline-4">Price: ( Per Vehicle )</h3> <svg width="100px"
                                            height="16px" class="stroke-blurple">
                                            <use xlink:href="images/icons.svg#icon-wave-squiggle" />
                                        </svg>
                                    </div>
                                    <div class="content mt-5em">
                                        <p> Keep up to date with us on social media. </p>
                                    </div>
                                    <ul class="list-icon list-icon--tick list-1-cols list-mobile-limit js-limit-list">
                                        <li>30 Mins Ride : 1200 AED</li>
                                        <li>60 Mins Ride : 1600 AED</li>
                                        <li>90 Mins Ride : 2700 AED</li>
                                        <li>120 Mins Ride : 3000 AED</li>
                                    </ul>
                                        {{-- <ul class="list-tour-info list-tour-info--two-cols">
                                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-calendar-range"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b> Minimum age for rider </b> <span>+16
                                                        Years</span> </div>
                                            </li>
                                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-rowing"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b>Minimum age for passenger </b>
                                                    <span>5+</span> </div>
                                            </li>
                                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-silverware-fork-knife"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b>Please note that the price is per vehicle</b>
                                                    <span></span> </div>
                                            </li>
                                            <!-- <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                                    class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xlink:href="images/icons.svg#icon-account-multiple"></use>
                                                </svg>
                                                <div class="list-tour-info__item-desc"> <b>Avg. Group Size</b> <span>16
                                                        - 24</span> </div>
                                            </li> -->
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                {{-- <section
                    class=" section border-img-top border-img-top--blurple border-img-bottom border-img-bottom--blurple bg-blurple ">
                    <h2 class="headline-2 text-center mb-10em"> Tour Itinerary </h2>
                    <div class="row row--g-10">
                        <div class="col-lg-12 col-xxl-10 offset-xxl-1">
                            <div class="row row--g-40 js-show-hidden-cards">
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/c0/b5/45/caption.jpg?w=1200&h=-1&s=1"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/c0/b5/45/caption.jpg?w=1200&h=-1&s=1"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/c0/b5/45/caption.jpg?w=1200&h=-1&s=1"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/c0/b5/45/caption.jpg?w=1200&h=-1&s=1"
                                                                width="1666" height="2500" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day1/bali-backpackingtours-activities-day1-8_xwitb.jpg?w=390&h=270&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day1/bali-backpackingtours-activities-day1-8_xwitb.jpg?w=710&h=490&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day1/bali-backpackingtours-activities-day1-8_xwitb.jpg?w=400&h=300&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day1/bali-backpackingtours-activities-day1-8_xwitb.jpg?w=540&h=390&crop=faces&q=75&auto=format&fm=png"
                                                                width="2500" height="1666" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 1</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">Desert Adventure Beginnings</h3> <svg width="100px"
                                                    height="16px" class="stroke-blurple" aria-hidden="true"
                                                    focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Time to begin your Bali tour! Settle in at the hotel, meet your tour
                                                    guide, and get to know your travel mates before a complimentary
                                                    welcome dinner that samples Bali's most delicious dishes. Then, a
                                                    night out in the beach town of Kuta. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Dinner</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=mrx9yknU0_Y"
                                                    title="Watch Day 1 Video"> Watch Day 1 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://clubbable.blob.core.windows.net/medias/Dubai-dune-buggy-tour?timestamp=637528717022479644"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://clubbable.blob.core.windows.net/medias/Dubai-dune-buggy-tour?timestamp=637528717022479644"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://clubbable.blob.core.windows.net/medias/Dubai-dune-buggy-tour?timestamp=637528717022479644"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://clubbable.blob.core.windows.net/medias/Dubai-dune-buggy-tour?timestamp=637528717022479644"
                                                                width="2500" height="1666" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day2/bali-backpackingtours-activities-day2_ooknp.jpg?w=390&h=270&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day2/bali-backpackingtours-activities-day2_ooknp.jpg?w=710&h=490&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day2/bali-backpackingtours-activities-day2_ooknp.jpg?w=400&h=300&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day2/bali-backpackingtours-activities-day2_ooknp.jpg?w=540&h=390&crop=faces&q=75&auto=format&fm=png"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 2</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">Desert Sight Seeing</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Soak in the sights of Bali’s 1000 year-old, cliffside temple -
                                                    Uluwatu! We make the most of the morning exploring before heading
                                                    for a language lesson to set you up for the trip. Then some quality
                                                    beach time on one of Bali's most scenic beaches. Sunset beer me,
                                                    please! </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=0MAhwd9DMjM"
                                                    title="Watch Day 2 Video"> Watch Day 2 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0c/01/62/a7.jpg?imgeng=m_box/w_1418/h_946"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0c/01/62/a7.jpg?imgeng=m_box/w_1418/h_946"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0c/01/62/a7.jpg?imgeng=m_box/w_1418/h_946"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0c/01/62/a7.jpg?imgeng=m_box/w_1418/h_946"
                                                                width="2500" height="1666" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day3/bali-backpackingtours-activities-day3-13_yijdh.jpg?w=390&h=270&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day3/bali-backpackingtours-activities-day3-13_yijdh.jpg?w=710&h=490&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day3/bali-backpackingtours-activities-day3-13_yijdh.jpg?w=400&h=300&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day3/bali-backpackingtours-activities-day3-13_yijdh.jpg?w=540&h=390&crop=faces&q=75&auto=format&fm=png"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 3</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">Desert Safari</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil labore rerum maxime ipsam voluptates molestiae cum similique vero enim sint. Doloribus quasi eligendi dolore ducimus? </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=M_w1qHMmn5w"
                                                    title="Watch Day 3 Video"> Watch Day 3 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0b/ce/b3/ff.jpg?imgeng=m_box/w_1418/h_946"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0b/ce/b3/ff.jpg?imgeng=m_box/w_1418/h_946"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0b/ce/b3/ff.jpg?imgeng=m_box/w_1418/h_946"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://img.trvcdn.net/https://media.tacdn.com/media/attractions-splice-spp-720x480/0b/ce/b3/ff.jpg?imgeng=m_box/w_1418/h_946"
                                                                width="2500" height="1666" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day4/bali-backpackingtours-activities-day4-10_gcxkc.jpg?w=390&h=270&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day4/bali-backpackingtours-activities-day4-10_gcxkc.jpg?w=710&h=490&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day4/bali-backpackingtours-activities-day4-10_gcxkc.jpg?w=400&h=300&crop=faces&q=75&auto=format&fm=png"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://backpacking-tours.imgix.net/storage/uploads/whats-included/bali/day4/bali-backpackingtours-activities-day4-10_gcxkc.jpg?w=540&h=390&crop=faces&q=75&auto=format&fm=png"
                                                                width="2500" height="1667" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 4</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">Night Desert</h3> <svg width="100px"
                                                    height="16px" class="stroke-blurple" aria-hidden="true"
                                                    focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati culpa tempore dolores fugiat quasi, voluptatum nam, quae eligendi veritatis sed cumque iusto! Iure incidunt dolorem officiis cumque eveniet optio impedit! </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=tO9-NLEGnLo"
                                                    title="Watch Day 4 Video"> Watch Day 4 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                width="2500" height="1667" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://res.cloudinary.com/hello-tickets/image/upload/c_limit,f_auto,q_auto,w_768/v1643251224/post_images/dubai-132/Desierto/RichardZhou-Dune-Buggy.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 5</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem ipsum</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam ratione quo ea nulla culpa placeat, saepe sunt unde quam, facere aspernatur ullam possimus earum minus repellat delectus commodi recusandae magni fugit excepturi, temporibus voluptates modi in ad. Nesciunt atque similique sed sequi nemo, quaerat ea saepe, repudiandae, ut tenetur ipsum. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hostel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=-w46ejQy7tI"
                                                    title="Watch Day 5 Video"> Watch Day 5 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                width="2500" height="1871" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://cdn.livepress.me/wp-content/uploads/sites/143/2022/08/02211527/DDR-Black-quadbike-Dubai-Dunes-Ride.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 6</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem ipsum</h3> <svg width="100px"
                                                    height="16px" class="stroke-blurple" aria-hidden="true"
                                                    focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto voluptates pariatur ea quod quisquam, eum fugit repellat delectus possimus vero non exercitationem culpa voluptatum similique, totam molestiae? Unde placeat, reiciendis necessitatibus harum delectus quas iusto ut sit voluptatibus aspernatur excepturi, culpa quae obcaecati? Saepe, sunt!. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hostel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=dHueD0L45wE"
                                                    title="Watch Day 6 Video"> Watch Day 6 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                width="2500" height="1666" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://destination-dubai.fr/2960-large_default/excursion-nocturne-buggy-desert-polaris-rzr.jpg"
                                                                width="2500" height="1667" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 7</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3"> lorem ipsum</h3>
                                                <svg width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum, aliquam? Voluptatem neque excepturi at sit sequi, quas provident, consequatur laudantium saepe deserunt repellendus voluptatibus accusantium nulla laboriosam exercitationem tempora sint animi suscipit architecto. At, optio! </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=J_f5DLmfOHs"
                                                    title="Watch Day 7 Video"> Watch Day 7 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                width="2500" height="1667" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://cdn.getyourguide.com/img/tour/58cbfc3a27943.png/146.jpg"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 8</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem Ipsum</h3>
                                                <svg width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ea quo et laboriosam possimus doloremque veritatis quod molestiae repudiandae soluta eum, delectus vitae error impedit rerum voluptas in accusantium, obcaecati quisquam. Quidem voluptates quisquam voluptatem alias accusantium quo rem, beatae, eveniet minus maxime expedita minima. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast, Lunch</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=qG1aCL-ukYs"
                                                    title="Watch Day 8 Video"> Watch Day 8 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://media.tacdn.com/media/attractions-splice-spp-674x446/0b/91/2a/b9.jpg"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 9</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem Ipsum</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut sint aspernatur ullam placeat omnis illo natus laboriosam molestiae quod. Quos fugit hic possimus similique quisquam fugiat unde voluptate blanditiis, ullam, perferendis voluptas, architecto dolorem illum. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=p2q8i7VETFI"
                                                    title="Watch Day 9 Video"> Watch Day 9 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.abudhabi-desert-safari.com/assets/images/abu-dhabi-dune-buggy-tour.jpg"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 10</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem Ipsum</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium aut officiis quia iusto repudiandae optio, eum numquam sit culpa illum repellendus autem iste porro ipsa neque, molestias tempore velit architecto expedita nesciunt? Debitis deleniti enim repellendus eum rerum, maiores assumenda.. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=EgOtem0biUk"
                                                    title="Watch Day 10 Video"> Watch Day 10 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://i.pinimg.com/736x/27/7b/95/277b95e8e06414fb015126f62eb3e2bd.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 11</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem ipsum</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam incidunt reprehenderit vitae explicabo cupiditate et aliquid iusto, consectetur numquam dolores repellat id commodi dolore iure rerum iste ullam sequi eius tenetur, asperiores nisi? Ipsa obcaecati voluptas, ea alias corrupti possimus dicta hic harum natus veritatis. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=5R1H5QIVXg8"
                                                    title="Watch Day 11 Video"> Watch Day 11 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.easevisa.com/wp-content/uploads/2022/08/can-nam.jpg"
                                                                width="2500" height="1694" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 12</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem Ipsum</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, dolor iste quidem nam sed iure vel odio rem nesciunt similique. Facilis quia hic voluptates. Fuga possimus atque velit veritatis ea beatae quod. Aut, quod. Magnam. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=Y7Y0081L53A"
                                                    title="Watch Day 12 Video"> Watch Day 12 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.jtrholidays.com/static/img/bucket/Tours/UAE/Dubai/Desert-Safari-Tours/Morning-Dune-Buggy-safari/dune-buggy-safari-02.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 13</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">Lorem Ipsum</h3> <svg width="100px"
                                                    height="16px" class="stroke-blurple" aria-hidden="true"
                                                    focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam cumque aliquam architecto suscipit sunt minus eligendi, similique saepe ullam. Autem aspernatur delectus deserunt earum officiis voluptate fuga ipsa maiores obcaecati. </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=cakc-WiVd8o"
                                                    title="Watch Day 13 Video"> Watch Day 13 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                width="2500" height="1667" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>

                                                        

                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://www.buggydubai.com/wp-content/uploads/2020/12/buggy-rental-dubai.jpeg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 14</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem Ipsum</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates architecto consequuntur, corporis rem fugit expedita, a nisi quam quisquam omnis nobis alias vitae quibusdam nostrum, est similique odio quae reprehenderit?
                                                </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=cakc-WiVd8o"
                                                    title="Watch Day 14 Video"> Watch Day 14 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/7365/SITours/polaris-rzr-1000-dune-buggy-self-drive-desert-adventure-in-dubai-425649.jpg"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 15</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">Lorem Ipsum
                                                </h3> <svg width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, provident molestiae? Illum fugiat animi cumque praesentium consequuntur sit, voluptatem odio ipsum maiores? Vitae illum alias cum sapiente enim dolor tenetur, doloribus nobis debitis quis doloremque quo maiores fugit corrupti? </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=xBZ0PjWmo7Q"
                                                    title="Watch Day 15 Video"> Watch Day 15 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://deserteveningsafari.com/wp-content/uploads/2022/07/1-1.png"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 16</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem ipsume</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, quasi, tempora ducimus odit vitae eius vero at debitis a optio id. Omnis ab eius corporis ipsa repellat accusamus sapiente ullam. Quia praesentium iusto sunt? </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast, Dinner</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>VIP Camping</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=X1Ui47RsWdw"
                                                    title="Watch Day 16 Video"> Watch Day 16 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-0  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://luxurydesertadventure.com/wp-content/uploads/2022/11/polaris-rzr-03.jpg"
                                                                width="2500" height="1668" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 17</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem Ipsum</h3> <svg
                                                    width="100px" height="16px" class="stroke-blurple"
                                                    aria-hidden="true" focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus voluptate ad quasi at voluptates eum culpa alias ducimus. Laborum consequuntur quibusdam similique fuga, a recusandae? </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast, Dinner</span> </div>
                                                </li>
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-hotel"></use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Accommodation</b>
                                                        <span>Hotel</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=fgsL7ACY1MY"
                                                    title="Watch Day 17 Video"> Watch Day 17 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                                <div class=" col-lg-6 animation-fadeInUp animation-delay-1  hide  ">
                                    <article class="card card--shadow card--flex">
                                        <div class="card__image card__image--slider">
                                            <div class="swiper js-tour-itinerary-slider">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                width="1875" height="2500" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <picture>
                                                            <source
                                                                data-srcset="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                media="(max-width: 420px)">
                                                            <source
                                                                data-srcset="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                media="(max-width: 768px)">
                                                            <source
                                                                data-srcset="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                media="(max-width: 1440px)"> <img class="swiper-lazy "
                                                                data-src="https://149702083.v2.pressablecdn.com/wp-content/uploads/2019/10/Dune-Buggy-Tours_-Bigreddxb.jpeg"
                                                                width="2500" height="1875" alt="">
                                                        </picture>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white">
                                                        </div>
                                                    </div>
                                                </div> <button class="swiper-button-prev" type="button"
                                                    aria-label="Previous image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button> <button class="swiper-button-next"
                                                    aria-label="Next image"> <svg width="40" height="40">
                                                        <use xlink:href="images/icons.svg#icon-play-button"></use>
                                                    </svg> </button>
                                            </div>
                                        </div>
                                        <div class="card__content card__content--plan bg-white"> <span
                                                class="card__content-day">Day 18</span>
                                            <div class="headline-wave">
                                                <h3 class="headline-3">lorem Ipsum</h3> <svg width="100px"
                                                    height="16px" class="stroke-blurple" aria-hidden="true"
                                                    focusable="false">
                                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                                </svg>
                                            </div>
                                            <div class="content mt-10em mb-10em">
                                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis excepturi nihil placeat saepe velit voluptatem voluptatum! Nostrum minus dolorem atque! Quae, quos numquam? Nam! </p>
                                            </div>
                                            <ul class="list-tour-info list-tour-info--two-cols">
                                                <li class="list-tour-info__item"> <svg width="48px" height="48px"
                                                        class="fill-blurple" aria-hidden="true" focusable="false">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xlink:href="images/icons.svg#icon-silverware-fork-knife">
                                                        </use>
                                                    </svg>
                                                    <div class="list-tour-info__item-desc"> <b>Meals Included</b>
                                                        <span>Breakfast</span> </div>
                                                </li>
                                            </ul>
                                            <div
                                                class="card__footer card__footer--flex-mobile pt-25em text-center-on-mobile">
                                                <a class="btn-link btn-link--black js-video"
                                                    href="https://www.youtube.com/watch?v=wJAyf-9UQv"
                                                    title="Watch Day 18 Video"> Watch Day 18 Video </a> <a
                                                    class="btn btn--black" href="bali-backpacking-tour/gallery.html"
                                                    title="View Gallery"> View Gallery </a> </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <p class="text-center"> <button type="button" class="btn btn--purple"
                                    onclick="javascript:App.showHiddenCards({obj: this, target: '.js-show-hidden-cards' });">Load
                                    more</button> </p>
                        </div>
                    </div>
                </section>
                <section
                    class=" section border-img-top border-img-top--blurple border-img-bottom border-img-bottom--blurple bg-blurple ">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="headline-2 text-center mb-10em"> Tour Map </h2>
                                <picture>
                                    <source
                                        data-srcset="https://backpacking-tours.imgix.net/storage/uploads/tours/bali/maps/bali-stripped_sjgiu.svg?w=180&h=120&crop=faces&q=75&auto=format&fm=png"
                                        media="(max-width: 420px)">
                                    <source
                                        data-srcset="https://backpacking-tours.imgix.net/storage/uploads/tours/bali/maps/bali-stripped_sjgiu.svg?w=360&h=240&crop=faces&q=75&auto=format&fm=png"
                                        media="(max-width: 768px)">
                                    <source
                                        data-srcset="https://backpacking-tours.imgix.net/storage/uploads/tours/bali/maps/bali-stripped_sjgiu.svg?w=400&h=270&crop=faces&q=75&auto=format&fm=png"
                                        media="(max-width: 1440px)"> <img class=" lazy"
                                        data-src="https://backpacking-tours.imgix.net/storage/uploads/tours/bali/maps/bali-stripped_sjgiu.svg?w=390&h=260&crop=faces&q=75&auto=format&fm=png"
                                        alt="">
                                </picture>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section section--p-small-bottom">
                    <div class="row row--g-10">
                        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                            <div class="headline-wave headline-wave--center mb-10em animation-fadeInLeft">
                                <h2 class="headline-3">Additional Information</h2> <svg width="100px" height="16px"
                                    class="stroke-blurple">
                                    <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                                </svg>
                            </div>
                            <ul class="list-icon list-icon--tick list-3-cols list-mobile-limit js-limit-list">
                                <li>Not recommended for travelers with back problems</li>
                                <li>Not recommended for pregnant travelers</li>
                                <li>No heart problems or other serious medical conditions</li>
                                <li>The car will be waiting at pickup location for the maximum of 15 minutes later than the pickup time given</li>
                                <li>The pick and transfers will be shared with other guests unless it is booked for a private one with additional price</li>
                                <li>Additional services like dune bashing and camel ride are available upon request with additional cost</li>
                                <li>Sandboarding is complimentary for all bookings</li>
                                <li>Most travelers can participate</li>
                                <li>This experience requires good weather. If it’s canceled due to poor weather, you’ll be offered a different date or a full refund</li>
                            </ul>
                            <p class="list-mobile-limit-button"> <button type="button"
                                    class="btn btn--small btn--orange"
                                    onclick="App.showAllTheRest({targetListClass: 'js-limit-list', obj: this})">Show
                                    More</button> </p>
                        </div>
                    </div>
                </section>
                <section class="section bg-white-top-jaw mt-20em">
                    <div class="section__wrapper">
                        <div class="headline-wave headline-wave--center">
                            <h3 class="headline-3">Learn More About The Tour</h3> <svg width="100px" height="16px"
                                class="stroke-blurple">
                                <use xlink:href="images/icons.svg#icon-jaw-squiggle" />
                            </svg>
                        </div>
                        <div class="row row--g-10 row--hidden-overflow mt-20em">
                            <div class="col-lg-12 col-xxl-10 offset-xxl-1">
                                <div class="row row--g-20">
                                    <div class="col-lg-4 animation-fadeInUp animation-delay-0"> <a
                                            class="card card--flex card--shadow-blurple"
                                            href="blog/5-must-see-temples-in-bali.html"
                                            title="5 Must-See Temples In Bali">
                                            <div class="card__image lazy" id="recent-article_01667451235"
                                                data-name="recent-article_01667451235" style="background: url('https://res.cloudinary.com/thrillophilia/image/upload/c_fill,f_auto,fl_progressive.strip_profile,g_auto,h_600,q_auto,w_auto/v1/filestore/r6q0mj39lzh1n5f3wmn078mofixd_1595497538_shutterstock_471439322.jpg');background-size:cover;"
                                                data-style="    @media screen and (max-width:420px) {  #recent-article_01667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/5-bali-temple/bali-backpackingtours-activities-day2_hyksk4d47.png?w=360&amp;h=340&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #recent-article_01667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/5-bali-temple/bali-backpackingtours-activities-day2_hyksk0001.png?w=750&amp;h=400&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #recent-article_01667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/5-bali-temple/bali-backpackingtours-activities-day2_hyksk45c7.png?w=470&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:1441px) {  #recent-article_01667451235 {  background-image: url('https://img.grouponcdn.com/deal/Yi375XYP3efm8aEGNZzVESSkpiz/Yi-817x490/v1/c870x524.jpg')  } }   ">
                                            </div>
                                            <div class="card__content card__content--with-footer">
                                                <div>
                                                    <p class="headline-5 color-blurple">Dubai</p>
                                                    <div class="headline-wave">
                                                        <h4 class="headline-4">Lorem ipsum dolor sit amet.</h4> <svg
                                                            width="100px" height="16px" class="stroke-blurple">
                                                            <use xlink:href="images/icons.svg#icon-wave-squiggle" />
                                                        </svg>
                                                    </div>
                                                    <div class="content mt-10em"> There are over 20,000 temples in Bali.
                                                        Some of these architectural wonders have stood for over 1,000
                                                        years and no two temples (at least on this list) are alike.
                                                    </div>
                                                </div>
                                                <div class="card__footer">
                                                    <div> <span class="chip chip--blurple">Experiences</span> </div>
                                                    <span class="btn-link">Read More</span>
                                                </div>
                                            </div>
                                        </a> </div>
                                    <div class="col-lg-4 animation-fadeInUp animation-delay-1"> <a
                                            class="card card--flex card--shadow-blurple"
                                            href="blog/8-epic-experiences-you-can-only-have-in-bali.html"
                                            title="8 Epic Experiences You Can ONLY Have In Bali">
                                            <div class="card__image lazy" id="recent-article_11667451235"
                                                data-name="recent-article_11667451235" style="background: url('https://res.cloudinary.com/thrillophilia/image/upload/c_fill,f_auto,fl_progressive.strip_profile,g_auto,h_600,q_auto,w_auto/v1/filestore/r6q0mj39lzh1n5f3wmn078mofixd_1595497538_shutterstock_471439322.jpg');background-size:cover;"
                                                data-style="    @media screen and (max-width:420px) {  #recent-article_11667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/8-epic-experiences-you-can-only-have-in-bali/bali-epic-experience-6_xtpxz4d47.png?w=360&amp;h=340&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #recent-article_11667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/8-epic-experiences-you-can-only-have-in-bali/bali-epic-experience-6_xtpxz0001.png?w=750&amp;h=400&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #recent-article_11667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/8-epic-experiences-you-can-only-have-in-bali/bali-epic-experience-6_xtpxz45c7.png?w=470&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:1441px) {  #recent-article_11667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/8-epic-experiences-you-can-only-have-in-bali/bali-epic-experience-6_xtpxz45c7.png?w=470&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }   ">
                                            </div>
                                            <div class="card__content card__content--with-footer">
                                                <div>
                                                    <p class="headline-5 color-blurple">Dubai</p>
                                                    <div class="headline-wave">
                                                        <h4 class="headline-4">Lorem, ipsum dolor.</h4> <svg width="100px" height="16px"
                                                            class="stroke-blurple">
                                                            <use xlink:href="images/icons.svg#icon-wave-squiggle" />
                                                        </svg>
                                                    </div>
                                                    <div class="content mt-10em"> Bali is a small, pint-sized island
                                                        tucked away amongst thousands of other idyllic Indonesian
                                                        islands and islets. Though it is one of many, the aptly-named
                                                        ‘Island Of The Gods’ offers so much that you won’t find anywhere
                                                        else on the planet. </div>
                                                </div>
                                                <div class="card__footer">
                                                    <div> <span class="chip chip--blurple">Experiences</span> <span
                                                            class="chip chip--blurple">Flights</span> </div> <span
                                                        class="btn-link">Read More</span>
                                                </div>
                                            </div>
                                        </a> </div>
                                    <div class="col-lg-4 animation-fadeInUp animation-delay-2"> <a
                                            class="card card--flex card--shadow-blurple"
                                            href="blog/5-reasons-to-visit-nusa-lembongan-right-now.html"
                                            title="5 Reasons To Visit Nusa Lembongan Right Now">
                                            <div class="card__image lazy" id="recent-article_21667451235"
                                                data-name="recent-article_21667451235" style="background: url('https://res.cloudinary.com/thrillophilia/image/upload/c_fill,f_auto,fl_progressive.strip_profile,g_auto,h_600,q_auto,w_auto/v1/filestore/r6q0mj39lzh1n5f3wmn078mofixd_1595497538_shutterstock_471439322.jpg');background-size:cover;"
                                                data-style="    @media screen and (max-width:420px) {  #recent-article_21667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/nusa-lembongan-bali/nusa-lembongan-bali-backpacking-tours-2_rjawl4d47.png?w=360&amp;h=340&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #recent-article_21667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/nusa-lembongan-bali/nusa-lembongan-bali-backpacking-tours-2_rjawl0001.png?w=750&amp;h=400&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #recent-article_21667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/nusa-lembongan-bali/nusa-lembongan-bali-backpacking-tours-2_rjawl45c7.png?w=470&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:1441px) {  #recent-article_21667451235 {  background-image: url('../backpacking-tours.imgix.net/storage/uploads/blog/bali/nusa-lembongan-bali/nusa-lembongan-bali-backpacking-tours-2_rjawl45c7.png?w=470&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }   ">
                                            </div>
                                            <div class="card__content card__content--with-footer">
                                                <div>
                                                    <p class="headline-5 color-blurple">Dubai</p>
                                                    <div class="headline-wave">
                                                        <h4 class="headline-4">Lorem, ipsum.</h4> <svg width="100px" height="16px"
                                                            class="stroke-blurple">
                                                            <use xlink:href="images/icons.svg#icon-wave-squiggle" />
                                                        </svg>
                                                    </div>
                                                    <div class="content mt-10em"> Teal-green water, white sand, dramatic
                                                        cliffside sunsets, and no massive crowds of tourists compared to
                                                        the mainland or the better-known Gili Islands… what’s not to
                                                        love? Here are 5 specific reasons to put this lesser-known
                                                        island on your list: </div>
                                                </div>
                                                <div class="card__footer">
                                                    <div> <span class="chip chip--blurple">Experiences</span> </div>
                                                    <span class="btn-link">Read More</span>
                                                </div>
                                            </div>
                                        </a> </div>
                                </div>
                                <p class="text-center"> <a href="blog/bali.html" class="btn btn--black"
                                        title="See All Articles">See All Articles</a> </p>
                            </div>
                        </div>
                    </div>
                </section> --}}
            </main>
            <div class="fixed-bar bg-purple"> <a class="btn-link" href="#tour-dates" title="View Tour Dates"> View Tour
                    Dates </a> </div>
        </div>
    </div>
</x-front.master-layout>    