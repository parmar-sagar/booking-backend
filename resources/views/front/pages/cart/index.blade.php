<x-front.master-layout>
 
    <div class="container cart " style="margin-bottom:100px;padding-bottom:100px;">
      @php 
      $cartCollection = Cart::getContent();
      $total = Cart::getSubTotal();
      @endphp
      @if(Cart::isEmpty())
      <div class="row row--g-10 pb-2em">
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
                <a class="btn btn--orange " href="/why-choose-us" title="Why Choose Us"> Back To Home </a>
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
        @if (Auth::check())
        {{-- <div class="basket  mb-20em card--shadow-blue mt-5" style="margin-bottom:30px!important;">
          <div class="basket-product">
            <button class="accordion bg-orange">Section 1</button>
            <div class="panel">
              <div class="p-3 py-5 mt-10em">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                  <div class="form__row__left">
                    <div class="form__group">
                      <input type="text" name="first_name" id="first_name" value="{{ Auth::user()->name }}" class="form__input-blank" required="">
                      <label class="form__label-blank" for="first_name">Name*</label>
                    </div>
                  </div>
                  <div class="form__row__left">
                    <div class="form__group">
                      <input type="text" name="surname" id="_name" value="{{ Auth::user()->email }}" class="form__input-blank" required="">
                      <label class="form__label-blank" for="first_name">Email*</label>
                    </div>
                  </div>
                </div>
                <div class="form__row">
                  <div class="form__group">
                    <input type="tel" name="phone" id="phone" value="{{ Auth::user()->mobile }}" class="form__input-blank" required="">
                    <label class="form__label-blank" for="phone">Mobile*</label>
                  </div>
                </div>
                <div class="form__group">
                  <select name="gender" class="select select--blank" id="gender" required="" sb="23496588" style="display: none;">
                    <option value="">Gender*</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                {{-- <div class="form__row ">
                  <div class="form__group">
                    <input type="email" name="email" id="email" class="form__input-blank" required="">
                    <label class="form__label-blank" for="email">Email*</label>
                  </div>
                </div> --}}
                {{-- <div class="form__row">
                  <div class="form__group">
                    <input type="text" name="address[line_1]" id="address-line-1" class="form__input-blank" required="">
                    <label for="address-line-1" class="form__label-blank">Address*</label>
                  </div>
                </div>
                <div class="form__row">
                  <h3 class="headline-6 mt-20em mb-10em">Get yourself registered by clicking the button </h3>
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  <h3 class="headline-6 mt-20em mb-10em"> I agree to the Terms & Conditions</h3>
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="mt-15em  mb-15em  text-center">
                  <button class="btn chip--orange profile-button" type="button"> Place Order </button>
                </div>
              </div>
            </div>
            <button class="accordion mt-15em">Section 2</button>
            <div class="panel">
              <div class="form__group mt-10em mb-10em">
                <input type="text" name="address[line_1]" id="address-line-1" class="form__input-blank" value="Bagdadi street 23 avela" required="" autocomplete="off">
                <label for="address-line-1" class="form__label-blank">Apply Coupon*</label>
              </div>
            </div>
            <button class="accordion mt-15em" style="color:grey;">Payment Method</button>
            <div class="panel">
              <div class="product-details mt-10em">
                <p>
                  <strong>Paypal</strong> - click
                </p>
                <p>
                  <strong>Stripe </strong> - click
                </p>
                <p>
                  <strong>Payment on </strong> Arrival
                </p>
              </div>
            </div>
          </div> --}}
        </div>
        @else
        {{-- <a class="btn btn--purple mt-15em"  href="{{url('login')}}" title="Login"> LogIn</a>
        <a class="btn btn--purple mt-15em"  href="{{url('register')}}" title="Login"> Register</a>
        <br>
        <br> --}}
        @endif
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
        @endif
      </aside>
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
          success: function (data) {
            window.location.reload();
            // $('#cart_product').html(data);        
          }               
      });
    });
});  
  </script>