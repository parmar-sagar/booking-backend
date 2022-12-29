<x-front.master-layout>
<div class="container cart " style="margin-bottom:100px;padding-bottom:100px;">
      <div class="content  mb-20 pb-20">
        <div class="basket card--shadow-blurple">
          <div class="basket-labels">
            <ul>
              <li class="item item-heading">Item</li>
              <li class="price">Price</li>
              <li class="subtotal">Subtotal</li>
            </ul>
          </div>
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
                  <strong>Navy, Size 18</strong>
                </p>
                <p>Product Code - 232321939</p>
              </div>
            </div>
            <div class="price">26.00</div>
            <div class="subtotal">104.00</div>
            <div class="remove"></div>
          </div>
          <div class="basket-product">
            <div class="item">
              <div class="product-image">
                <img src="https://img.veenaworld.com/wp-content/uploads/2022/02/Dubai-800x530.jpg?imwidth=1080" alt="Placholder Image 2" class="product-frame">
              </div>
              <div class="product-details">
                <h1>
                  <strong>
                    <span class="item-quantity">1</span> x Whistles </strong> Amella Lace Midi Dress
                </h1>
                <p>
                  <strong>Navy, Size 10</strong>
                </p>
                <p>Product Code - 232321939</p>
              </div>
            </div>
            <div class="price">26.00</div>
            <div class="subtotal">26.00</div>
            <div class="remove"></div>
          </div>
        </div>
        @if (!Auth::check())
        <a class="btn btn--purple mt-15em" href="login.html" title="View now"> LogIn </a>
        <a class="btn btn--purple mt-15em" href="login.html" title="View now"> Register </a>
        @endif
        <aside>
        <div class="summary card--shadow-orangeBlood" style="margin-bottom:50px;padding-bottom:50px;">
          <div class="summary-total-items">
            <span class="total-items"></span> Items in your Bag
          </div>
          <div class="summary-subtotal">
            <div class="subtotal-title">Subtotal</div>
            <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
            <br>
            <br>
            <div class="summary-total">
              <div class="total-title">Total</div>
              <div class="total-value final-value" id="basket-total">130.00</div>
            </div>
          </div>
        </div>
      </aside>
        <br>
        <br>
        @if (Auth::check())
        <div class="basket  mb-20em card--shadow-blue payment_selection mt-5" style="margin-bottom:30px!important;">
          <div class="basket-product">
            <button class="accordion bg-orange">My Profile</button>
            <div class="panel">
              <div class="p-3 py-5 mt-10em">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                  <div class="form__row__left">
                    <div class="form__group">
                      <input type="text" name="first_name" id="first_name" value="{{ Auth::user()->first_name }}" class="form__input-blank" required="">
                      <label class="form__label-blank" for="first_name">Name*</label>
                    </div>
                  </div>
                  <div class="form__row__left">
                    <div class="form__group">
                      <input type="text" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" class="form__input-blank" required="">
                      <label class="form__label-blank" for="last_name">Last Name*</label>
                    </div>
                  </div>
                </div>
                <div class="form__row">
                  <div class="form__group">
                    <input type="tel" name="number" id="number" value="{{ Auth::user()->number }}" class="form__input-blank" required="">
                    <label class="form__label-blank" for="number">Phone*</label>
                  </div>
                </div>
                <div class="form__row">
                <div class="form__group">
                  <select name="gender" class="select select--blank" id="gender" required="" sb="23496588" style="display: none;">
                    <option value="">Gender*</option>
                    <option value="Male"  @if(Auth::user()->gender == 'Male') selected @endif>Male</option>
                    <option value="Female" @if(Auth::user()->gender == 'Female') selected @endif>Female</option>
                  </select>
                </div>
                </div>
                <div class="form__row ">
                  <div class="form__group">
                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form__input-blank" required="">
                    <label class="form__label-blank" for="email">Email*</label>
                  </div>
                </div>
                <div class="form__row">
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
                  <!-- <button class="btn chip--orange profile-button" type="button"> Next </button> -->
                </div>
              </div>
            </div>
            <button class="accordion mt-15em">Coupon</button>
            <div class="panel">
              <div class="form__group mt-10em mb-10em">
                <input type="text" name="address[line_1]" id="address-line-1" class="form__input-blank" value="Bagdadi street 23 avela" required="" autocomplete="off">
                <label for="address-line-1" class="form__label-blank">Apply Coupon*</label>
              </div>
            </div>
            <button class="accordion mt-15em" style="color:grey;">Payment Method</button>
            <div class="panel">
              <div class="product-details mt-10em ">
                <div class="toggle-payment"><p>
                  <strong class="mb-20em">Paypal</strong>
                  <label class="switch">
                    <input type="checkbox" class="filled">
                    <span class="slider round"></span>
                  </label>
                </p>
                <p>
                  <strong class="mb-20em">Stripe </strong>
                  <label class="switch">
                    <input type="checkbox" class="filled">
                    <span class="slider round"></span>
                  </label>
                </p>
                <p>
                  <strong class="mb-1em">Payment on </strong>
                  <label class="switch">
                    <input type="checkbox" class="filled">
                    <span class="slider round"></span>
                  </label>
                </p></div>
                <div class=" text-center">
                  <button class="btn mt-10em chip--orange profile-button" type="button"> Pay </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>    
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
</script>