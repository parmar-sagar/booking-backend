<x-front.master-layout>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container pb-5 mb-2 cart-checkoutpage">
  @if($carts->isEmpty())
    <div class="row row--g-10 pb-2em mt-5">
      <div class="col-12 col-lg-10 offset-xxl-1">
        <div class="card card--shadow-purple mb-80em">
          <div class="row row--full row--g-10">
            <div class="col-lg-12 mt-20em mb-20em  text-center">
              <div class="headline-wave headline-wave--center">
                <h1 class="headline-1">No Packages Booked Yet !!</h1>
                <svg width="100px" height="16px" class="stroke-orange">
                  <use xlink:href="fonts/icons.svg#icon-wave-squiggle"></use>
                </svg>
              </div>
            <div class="content mt-10em"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores
              blanditiis obcaecati architecto tempore facilis eveniet in qui! Minus, vel unde!
            </div>
          </div>
        </div>
          <div class="row row--full row--g-10">
            <div class="col-lg-4 mt-20em mb-20em  text-center">
              <a class="btn btn--orange " href="{{url('/')}}" title="Why Choose Us"> Back To Home </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
  <div class="cart-checkoutpage1">
    @php 
    $extraAmount = 0; 
    @endphp
    @foreach($carts as $key => $value)
    @php 
    $extraAmount += $value->attributes->extra_amount; 
    @endphp
    <!-- Cart Item-->
    <div class="row">
    <div class="cart-item-extra">
      <div class="cart-item d-md-flex justify-content-between pb-0 mb-0">
        <span class="remove-item">
          <a class="remove" href="javascript:void(0);" data-id="{{ $value->id }}">
            <i class="fa fa-times"></i>
          </a>
        </span>
        <div class="px-3 my-3">
          <div class="cart-item-product-thumb">  
            <img src="https://img.veenaworld.com/wp-content/uploads/2022/02/Dubai-800x530.jpg?imwidth=1080" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="cart-item-product-info">
            <h4 class="cart-item-product-title">{{ $value->name }}</h4><span><strong>Time - </strong>{{ $value->attributes->time }}</span><span><strong>Booking Date - </strong>{{ $value->attributes->booking_date }}</span>
          </div>
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
          <div class="cart-item-label">Total</div><span class="text-xl font-weight-medium">{{ ($value->price * $value->quantity)}} AED</span>
        </div>
        <div class="px-3 my-3 text-center">
          <div class="cart-item-label">Action</div>
          <span class="text-xl font-weight-medium">
            <a href="{{ url('vehicles/details/'.$value->id) }}">
              <i class="fa-sharp fa-solid fa-pen-to-square"></i>
            </a>
          </span>
        </div>
      </div>
     @if($value->attributes->extra_product)
      <div class="product-details">
        <p><b>Extra Activities :-</b></p>
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
          <h6>Total: <b>{{ $value['price']*$value['extra_quntity'] }}AED </b></h6>
        </div>
        @endforeach
        </div>
      </div>
      @endif
    </div>
   </div>
    @endforeach
    
   </div>
    <!-- Coupon + Subtotal-->
    <div class="row">
    <div class="d-sm-flex justify-content-between align-items-center text-center text-sm-left">
      <form id="apply-coupon" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="total" value="{{ $total + $extraAmount }}" name="total">
        <div class="form-group coupon"> 
        <label>Have coupon?</label>
          <div class="input-group"> 
            <input type="text" class="form-control coupon" value="{{ $code }}" name="coupon" placeholder="Coupon code"> 
            <span class="input-group-append"> 
            @if($code)
            <button class="btn btn-primary btn-apply coupon apBtn" style="background: #0fba68" disabled>Applied</button> 
            @else
            <button class="btn btn-primary btn-apply coupon apBtn">Apply</button> 
            @endif
            </span> 
          </div>
        </div>
      </form> 
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12"></div>
      <div class="col-lg-4 col-md-4 col-sm-12 p-0">
    <div class="subt-disct-extra">
            <div class="py-2 alltotal">
                <span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Subtotal:</span><span class="d-inline-block align-middle text-xl font-weight-medium subtotal-value final-value" id="basket-subtotal">{{ number_format($total, 2) }} AED</span>
            </div>
            <div class="py-2 alltotal">
                <span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Extra Amount:</span><span class="d-inline-block align-middle text-xl font-weight-medium subtotal-value final-value" id="basket-subtotal">{{ number_format($extraAmount, 2) }} AED</span>
            </div>
            <div class="py-2 alltotal">
                <span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Discount:</span><span class="d-inline-block align-middle text-xl font-weight-medium subtotal-value final-value" id="discount">{{ $discount }} AED</span>
            </div>
            <div class="py-2 alltotal">
                <span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Total:</span><span class="d-inline-block align-middle text-xl font-weight-medium subtotal-value final-value grandCoupon grandTotal" id="grand-total">{{ number_format($total + $extraAmount - $discount, 2) }} AED</span>
                <input type="hidden" id="grandTotal" value="{{ $total + $extraAmount - $discount }}">
            </div>
        </div>
        </div>
</div>
    <!-- Buttons-->
    <hr class="my-2">
    <div class="row pt-3 pb-5 mb-2 checkot-btnn">
        <div class="col-sm-6 mb-3"><a class="btn btn-style-1 btn-primary btn-block" href="{{url('checkout')}}"><i class="fe-icon-credit-card"></i>&nbsp;Checkout</a></div>
    </div>
    </div>
    @endif
</div>
</div>

</x-front.master-layout>
<script>
  jQuery('body').on('click', '.remove', function() {
    let id = $(this).data('id');
    $.ajax({
      url: "{{ url('cart/remove') }}/"+ id,  
      success: function (response) {
            if((response.error)){
              toastr.error(response.error);
            }else{
              toastr.success(response.success); 
              setTimeout(function () {
                location.reload();
              }, 1000);             
            }
        }           
    });
  });

  //Apply Coupon
  $(document).on('submit','#apply-coupon',function(e){
    $("#total").val($("#grandTotal").val());
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
            $('.apBtn').text('Apply');
            $('.apBtn').css('background','#00bcd4');
            $('.apBtn').prop("disabled", false);
            toastr.error(response.error);
          }else{
            $("#grand-total").html(response.data.total+' AED');
            $("#discount").html(response.data.discount+' AED');
            $('.apBtn').text('Applied');
            $('.apBtn').css('background','#0fba68');
            $('.apBtn').prop("disabled", true);
            toastr.success(response.success);
          }
        },error: function (error){
            toastr.error('something is wrong');
        }
    });
  });
</script>
