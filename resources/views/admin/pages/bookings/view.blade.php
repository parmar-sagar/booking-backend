<div class="card-header">
     
   <div class="card-toolbar">
      <!--begin::Button-->
      <div class="col-sm-2">
        <button type="button" class="btn btn-danger mb-2 goBack"><i class="mdi mdi-step-backward-2 me-2"></i>Back To Listing</button>
    </div>
      <!--end::Button-->
   </div>
</div>
<div class="row">
   <div class="col-lg-6">
       <div class="card">
           <div class="card-body">
               <h4 class="header-title mb-3">Booking Information</h4>
               <ul class="list-unstyled mb-0">
                  <li>
                      <p class="mb-2"><span class="fw-bold me-2">Booking Id:</span>{{$bookings->random_id}}</p>
                      <p class="mb-2"><span class="fw-bold me-2">Booking Date:</span>{{$bookings->created_at}}</p>
                      <p class="mb-2"><span class="fw-bold me-2">Status:</span> {{$bookings->status}}</p>
                      <p class="mb-0"><span class="fw-bold me-2">Payment Status:</span> {{$bookings->payment_status}}</p>
                  </li>
              </ul>

           </div>
       </div>
   </div> <!-- end col -->

   <div class="col-lg-6">
       <div class="card">
           <div class="card-body">
               <h4 class="header-title mb-3">Order Summery</h4>

               <ul class="list-unstyled mb-0">
                   <li>
                       <p class="mb-2"><span class="fw-bold me-2">Subtotal:</span>{{$bookings->sub_total}}d</p>
                       <p class="mb-2"><span class="fw-bold me-2">Discount:</span>{{$bookings->discount}}</p>
                       <p class="mb-2"><span class="fw-bold me-2">Extra Amount:</span>{{$bookings->extra_amount}}</p>
                       <p class="mb-0"><span class="fw-bold me-2">Grand Total:</span>{{$bookings->total}}</p>
                   </li>
               </ul>
           </div>
       </div>
   </div> <!-- end col -->
   <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="header-title mb-3">Vehicle Information</h4>
                  <div class="table-responsive">
                      <table class="table mb-0">
                          <thead class="table-light">
                          <tr>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Quantity</th>
                          </tr>
                          </thead>
                          <tbody>
                           @foreach($bookings->vehicleInfo as $vehicles)
                          <tr>
                              <td>{{$vehicles->name}}</td>
                              <td>{{$vehicles->price}}</td>
                              <td>{{$vehicles->booking_date}}</td>
                              <td>{{$vehicles->booking_time}}</td>
                              <td>{{$vehicles->quantity}}</td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
                  <!-- end table-responsive -->

              </div>
          </div>
      </div> <!-- end col -->
  </div>
  <!-- end row -->
  <!-- end row -->
  <div class="row">
   <div class="col-lg-6">
      <div class="card">
         <div class="card-body">
            <h4 class="header-title mb-3">Customer Information</h4>
            <ul class="list-unstyled mb-0">
               <li>
                     <p class="mb-2"><span class="fw-bold me-2">First Name:</span>{{$bookings->userInfo->first_name}}</p>
                     <p class="mb-2"><span class="fw-bold me-2">Last Name:</span>{{$bookings->userInfo->last_name}}</p>
                     <p class="mb-2"><span class="fw-bold me-2">Mobile:</span> {{$bookings->userInfo->mobile}}</p>
                     <p class="mb-0"><span class="fw-bold me-2">Email:</span> {{$bookings->userInfo->email}}</p>
               </li>
            </ul>
         </div>
      </div>
   </div> <!-- end col -->

   <div class="col-lg-6">
      <div class="card">
         <div class="card-body">
            <h4 class="header-title mb-3">Transaction</h4>
            <ul class="list-unstyled mb-0">
               <li>
                     <p class="mb-2"><span class="fw-bold me-2">Token:</span>@if(isset($bookings->transaction->token)){{$bookings->transaction->token}}@endif</p>
                     <p class="mb-2"><span class="fw-bold me-2">PayerId:</span>@if(isset($bookings->transaction->token)){{$bookings->transaction->payerid}}@endif</p>
                     <p class="mb-2"><span class="fw-bold me-2">Status:</span>@if(isset($bookings->transaction->token)){{$bookings->transaction->status}}@endif</p>
                     <p class="mb-0"><span class="fw-bold me-2">Amount:</span>@if(isset($bookings->transaction->token)){{$bookings->transaction->amount}}@endif</p>
               </li>
            </ul>
         </div>
      </div>
</div> <!-- end col -->
</div>
<!-- end row -->