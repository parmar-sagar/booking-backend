<x-front.master-layout>
    <section class="py-5 my-5">
        <div class="container card--shadow-blurplet" id="myProfile">
            <div class="bg-white shadow rounded-lg d-block d-sm-flex shadow">
                @include('front.pages.account.sidebar')
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div id="orderList">
                        <h3 class="mb-4 text-center">Order Listing</h3>
                        <article class="card">
                            <div class="card-body">
                                <article class="card">
                                    <div class="card-body row">
                                        <div class="col"> <strong>Booking Id</strong> </div>
                                        <div class="col"> <strong>Booking Date</strong> </div>
                                        <div class="col"> <strong>Amount(AED)</strong> </div>
                                        <div class="col"> <strong>Status</strong> </div>
                                        <div class="col"> <strong>Payment Status</strong> </div>
                                    </div>
                                </article><br>
                                @foreach ($bookings as $value)
                                    <article class="card">
                                        <a href="{{ url('bookings/'.$value->random_id) }}">
                                            <div class="card-body row">
                                                <div class="col"> {{ $value->random_id }} </div>
                                                <div class="col"> {{ date('d M Y',strtotime($value->created_at)) }} </div>
                                                <div class="col"> {{ $value->total }} </div>
                                                <div class="col"> <span class="badge badge-primary">{{ $value->status }}</span> </div>
                                                <div class="col"> <span class="badge @if($value->payment_status == 'Paid') badge-success @else badge-danger @endif ">{{ $value->payment_status }}</span> </div>
                                            </div>
                                        </a>
                                    </article><br>
                                @endforeach
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </x-front.master-layout>