<x-front.master-layout>
   <section class="py-5 my-5">
      <div class="container card--shadow-blurplet" id="myProfile">
         <div class="bg-white shadow rounded-lg d-block d-sm-flex shadow">
            @include('front.pages.account.sidebar')
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
               <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                   <h3 class="mb-4">Password Settings</h3>
                   <form action="{{ url('account/password') }}" id="submit-password" method="POST" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <div class="form__row ">
                         <div class="row mt-2">
                            <div class="col">
                               <div class="form__group">
                                  <input type="password" name="password" id="password" placeholder="New password*" class="form__input-blank" required="">
                               </div>
                            </div>
                            <div class="col">
                               <div class="form__row__left">
                                  <div class="form__group">
                                     <input type="password" name="confrim_password" placeholder="Confirm password*" id="confrim_password" class="form__input-blank" required="">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div>
                         <button class="button">Update</button>
                         <button type="reset" class="button">Cancel</button>
                      </div>
                   </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <div id="postData"></div>
</x-front.master-layout>
<script>
  $('#submit-password').validate();
  /* update profile Using Ajax */
  $(document).on('submit','#submit-password',function(e){
     e.preventDefault();
     $.ajax({
        type: $(this).prop('method'),
        url: $(this).prop('action'),
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
           if((response.error)){
              toastr.error(response.error);
           }else{
              toastr.success(response.success); 
           }
        },error: function (error){
           toastr.warning(error);
        }
     });
  });
</script>