<x-front.master-layout>
    <section class="py-5 my-5">
        <div class="container card--shadow-blurplet" id="myProfile">
            <div class="bg-white shadow rounded-lg d-block d-sm-flex shadow">
                @include('front.pages.account.sidebar')
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div id="details" >
                        <h6 class="mb-4 text-right" id="backBtn">Back</h6>
                        <div class="accordion" id="accordionExample">
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Booking details
                                 </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                    <div class="row">
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Booking Id</b><br> <span>{{ $booking->random_id }}</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Booking Date</b><br> <span>{{ date('d M Y',strtotime($booking->created_at)) }}</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Booking Status</b><br> <span>{{ $booking->status }}</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Payment status</b><br> <span>{{ $booking->payment_status }}</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Amount</b><br> <span>AED {{ $booking->total }}</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Coupon code</b><br> <span>NA</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Vehicle Details
                                 </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                    <article class="card">
                                        <div class="card-body row">
                                            <div class="col"> <strong>Booking Id</strong> </div>
                                            <div class="col"> <strong>Booking Date</strong> </div>
                                            <div class="col"> <strong>Amount(AED)</strong> </div>
                                            <div class="col"> <strong>Status</strong> </div>
                                            <div class="col"> <strong>Payment Status</strong> </div>
                                        </div>
                                    </article><br>
                                    @foreach ($booking->vehicleInfo as $value)
                                        <article class="card">
                                            <a href="{{ url('bookings/'.$value->random_id) }}">
                                                <div class="card-body row">
                                                    <div class="col"> {{ $value->random_id }} </div>
                                                    <div class="col"> {{ date('d M Y',strtotime($value->created_at)) }} </div>
                                                    <div class="col"> {{ $value->total }} </div>
                                                    <div class="col"> {{ $value->status }} </div>
                                                    <div class="col"> {{ $value->payment_status }} </div>
                                                </div>
                                            </a>
                                        </article><br>
                                    @endforeach
                                    <div class="row">
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Order no.</b><br> <span>1</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Order Status.</b><br> <span>pending</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Order Date</b><br> <span>01-02-2023</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Payment status</b><br> <span>success</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Custom & information
                                 </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                    <div class="row">
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Name</b><br> <span>john</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Email</b><br> <span>dubaiquads@gmail.com</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Phone no.</b><br> <span>8888888888</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Address</b><br> <span>dubai</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div>
                           <button class="button">Pay Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </x-front.master-layout>