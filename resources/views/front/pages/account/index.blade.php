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
                   <form id="submit-profile" method="POST" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                      <div class="row" >
                         <div class="p-3 py-5">
                            <div class="form__row__left">
                               <div class="row mt-2">
                                  <div class="col">
                                     <div class="form__group">
                                        <input type="text" name="first_name" id="first_name" value="{{ Auth::user()->first_name }}" class="form__input-blank" placeholder="First Name" required="">
                                        <!-- <label class="form__label-blank" for="first_name">First Name*</label> -->
                                     </div>
                                  </div>
                                  <div class="col">
                                     <div class="form__row__left">
                                        <div class="form__group">
                                           <input type="text" name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" placeholder="Last Name" class="form__input-blank" required="">
                                           <!-- <label class="form__label-blank" for="last_name">Last Name*</label> -->
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="form__row">
                               <div class="form__group">
                                  <input type="tel" name="mobile" id="number" value="{{ Auth::user()->mobile }}" placeholder="Mobile" class="form__input-blank" required="">
                                  <!-- <label class="form__label-blank" for="number">Mobile*</label> -->
                               </div>
                            </div>
                            <!-- <div class="form__row"><div class="form__group"><select name="gender" class="select select--blank" id="gender" required=""
                               sb="8128078" style="display: none;"><option value="">Gender*</option><option value="Male">Male</option><option value="Female">Female</option></select><div id="sbHolder_8128078" class="sbHolder loaded"><a id="sbToggle_8128078" href="" class="sbToggle"
                                 aria-label="Expand options"></a><a id="sbSelector_8128078" href=""
                                 class="sbSelector">Gender*</a><ul id="sbOptions_8128078" class="sbOptions" style="display: none;"><li><a href="" rel="" class="sbFocus">Gender*</a></li><li><a href="" rel="Male">Male</a></li><li><a href="" rel="Female">Female</a></li></ul></div></div></div> -->
                            <!-- <div class="form__row">
                               <div class="form__row__left">
                                 <div class="form__group">
                                   <select name="gender" class="select select--blank" id="gender" required="" sb="8128078" style="display: none;">
                                     <option value="">Gender*</option>
                                     <option value="Male"  @if(Auth::user()->gender == 'Male') selected @endif>Male</option>
                                     <option value="Female" @if(Auth::user()->gender == 'Female') selected @endif>Female</option>
                                   </select>
                                 </div>
                               </div>
                               </div> -->
                            <script src="/scripts/vendor.js?v=m0Wgcip88r"></script> 
                            <div class="form__row ">
                               <div class="form__group">
                                  <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Email" class="form__input-blank" required="">
                                  <!-- <label class="form__label-blank" for="email">Email*</label> -->
                               </div>
                            </div>
                            {{-- 
                            <div class="form__row">
                               <div class="form__group">
                                  <input type="text" name="address[line_1]" id="address-line-1" placeholder="Address" class="form__input-blank" required="">
                                  <!-- <label for="address-line-1" class="form__label-blank">Address*</label> -->
                               </div>
                            </div>
                            --}}
                            {{-- 
                            <div class="form__row">
                               <div class="form__group">
                                  <input type="text" name="address[line_2]" id="address-line-2" class="form__input-blank">
                                  <!-- <label class="form__label-blank" for="address-line-2">Address 2nd Line</label> -->
                               </div>
                            </div>
                            --}}
                         </div>
                         <div class="col-md-5 border-right"></div>
                      </div>
                      <div>
                         <button class="button">Update</button>
                         {{-- <button class="button">Cancel</button> --}}
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