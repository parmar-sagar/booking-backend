<x-front.master-layout>
    <div id="barba-wrapper">
        <div class="barba-container" style="    background-color: #69fff5;">
          <main>
            <div class="full-height-fixed-bg-wrapper">
              <div class="full-height-fixed-bg" id="auth-page-1669716376">
                <div class="overlay"></div>
                <div class="row row--g-10">
                  <div class="col-lg-6 offset-lg-3 col-xxl-4 offset-xxl-4">
                      <div class="headline-wave headline-wave--center mb-10em">
                        <h1 class="headline-3 color-white">Login</h1>
                        <svg width="100px" height="16px" class="stroke-orange">
                          <use
                            xlink:href="../images/icons.svg#icon-jaw-squiggle"
                          ></use>
                        </svg>
                      </div>
                    <form  class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div class="form__row">
                        <div class="form__group">
                            <x-text-input id="email"  class="form__input" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
                            <!-- <x-input-label class="form__label" for="email" :value="__('Email')" /> -->
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                     <!-- Password -->
                    <div class="form__row">
                        <div class="form__group">
                            <x-text-input id="password"  class="form__input"
                                            type="password"
                                            name="password"
                                            placeholder="Password"
                                            required autocomplete="current-password" />
                            <!-- <x-input-label class="form__label" for="password" :value="__('Password')" /> -->
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                
                        </div>
                    </div>
                <!-- Remember Me -->
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
                       </label>
                    </div>
                    <div class="form__row__right form__row__right--text-right">
                        <x-primary-button class="btn btn--white btn--shadow" style=" color: #000;">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </div>
                    <div class="form__footer text-center">
                        @if (Route::has('password.request'))
                            <a class="btn-link btn-link--white btn-link--no-padding" href="{{ route('password.request') }}">
                                {{ __('Forgotten Password?') }}
                            </a>
                        @endif
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
</x-front.master-layout>