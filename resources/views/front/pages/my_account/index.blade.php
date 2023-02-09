<x-front.master-layout>
  <section class="py-5 my-5">
    @if (Auth::check())
    <div class="container card--shadow-blurplet" id="myProfile">
      <div class="bg-white shadow rounded-lg d-block d-sm-flex shadow">
        <div class="profile-tab-nav border-right">
          <div class="p-4">
            <div class="img-circle text-center mb-3">
              <img src="https://t4.ftcdn.net/jpg/02/90/27/39/360_F_290273933_ukYZjDv8nqgpOBcBUo5CQyFcxAzYlZRW.jpg" alt="Image" class="shadow">
            </div>
            <h4 class="text-center">{{ Auth::user()->name }}</h4>
          </div>
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
              <i class="fa fa-home text-center mr-1"></i> Account </a>
            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
              <i class="fa fa-key text-center mr-1"></i> Password </a>
            <a class="nav-link" id="orders-tab" data-toggle="pill" href="#Orderdetails" role="tab" aria-controls="security" aria-selected="false">
              <i class="fa fa-user text-center mr-1"></i>Order Details</a>
            <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
              <i class="fa fa-car text-center mr-1"></i> My Rides </a>
            <a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
              <i class="fa fa-bell text-center mr-1"></i> Notification </a>
          </div>
        </div>
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
                {{-- <div class="form__row">
                  <div class="form__group">
                    <input type="text" name="address[line_1]" id="address-line-1" placeholder="Address" class="form__input-blank" required="">
                    <!-- <label for="address-line-1" class="form__label-blank">Address*</label> -->
                  </div>
                </div> --}}
                {{-- <div class="form__row">
                  <div class="form__group">
                    <input type="text" name="address[line_2]" id="address-line-2" class="form__input-blank">
                    <!-- <label class="form__label-blank" for="address-line-2">Address 2nd Line</label> -->
                  </div>
                </div> --}}
              </div>
              <div class="col-md-5 border-right"></div>
            </div>
            <div>
              <button class="button">Update</button>
              {{-- <button class="button">Cancel</button> --}}
            </div>
          </form>
          </div>
          <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            <h3 class="mb-4">Password Settings</h3>
            <form id="submit-password" method="POST" autocomplete="off" enctype="multipart/form-data">
              @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="id">
            <div class="form__row ">
              {{-- <div class="form__group">
                <input type="password" name="email" id="email" class="form__input-blank" required="">
                <label class="form__label-blank" for="email">Old password*</label>
              </div> --}}
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
          <div class="tab-pane fade" id="Orderdetails" role="tabpanel" aria-labelledby="orders-tab">
            <div id="orderList">
              <h3 class="mb-4 text-center">Order Listing</h3>
              <article class="card">
                <header class="card-header"> Order ID: OD45345345435 </header>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking ID</b><br> <span>458184482525022719</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking Date</b><br> <span>15/06/1999</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Amount</b><br> <span>220 AED</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Status</b><br> <span> Order Placed</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Payment Status</b><br> <span>Unpaid</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Action</b><br> <span></span>
                    </div>
                  </div>   
                </div> 
              </div>  
              </article>
              <article class="card">
                <header class="card-header"> Order ID: OD45345345435 </header>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking ID</b><br> <span>458184482525022719</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking Date</b><br> <span>15/06/1999</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Amount</b><br> <span>220 AED</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Status</b><br> <span> Order Placed</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Payment Status</b><br> <span>Unpaid</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Action</b><br> <span></span>
                    </div>
                  </div>   
                </div> 
              </div>  
              </article>
              <article class="card">
                <header class="card-header"> Order ID: OD45345345435 </header>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking ID</b><br> <span>458184482525022719</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking Date</b><br> <span>15/06/1999</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Amount</b><br> <span>220 AED</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Status</b><br> <span> Order Placed</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Payment Status</b><br> <span>Unpaid</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Action</b><br> <span></span>
                    </div>
                  </div>   
                </div> 
              </div>  
              </article>
              <article class="card">
                <header class="card-header"> Order ID: OD45345345435 </header>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking ID</b><br> <span>458184482525022719</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking Date</b><br> <span>15/06/1999</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Amount</b><br> <span>220 AED</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Status</b><br> <span> Order Placed</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Payment Status</b><br> <span>Unpaid</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Action</b><br> <span></span>
                    </div>
                  </div>   
                </div> 
              </div>  
              </article>
              <article class="card">
                <header class="card-header"> Order ID: OD45345345435 </header>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking ID</b><br> <span>458184482525022719</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking Date</b><br> <span>15/06/1999</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Amount</b><br> <span>220 AED</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Status</b><br> <span> Order Placed</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Payment Status</b><br> <span>Unpaid</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Action</b><br> <span></span>
                    </div>
                  </div>   
                </div> 
              </div>  
              </article>
              <article class="card">
                <header class="card-header"> Order ID: OD45345345435 </header>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking ID</b><br> <span>458184482525022719</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Booking Date</b><br> <span>15/06/1999</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Amount</b><br> <span>220 AED</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Status</b><br> <span> Order Placed</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Payment Status</b><br> <span>Unpaid</span>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="order-space">
                      <b>Action</b><br> <span></span>
                    </div>
                  </div>   
                </div> 
              </div>  
              </article>
                      </div>
            
                    <div style="display:none" id="details" >
                      <h6 class="mb-4 text-right" id="backBtn">Back</h6>
                      <div class="accordion" id="accordionExample">
                       <div class="accordion-item">
                         <h2 class="accordion-header" id="headingOne">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             Order details
                           </button>
                         </h2>
                         <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                             <div class="row">
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Order no.</b><br> <span>1</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Order Status.</b><br> <span>pending</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Order Date</b><br> <span>01-02-2023</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Payment status</b><br> <span>success</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Amount</b><br> <span>AED 300</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Coupon code</b><br> <span>AEI05G2</span>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <div class="accordion-item">
                         <h2 class="accordion-header" id="headingTwo">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                             Product Details
                           </button>
                         </h2>
                         <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                             <div class="row">
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Order no.</b><br> <span>1</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Order Status.</b><br> <span>pending</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Order Date</b><br> <span>01-02-2023</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Payment status</b><br> <span>success</span>
                                 </div>
                               </div>
                               </div>
                           </div>
                         </div>
                       </div>
                       <div class="accordion-item">
                         <h2 class="accordion-header" id="headingThree">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                             Custom & information
                           </button>
                         </h2>
                         <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                             <div class="row">
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Name</b><br> <span>john</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Email</b><br> <span>dubaiquads@gmail.com</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Phone no.</b><br> <span>8888888888</span>
                                 </div>
                               </div>
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="order-space">
                                   <b>Address</b><br> <span>dubai</span>
                                 </div>
                               </div>
                               </div>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div>
                       <button class="button">Pay Now</button>
                     </div>
                    </div>        
                  </div>
          <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
            <h3 class="mb-4">My Tours</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn--small btn--purple">Go somewhere</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn--small btn--purple">Go somewhere</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-5">
              <button class="button">Update</button>
              <button class="button">Cancel</button>
            </div>
          </div>
          <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
            <h3 class="mb-4">Notification Settings</h3>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="notification1">
                <label class="form-check-label" for="notification1"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="notification2">
                <label class="form-check-label" for="notification2"> hic nesciunt repellat perferendis voluptatum totam porro eligendi. </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="notification3">
                <label class="form-check-label" for="notification3"> commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit </label>
              </div>
            </div>
            <div>
              <button class="button">Update</button>
              <button class="button">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
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