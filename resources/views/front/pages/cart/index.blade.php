<x-front.master-layout>
<div class="container cart mb-3 " id="carts">
      @php 
      $cartCollection = Cart::getContent();
      $total = Cart::getSubTotal();
      @endphp
      @if(Cart::isEmpty())
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
                  blanditiis obcaecati architecto tempore facilis eveniet in qui! Minus, vel unde!</div>
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
                 @php $grandTotal=0; @endphp
       @foreach($cartCollection as $key => $cartItems)
       @php $grandTotal += $cartItems->attributes->total;
       @endphp
       <div class="basket-product" style="border-top:2px solid black; ">
         <div class="item" >
           <div class="product-image">
             <img src="https://img.veenaworld.com/wp-content/uploads/2022/02/Dubai-800x530.jpg?imwidth=1080" alt="Placholder Image 2" class="product-frame">
           </div>
           <div class="productName">
           <h1>
             <strong>{{$cartItems->name}}</strong>
            </h1>
           </div>
         </div>
         <div class="product-tag-details-D">
         <div class="price"><span class="tag-detail1"></span>{{$cartItems->price}} AED</div>
            <div class="price"><span class="tag-detail1"></span>{{$cartItems->attributes->bookingdate}}</div>
            <div class="price"><span class="tag-detail1"></span>{{$cartItems->attributes->time}}</div>
            <div class="quantity"><span class="tag-detail1"></span>{{$cartItems->quantity}}</div>
            <div class="price"><span class="tag-detail1"></span>{{$cartItems->attributes->subtotal}} AED</div>
            <div class="price" style="display: flex;"><span class="tag-detail1">
            <a class="" href="{{url('view-detail/'.$cartItems->id)}}">
              <i class="fa-sharp fa-solid fa-pen-to-square">
              </i>
              </a>
              <a class="remove remove_cart" href="javascript:void(0);" data-id="{{$cartItems->id}}"><i class="fa-solid fa-trash"></i>
              </a>
            </span>
          </div>
          </div>
           <div class="product-tag-details-M">
              <div class="price"><span class="tag-detail">Price - </span>{{$cartItems->price}} AED</div>
              <div class="price"><span class="tag-detail">Booking Date - </span>{{$cartItems->attributes->bookingdate}}</div>
              <div class="price"><span class="tag-detail">Time - </span>{{$cartItems->attributes->time}}</div>
              <div class="quantity"><span class="tag-detail">Quantity - </span>{{$cartItems->quantity}}</div>
              <div class="price"><span class="tag-detail">Subtotal - </span>{{$cartItems->attributes->subtotal}} AED</div>
              <div class="price"><span class="tag-detail">Action -<a class="" href="{{url('view-detail/'.$cartItems->id)}}">
              <i class="fa-sharp fa-solid fa-pen-to-square">
              </i>
              </a>
              <a class="remove remove_cart" href="javascript:void(0);" data-id="{{$cartItems->id}}"><i class="fa-solid fa-trash"></i>
              </a></span></div>
           </div>
            <!-- <div class="remove-edit"> -->
            <!-- <div class="remove">
                <a class="remove remove_cart" href="javascript:void(0);" data-id="{{$cartItems->id}}">Remove</a>
            </div> -->
            <!-- <a class="" href="{{$cartItems->id}}" data-id="">Edit</a> -->
            <!-- <div class="edit-product">
                <a class="edit-product edit_cart" href="javascript:void(0);" data-id="{{$cartItems->id}}">Edit</a>
            </div>  -->
            <!-- </div> -->
        </div>
        <div class="product-details">
             <p>Extra Activities :- </p>
              <div class="row">
              @foreach($cartItems->attributes->extra as $key => $val)
                  <div class="col-6"><h6>{{$key}}</h6></div>
                  <div class="col-6"><h6>{{$val}}AED</h6></div>
              @endforeach

              </div>
    
             <!-- <p>Product Code - 232321939</p> -->
           </div>
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
         <div class="subtotal-title">Subtotal</div>
         <div class="subtotal-value final-value" id="basket-subtotal">{{$grandTotal}} AED</div>
         <br>
         <br>
         <div class="summary-total">
           <div class="total-title">Total</div>
         <div class="subtotal-value final-value grandCoupon" id="basket-subtotal">{{$grandTotal}} AED</div>
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
    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
 
$(document).ready(function() {
    $(document).on('click', '.remove_cart', function() {
      let id = $(this).data('id');
    $.ajax({
          url: "delete-cart/"+ id,  
          data: {'_token': $('input[name=_token]').val()},
          success: function (response) {
                if((response.error)){
                  toastr.error(response.error);
                }else{
                  $("#carts").load(window.location + " #carts");
                  $("#my_cart").load(window.location + " #my_cart");
                  toastr.success(response.success); 
                }
            }           
      });
    });
});  
  </script>