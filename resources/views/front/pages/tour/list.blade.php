<x-front.master-layout>
    <header class="l-header mb-10em">
        <div class="row row--full">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="headline-wave headline-wave--center animation-fadeInLeft">
                    <h1 class="headline-2">All Tours </h1><div class="list-group">
                </div>
            </div>
        </div>
    </header>
    <main class="pb-30em">
        <div class="container-extra-large">
            <div class="row row--g-top row--g-20">
                @foreach($tours as $value)
                <article class="col-lg-6 col-xxl-4 animation-fadeInUp animation-delay-0"> 
                    <div class="card card--flex card--shadow-orange">
                        <div class="card__image lazy">
                            <img src="{{ asset('admin/uploads/tour/' . $value->image) }}">
                        </div>
                        <div class="card__content card__content--stretch">
                            <div class="card__headline card__headline--with-price">
                                <h2 class="headline-3 all-other">{{$value->name}}</h2>
                            </div>
                            <div class="tour-list-text">
                                <p>{{ mb_strimwidth($value->description, 0, 200, '...') }}</p>
                            </div>
                            <div
                                class="card__footer card__footer--center card__footer--block-mobile card__footer--to-bottom pt-20em">
                                <a href="{{url('tours/'.$value->random_id)}}"><span class="btn btn--small btn--purple">View Tour</span></a>
                            </div>
                        </div>
                    </div> 
                </article>
                @endforeach
            </div>
        </div>
    </main>
</x-front.master-layout>
<script src="{{asset ('assets/front/scripts/vendor7369.js?v=m0Wgcip88r')}}"></script> 