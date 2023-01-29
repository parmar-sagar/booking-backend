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
                    <table class="responsive-mobileU">
                    <tbody>
                        @php $grandTotal=0; @endphp
                        @foreach($carts as $key => $value)
                        @php $grandTotal += $value->attributes->total;
                        @endphp
                        <tr style="border-bottom: 4px solid #f7104c;padding-bottom: 20px;">
                        <tr>
                            <th >Item</th>
                            <td>{{$value->name}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$value->price}} AED</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{$value->attributes->bookingdate}}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{$value->attributes->time}}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{$value->quantity}}</td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{$value->attributes->subtotal}}</td>
                        </tr>
                        <tr>
                            <th>Extra Activities :-</th>
                        </tr>
                        @foreach($value->attributes->extra_product as $key => $value)
                        <tr>
                        <tr>
                            <th >Item</th>
                            <td>{{ $value['title'] }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $value['price'] }} AED</td>
                        </tr>
                        </tr>
                        </tr >
                        @endforeach
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div><br><br>
        </div>
       <div class="col-lg-4 col-md-12 col-sm-12" style="padding: 0px;">
          <aside>
             <div class="summary card--shadow-orangeBlood" style="margin-bottom:50px;padding-bottom:50px;">
                <div class="summary-total-items">
                   <span class="total-items"></span> Items in your Bag
                </div>
                <div class="summary-subtotal">
                   <div class="subtotal-title">Subtotal</div>
                   <div class="subtotal-value final-value" id="basket-subtotal">{{$grandTotal}} AED</div>
                   <br>
                   <br>
                   <form id="submit-form" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                   <form id="submit-payment" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                               <input type="text" name="last_name" id="last_name" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->last_name }}@endif" class="form__input-blank" required="">
                               <label class="form__label-blank" for="last_name">Last Name*</label>
                            </div>
                         </div>
                      </div>
                      <div class="form__row">
                         <div class="form__group">
                            <input type="tel" name="number" id="number" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->number }}@endif" class="form__input-blank" required="">
                            <label class="form__label-blank" for="number">Phone*</label>
                         </div>
                      </div>
                      <div class="form__row">
                         {{-- 
                         <div class="form__group">
                            <select name="gender" class="select select--blank" id="gender" required="" sb="23496588" style="display: none;">
                               <option value="">Gender*</option>
                               <option value="Male"  @if(isset(Auth::user()->first_name))@if(Auth::user()->gender == 'Male') selected @endif @endif>Male</option>
                               <option value="Female" @if(isset(Auth::user()->first_name))@if(Auth::user()->gender == 'Female') selected @endif @endif>Female</option>
                            </select>
                         </div>
                         --}}
                      </div>
                      <div class="form__row ">
                         <div class="form__group">
                            <input type="email" name="email" id="email" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->email }}@endif" class="form__input-blank" required="">
                            <label class="form__label-blank" for="email">Email*</label>
                         </div>
                      </div>
                      <div class="form__row">
                         <div class="form__group">
                            <input type="tel" name="number" id="number" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->number }}@endif" class="form__input-blank">
                            <label class="form__label-blank" for="pickup_location*">Pickup Location*</label>
                         </div>
                      </div>
                      <div class="form__row">
                         <div class="form__group">
                            <input type="tel" name="number" id="number" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->number }}@endif" class="form__input-blank">
                            <label class="form__label-blank" for="pickup_location*">Write Your Preferred Pickup Time*</label>
                         </div>
                      </div>
                      <!-- <div class="form__row">
                         <div class="form__group">
                           <input type="text" name="address[line_1]" id="address-line-1" class="form__input-blank" required="">
                           <label for="address-line-1" class="form__label-blank">Address*</label>
                         </div>
                         </div>  -->
                      <div class="form__row">
                         <!-- <h3 class="headline-6 mt-20em mb-10em">Get yourself registered by clicking the button </h3> --}}
                            <label class="switch">
                             <input type="checkbox">
                             <span class="slider round"></span>
                            </label>  -->
                         <h3 class="headline-6 mt-20em mb-10em"><a href="{{url('term-and-conditions')}}" target="blank"> I agree to the Terms & Conditions</a></h3>
                         <label class="switch">
                         <input type="checkbox">
                         <span class="slider round"></span>
                         </label>
                      </div>
                      <div class="mt-15em  mb-15em  text-center">
                         <!-- <button class="btn chip--orange profile-button" type="button"> Next </button> -->
                      </div>
                </div>
             </div>
             <button class="accordion mt-15em" style="color:grey;">Payment Method</button>
             <div class="panel">
             <div class="product-details mt-10em ">
             <div class="toggle-payment"><p>
             <strong class="mb-20em ">Paypal</strong>
             <label class="switch">
             <input type="checkbox" class="filled checkoption">
             <span class="slider round"></span>
             </label>
             </p>
             <p>
             <strong class="mb-20em">Stripe </strong>
             <label class="switch">
             <input type="checkbox" class="filled checkoption">
             <span class="slider round"></span>
             </label>
             </p>
             <p>
             <strong class="mb-1em">Payment on Arrival </strong>
             <label class="switch">
             <input type="checkbox" class="filled checkoption">
             <span class="slider round"></span>
             </label>
             </p></div>
             <div class=" text-center">
             <button class="btn mt-10em chip--orange profile-button" type="button"> Pay </button>
             </div>
             </div>
             </form>
             </div>
          </div>
       </div>
    </div>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input type="hidden" name="cmd" value="_cart"> <input type="hidden" name="business" value="seller@designerfotos.com"> <input type="hidden" name="item_name" value="hat"> <input type="hidden" name="item_number" value="123"> <input type="hidden" name="amount" value="15.00"> <input type="hidden" name="first_name" value="John"> <input type="hidden" name="last_name" value="Doe"> <input type="hidden" name="address1" value="9 Elm Street"> <input type="hidden" name="address2" value="Apt 5"> <input type="hidden" name="city" value="Berwyn"> <input type="hidden" name="state" value="PA"> <input type="hidden" name="zip" value="19312"> <input type="hidden" name="night_phone_a" value="610"> <input type="hidden" name="night_phone_b" value="555"> <input type="hidden" name="night_phone_c" value="1234"> <input type="hidden" name="email" value="jdoe@zyzzyu.com"> <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online" style="
       width: 10%;
       "> </form>
 </x-front.master-layout>
 <script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
    $(document).ready(function(){
         /* payment form Using Ajax */
      $(document).on('submit','#submit-payment',function(e){
        e.preventDefault();
        $.ajax({
            type: $(this).prop('method'),
            url: "{{url('payment')}}",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if((response.error)){
                  toastr.error(response.error);
                }else{
                  // $("#myProfile").load(window.location + " #myProfile");
                  toastr.success(response.success); 
                }
            },error: function (error){
              toastr.warning(error);
            }
        });
      });
    //Apply Coupon
    $(document).on('submit','#submit-form',function(e){
        e.preventDefault();
        $.ajax({
            type: $(this).prop('method'),
            url: "{{url('apply-coupon')}}",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if((response.error)){
                   toastr.error(response.error);
                }else{
    
                var grandtotal = "{{$grandTotal}}";
                var coupondiscount = response.data.ammount;
                var type = response.data.type;
    
                if(type == 1){
                var totalamt = "{{$grandTotal}}" - ("{{$grandTotal}}" * (coupondiscount / 100));
                }
                if(type == 0){
                  var totalamt = "{{$grandTotal}}" - coupondiscount;
                }
                  var discount = totalamt - grandtotal;
                $('.apBtn').text('Applied');
                $('.apBtn').css('background','#0fba68');
                $('.grandCoupon').text(totalamt +'  '+'AED');
                $('#discount').text(discount +'  '+'AED');
                $('#couponTable').show();
                toastr.success(response.success);
                }
            },error: function (error){
                 toastr.error('something is wrong');
            }
        });
    });
    // select only one payment option
    $('.checkoption').click(function() {
         $('.checkoption').not(this).prop('checked', false);
      });
    // end
    });    
 </script>