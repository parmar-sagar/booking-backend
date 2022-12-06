<x-front.master-layout>
<div id="barba-wrapper" aria-live="polite">
    <div class="barba-container">
      <header class="l-header l-header--bottom-pad tours-banner" style="background-image: url('{{ asset('/admin/uploads/tour/' . $tourName->banner_img) }}')">
        <div class="banner-image"> 
          <nav class="l-submenu l-submenu--blurple border-img-bottom border-img-bottom--blurple">
            <div class="l-submenu__scroll row row--10 align-items-center justify-content-start">
                <div class="col-6 p-3">
                </div>
            </div>
          </nav>
        </div>
        <div class="row row--full row--g-10 tours-banner-tex">
          <div class="col-lg-6 text-center">
            <div class="headline-wave headline-wave--center animated fadeInLeft active">
              <h1 class="headline-2 tour-name">{{$tourName->name}}</h1> 
              {{-- <p>{{$tourName->description}}</p> --}}
            </div>
          </div>
        </div>
        <div class="overlay-effect"></div>
      </header>
      
      <main class="l-main">
        <section class="section">
          <div class="container">
            <div class="row"  id="listing"> 
            @foreach($listing as $listings)    
              <div class="col-lg-12  z-index-1">
                <div class="mb-30em animated fadeInUp active">
                  <div class="card card--shadow-green">
                    <div class="card__content">
                      <div class="card__headline card__headline--with-price row">
                        <div class="card__headline-left headline-wave col-4">
                         <!-- <h2 class="headline-3">{{$listings->name}}</h2>-->
                          <img src="{{ asset('admin/uploads/vehicle/' . $listings->image) }}" class="mt-10em list" alt="">
                        </div>
                        <div class="card__headline-price-wrapper  col-8">
                          
                         <div class="row">
                          <div class="col-12 col-lg-12">
                             <h2 class="headline-3">{{$listings->name}}</h2>
                             <p>{{$listings->description}}</p>
                    </div>
                    </div>
                      <div class="row great_dealsbtn">
                        <div class="col-6 col-lg-6">
                          <div class="card__headline-price-main card__headline-price-main--large bg-blurple">
                            £1460
                        </div>
                        </div>
                        <div class="col-6 col-lg-6">
                        <a
                    class="btn btn--purple"
                    href="{{url('view-detail/'.$listings['id'])}}"
                    title="View now"
                  >
                    Book Now
                  </a></div>
                      </div>
                        </div>
                        
                       
                      </div>
                    
                      
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            {{-- <p class="text-center"> <a class=" btn btn--black " href="/book-a-backpacking-tour?deals_only=1"
                title="View All Deals"> View All Deals </a> </p> --}}
          </div>
        </section>
        <section class=" section mt-20em bg-white-top-jaw      ">
        
          {{-- <div class="section__wrapper">
            <div class="overlay "></div>
            <div class="headline-wave headline-wave--center">
              <h2 class="headline-3">More Tours</h2> <svg width="100px" height="16px" class="stroke-orange">
                <use xlink:href="fonts/icons.svg#icon-jaw-squiggle"></use>
              </svg>
            </div>
      
          <div class="row row--g-top row--g-20">
            <article class="col-lg-6 col-xxl-4 animation-delay-0 animated fadeInUp active"> <a
                class="card card--flex card--shadow-orange" href="/thailand-backpacking-tour" title="Backpacking Thailand">
                <div class="card__image lazy lazy--loaded" id="tour_01670226457" data-name="tour_01670226457"
                  data-style="    @media screen and (max-width:420px) {  #tour_01670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/thailand/thailand-mainphoto3_ccdtg.jpg?w=360&amp;h=340&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #tour_01670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/thailand/thailand-mainphoto3_ccdtg.jpg?w=750&amp;h=400&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #tour_01670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/thailand/thailand-mainphoto3_ccdtg.jpg?w=500&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:1441px) {  #tour_01670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/thailand/thailand-mainphoto3_ccdtg.jpg?w=600&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }   "
                  data-was-processed="true">
                  <div class="card__header">
                    <div class="card__header-col"> <span class="chip chip--orange mt-0em">lorem</span> <span
                        class="chip chip--purple">Group Tour</span> </div>
                    <div class="card__header-col">
                      <div class="card__header-price-box">
                        <div class="card__header-price bg-orange"> €2330 <span
                            class="card__header-price-label bg-orangeDark text-upper">from</span> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card__content card__content--stretch">
                  <div class="card__headline card__headline--with-price">
                    <h2 class="headline-3"> Quard Dubai </h2>
                  </div>
                  <ul class="list-tour-info list-tour-info--two-cols">
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-calendar-range"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Length</b> <span>21 Days</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-baby-face-outline">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Avg. Age</b> <span>18-39</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-rowing"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>No. Of Activities</b> <span>30+</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-silverware-fork-knife">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>No. Of Meals</b> <span>24</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-account-multiple">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Avg. Group Size</b> <span>8 - 30</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-star"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Operator</b> <span>Backpacking Tours</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-map"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Starting Point</b> <span>Bangkok</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-orange" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-map"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Ending Point</b> <span>Bangkok</span> </div>
                    </li>
                  </ul>
                  <div class="card__footer card__footer--center card__footer--block-mobile card__footer--to-bottom"> <span
                      class="btn btn--small btn--purple">View Tour</span> </div>
                </div>
              </a> </article>
            <article class="col-lg-6 col-xxl-4 animation-delay-1 animated fadeInUp active"> <a
                class="card card--flex card--shadow-blurple" href="/bali-backpacking-tour" title="Backpacking Bali">
                <div class="card__image lazy lazy--loaded" id="tour_11670226457" data-name="tour_11670226457"
                  data-style="    @media screen and (max-width:420px) {  #tour_11670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/bali/balimain-tour_fqraa.jpg?w=360&amp;h=340&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #tour_11670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/bali/balimain-tour_fqraa.jpg?w=750&amp;h=400&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #tour_11670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/bali/balimain-tour_fqraa.jpg?w=500&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:1441px) {  #tour_11670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/bali/balimain-tour_fqraa.jpg?w=600&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }   "
                  data-was-processed="true">
                  <div class="card__header">
                    <div class="card__header-col"> <span class="chip chip--blurple mt-0em">lorem</span> <span
                        class="chip chip--purple">Group Tour</span> </div>
                    <div class="card__header-col">
                      <div class="card__header-price-box">
                        <div class="card__header-price bg-blurple"> €1685 <span
                            class="card__header-price-label bg-blurpleDark text-upper">from</span> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card__content card__content--stretch">
                  <div class="card__headline card__headline--with-price">
                    <h2 class="headline-3"> Dubbai Quard </h2>
                  </div>
                  <ul class="list-tour-info list-tour-info--two-cols">
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-calendar-range"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Length</b> <span>18 Days</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-baby-face-outline">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Avg. Age</b> <span>18-39</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-rowing"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>No. Of Activities</b> <span>32</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-silverware-fork-knife">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>No. Of Meals</b> <span>23</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-account-multiple">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Avg. Group Size</b> <span>6 - 20</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-star"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Operator</b> <span>Backpacking Tours</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-map"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Starting Point</b> <span>Kuta</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-map"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Ending Point</b> <span>Kuta</span> </div>
                    </li>
                  </ul>
                  <div class="card__footer card__footer--center card__footer--block-mobile card__footer--to-bottom"> <span
                      class="btn btn--small btn--purple">View Tour</span> </div>
                </div>
              </a> </article>
            <article class="col-lg-6 col-xxl-4 animation-delay-2 animated fadeInUp active"> <a
                class="card card--flex card--shadow-blue" href="/vietnam-backpacking-tour" title="Backpacking Vietnam">
                <div class="card__image lazy lazy--loaded" id="tour_21670226457" data-name="tour_21670226457"
                  data-style="    @media screen and (max-width:420px) {  #tour_21670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/vietnam/vietnam-mainphoto_mzloo.jpg?w=360&amp;h=340&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:421px) and (max-width:768px) {  #tour_21670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/vietnam/vietnam-mainphoto_mzloo.jpg?w=750&amp;h=400&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:769px) and (max-width:1440px) {  #tour_21670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/vietnam/vietnam-mainphoto_mzloo.jpg?w=500&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }    @media screen and (min-width:1441px) {  #tour_21670226457 {  background-image: url('https://backpacking-tours.imgix.net/storage/uploads/tours/vietnam/vietnam-mainphoto_mzloo.jpg?w=600&amp;h=270&amp;crop=faces&amp;q=75&amp;auto=format&amp;fm=png')  } }   "
                  data-was-processed="true">
                  <div class="card__header">
                    <div class="card__header-col"> <span class="chip chip--blue mt-0em">Lorem</span> <span
                        class="chip chip--purple">Group Tour</span> </div>
                    <div class="card__header-col">
                      <div class="card__header-price-box">
                        <div class="card__header-price bg-blue"> €2545 <span
                            class="card__header-price-label bg-blueDark text-upper">from</span> </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card__content card__content--stretch">
                  <div class="card__headline card__headline--with-price">
                    <h2 class="headline-3"> Quard Dubbai </h2>
                  </div>
                  <ul class="list-tour-info list-tour-info--two-cols">
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-calendar-range"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Length</b> <span>23 Days</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-baby-face-outline">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Avg. Age</b> <span>18-39</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-rowing"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>No. Of Activities</b> <span>30+</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-silverware-fork-knife">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>No. Of Meals</b> <span>28</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-account-multiple">
                        </use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Avg. Group Size</b> <span>6 - 20</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-star"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Operator</b> <span>Backpacking Tours</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-map"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Starting Point</b> <span>Hanoi</span> </div>
                    </li>
                    <li class="list-tour-info__item"> <svg width="36px" height="36px" class="fill-blue" aria-hidden="true"
                        aria-focusable="false">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#icon-map"></use>
                      </svg>
                      <div class="list-tour-info__item-desc"> <b>Ending Point</b> <span>Ho Chi Minh</span> </div>
                    </li>
                  </ul>
                  <div class="card__footer card__footer--center card__footer--block-mobile card__footer--to-bottom"> <span
                      class="btn btn--small btn--purple">View Tour</span> </div>
                </div>
              </a> </article>

          </div> --}}
          </div>
     
        </section>
      </main>
    </div>
  </div>
</x-front.master-layout>