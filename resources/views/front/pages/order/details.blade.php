<x-front.master-layout>
    <section class="py-5 my-5">
        <div class="container card--shadow-blurplet" id="myProfile">
            <div class="bg-white shadow rounded-lg d-block d-sm-flex shadow">
                @include('front.pages.account.sidebar')
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div id="details" >
                        <h6 class="mb-4 text-right"><a href="{{ url('bookings') }}">Back To Bookings</a></h6>
                        <div class="accordion" id="accordionExample">
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Booking Information
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
                                             <b>Booking Status</b><br> <span class="badge badge-primary">{{ $booking->status }}</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Payment status</b><br> <span class="badge @if($booking->payment_status == 'Paid') badge-success @else badge-danger @endif ">{{ $booking->payment_status }}</span>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Amount</b><br> <span>AED {{ $booking->total }}</span>
                                          </div>
                                       </div>
                                       @if($booking->coupon)
                                       <div class="col-lg-6 col-md-6 col-sm-12">
                                          <div class="order-space">
                                             <b>Coupon code</b><br> <span>{{ $booking->coupon }}</span>
                                          </div>
                                       </div>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Customer Information
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="order-space">
                                            <b>Name</b><br> <span>{{ $booking->first_name.' '.$booking->last_name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="order-space">
                                            <b>Email</b><br> <span>{{ $booking->email }}</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="order-space">
                                            <b>Phone no.</b><br> <span>{{ $booking->mobile }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                           <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Package Information
                                 </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                    <article class="card">
                                        <div class="card-body row">
                                            <div class="col-lg-4 col-md-12 col-sm-12"> <strong>Name</strong> </div>
                                            <div class="col-lg-2 col-md-12 col-sm-12"> <strong>Price</strong> </div>
                                            <div class="col-lg-2 col-md-12 col-sm-12"> <strong> Date</strong> </div>
                                            <div class="col-lg-2 col-md-12 col-sm-12"> <strong>Time</strong> </div>
                                            <div class="col-lg-2 col-md-12 col-sm-12"> <strong>Quantity</strong> </div>
                                        </div>
                                    </article><br>
                                    @foreach ($booking->vehicleInfo as $value)
                                        <article class="card">
                                            <div class="card-body row">
                                                <div class="col-lg-4 col-md-12 col-sm-12"> {{ $value->name }} </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12"> {{ $value->price }} </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12"> {{ date('d M Y',strtotime($value->booking_date)) }} </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12"> {{ $value->booking_time }} </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12"> {{ $value->quantity }} </div>
                                            </div>

                                            <div class="product-details" style="padding: 0px 20px;">
                                            
                                            @php $extraProducts = json_decode($value->extra_product) @endphp
                                            @if(isset($extraProducts))
                                                @foreach($extraProducts as $product)
                                                <div class="row">
                                                <p><b>Extra Activities :-</b></p>
                                                   <div class="col-lg-4 col-md-4 col-sm-12">
                                                      <h6>{{$product->title}}</h6>
                                                   </div>
                                                   <div class="col-lg-2 col-md-2 col-sm-12 ">
                                                      <h6>{{$product->price}}</h6>
                                                   </div>
                                                   <div class="col-lg-2 col-md-2 col-sm-12 ">
                                                   </div>
                                                   <div class="col-lg-2 col-md-2 col-sm-12 ">
                                                   </div>
                                                   <div class="col-lg-2 col-md-2 col-sm-12 ">
                                                      <h6>{{$product->extra_quntity}}</h6>
                                                   </div>
                                                </div>
                                                @endforeach
                                                @endif
                                             </div>
                                        </article><br>
                                    @endforeach
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </x-front.master-layout>