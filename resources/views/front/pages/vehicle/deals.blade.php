<x-front.master-layout>
    <div id="barba-wrappers" aria-live="polite">
        <div class="barba-container">
            <header class="l-header l-header--bottom-pad tours-banner" style="background-image: url('{{ asset('/uploads/static_banner/bannerimgstatic.jpg') }}')">
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
                            <h1 class="headline-2 tour-name">Deals</h1>
                        </div>
                    </div>
                </div>
                <div class="overlay-effect"></div>
            </header>
            <main class="l-main">
                <section class="section">
                    <div class="container p-0">
                        <div class="row" id="listing">
                            @foreach($deals as $value) 
                                <div class="col-lg-12 p-0  z-index-1">
                                    <div class="mb-30em animated fadeInUp active">
                                        <div class="card card--shadow-green">
                                            <span class="badge">{{$value->discount}}% OFF</span>
                                            <div class="card__content">
                                                <div class="card__headline card__headline--with-price row">
                                                    <div class="card__headline-left headline-wave  col-lg-4 col-sm-12">
                                                    <a href="{{url('vehicles/details/'.$value['random_id'])}}" title="Book now"><img src="{{ asset('admin/uploads/vehicle/' . $value->image) }}" class="mt-10em list" alt="">
                                                    </a></div>
                                                    <div class="card__headline-price-wrapper  col-lg-8 col-sm-12">
                                                        <div class="row">
                                                        <a href="{{url('vehicles/details/'.$value['random_id'])}}" title="Book now">
                                                            <div class="col-12 col-lg-12">
                                                                <h2 class="headline-3 vehicleName">{{$value->name}}</h2>
                                                            </div>
                                                        </a>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <ul class="list-tour-info list-tour-info--two-cols">
                                                                     <li class="list-tour-info__item">
                                                                      <svg width="36px" height="36px" class="fill-blue" aria-hidden="true" aria-focusable="false">
                                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-baby-face-outline')}}"></use>
                                                                      </svg>
                                                                      <div class="list-tour-info__item-desc">
                                                                        <b>Min Age</b> <span>{{$value->tour->min_age}}Yrs</span>
                                                                      </div>
                                                                    </li>
                                                                     <li class="list-tour-info__item">
                                                                      <svg width="36px" height="36px" class="fill-blue" aria-hidden="true" aria-focusable="false">
                                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-calendar-range')}}"></use>
                                                                      </svg>
                                                                      <div class="list-tour-info__item-desc">
                                                                        <b>Availability</b> <span>{{$value->tour->availability}}</span>
                                                                      </div>
                                                                    </li>
                                                                     @if($value->tour->option1)
                                                                   <li class="list-tour-info__item">
                                                                      <span class="checkmarkpink">&#10004</span>
                                                                      <div class="list-tour-info__item-desc">
                                                                         <b>{{$value->tour->option1}}</b> 
                                                                      </div>
                                                                   </li>
                                                                   @endif
                                                                   @if($value->tour->option2)
                                                                   <li class="list-tour-info__item">
                                                                      <span class="checkmarkpink">&#10004</span>
                                                                      <div class="list-tour-info__item-desc">
                                                                         <b>{{$value->tour->option2}}</b> 
                                                                      </div>
                                                                   </li>
                                                                   @endif
                                                                   @if($value->tour->option3)
                                                                   <li class="list-tour-info__item">
                                                                      <span class="checkmarkpink">&#10004</span>
                                                                      <div class="list-tour-info__item-desc">
                                                                         <b>{{$value->tour->option3}}</b> 
                                                                      </div>
                                                                   </li>
                                                                   @endif
                                                                   @if($value->tour->option4)
                                                                   <li class="list-tour-info__item">
                                                                      <span class="checkmarkpink">&#10004</span>
                                                                      <div class="list-tour-info__item-desc">
                                                                         <b>{{$value->tour->option4}}</b>
                                                                      </div>
                                                                   </li>
                                                                   @endif
                                                                   @if($value->tour->option5)
                                                                   <li class="list-tour-info__item">
                                                                      <span class="checkmarkpink">&#10004</span>
                                                                      <div class="list-tour-info__item-desc">
                                                                         <b>{{$value->tour->option5}}</b>
                                                                      </div>
                                                                   </li>
                                                                   @endif
                                                                    @if($value->tour->option6)
                                                                   <li class="list-tour-info__item">
                                                                      <span class="checkmarkpink">&#10004</span>
                                                                      <div class="list-tour-info__item-desc">
                                                                         <b>{{$value->tour->option6}}</b> 
                                                                      </div>
                                                                   </li>
                                                                   @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        @if($value->available_quantity < 1)
                                                            <div class="col-12 col-lg-12 button_nd">
                                                                <a class="btn btn--purple " href="{{url('vehicles/details/'.$value['random_id'])}}" title="View">View </a>
                                                            </div>
                                                            @else
                                                            <div class="col-12 col-lg-12 button_nd">
                                                                <a class="btn btn--purple " href="{{url('vehicles/details/'.$value['random_id'])}}" title="Book now"> Book Now </a>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($value->available_quantity < 1)
                                        <div class="heading-nonavailability">Not Available</div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach 
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
     </x-front.master-layout>
     <script src="{{asset ('assets/front/scripts/vendor7369.js?v=m0Wgcip88r')}}"></script> 