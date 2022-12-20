<x-front.master-layout>
<div id="barba-wrappers" aria-live="polite">
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
           <div class="row" id="listing">
              @foreach($listing as $listings) 
              <div class="col-lg-12  z-index-1">
                <div class="mb-30em animated fadeInUp active">
                  <div class="card card--shadow-green">
                    <div class="card__content">
                      <div class="card__headline card__headline--with-price row">
                        <div class="card__headline-left headline-wave col-12  col-sm-12 col-md-12 col-lg-4 col-xxl-4">
                          <img src="{{ asset('admin/uploads/vehicle/' . $listings->image) }}" class="mt-10em list image_cnt" alt="">
                        </div>
                        <div class="card__headline-price-wrapper   col-12 col-sm-12 col-md-12 col-lg-8 col-xxl-8">
                          <div class="row">
                            <div class="col-12 col-lg-12">
                              <h2 class="headline-3">{{$listings->name}}</h2>
                              <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p> -->
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-12">
                              <ul class="list-tour-info list-tour-info--two-cols">
                                <li class="list-tour-info__item">
                                  <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-account')}}">
                                    </use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Tour Guide</b>
                                    <span>{{$listings['tours']->tour_guide}}</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-star')}}">
                                    </use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Convey Leader</b>
                                    <span>{{$listings['tours']->convoy_leader}}</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-account-multiple')}}">
                                    </use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>No. Of Persons</b>
                                    <span>{{$listings->no_of_persons}}</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-map')}}">
                                    </use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Pickup & Drop off</b>
                                    <span>{{$listings['tours']->pickup_and_drop}}</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-calendar-range')}}">
                                    </use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Available Everyday</b>
                                    <span>Sunrise to Sunset</span>
                                  </div>
                                </li>
                                <li class="list-tour-info__item">
                                  <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-baby-face-outline')}}">
                                    </use>
                                  </svg>
                                  <div class="list-tour-info__item-desc">
                                    <b>Min Age</b>
                                    <span>{{$listings['tours']->min_age}}Yrs</span>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-lg-12 button_nd">
                              <a class="btn btn--purple " href="{{url('view-detail/'.$listings['id'])}}" title="Book now"> Book Now </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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