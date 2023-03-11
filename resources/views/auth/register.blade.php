<x-front.master-layout>
<div class="container mt-50em mb-50em">
  <div class="row">
    <div class="col-md-3 border-right"></div>
    <div class="col-md-5 border-right">
      <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-right">Register As Supplier</h4>
        </div>
        <form method="POST" id="registerForm">
            @csrf
       
          <div class="form__row__left">
            <div class="form__group">
              <input type="text" name="name" id="first_name" placeholder="Name*" class="form__input-blank" ="">
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
          </div>
          <!-- <div class="form__row__left">
            <div class="form__group">
              <input type="text" name="last_name" id="last_name" class="form__input-blank" ="">
              <label class="form__label-blank" for="last_name">Last Name*</label>
              <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
          </div> -->
        
        <div class="form__row">
        <div class="form__group">
            <input type="email" name="email" id="email" placeholder="Email*" class="form__input-blank" ="">
            <!-- <label class="form__label-blank" for="email">Email*</label> -->
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
        </div>
        <!-- <div class="form__row ">
        <div class="form__group">
            <input type="tel" name="number" id="number" class="form__input-blank" ="">
            <label class="form__label-blank" for="number">Phone*</label>
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>
        </div> -->
        <!-- <div class="form__row">
          <div class="form__group">
            <select name="gender" class="select select--blank" id="gender" required="" sb="24704323" style="display: none;">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
          </div>
        </div> -->
        <div class="form__row">
          <div class="form__group">
            <input type="password" name="password" id="password" placeholder="Password*" class="form__input-blank" required="">
            <!-- <label for="password" class="form__label-blank">Password*</label> -->
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
        </div>
        <div class="form__row">
          <div class="form__group">
            <x-text-input class="form__input-blank" type="password" placeholder="Confirm Password*" name="password_confirmation" required />
            <!-- <label class="form__label-blank" for="address-line-2">Confirm Password</label> -->
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>
        </div>
        <div class="mt-5  mb-10em  text-center">
          <x-primary-button class="ml-4 btn btn-primary profile-button btn--purple">
                      {{ __('Register') }}
          </x-primary-button>
        </div>
      </div>
     </form>
     <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">{{ __('Already registered?') }}</a> -->
    </div>
   
  </div>
</div>
</x-admin.master-layout> 
<script>
$(document).on('submit','#registerForm',function(e){
    e.preventDefault();
    $.ajax({
        type: $(this).prop('method'),
        url: "{{ route('register') }}",
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            // window.location = "/";
            toastr.success(response.success);
        },error: function (response){
          var text = JSON.parse(response.responseText)
            toastr.error(text.message);
        }
    });
    toastr.options = {
    positionClass: 'toast-top-center'
};
});
</script> 
   