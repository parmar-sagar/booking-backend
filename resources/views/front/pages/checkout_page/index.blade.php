<x-front.master-layout>
<div class="container cart " style="margin-bottom:10px;padding-bottom:10px;">
<nav class="l-submenu mb-4 l-submenu--blurple border-img-bottom border-img-bottom--blurple">
            <div class="h2">
                <div class="col-12 p-3  d  text-center">
  <h1 class="h1"> Checkout </h1>
                </div>
            </div>
          </nav>
      @php 
      $cartCollection = Cart::getContent();
      $total = Cart::getSubTotal();
      @endphp
      <div class="col-lg-8 col-md-12 col-sm-12 content cart-item mb-20 pb-20">
        <div class="basket card--shadow-blurple">
        <div class="basket-labels basket-U">
        
          <table class="responsive-large-tabU">
                <tr>
                  <th >Item</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Qnty</th>
                  <th>Subtotal</th>
                </tr>
        
      @php $grandTotal=0; @endphp
       @foreach($cartCollection as $key => $cartItems)
       @php $grandTotal += $cartItems->attributes->total;
       @endphp
                <tr>
                  <td>{{$cartItems->name}}</td>
                  <td>{{$cartItems->price}} AED</td>
                  <td>{{$cartItems->attributes->bookingdate}}</td>
                  <td>{{$cartItems->attributes->time}}</td>
                  <td>{{$cartItems->quantity}}</td>
                  <td>{{$cartItems->attributes->subtotal}} AED</td>
                </tr>

                <tr>
                <th>Extra Activities :-</th>
                </tr>
                
                @foreach($cartItems->attributes->extra as $key => $val)
                <tr  style="border-bottom: 1px solid;">
                  <td>{{$key}}</td>
                  <td>{{$val}} AED</td>
                </tr>
                @endforeach 
                @endforeach
               
          </table>
          <table class="responsive-mobileU">
          <tbody>
          @php $grandTotal=0; @endphp
       @foreach($cartCollection as $key => $cartItems)
       @php $grandTotal += $cartItems->attributes->total;
       @endphp
              <tr style="border-bottom: 4px solid #f7104c;padding-bottom: 20px;">
                <tr>
                  <th >Item</th>
                  <td>{{$cartItems->name}}</td>
                  </tr>
                  <tr>
                  <th>Price</th>
                  <td>{{$cartItems->price}} AED</td>
                  </tr>
                  <tr>
                  <th>Date</th>
                  <td>{{$cartItems->attributes->bookingdate}}</td>
                  </tr>
                  <tr>
                  <th>Time</th>
                  <td>{{$cartItems->attributes->time}}</td>
                  </tr>
                  <tr>
                  <th>Quantity</th>
                  <td>{{$cartItems->quantity}}</td>
                  </tr>
                  <tr>
                  <th>Subtotal</th>
                  <td>{{$cartItems->attributes->subtotal}}</td>
                  </tr>
                  <tr>
                <th>Extra Activities :-</th>
                </tr>
                @foreach($cartItems->attributes->extra as $key => $val)
                <tr>
                <tr>
                  <th >Item</th>
                  <td>{{$key}}</td>
                  </tr>
                  <tr>
                  <th>Price</th>
                  <td>{{$val}} AED</td>
                  </tr>
                </tr>
                </tr >
                 @endforeach
                 @endforeach
                 </tbody>
          </table>
          </div>
          
        </div>
        <!-- @if (!Auth::check())
        <a class="btn btn--purple mt-15em" href="{{url('login')}}" title="View now"> LogIn </a>
        <a class="btn btn--purple mt-15em" href="{{url('register')}}" title="View now"> Register </a>
        @endif -->
        
        <br>
        <br>

      </div>
      <div class="col-lg-4 col-md-12  aside_content col-sm-12 cartop" style="padding: 0px;">
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
                      <label class="" for="first_name">First Name*</label>
                      <input type="text" class="form-control" name="first_name" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->first_name }}@endif">
                    </div>
                  </div>
                  <div class="form__row__left">
                    <div class="form__group">
                    <label for="last_name">Last Name*</label>
                      <input type="text" name="last_name" id="last_name" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->last_name }}@endif" class="form-control" required="">
                    </div>
                  </div>
                </div>
                <div class="form__row">
                  <div class="form__group">
                  <label for="number">Phone*</label>
                    <input type="tel" name="number" id="number" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->number }}@endif" class="form-control" required="">
                  </div>
                </div>
                <div class="form__row">
                </div>
                <div class="form__row ">
                  <div class="form__group">
                  <label for="email">Email*</label>
                    <input type="email" name="email" id="email" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->email }}@endif" class="form-control" required="">
                  </div>
                </div>
                <div class="form__row">
                  <div class="form__group">
                  <label for="pickup_location*">Pickup Location*</label>
                    <input type="text" name="number" id="number" value="@if(isset(Auth::user()->first_name)){{ Auth::user()->number }}@endif" placeholder="hotel or residence" class="form-control">
                  </div>
                </div>
                <div class="form__row">
                  <div class="form__group">
                  <label for="pickup_location*">No of Travelers*</label>
                  <select class="form-control" aria-label="Default select example">
                        @for ($x = 1; $x <= 20; $x++)
                            <option value="{{$x}}">{{$x}}</option>
                        @endfor
                  </select>
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
                  <button class="btn mt-10em chip--orange profile-button" type="button"> Place Order </button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
</div>
 
</x-front.master-layout>
<script src="{{asset ('assets/front/scripts/vendor7369.js?v=m0Wgcip88r')}}"></script> 
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
    // select only one payment option
    $('.checkoption').click(function() {
         $('.checkoption').not(this).prop('checked', false);
      });
    // end
});    
</script>