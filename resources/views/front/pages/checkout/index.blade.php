<x-front.master-layout>
    <div class="container cart" style="margin-bottom:10px;padding-bottom:10px;margin-top:135px;">
        <div class="row cart-row-scroll">
            @php 
            $extraAmount = 0; 
            $showPickup = 0;
            @endphp 
            @foreach($carts as $key => $value)
            @if(in_array($value->attributes->tour_name,['Dune Buggies','Quad Bikes']) && $value->attributes->voucher_status == 1)
            @php
            $showPickup++;
            @endphp
            @endif
            @php 
            $extraAmount += $value->attributes->extra_amount; 
            @endphp
                <div class="col-lg-12 col-md-12 col-sm-12 content cart-item mb-20 pb-20 checkout-final" style="width:100%">
                    <div class="cart-item-extra">
                        <div class="cart-item d-md-flex justify-content-between pb-0 mb-0">
                            <div class="px-3 my-3 text-center">
                                <div class="cart-item-label">Item</div>
                                <span class="text-xl font-weight-medium">{{ $value->name }}</span>
                            </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">Price</div>
                            <span class="text-xl font-weight-medium">{{ ($value->price)}} AED</span>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">Quantity</div>
                            <div class="count-input">
                                <option>{{ $value->quantity }}</option>
                            </div>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">Total</div>
                            <span class="text-xl font-weight-medium">{{ ($value->price * $value->quantity)}} AED</span>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">Booking Date</div>
                            <span>28-02-2023</span>
                        </div>
                        <div class="px-3 my-3 text-center">
                            <div class="cart-item-label">Time</div>
                            <span>12:00 AM</span>
                        </div>
                    </div>
                    @if($value->attributes->extra_product)
                    <div class="product-details">
                        <p><b>Extra Activities :-</b> </p>
                        <div class="row">
                         @foreach($value->attributes->extra_product as $key => $value)
                            <div class="col-lg-12 col-md-12 col-sm-12 heading-item-title">
                                <h6>{{ $value['title'] }}</h6>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <h6>Price: <b>{{ $value['price'] }}AED </b></h6>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                              <h6>Quantity: <b>{{ $value['extra_quntity'] }} </b></h6>
                           </div>
                           <div class="col-lg-12 col-md-12 col-sm-12 totalFinlVal">
                              <h6>Total: <b>{{ $value['price']*$value['extra_quntity'] }} AED</b></h6>
                           </div>
                        @endforeach
                        </div>
                    </div>
                    @endif
                </div>  
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
                <aside>
                    <div class="summary card--shadow-orangeBlood">
                        <div class="summary-total-items">
                            <span class="total-items"></span> Items in your Bag
                        </div>
                        <div class="summary-subtotal">
                            <div class="subtotal-title">Subtotal</div>
                            <div class="subtotal-value final-value" id="basket-subtotal">{{ $subTotal }} AED</div>
                            <br>
                            <br>
                            <div class="subtotal-title">Extra Activities</div>
                            <div class="subtotal-value final-value" id="basket-subtotal">{{ number_format($extraAmount, 2) }} AED</div>
                            <br>
                            <br>
                            <div class="subtotal-title">Discount</div>
                            <div class="subtotal-value final-value" id="discount">{{ $discount }} AED</div>
                            <br>
                            <div class="summary-total">
                                <div class="total-title">Total</div>
                                <div class="total-value final-value grandCoupon" id="basket-total">{{ number_format($total + $extraAmount - $discount, 2) }} AED</div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
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
                              <input type="text" name="first_name" id="first_name" placeholder="First Name" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->first_name }}@endif" class="form__input-blank" required="">
                           </div>
                        </div>
                        <div class="form__row__left">
                           <div class="form__group">
                              <input type="text" name="last_name" id="last_name" placeholder="Last Name(Optional)" value="@if(isset(Auth::user()->last_name)){{ Auth::user()->last_name }}@endif" class="form__input-blank">
                           </div>
                        </div>
                     </div>
                     <div class="form__row">
                        <div class="form__group">
                           <input type="number" name="mobile" id="mobile" placeholder="Phone/Whatsapp (with country code)" value="@if(isset(Auth::user()->mobile)){{ Auth::user()->mobile }}@endif" class="form__input-blank" required="">
                        </div>
                     </div>
                     <div class="form__row ">
                        <div class="form__group">
                           <input type="email" name="email" id="email" placeholder="Email" value="@if(isset(Auth::user()->email)){{ Auth::user()->email }}@endif" class="form__input-blank" required="">
                        </div>
                     </div>
                     <!-- if(in_array($showPickup)&& status == 1) -->
                      @if($showPickup != 0)
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="pickup"checked>
                        <label class="form-check-label" for="pickup">
                        Pickup
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="without-pickup" >
                        <label class="form-check-label" for="without-pickup">
                        Without Pickup
                        </label>
                     </div>
                     @endif
             
                     <div class="form__row" style="display:none" id="pickuplocation">
                        <div class="form__group">
                           <input type="text" name="pickup_location" placeholder="Pickup Location (Hotel Or Residence)"  id="pickup_location" class="form__input-blank" required>
                        </div>
                     </div>
                   
                     <div class="form__row">
                        <div class="form__group">
                        <label for="pickup_location*">No of Travelers*</label>
                           <select class="form-control" name="no_of_travelers" aria-label="Default select example" required>
                                 @for ($x = 1; $x <= 24; $x++)
                                    <option value="{{$x}}">{{$x}}</option>
                                 @endfor
                           </select>
                        </div>
                     </div>
                     <!-- <div class="form__row">
                        <h3 class="headline-6 mt-20em mb-10em"><a href="{{url('term-and-conditions')}}" target="blank"> I agree to the Terms & Conditions</a></h3>
                        <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                        </label>
                     </div>  -->
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms" value="" id="flexCheckDefault" required>
                        <label class="form-check-label" for="flexCheckDefault">
                        I agree to the Terms & Conditions
                        </label>
                     </div>
                     @if(!Auth::user())
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="Register" value="" id="flexCheckDefault1">
                        <label class="form-check-label" for="flexCheckDefault1">
                        Register On Website
                        </label>
                     </div>
                     @endif  
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
                              @if($showPickup == 0)
                              <p>
                                 <strong class="mb-1em">Payment on Arrival </strong>
                                 <label class="switch">
                                    <input type="checkbox" class="filled checkoption" name="payment_method" value="Payment on Arrival">
                                    <span class="slider round"></span>
                                 </label>
                              </p>
                              @endif
                           </div>
                        </div>
                     </div>
                     <!-- <div class="form__row otpInput" style="display: none">
                        <div class="form__group">
                           <input type="number" name="otp" id="otp" placeholder="Enter OTP" class="form__input-blank">
                        </div>
                     </div> -->
                     <div class="form__row">
                        <div class=" text-center">
                           <button class="btn mt-10em chip--orange profile-button" type="submit"> PLACE ORDER </button>
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
               //$('.otpInput').show();
               // $('#email').attr('readonly');
               // $('#submit-check-user').attr('id','submit-verify');
               // toastr.success(response.success);
               $('#submit-check-user').attr('id','submit-payment');
               document.getElementById('submit-payment').submit(); 
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
         
    // select only one payment option
    $('.checkoption').click(function() {
         $('.checkoption').not(this).prop('checked', false);
      });
    // end

    $('#pickuplocation').show();
$('#pickup').on('click',function(){
    $('#pickuplocation').css("display","block");
})
$('#without-pickup').on('click',function(){
    $('#pickuplocation').css("display","none");
})

});    
 </script>