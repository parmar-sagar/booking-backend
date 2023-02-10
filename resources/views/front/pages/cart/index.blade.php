<x-front.master-layout>
  <div class="container cart mb-3 " id="carts">
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
      <div class="content  mb-20 pb-20">
        <div class="basket card--shadow-blurple">
            <div class="basket-labels">
              <ul>
                  <li class="item item-heading">Item</li>
                  <li class="price">Price</li>
                  <li class="price">Date</li>
                  <li class="price">Time</li>
                  <li class="price">Quantity</li>
                  <li class="price">Subtotal</li>
                  <li class="price">Action</li>
              </ul>
            </div>
            @php 
              $extraAmount = 0; 
            @endphp
            @foreach($carts as $key => $value)
              @php 
                $extraAmount += $value->attributes->extra_amount; 
              @endphp
              <div class="basket-product" style="border-top:2px solid black; ">
                <div class="item" >
                    <div class="product-image">
                      <img src="https://img.veenaworld.com/wp-content/uploads/2022/02/Dubai-800x530.jpg?imwidth=1080" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="productName">
                      <h1>
                          <strong>{{ $value->name }}</strong>
                      </h1>
                    </div>
                </div>
                <div class="product-tag-details-D">
                    <div class="price"><span class="tag-detail1"></span>{{ $value->price }} AED</div>
                    <div class="price"><span class="tag-detail1"></span>{{ $value->attributes->booking_date }}</div>
                    <div class="price"><span class="tag-detail1"></span>{{ $value->attributes->time }}</div>
                    <div class="quantity"><span class="tag-detail1"></span>{{ $value->quantity }}</div>
                    <div class="price"><span class="tag-detail1"></span>{{ ($value->price * $value->quantity) + $value->attributes->extra_amount }} AED</div>
                    <div class="price" style="display: flex;">
                      <span class="tag-detail1">
                        <a href="{{ url('view-detail/'.$value->id) }}">
                          <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="remove" href="javascript:void(0);" data-id="{{ $value->id }}">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                      </span>
                    </div>
                </div>
              </div>
              @if(!empty($value->attributes->additional))
                <div class="product-details">
                  <p>Extra Activities :- </p>
                  <div class="row">
                      @foreach($value->attributes->additional as $key => $value)
                        <div class="col-6">
                          <h6>{{ $value['title'] }}</h6>
                        </div>
                        <div class="col-6">
                          <h6>{{ $value['price'] }}AED</h6>
                        </div>
                      @endforeach
                  </div>
                </div>
              @endif
            @endforeach
        </div>
        <br>
        <br>
      </div>
      <div class="col-lg-4 col-sm-12 col-md-6 cart-payment">
        <aside>
          <div class="summary card--shadow-orangeBlood" style="margin-bottom:50px;padding-bottom:50px;">
            <div class="summary-total-items">
                <span class="total-items"></span> Items in your Bag
            </div>
            <div class="summary-subtotal">
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
                <div class="subtotal-title">Subtotal</div>
                <div class="subtotal-value final-value" id="basket-subtotal">{{ number_format($subTotal, 2) }} AED</div>
                <br>
                <br>
                <div class="subtotal-title">Extra Amount</div>
                <div class="subtotal-value final-value" id="basket-subtotal">{{ number_format($extraAmount, 2) }} AED</div>
                <br>
                <br>
                <div class="subtotal-title">Discount</div>
                <div class="subtotal-value final-value" id="discount">{{ $discount }} AED</div>
                <br>
                <div class="summary-total">
                  <div class="total-title">Total</div>
                  <div class="subtotal-value final-value grandCoupon grandTotal" id="grand-total">{{ number_format($total + $extraAmount - $discount, 2) }} AED</div>
                  <input type="hidden" id="grandTotal" value="{{ $total + $extraAmount - $discount }}">
                </div>
            </div>
          </div>
          <a class="btn btn--purple mt-0" href="{{url('checkout')}}"> Proceed to Checkout </a>
          <br>
          <br>
        </aside>
      </div>
    @endif
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
