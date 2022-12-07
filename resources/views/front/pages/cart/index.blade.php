<x-front.master-layout>
  <div  class="container cart" style="margin-bottom:100px;height:100vh;"   >
    <div class="basket card--shadow-blurple" style="margin-top:50px;margin-bottom:50px;position: fixed; */">
     
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>
      @php 
      $cartCollection = Cart::getContent();
      $total = Cart::getSubTotal();
      @endphp
      @foreach($cartCollection as $cartItems)
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="https://img.veenaworld.com/wp-content/uploads/2022/02/Dubai-800x530.jpg?imwidth=1080" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress</h1>
            <p><strong>{{$cartItems->name}}</strong></p>
            <p>Product Code - 232321939</p>
          </div>
        </div>
        <div class="price">{{$cartItems->price}}</div>
        <div class="quantity">
          <input type="number" value="{{$cartItems->quantity}}" min="1" class="quantity-field">
        </div>
        <div class="subtotal">{{$cartItems->price*$cartItems->quantity}}</div>
        <div class="remove">
          <a class="remove" href="{{url('delete-cart/'.$cartItems->id)}}">Remove</a>
        </div>
      </div>
      @endforeach
    </div>
    <aside>
      <div class="summary card--shadow-orangeBlood"  style="margin-top:50px;margin-bottom:50px;padding-bottom:50px;">
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          {{-- <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div><br><br> --}}
          <div class="summary-total">
            <div class="total-title">Total</div>
            <div class="total-value final-value" id="basket-total">{{$total}}</div>
          </div>
          <div class="">
            
             @if (Auth::check())
              <h2><strong>Details</strong></h2>
              <p><strong><span class="item-quantity"></span>Name </strong>-{{ Auth::user()->name }}</p>
              <p><strong><span class="item-quantity"></span>Email </strong>-{{ Auth::user()->email }}</p>
              <p><strong><span class="item-quantity"></span>Mobile </strong>-{{ Auth::user()->mobile }}</p>
            @else
            </div>
            <div class=" mt-15em">
            <button class="promo-code-cta" style="margin-left:0;">Register</button>
            <a class="promo-code-cta" href="{{url('login')}}" title="Login" style="margin-left:0;background:#666;color:#fff;margin:5px auto  auto 3px;">Login</a>
            </div>
            @endif
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>  
        <!-- <div class="summary-delivery">
          <select name="delivery-collection" class="summary-delivery-selection">
              <option value="0" selected="selected">Select Collection or Delivery</option>
             <option value="collection">Collection</option>
             <option value="first-class">Royal Mail 1st Class</option>
             <option value="second-class">Royal Mail 2nd Class</option>
             <option value="signed-for">Royal Mail Special Delivery</option>
          </select>
        </div> -->
        
        <div class="summary-total">
          <div class="total-title">Note</div><br>
          <input type="textarea" style="width:100%;margin-top:10px;">
        </div>
        <div class="summary-total">
          <h3 class="">Payment Method</h3><br>
          
          <label class="switch">
            <span class="total-title">PayPal</span>
            <input type="checkbox">
            <span class="slider round"></span>
          </label> <br>
  
          <label class="switch">
            <span class="total-title">PayPal</span>
            <input type="checkbox">
            <span class="slider round"></span>
          </label> <br>
  
          <label class="switch">
            <span class="total-title">PayPal</span>
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
        <div class="basket-module mt-20em mb-20em">
          <label for="promo-code">Enter a promotional code</label>
          <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
          <button class="promo-code-cta">Apply</button>
        </div>
        <div class="summary-checkout">
          <a href="{{url('payment')}}" class="checkout-cta"> Place Order </a>
        </div>
      </div>
    </aside>
  </div>
</x-front.master-layout>
