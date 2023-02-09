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
                        <h1 class="headline-3 color-white">Forgot Password</h1>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                          <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <svg width="100px" height="16px" class="stroke-orange">
                          <use
                            xlink:href="../images/icons.svg#icon-jaw-squiggle"
                          ></use>
                        </svg>
                      </div>
                      <form method="POST" action="{{ route('password.email') }}">
                        @csrf
            
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
            
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Email Password Reset Link') }}
                            </x-primary-button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
</x-front.master-layout>
