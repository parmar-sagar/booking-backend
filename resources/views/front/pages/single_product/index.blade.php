<x-front.master-layout>
    <div id="barba-wrappers">
        <div class="barba-containers">
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
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-baby-face-outline')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Min Age</b> <span>{{$list->min_age}}Yrs</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-map')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Pickup & Drop off</b> <span>{{$list->pickup_and_drop}}</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-calendar-range')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Ride Duration</b> 
                                            @foreach($time as $times)
                                            <span>{{$times->time}}@if($times->time_type == 'Minutes'){{ 'Mins'}} @else {{'Hours'}} @endif</span>
                                            @endforeach
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-star')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Convoy Leader</b> <span>{{$list->convoy_leader}}</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-account')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Tour Guide</b> <span>{{$list->tour_guide}}</span>
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-account')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Safety Gears</b>
                                            @foreach($refreshment as $refreshments)
                                            <span>{{$refreshments->title}}</span>
                                            @endforeach
                                            
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-silverware-fork-knife')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Refreshments</b>
                                            @foreach($saftyGear as $saftyGears)
                                            <span>{{$saftyGears->title}}</span>
                                            @endforeach
                                          </div>
                                        </li>
                                        <li class="list-tour-info__item">
                                            <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-calendar-range')}}">
                                                </use>
                                            </svg>
                                          <div class="list-tour-info__item-desc">
                                            <b>Available Everyday</b> <span>Sunrise to Sunset</span>
                                          </div>
                                        </li>
                                      </ul>
                                    </blockquote>
                                </div>
                            </div>
                            <a class="btn btn--purple add_cart" href="javascript:void(0);" data-id="{{$singlePrdct->random_id}}" title="add-to-cart"> Book Now </a>
                        </div>
                        <div class="col-12 col-lg-5 col-xl-5 col-xxl-4 offset-xxl-1">
                            <div class="animation-fadeInUp mb-30em">
                                <div class="card card--shadow-blurple">
                                    <div class="card__content">
                                        <div class="card__headline card__headline--with-price card__headline--extra-bottom-margin">
                                            <div class="card__headline-left headline-wave">
                                                <h2 class="headline-3 text-upper">Must Know Before You Book</h2>
                                            </div>
                                            <div class="card__headline-price-wrapper">
                                                <div
                                                    class="card__headline-price-values card__headline-price-values--align-right">
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
                                        @foreach($price as $prices)
                                        <li>{{$prices->time}} Mins Ride : {{$prices->amount}} AED</li>
                                        @endforeach
                                    </ul>
                                    </div>
                                </div>
                                {{-- <a class="btn btn--purple mt-10em" href="#sect" title="View Tour Dates"> Next </a>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="fixed-bar bg-purple"> <a class="btn-link" href="#tour-dates" title="View Tour Dates"> View Tour
                    Dates </a> </div>
        </div>
    </div>
</x-front.master-layout>  

 <script>
    $(document).ready(function() {
        $(document).on('click', '.add_cart', function() {
        let id = $(this).data('id');
            $.ajax({
                url: "add-to-cart/"+ id,  
                success: function (response) {
                if((response.error)){
                  toastr.error(response.error);
                }else{
                  $("#my_cart").load(window.location + " #my_cart");
                  toastr.success(response.success); 
                }
                },
                error: function (data) {
                console.log('Error:', data);
                }
            });
        });
    });
            </script>
    