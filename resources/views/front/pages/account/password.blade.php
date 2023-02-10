<x-front.master-layout>
    <section class="py-5 my-5">
       <div class="container card--shadow-blurplet" id="myProfile">
          <div class="bg-white shadow rounded-lg d-block d-sm-flex shadow">
             @include('front.pages.account.sidebar')
             <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Password Settings</h3>
                    <form id="submit-password" method="POST" autocomplete="off" enctype="multipart/form-data">
                       @csrf
                       <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                       <div class="form__row ">
                          {{-- 
                          <div class="form__group">
                             <input type="password" name="email" id="email" class="form__input-blank" required="">
                             <label class="form__label-blank" for="email">Old password*</label>
                          </div>
                          --}}
                          <div class="row mt-2">
                             <div class="col">
                                <div class="form__group">
                                   <input type="password" name="password" id="password" class="form__input-blank" required="">
                                   <label class="form__label-blank" for="password"> New password*</label>
                                </div>
                             </div>
                             <div class="col">
                                <div class="form__row__left">
                                   <div class="form__group">
                                      <input type="text" name="confrim_password" id="confrim_password" class="form__input-blank" required="">
                                      <label class="form__label-blank" for="confrim_password">Confirm Password *</label>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div>
                          <button class="button">Update</button>
                          <button class="button">Cancel</button>
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
    $('#example').DataTable( {
      responsive: true
      } );
      $(document).ready(function(){
        $('#detailsBtn').on('click',function(){
          $('#orderList').hide();
          $('#details').show();
        })
        $('#backBtn').on('click',function(){
        $('#orderList').show();
          $('#details').hide();
        })
      })
        /* update profile Using Ajax */
        $(document).on('submit','#submit-password',function(e){
            e.preventDefault();
    
            $.ajax({
                type: $(this).prop('method'),
                url: 'update-password',
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if((response.error)){
                      toastr.error(response.error);
                    }else{
                      $("#myProfile").load(window.location + " #myProfile");
                      toastr.success(response.success); 
                    }
                },error: function (error){
                  toastr.warning(error);
                }
            });
        });
        $(document).on('submit','#submit-profile',function(e){
            e.preventDefault();
            $.ajax({
                type: $(this).prop('method'),
                url: 'update-profile',
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if((response.error)){
                      toastr.error(response.error);
                    }else{
                      $("#account").load(window.location + " #account");
                      toastr.success(response.success); 
                    }
                },error: function (error){
                  toastr.warning(error);
                }
            });
        });
 </script>