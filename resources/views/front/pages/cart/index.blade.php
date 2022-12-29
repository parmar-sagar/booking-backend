<x-front.master-layout>
<div class="container cart " style="margin-bottom:100px;padding-bottom:100px;" id="carts">
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
           <!-- <li class="quantity">Quantity</li> -->
           <li class="subtotal">Subtotal</li>
         </ul>
       </div>
       @foreach($cartCollection as $cartItems)
       <div class="basket-product">
         <div class="item">
           <div class="product-image">
             <img src="https://img.veenaworld.com/wp-content/uploads/2022/02/Dubai-800x530.jpg?imwidth=1080" alt="Placholder Image 2" class="product-frame">
           </div>
           <div class="product-details">
             <h1>
               <strong>
                 <span class="item-quantity">4</span> x Eliza J </strong> Lace Sleeve Cuff Dress
             </h1>
             <p>
             <strong>{{$cartItems->name}}</strong>
             </p>
             <p>Product Code - 232321939</p>
           </div>
         </div>
         <div class="price">{{$cartItems->price}}</div>
            <!-- <div class="quantity"><input type="number" value="4" min="1" class="quantity-field"></div> -->
            <div class="subtotal">{{$cartItems->price*$cartItems->quantity}}</div>
            <div class="remove">
                <a class="remove remove_cart" href="javascript:void(0);" data-id="{{$cartItems->id}}">Remove</a>
            </div>
        </div>
        @endforeach
     </div>
     <br>
     <br>
   </div>
   <aside>
     <div class="summary card--shadow-orangeBlood" style="margin-bottom:50px;padding-bottom:50px;">
       <div class="summary-total-items">
         <span class="total-items"></span> Items in your Bag
       </div>
       <div class="summary-subtotal">
         <div class="subtotal-title">Subtotal</div>
         <div class="subtotal-value final-value" id="basket-subtotal">{{$total}}</div>
         <br>
         <br>
         <div class="summary-total">
           <div class="total-title">Total</div>
           <div class="total-value final-value" id="basket-total">{{$total}}</div>
         </div>
       </div>
     </div>
     <a class="btn btn--purple mt-0" href="{{url('checkout')}}"> Proceed to payment </a>
     <br>
     <br>
   </aside>
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