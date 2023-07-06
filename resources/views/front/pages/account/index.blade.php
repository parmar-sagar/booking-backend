<x-front.master-layout>
   <section class="py-5 my-5">
      <div class="container card--shadow-blurplet" id="myProfile">
         <div class="bg-white shadow rounded-lg d-block d-sm-flex shadow">
            @include('front.pages.account.sidebar')
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
               <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                     <h4 class="text-right">Profile Settings</h4>
                  </div>
                  <form action="{{ url('account/profile') }}" id="submit-profile" method="POST" autocomplete="off" enctype="multipart/form-data">
                     @csrf
                     <div class="row" >
                        <div class="p-3 py-5">
                           <div class="form__row__left">
                              <div class="row mt-2">
                                 <div class="col">
                                    <div class="form__group">
                                       <input type="text" name="first_name" id="first_name" value="{{ Auth::user()->first_name }}" class="form__input-blank" placeholder="First Name" required="">
                                    </div>
                                 </div>
                                 <div class="col">
                                    <div class="form__row__left">
                                       <div class="form__group">
                                          <input type="text" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" placeholder="Last Name" class="form__input-blank" required="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form__row">
                              <div class="form__group">
                                 <input type="tel" name="mobile" id="number" value="{{ Auth::user()->mobile }}" placeholder="Mobile" class="form__input-blank" required="">
                              </div>
                           </div>
                           <script src="/scripts/vendor.js?v=m0Wgcip88r"></script> 
                           <div class="form__row ">
                              <div class="form__group">
                                 <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Email" class="form__input-blank" required="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-5 border-right"></div>
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
$('#submit-profile').validate();

$(document).on('submit','#submit-profile',function(e){
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