@extends('front.layouts.master')
@section('content')
    <div id="barba-wrappers">
      <div class="barba-containers" style="    background-color: #69fff5;">
        <main>
          <div class="full-height-fixed-bg-wrapper">
            <div class="full-height-fixed-bg" id="auth-page-1669716376">
              <div class="overlay"></div>
              <div class="row row--g-10">
                <div class="col-lg-6 offset-lg-3 col-xxl-4 offset-xxl-4">
                  <form
                    class="form"
                    method="post"
                    action="https://www.backpackingtours.com/auth/login"
                  >
                    <input
                      type="hidden"
                      name="_token"
                      value="0oOnM5Zu9l1K5xdXSB9MgJuzoaILhmUlb6tT2PvZ"
                    />
                    <div class="headline-wave headline-wave--center mb-10em">
                      <h1 class="headline-3 color-white">Login</h1>
                      <svg width="100px" height="16px" class="stroke-orange">
                        <use
                          xlink:href="../images/icons.svg#icon-jaw-squiggle"
                        ></use>
                      </svg>
                    </div>
                    <div class="form__row">
                      <div class="form__group">
                        <input
                          type="email"
                          name="email"
                          id="email"
                          class="form__input"
                          required
                        />
                        <label class="form__label" for="email">Email</label>
                      </div>
                    </div>
                    <div class="form__row">
                      <div class="form__group">
                        <input
                          type="password"
                          name="password"
                          id="password"
                          class="form__input"
                          required
                        />
                        <label class="form__label" for="password"
                          >Password</label
                        >
                      </div>
                    </div>
                    <div class="form__row form__row--flex">
                      <div class="form__row__left">
                        <input
                          type="checkbox"
                          id="remember"
                          name="remember"
                          class="form__checkbox"
                        />
                        <label
                          for="remember"
                          class="form__checkbox-label form__checkbox-label--nowrap form__checkbox-label--purple"
                          >Remember Me</label
                        >
                      </div>
                      <div
                        class="form__row__right form__row__right--text-right"
                      >
                        <button
                          type="submit"
                          class="btn btn--white btn--shadow"
                          style=" color: #000;"
                        >
                          Login
                        </button>
                      </div>
                    </div>
                    <div class="form__footer text-center">
                      <a
                        class="btn-link btn-link--white btn-link--no-padding"
                        href="forgot-password.html"
                        title=""
                        >Forgotten Password?</a
                      >
                    </div>
                    <div class="loading"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
@endsection 