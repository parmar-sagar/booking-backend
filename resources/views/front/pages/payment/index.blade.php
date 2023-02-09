<x-front.master-layout>
  <div class="container payment" style="padding:30px auto;">
    <div class="row" style="margin:100px auto;">
        <div class="col-75">
          <div class="container " style="padding:20px;">
              <form action="/action_page.php">
                <div class="row">
                    <div class="col-50">
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="text" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name">First Name*</label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="email" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name">Email *</label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="text" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name">Adress *</label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="text" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name">City *</label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="text" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name">State *</label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="text" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name">Zip *</label>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-50">
                      <h3>Payment</h3>
                      <label for="fname">Accepted Cards</label>
                      <div class="icon-container">
                          <i class="fa fa-cc-visa" style="color:navy;"></i>
                          <i class="fa fa-cc-amex" style="color:blue;"></i>
                          <i class="fa fa-cc-mastercard" style="color:red;"></i>
                          <i class="fa fa-cc-discover" style="color:orange;"></i>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="text" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name">Card Name* </label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="number" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name"> Card Number*</label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="date" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name"> Exp Month*</label>
                            </div>
                          </div>
                      </div>
                      <div class="row mt-2">
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="number" min="1999" max="2020" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name"> Year*</label>
                            </div>
                          </div>
                          <div class="form__row__left">
                            <div class="form__group">
                                <input type="number" name="first_name" id="first_name" class="form__input-blank" required="">
                                <label class="form__label-blank" for="first_name"> CVV</label>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing </label>
                <input type="submit" value="Continue to checkout" class="btn">
              </form>
          </div>
        </div>
        <div class="col-25">
          <div class="container">
              <h4>Cart <span class="price" style="color:black">
                <i class="fa fa-shopping-cart"></i>
                <b>4</b>
                </span>
              </h4>
              <p>
                <a href="#">Product 1</a>
                <span class="price">$15</span>
              </p>
              <p>
                <a href="#">Product 2</a>
                <span class="price">$5</span>
              </p>
              <p>
                <a href="#">Product 3</a>
                <span class="price">$8</span>
              </p>
              <p>
                <a href="#">Product 4</a>
                <span class="price">$2</span>
              </p>
              <hr>
              <p>Total <span class="price" style="color:black">
                <b>$30</b>
                </span>
              </p>
          </div>
        </div>
    </div>
  </div>
</x-front.master-layout>