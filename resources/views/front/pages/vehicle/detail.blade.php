<x-front.master-layout>
   <main>
      <div class="section">
         <div class="row row--g-10">
            <div class="col-12 col-lg-7 col-xl-7 col-xxl-5 offset-xxl-1">
               <header>
                  <div class="headline-wave">
                     <h1 class="headline-2">{{$objVehicle->name}}</h1>
                     <svg width="100px" height="16px" class="stroke-blurple">
                        <use xlink:href="images/icons.svg#icon-wave-squiggle"></use>
                     </svg>
                  </div>
                  <!-- <h1>{!! QrCode::size(250)->generate('www.55activeplaces.com/quadsdubai/public'); !!} </h1> -->
                  <div class="content mt-10em">
                     <p>{{$objVehicle->description}}</p>
                  </div>
               </header>
               <div class="video-images">
                  <figure class="video-images__left-img">
                     <picture>
                        <img src="{{ asset('admin/uploads/vehicle/' . $objVehicle->image)}}" alt="">
                     </picture>
                  </figure>
                  <figure class="video-images__main-img">
                     <picture>
                        <img src="{{ asset('admin/uploads/vehicle/' . $objVehicle->banner_img)}}" alt="">
                     </picture>
                  </figure>
                  <figure class="video-images__right-img">
                     <picture>
                        <img src="{{ asset('admin/uploads/vehicle/' . $objVehicle->image)}}" alt="">
                     </picture>
                  </figure>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="list-icon-wrapper">
                        <ul class="list-icon list-icon--tick">
                           @foreach($includes as $value)
                              <li>{{$value->title}}</li>
                           @endforeach
                        </ul>
                        <ul class="list-icon list-icon--cross">
                           @foreach($notIncludes as $value)
                              <li>{{$value->title}}</li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-8">
                     @if($objVehicle->min_age || $objVehicle->tour->description || $objVehicle->tour->availability || $objVehicle->tour->option1 || $objVehicle->tour->option2 || $objVehicle->tour->option3 || $objVehicle->tour->option4 || $objVehicle->tour->option5 || $objVehicle->tour->option6  || count($times) > 0 || count($saftyGears) > 0 || count($refreshments) > 0 || count($times) > 0)
                     <blockquote class="blockquote blockquote--margin-sm blockquote--blurple">
                        <ul class="list-tour-info list-tour-info--two-cols">
                           @if($objVehicle->tour->min_age)
                           <li class="list-tour-info__item">
                              <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                 <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-baby-face-outline')}}"></use>
                              </svg>
                              <div class="list-tour-info__item-desc">
                                 <b>Min Age</b> 
                                 <span>{{$objVehicle->tour->min_age}}Yrs</span>
                              </div>
                           </li>
                           @endif
                            @if($objVehicle->tour->availability)
                           <li class="list-tour-info__item">
                              <svg width="36px" height="36px" class="fill-blurple" aria-hidden="true" aria-focusable="false">
                                 <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{asset('assets/front/images/icons.svg#icon-calendar-range')}}"></use>
                              </svg>
                              <div class="list-tour-info__item-desc">
                                 <b>Availability</b> 
                                 <span>{{$objVehicle->tour->availability}}</span>
                              </div>
                           </li>
                           @endif
                           @if($objVehicle->tour->option1)
                           <li class="list-tour-info__item">
                              <span class="checkmark">&#10004</span>
                              <div class="list-tour-info__item-desc">
                                 <b>{{$objVehicle->tour->option1}}</b> 
                              </div>
                           </li>
                           @endif
                           @if($objVehicle->tour->option2)
                           <li class="list-tour-info__item">
                              <span class="checkmark">&#10004</span>
                              <div class="list-tour-info__item-desc">
                                 <b>{{$objVehicle->tour->option2}}</b> 
                              </div>
                           </li>
                           @endif
                           @if($objVehicle->tour->option3)
                           <li class="list-tour-info__item">
                              <span class="checkmark">&#10004</span>
                              <div class="list-tour-info__item-desc">
                                 <b>{{$objVehicle->tour->option3}}</b> 
                              </div>
                           </li>
                           @endif
                           @if($objVehicle->tour->option4)
                           <li class="list-tour-info__item">
                              <span class="checkmark">&#10004</span>
                              <div class="list-tour-info__item-desc">
                                 <b>{{$objVehicle->tour->option4}}</b>
                              </div>
                           </li>
                           @endif
                           @if($objVehicle->tour->option5)
                           <li class="list-tour-info__item">
                              <span class="checkmark">&#10004</span>
                              <div class="list-tour-info__item-desc">
                                 <b>{{$objVehicle->tour->option5}}</b>
                              </div>
                           </li>
                           @endif
                            @if($objVehicle->tour->option6)
                           <li class="list-tour-info__item">
                              <span class="checkmark">&#10004</span>
                              <div class="list-tour-info__item-desc">
                                 <b>{{$objVehicle->tour->option6}}</b> 
                              </div>
                           </li>
                           @endif
                        </ul>
                     </blockquote>
                     @endif
                  </div>
               </div>
            </div>
            <div class="col-12 col-lg-5 col-xl-5 col-xxl-4 offset-xxl-1">
               <div class="mb-30em  card card--shadow-purple bg-purple custom_bg-purple animated fadeInUp active" style="background-color: #18899f !important;  box-shadow: -12px 12px 0 #feb100; border:none !important">
                  <div class="card__content">
                     <div class="headline-wave">
                        <h3 class="headline-3 custom-head">Price</h3>
                        <svg width="100px" height="16px" class="stroke-blurple">
                           <use xlink:href="images/icons.svg#icon-wave-squiggle" />
                        </svg>
                        @if(isset($objVehicle->discount) && $objVehicle->discount)
                           <h3 style="color:yellow">{{$objVehicle->discount}}% Off </h3>
                        @endif
                     </div>
                     <ul class="list-icon list-icon--tick list-1-cols list-mobile-limit js-limit-list">
                        @foreach($objVehicle->prices as $value)
                        <li class="custom_li"><div class="ride_minutes"><span class="custom_time">{{$value->time}}</span>Mins Ride :</div>
                          <div class="discount_after">
                              @if(isset($objVehicle->discount) && $objVehicle->discount)
                              <del class="custom_del" style="color:red"><small>AED</small>{{$value->amount}}</del>
                           @endif 
                           @if(isset($objVehicle->discount)) 
                              <span class="custom_span"><small>AED</small>{{$value->amount - ($value->amount * ($objVehicle->discount / 100))}}</span>
                           @endif 
                          </div> 
                        </li>
                        @endforeach
                     </ul>

                  </div>
               </div>
               <div class="mb-30em   animated fadeInUp active">
                  <div class="card card--shadow-blurple  " >
                     <div class="card__content">
                        <div class="card__headline card__headline--with-price">
                           <div class="headline-wave">
                              <h2 class="headline-3" id="must-know" style="cursor: pointer;">Must know Befor You Book</h2>
                              <svg  height="16px" class="stroke-orange">
                                 <use xlink:href="/images/icons.svg#icon-wave-squiggle"></use>
                              </svg>
                           </div>
                        </div>
                        <div class="list-icon-wrapper" id="must-know-content" style="display:none;">
                           <ul class="list-icon list-icon--tick">
                              @foreach($mustKnows as $value)
                                 <li>{{$value->title}}</li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mb-30em animated fadeInUp active">
                  <div class="card card--shadow-blue  " >
                     <div class="card__content">
                        <div class="card__headline card__headline--with-price">
                           <div class="headline-wave">
                              <h2 class="headline-3" id="tour-itenary" style="cursor: pointer;">Tour Itenary</h2>
                              <svg  height="16px" class="stroke-orange">
                                 <use xlink:href="/images/icons.svg#icon-wave-squiggle"></use>
                              </svg>
                           </div>
                        </div>
                        <div class="list-icon-wrapper" id="tour-itenary-content" style="display:none;">
                           <p class="content mt-10em mb-10em">
                           <p>{!! $objVehicle->tour_itenary !!}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mb-30em animated fadeInUp active">
                  <div class="card card--shadow-orange" >
                     <div class="card__content">
                        <div class="card__headline card__headline--with-price">
                           <div class="headline-wave">
                              <h2 class="headline-3" id="additional-info" style="cursor: pointer;">Additional Info</h2>
                              <svg  height="16px" class="stroke-orange">
                                 <use xlink:href="/images/icons.svg#icon-wave-squiggle"></use>
                              </svg>
                           </div>
                        </div>
                        <div class="cntnt" id="additional-info-content" style="display:none;">
                           <div class="list-icon-wrapper">
                              <ul class="list-icon list-icon--tick">
                                 @foreach($addInfos as $value)
                                    <li>{{$value->title}}</li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @if($objVehicle->type == 'Tour')
         <!--- Gallary slides -->
         <div class=" tab-box-content tab-box-content--active bg-blue border-img-top border-img-top--blue border-img-bottom border-img-bottom--blue js-tabContent " data-content="tab-2">
            <section class="border-img-top border-img-top--orange border-img-bottom border-img-bottom--orange border-img-top--hide-on-mobile ">
               <div class="toggle-wrapper toggle-wrapper__tour-gallery"> 
                  <label class="toggle" for="gallery-toggle">
                     <span><h2 class="headline-2"> Gallery </h2></span> 
                  </label> 
                  <div class="row">
                     <div class="col-8 fixed-img">
                         <div class="container tour-gallery__image-list-item">
                             <img id="expandedImg" class="tour-gallery__preview-ratio" style="width: 100%" src="{{ asset('admin/uploads/gallry_images/'.$singleImglry->gallry_images) }}" />
                             <div id="imgtext"></div>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 scroll-img">
                        <ul class="Gallery-image-scroll">
                           @foreach($objVehicle->gallery as $key => $images)
                              <li class="image-list-all">
                                 <img
                                    id="myImg"
                                    src="{{ asset('admin/uploads/gallry_images/'.$images['gallry_images']) }}"
                                    style="width: 100%"
                                    onclick="myFunction(this);"
                                 />
                                 <div id="myModal" class="modal">
                                    <span class="close">&times;</span>
                                    <img class="modal-content" id="img01" />
                                 </div>
                              </li>
                             <!-- <div class="column">
                                 <img src="{{ asset('admin/uploads/gallry_images/'.$images['gallry_images']) }}" style="width: 100%" onclick="myFunction(this);" />
                             </div> -->
                             @endforeach
                           </ul>
                     </div>
                 </div>
               </div>
            </section>
         </div>
      @endif
      <!--- End -->
      <div class="section" id="sect">
         <form method="POST" id="addToCart" action="{{ url('cart/add') }}">
            @csrf
            <input type="hidden" name="id" value="{{$objVehicle->random_id}}">
            <div class="row row--g-10">
               @if($objVehicle->tour->fixed_voucher_status == 1)
               <div class="col-12 col-lg-12 col-xxl-4 col-xl-5  col-sm-12" data-gtm-vis-recent-on-screen-30257650_40="769" data-gtm-vis-first-on-screen-30257650_40="769" data-gtm-vis-total-visible-time-30257650_40="100" data-gtm-vis-has-fired-30257650_40="1">
                  @if($objVehicle->type !== 'Safari')
                  <div class="dates picker card--shadow-orange">
                     <div id="bookingHeading">
                        <h1>Select Pickup Date</h1>
                     </div>
                     <!-- calander -->
                     <div id="container" style="margin: 10px 0 15px 0; height: 255px; position: relative"></div>
                     <div class="well">
                        <div class="row">
                           <div class="col-sm-12 pt-2">
                              <h1> Select Pickup Time </h1>
                              <div style="overflow-x:auto;">
                                 <table id="times">
                                    <tbody>
                                       <tr>
                                          @if(isset($objVehicle->availableSlot))
                                             @foreach($objVehicle->availableSlot as $value) 
                                                <td class="selectTime" data-time="{{$value->timeSlot->text}}">{{$value->timeSlot->text}}</th>
                                             @endforeach
                                          @endif
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <label>Date</label>
                              <input id="datepicker" type="text" name="booking_date" class="form-control filled" data-zdp_readonly_element="true">
                           </div>
                           <div class="col-sm-6">
                              <label>Time</label>
                              <input id="select-available-time" type="text" name="time" class="form-control filled" value="@if($objVehicle->type === 'Safari'){{$objVehicle->pickup_time}}@endif" readonly>
                           </div>
                        </div>
                     </div>
                     <!-- end -->
                  </div>
                  @else
                  <div class="dates picker card--shadow-orange">
                     <div id="bookingHeading">
                        <h1>Select Pickup Date</h1>
                     </div>
                     <!-- calander -->
                     <div id="container" style="margin: 10px 0 15px 0; height: 255px; position: relative"></div>
                     <div class="well">
                       <div class="row">
                          
                              <div class="col-sm-6" style="margin-top:15%;">
                                 <label>Date</label>
                                 <input id="datepicker" type="text" name="booking_date" class="form-control filled" data-zdp_readonly_element="true">
                              </div>
                          
                        </div>
                        <div class="row">
                           <div class="col-sm-12 pt-2">
                              <h1>Pickup Time</h1>
                           </div>
                           <div class="col-sm-6">
                              <label>Time</label>
                              <input id="select-available-time" type="text" name="time" class="form-control filled" value="@if($objVehicle->type === 'Safari'){{$objVehicle->pickup_time}}@endif" readonly>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12 pt-2">
                              <h1>DropOff Time</h1>
                           </div>
                           <div class="col-sm-6">
                              <label>Time</label>
                              <input id="select-available-time" type="text" name="time" class="form-control filled" value="@if($objVehicle->type === 'Safari'){{$objVehicle->dropoff_time}}@endif" readonly>
                           </div>
                        </div>
                     </div>
                     <!-- end -->
                  </div>
                  @endif
               </div>
               @endif
               <div class="col-12 col-lg-12 col-xl-7 col-xxl-6  col-sm-12" data-gtm-vis-recent-on-screen-30257650_40="769" data-gtm-vis-first-on-screen-30257650_40="769" data-gtm-vis-total-visible-time-30257650_40="100" data-gtm-vis-has-fired-30257650_40="1"  id="cartcol" style="display:none">
                  <div class="mb-30em animated fadeInUp active " id="duration">
                     <div class="card card--shadow-orange">
                        <div class="card__content">
                           <div class="card__headline card__headline--with-price">
                              <div class="card__headline-left headline-wave">
                                 <h2 class="headline-3">{{$objVehicle->name}}</h2>
                                 <svg  height="16px" class="stroke-orange">
                                    <use xlink:href="#icon-wave-squiggle"></use>
                                 </svg>
                              </div>
                              <div class="card__headline-price-wrapper">
                              </div>
                           </div>
                           <div class="content mt-10em mb-10em">
                           </div>
                           <div class="row amount-show">
                              <div class="col-lg-3 col-md-3 col-sm-6">
                                 @if($objVehicle->type == 'Tour')
                                 <h5>Duration</h5>
                                 @endif
                                 @if($objVehicle->type == 'Tour')
                                 <td>
                                 <div class="form__row">
                                    <div class="form__row__left">
                                       <div class="form__group">
                                       <select id="select-time">
                                             @foreach($objVehicle->prices as $value)  
                                                <option value="@if(isset($dealsDiscount)) {{$value->amount - ($value->amount * ($dealsDiscount / 100))}}@else{{$value->amount}}@endif">{{$value->time}} Min</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 </td>
                                 @endif
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6">
                                 <table>
                                 <h5>Amount</h5>
                                 <td id="selected-price">
                                    @if($objVehicle->type == 'Safari')
                                       @foreach($objVehicle->prices as $value)  
                                         {{$value->amount}}
                                         <input type="hidden" name="total_price" id="safariPrice"  value="{{$value->amount}}">
                                       @endforeach
                                       @endif
                                    </td>
                                 </table>
                                 @if($objVehicle->type == 'Tour')
                                 <input type="hidden" name="total_price" id="postAmount"  value="">
                                 @endif
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6">
                                 <h5>Quantity</h5>
                                 <td class="qntityBtn">
                                    <button type="button" id="sub" class="sub">-</button>
                                    <input style="width:60px;text-align:center;" name="quantity" class="quantity-class" type="number" value="1" min="1" max="@if(isset($objVehicle->quantity) && $objVehicle->quantity){{ $objVehicle->quantity }}@endif" />
                                    <button type="button" id="add" class="add">+</button>
                                 </td>
                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6">
                                 <h5>Total</h5>
                                 <td>
                                    @if($objVehicle->type == 'Safari')
                                       <input type="text" id="total-amount-safari" value="@foreach($objVehicle->prices as $value){{$value->amount}}@endforeach" readonly>
                                    @else
                                       <input type="text" id="total-tour-amount" readonly>
                                    @endif
                                 </td>
                              </div>
                           </div>

                           <h1 style="font-size: 1.75rem; padding-top:10px;">Extra Activities</h1>
                            @foreach($extraActivitys as $key => $value)
                           <div class="row pt-3">
                              <div class="col-lg-5 col-md-5 col-sm-12 item-pricechange">
                                 <td><strong class="mb-20em" name="etraname">{{$value->title}}</strong></td>
                              </div>
                              <div class="col-lg-7 col-md-7 col-sm-12 toggle-btnprice">
                              <td>
                                 <label class="switch" style="margin-right: 25px;">
                                 <input data-id ="extraa{{$key}}" id="{{$value->id}}" type="checkbox" name="extra_price[]" value="{{$value->id}}" class="checkBoxId">
                                    <span class="slider round"></span>
                                 </label>
                              </td>
                                 <td class="qntityBtn">
                                    <div class="{{$value->id}}" data-id ="extraa{{$key}}" style="display:none">
                                    <div class="Toggle-qntitybtn" id="new{{$value->id}}">
                                    <!-- Qunantity input filed from line no 591 -->
                                    </div>
                                    </div>
                                 </td>
      
                              <td id="extraAcPrice">
                                 <strong class="mb-20em">{{$value->price}} AED</strong>
                              </td>
                              </div>
                           </div>
                           @endforeach 

                           @if($objVehicle->available_quantity < 1) 
                           <marquee width="100%" direction="left" height="100px"><p class="headline-3 vehicleName mt-3 colorText">
                           This Vehicle Is Not Available At The Moment.
                           </p></marquee>
                           @else
                                 <input type="hidden" value="{{$objVehicle->tour->voucher}}" name="voucher" >
                                 <input type="hidden" value="{{$objVehicle->tour->name}}" name="tour_name">
                                 <input type="hidden" value="{{$objVehicle->tour->voucher_status}}" name="voucher_status">
                                 <input type="hidden" value="{{$objVehicle->tour->fixed_voucher_status}}" name="fixed_voucher_status">
                                 <input type="hidden" value="{{$objVehicle->tour->supplier_id}}" name="supplier_id">
                           <x-primary-button class="ml-4 btn btn-primary profile-button btn--purple">
                              {{ __('Book Now') }}
                           </x-primary-button>
                           @endif
                          </div>
                          <!--pick_status code start-->
                         
                            <div class="row">
                               <div class="col-12 Pickup-without">
                                    @if($objVehicle->pickup_status == 1)
                                   <div class="form-check">
                                         <input class="form-check-input" type="radio" name="without_pickup" value=0 id="pickup" checked>
                                         <label class="form-check-label" for="pickup" >
                                           With Pickup
                                         </label>
                                    </div>
                                    @endif
                                    @if($objVehicle->pickup_status == 0)
                                    <div class="form-check">
                                         <input class="form-check-input" type="radio" name="without_pickup" value="{{$objVehicle->disc}}" id="without-pickup" checked>
                                         <label class="form-check-label" for="without-pickup">
                                            Without Pickup
                                         </label>
                                    </div>
                                    @endif
                                    @if($objVehicle->pickup_status == 2)
                                     <div class="form-check">
                                         <input class="form-check-input" type="radio" name="without_pickup" value=0 id="pickup" checked>
                                         <label class="form-check-label" for="pickup" >
                                           With Pickup
                                         </label>
                                    </div>
                                    <div class="form-check">
                                         <input class="form-check-input" type="radio" name="without_pickup" value="{{$objVehicle->disc}}" id="without-pickup">
                                         <label class="form-check-label" for="without-pickup">
                                            Without Pickup
                                         </label>
                                    </div>
                                    @endif
                               </div>
                           </div>
                         
                           <!--pick_status code end-->
                           @if($objVehicle->pickup_status == 0  || $objVehicle->pickup_status == 2)
                           <div class="row">
                              <div class="col-12 Pickup-message">
                                 <h4 id="full">{{$objVehicle->disc}}% Off Without Pickup</h4> 
                              </div>
                           </div>
                           @endif
                          </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </main>
   <input type="hidden" id="available-quantity" value="{{ $objVehicle->quantity }}">
   </x-front.master-layout>
   <script>
      function myFunction(imgs) {
          var expandImg = document.getElementById("expandedImg");
          var imgText = document.getElementById("imgtext");
          expandImg.src = imgs.src;
          imgText.innerHTML = imgs.alt;
      }
      var modal = document.getElementById("myModal");
      // var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
      };
      var span = document.getElementsByClassName("close")[0];
      span.onclick = function () {
        modal.style.display = "none";
      };
  </script>
   <script>
   $(document).ready(function() {
      let fixed_voucher_status = '<?php echo $objVehicle->tour->fixed_voucher_status; ?>' 
       if(fixed_voucher_status == 0){
         $('#cartcol').show();
       }
      // Select Time
      let price = $('#select-time').val();
      jQuery('#postAmount').val(price);
      jQuery('#selected-price').html(price);
      jQuery('#total-tour-amount').val(price);

      jQuery('body').on('change','#select-time', function(){
         let price = $(this).val();
         $('#selected-price').text(price);
         jQuery('#postAmount').val(price);
         $('#total-tour-amount').val(price);
      });

      jQuery('body').on('click','.selectTime',function() { 
         $('#select-available-time').val($(this).attr('data-time'));
         $('#cartcol').show();
      });
      
      jQuery('#datepicker').Zebra_DatePicker({
         format: 'd-m-Y',
         direction: true,
         always_visible: $('#container') 
      });

      jQuery('body').on('click','.Zebra_DatePicker',function(){
         $('#cartcol').show();
      });

      // Quantity Plus Minus
      jQuery('.add').click(function () {
         let val = jQuery("#available-quantity").val();
         console.log(val)
         console.log(typeof(val))
         val=parseInt(val)
         console.log(typeof(val))
         if (jQuery(this).prev().val() < val) {
            jQuery(this).prev().val(+jQuery(this).prev().val() + 1);
         }

         var quantity = $(this).prev('input').val();
         var curentPrice = $('#select-time').val();
         var price = (curentPrice * quantity).toFixed(2);

            var safariprice = $('#safariPrice').val();
            var safari = (safariprice * quantity).toFixed(2);

         $('#total-amount-safari').val(safari);  
         $('#total-tour-amount').val(price);  
      });
      jQuery('.sub').click(function () {
         if (jQuery(this).next().val() > 1) {
            if (jQuery(this).next().val() > 1) jQuery(this).next().val(+jQuery(this).next().val() - 1);
         }

         let quantity = $(this).next('input').val();
         let curentPrice = $('#select-time').val();
         let price = (curentPrice * quantity).toFixed(2);
         var safariprice = $('#safariPrice').val();
         var safari = (safariprice * quantity).toFixed(2);

         $('#total-amount-safari').val(safari);  
         $('#total-tour-amount').val(price);  
      });

      document.getElementById('must-know').onclick =  funtion = () =>   {
         let mustKnowContent = document.getElementById('must-know-content');
         mustKnowContent.style.display == "none" ? mustKnowContent.style.display = "block" : mustKnowContent.style.display = "none"
      };

      document.getElementById('tour-itenary').onclick =  funtion = () =>   {
         let mustKnowContent = document.getElementById('tour-itenary-content');
         mustKnowContent.style.display == "none" ? mustKnowContent.style.display = "block" : mustKnowContent.style.display = "none"
      };

      document.getElementById('additional-info').onclick =  funtion = () =>   {
         let mustKnowContent = document.getElementById('additional-info-content');
         mustKnowContent.style.display == "none" ? mustKnowContent.style.display = "block" : mustKnowContent.style.display = "none"
      };
      
      // Add To Card 
      jQuery('body').on('submit','#addToCart',function(e){
         e.preventDefault();
         $.ajax({
            type: $(this).prop('method'),
            url: $(this).prop('action'),
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
               if((response.error)){
                  toastr.error(response.error);
               }else{
                  toastr.success(response.success);
               
                  setTimeout(function () {
                     window.location.href = "{{ url('cart') }}";
                  }, 2000);
               }
            },
            error: function (response){
               toastr.warning("Something went wrong! Please try again!");
            }
         });
      });
      
      $('.checkBox').on('click', function(){
         if ( $(this).prop('checked') ) {
            $('.checkboxQntity').show();
         }else{
         $('.checkboxQntity').hide();
         }
      });
            // extra quentity
         // Quantity Plus Minus
      //    jQuery('.add1').click(function () {
      //    let val = jQuery("#extraAvailable").val(1);
      //    if (jQuery(this).prev().val() < 9) {
      //       jQuery(this).prev().val(+jQuery(this).prev().val() + 1);
      //       var quantity = $(this).prev('input').val();
      //       $('.extraPkg').val(quantity);
      //    }

      // });
      // jQuery('.sub1').click(function () {
      //    if (jQuery(this).next().val() > 1) {
      //       if (jQuery(this).next().val() > 1) jQuery(this).next().val(+jQuery(this).next().val() - 1);
      //       var quantity = $(this).next('input').val();
      //       $('.extraPkg').val(quantity);
      //    }
      // });
      
       var array = jQuery.parseJSON('{!! $extraActivitys !!}');
         $.each(array, function(index, val) {
            var id = val.id;
            jQuery('#'+id).click(function() {

               if($(this).is(":checked")) {
                  $('.'+id).css("display","block");   
                  $('#new'+id).html('<input type="number" class="extraAvailable" name="extraQuntity[]" type="number" value="1" min="1" max="9">')         
               }
               else{
                  $('.'+id).css("display","none");
                  $('#new'+id).html('');
               }
            });
         });
      // end

      // $('#without-pickup').on('click',function(){
      //    $('.Pickup-message').css("display","block");
      // })
      // $('#pickup').on('click',function(){
      //    $('.Pickup-message').css("display","none");
      // })


//   10 percent off backgrond change js 

      var div = document.getElementById("full");
      function getRandomColor() {
         var letters = '0123456789ABCDEF';
         var color = '#';
         for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
         }
         return color;
      }

      function changeColor(){
      div.style.backgroundColor= getRandomColor();
      }

      setInterval(changeColor,1000);

   });
   </script>