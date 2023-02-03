<x-front.master-layout>
   <div class="container cart " style="margin-bottom:10px;padding-bottom:10px;">
      <div class="col-lg-8 col-md-12 col-sm-12 content cart-item mb-20 pb-20">
            <div class="basket card--shadow-blurple">
               <div class="basket-labels basket-U">
                  <table class="responsive-large-tabU">
                        <tr>
                           <th>Item</th>
                           <th>Price</th>
                           <th>Date</th>
                           <th>Time</th>
                           <th>Qnty</th>
                           <th>Subtotal</th>
                        </tr>
                        @php $grandTotal=0; @endphp
                        @foreach($carts as $key => $value)
                           <tr>
                              <td>{{$value->name}}</td>
                              <td>{{$value->price}} AED</td>
                              <td>{{$value->attributes->booking_date}}</td>
                              <td>{{$value->attributes->time}}</td>
                              <td>{{$value->quantity}}</td>
                              <td>{{ ($value->price * $value->quantity) + $value->attributes->extra_amount }} AED</td>
                           </tr>
                           @if(!empty($value->attributes->extra_product))
                              <tr>
                                    <th>Extra Activities :-</th>
                              </tr>
                              @foreach($value->attributes->extra_product as $key => $value)
                                    <tr style="border-bottom: 1px solid;">
                                       <td>{{ $value['title'] }}</td>
                                       <td>{{ $value['price'] }}AED</td>
                                    </tr>
                              @endforeach 
                           @endif
                        @endforeach
                  </table>
               </div>
            </div><br><br>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12" style="padding: 0px;">
         <aside>
            <div class="summary card--shadow-orangeBlood">
               <div class="summary-total-items">
                  <span class="total-items"></span> Items in your Bag
               </div>
               <div class="summary-subtotal">
                  <div class="subtotal-title">Subtotal</div>
                  <div class="subtotal-value final-value" id="basket-subtotal">{{$grandTotal}} AED</div>
                  <br>
                  <br>
                  <form id="submit-form1" method="POST" autocomplete="off" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group coupon">
                        <label>Have coupon?</label>
                        <div class="input-group"> 
                           <input type="text" class="form-control coupon" name="coupon" placeholder="Coupon code"> 
                           <span class="input-group-append"> 
                           <button class="btn btn-primary btn-apply coupon apBtn">Apply</button> 
                           </span> 
                        </div>
                     </div>
                  </form>
                  <div id="couponTable" style="display: none;">
                     <table class="responsive-large-tabU">
                        <tr>
                           <th>Subtotal</th>
                           <td>{{$grandTotal}} AED</td>
                        </tr>
                        <tr>
                           <th>Coupon Discount</th>
                           <td id="discount"></td>
                        <tr>
                        <tr>
                           <th>Total</th>
                           <td class="grandCoupon"></td>
                        <tr>
                     </table>
                  </div>
                  <div class="summary-total">
                     <div class="total-title">Total</div>
                     <div class="total-value final-value grandCoupon" id="basket-total">{{$grandTotal}} AED</div>
                  </div>
               </div>
            </div>
         </aside>
      </div>
   </div>
   <div class="container payment-profile">
      <div class="row">
         <h1>Fill the primary contact details</h1>
      </div>
      <div class="basket  col-lg-12  col-md-12 col-sm-12 mb-20em card--shadow-blue payment_selection mt-5" style="margin-bottom:30px!important;">
         <div class="basket-product">
            <button class="accordion bg-orange">My Profile</button>
            <div class="">
               <div class="p-0 py-0 mt-10em">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                     <h4 class="text-right">Contact Details</h4>
                  </div>
                  <form @if(isset(Auth::user()->id)) id="submit-payment" @else id="submit-check-user" @endif action="{{ url('payment') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                     @csrf
                     <div class="row mt-2">
                        <div class="form__row__left">
                           <div class="form__group">
                              <input type="text" name="first_name" id="first_name" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->first_name }}@endif" class="form__input-blank" required="">
                              <label class="form__label-blank" for="first_name">First Name*</label>
                           </div>
                        </div>
                        <div class="form__row__left">
                           <div class="form__group">
                              <input type="text" name="last_name" id="last_name" value="@if(isset(Auth::user()->last_name)){{ Auth::user()->last_name }}@endif" class="form__input-blank" required="">
                              <label class="form__label-blank" for="last_name">Last Name*</label>
                           </div>
                        </div>
                     </div>
                     <div class="form__row">
                        <div class="form__group">
                           <input type="number" name="mobile" id="mobile" value="@if(isset(Auth::user()->mobile)){{ Auth::user()->mobile }}@endif" class="form__input-blank" required="">
                           <label class="form__label-blank" for="mobile">Phone*</label>
                        </div>
                     </div>
                     <div class="form__row ">
                        <div class="form__group">
                           <input type="email" name="email" id="email" value="@if(isset(Auth::user()->email)){{ Auth::user()->email }}@endif" class="form__input-blank" required="">
                           <label class="form__label-blank" for="email">Email*</label>
                        </div>
                     </div>
                     <div class="form__row">
                        <div class="form__group">
                           <input type="text" name="pickup_location" id="pickup_location" class="form__input-blank">
                           <label class="form__label-blank" for="pickup_location">Pickup Location*</label>
                        </div>
                     </div>
                     <div class="form__row">
                        <div class="form__group">
                           <input type="text" name="pickup_time" id="pickup_time" class="form__input-blank">
                           <label class="form__label-blank" for="pickup_time">Write Your Preferred Pickup Time*</label>
                        </div>
                     </div>
                     <div class="form__row">
                        <h3 class="headline-6 mt-20em mb-10em"><a href="{{url('term-and-conditions')}}" target="blank"> I agree to the Terms & Conditions</a></h3>
                        <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                        </label>
                     </div>   
                     <button class="accordion mt-15em" style="color:grey;">Payment Method</button>
                     <div>
                        <div class="product-details mt-10em ">
                           <div class="toggle-payment">
                              <p>
                                 <strong class="mb-20em ">Paypal</strong>
                                 <label class="switch">
                                    <input type="checkbox" class="filled checkoption" name="payment_method" value="Paypal" checked>
                                    <span class="slider round"></span>
                                 </label>
                              </p>
                              <p>
                                 <strong class="mb-20em">Stripe </strong>
                                 <label class="switch">
                                    <input type="checkbox" class="filled checkoption" name="payment_method" value="Stripe">
                                    <span class="slider round"></span>
                                 </label>
                              </p>
                              <p>
                                 <strong class="mb-1em">Payment on Arrival </strong>
                                 <label class="switch">
                                    <input type="checkbox" class="filled checkoption" name="payment_method" value="Payment on Arrival">
                                    <span class="slider round"></span>
                                 </label>
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="form__row otpInput" style="display: none">
                        <div class="form__group">
                           <input type="number" name="otp" id="otp" class="form__input-blank">
                           <label class="form__label-blank" for="otp">Enter OTP</label>
                        </div>
                     </div>
                     <div class="form__row">
                        <div class=" text-center">
                           <button class="btn mt-10em chip--orange profile-button" type="submit"> Pay </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-front.master-layout>
 <script>
   $("#submit-check-user").validate();
   $("#submit-verify").validate();
   $("#submit-payment").validate();

   /* payment form Using Ajax */
   $(document).on('submit','#submit-check-user',function(e){
      e.preventDefault();
      $.ajax({
         type: $(this).prop('method'),
         url: "{{url('checkout/check-user')}}",
         data:new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (response) {
            if((response.error)){
               toastr.error(response.error);
            }else{
               $('.otpInput').show();
               $('#email').attr('readonly');
               $('#submit-check-user').attr('id','submit-verify');
               toastr.success(response.success); 
            }
         },error: function (error){
            toastr.warning(error);
         }
      });
   });

   $(document).on('submit','#submit-verify',function(e){
      e.preventDefault();
      $.ajax({
         type: $(this).prop('method'),
         url: "{{url('checkout/verify')}}",
         data:new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (response) {
            if((response.error)){
               toastr.error(response.error);
            }else{
               $('#submit-verify').attr('id','submit-payment');
               document.getElementById('submit-payment').submit();
            }
         },error: function (error){
            toastr.warning(error);
         }
      });
   });

   //  var acc = document.getElementsByClassName("accordion");
   //  var i;
    
   //  for (i = 0; i < acc.length; i++) {
   //      acc[i].addEventListener("click", function () {
   //          this.classList.toggle("active");
   //          var panel = this.nextElementSibling;
   //          if (panel.style.display === "block") {
   //              panel.style.display = "none";
   //          } else {
   //              panel.style.display = "block";
   //          }
   //      });
   //  }
    $(document).ready(function(){
         
    //Apply Coupon
   //  $(document).on('submit','#submit-form',function(e){
   //      e.preventDefault();
   //      $.ajax({
   //          type: $(this).prop('method'),
   //          url: "{{url('apply-coupon')}}",
   //          data:new FormData(this),
   //          contentType: false,
   //          cache: false,
   //          processData: false,
   //          success: function (response) {
   //              if((response.error)){
   //                 toastr.error(response.error);
   //              }else{
    
   //              var grandtotal = "{{$grandTotal}}";
   //              var coupondiscount = response.data.ammount;
   //              var type = response.data.type;
    
   //              if(type == 1){
   //              var totalamt = "{{$grandTotal}}" - ("{{$grandTotal}}" * (coupondiscount / 100));
   //              }
   //              if(type == 0){
   //                var totalamt = "{{$grandTotal}}" - coupondiscount;
   //              }
   //                var discount = totalamt - grandtotal;
   //              $('.apBtn').text('Applied');
   //              $('.apBtn').css('background','#0fba68');
   //              $('.grandCoupon').text(totalamt +'  '+'AED');
   //              $('#discount').text(discount +'  '+'AED');
   //              $('#couponTable').show();
   //              toastr.success(response.success);
   //              }
   //          },error: function (error){
   //               toastr.error('something is wrong');
   //          }
   //      });
   //  });
    // select only one payment option
    $('.checkoption').click(function() {
         $('.checkoption').not(this).prop('checked', false);
      });
    // end
    });    
 </script>