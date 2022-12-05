<x-front.master-layout>
    <header class="l-header mb-10em">
        <div class="row row--full">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="headline-wave headline-wave--center animation-fadeInLeft">
                    <h1 class="headline-2">Tours List </h1><div class="list-group">
                </div>
            </div>
        </div>
    </header>
<main class="pb-30em">

    <div class="container-extra-large">
        <div class="row row--g-top row--g-20">
            @foreach($allTour as $allTours)
            <article class="col-lg-6 col-xxl-4 animation-fadeInUp animation-delay-0"> 
                <a class="card card--flex card--shadow-orange" href="{{url('tours/'.$allTours->id)}}" title="Thailand Tour">
                    <div class="card__image lazy">
                        <img src="{{ asset('admin/uploads/tour/' . $allTours->image) }}">
                       <!-- <div class="card__header">
                            <div class="card__header-col"> <span
                                    class="chip chip--orange mt-0em">{{$allTours->name}}</span> <span
                                    {{-- class="chip chip--purple">Group Tour</span> </div> --}}
                            <div class="card__header-col">
                                <div class="card__header-price-box">
                                    <div class="card__header-price bg-orange"> £2019 <span
                                            class="card__header-price-label bg-orangeDark text-upper">from</span>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <div class="card__content card__content--stretch">
                        <div class="card__headline card__headline--with-price">
                            <h2 class="headline-3 all-other">{{$allTours->name}}</h2>
                        </div>
                        <ul class="list-tour-info list-tour-info--two-cols mt-10em">
                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                    class="fill-orange" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xlink:href="images/icons.svg#icon-calendar-range"></use>
                                </svg>
                                <div class="list-tour-info__item-desc"> <b>Length</b> <span>21 Days</span>
                                </div>
                            </li>
                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                    class="fill-orange" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xlink:href="images/icons.svg#icon-rowing"></use>
                                </svg>
                                <div class="list-tour-info__item-desc"> <b>No. Of Activities</b>
                                    <span>30+</span> </div>
                            </li>
                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                    class="fill-orange" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xlink:href="images/icons.svg#icon-silverware-fork-knife"></use>
                                </svg>
                                <div class="list-tour-info__item-desc"> <b>No. Of Meals</b> <span>24</span>
                                </div>
                            </li>
                            <li class="list-tour-info__item"> <svg width="36px" height="36px"
                                    class="fill-orange" aria-hidden="true" aria-focusable="false">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xlink:href="images/icons.svg#icon-account-multiple"></use>
                                </svg>
                                <div class="list-tour-info__item-desc"> <b>Avg. Group Size</b> <span>15 -
                                        30</span> </div>
                            </li>
                        </ul>
                        <div
                            class="card__footer card__footer--center card__footer--block-mobile card__footer--to-bottom pt-20em">
                            <span class="btn btn--small btn--purple">View Tour</span> </div>
                    </div>
                </a> </article>
                @endforeach
        </div>
    </div>
  
</main>
</x-front.master-layout>