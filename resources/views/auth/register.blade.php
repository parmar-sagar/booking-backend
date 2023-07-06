<x-front.master-layout>
<div class="container mt-50em mb-50em">
  <div class="row">
    <div class="col-md-3 border-right"></div>
    <div class="col-md-5 border-right">
      <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-right">Suppliers Contact Form</h4>
        </div>
        <form method="POST" id="registerForm" name="registerForm">
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
                <!--<x-input-error :messages="$errors->get('email')" class="mt-2" />-->
              </div>
        </div>
         <div class="form__row">
            <div class="form__group">
                <textarea id="supp_msg" name="supp_msg" rows="5" cols="55" placeholder="Enter message"></textarea>
                <!-- <label class="form__label-blank" for="email">Email*</label> -->
                <!--<x-input-error :messages="$errors->get('supp_msg')" class="mt-2" />-->
              </div>
        </div>
        <!--<div class="form__row ">
            <div class="form__group">
                <input type="tel" name="number" id="number" class="form__input-blank" ="">
                <label class="form__label-blank" for="number">Phone*</label>
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>
         </div>-->
    <!-- <div class="form__row">
              <div class="form__group">
                <select name="gender" class="select select--blank" id="gender" required="" sb="24704323" style="display: none;">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
              </div>
        </div> -->
        <!-- captcha code begin -->
        <div class="form__row">
                <div id="user-input" class="inline">
                  <input type="text" id="submit"
                      placeholder="Enter captcha" style="background:sienna;"/>
                </div>
          
                <div class="inline refresh" onclick="generate()">
                    <i class="fas fa-sync"></i>
                </div>
          
                <div id="image" class="inline" selectable="False">
                </div>
                <p id="key"></p>
             </div>
              <!-- captcha code end -->
        <div class="mt-5  mb-10em  text-center">
          <x-primary-button class="ml-4 btn btn-primary profile-button btn--purple">
                      {{ __('Submit') }}
          </x-primary-button>
        </div>
      </div>
     </form>
     <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">{{ __('Already registered?') }}</a> -->
    </div>
   
  </div>
</div>
</x-front.master-layout> 
<script>
$(document).ready(function(){
  generate();
  $(document).on('submit','#registerForm',function(e){
      e.preventDefault()
      let name=$(this).attr('name')
      printmsg(name)
     
  });
});
</script> 
   