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
                        <h1 class="headline-3 color-white">Reset Password</h1>
                        <svg width="100px" height="16px" class="stroke-orange">
                          <use
                            xlink:href="../images/icons.svg#icon-jaw-squiggle"
                          ></use>
                        </svg>
                      </div>
                    <form  class="form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                       <!-- Password Reset Token -->
                       <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <!-- Email Address -->
                        <div class="form__row">
                            <div class="form__group">
                                <x-text-input id="email"  class="form__input" type="email" name="email"  placeholder="Email" :value="old('email', $request->email)" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="form__row">
                            <div class="form__group">
                                <x-text-input id="password"  class="form__input" type="password" name="password" placeholder="Password" required />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />   
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="form__group">
                                <x-text-input id="password_confirmation" class="form__input" type="password" name="password_confirmation"  placeholder="Password Confirmation" required />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="form__row form__row--flex">
                            <div class="form__row__right form__row__right--text-right">
                                <x-primary-button class="btn btn--white btn--shadow" style=" color: #000;">
                                    {{ __('Reset Password') }}
                                </x-primary-button>
                            </div>
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