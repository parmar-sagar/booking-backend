<div class="card-header">
     
   <div class="card-toolbar">
      <!--begin::Button-->
      <div class="col-sm-2">
        <button type="button" class="btn btn-danger mb-2 goBack"><i class="mdi mdi-step-backward-2 me-2"></i>Back To Listing</button>
    </div>
      <!--end::Button-->
   </div>
</div>
<div class="card-body">
   <div class="row">
      <div class="col-lg-12">
         <div class="card card-custom" data-card="true">
            <div class="card-body">
               <table class="table table-borderless" style="font-size: 18px;">
                  <tbody>
                     <tr>
                        <th>Booking Id</th>
                        <td>:</td>
                        <td>{{$bookings->random_id}}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>:</td>
                        <td>{{$bookings->total}}</td>
                        <th>Booking Status</th>
                        <td>:</td>
                        <td>{{$bookings->status}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>:</td>
                        <td>{{$bookings->payment_status}}</td>
                     </tr>                     
                     <tr>
                        <th>First Name</th>
                        <td>:</td>
                        <td>{{$bookings->userInfo->first_name}}</td>
                        <th>Last Name</th>
                        <td>:</td>
                        <td>{{$bookings->userInfo->last_name}}</td>
                    </tr>
                    <tr>
                        <th>Pickup Location</th>
                        <td>:</td>
                        <td>{{$bookings->pickup_location}}</td>
                        <th>Mobile</th>
                        <td>:</td>
                        <td>{{$bookings->userInfo->mobile}}</td>
                    </tr>
                    <tr>
                        <th>email</th>
                        <td>:</td>
                        <td>{{$bookings->userInfo->email}}</td>
                     </tr>
                     <tr>
                        <th>vehicle</th>
                        <td>:</td>
                        <td>{{$bookings->vehicleInfo->name}}</td>
                        <th>Vehicle Price</th>
                        <td>:</td>
                        <td>{{$bookings->vehicleInfo->price}}</td>
                    </tr>
                    <tr>
                        <th>Booking Date</th>
                        <td>:</td>
                        <td>{{$bookings->vehicleInfo->booking_date}}</td>
                        <th>Booking Time</th>
                        <td>:</td>
                        <td>{{$bookings->vehicleInfo->booking_time}}</td>
                    </tr>
                    <tr>
                        <th>quantity</th>
                        <td>:</td>
                        <td>{{$bookings->vehicleInfo->quantity}}</td>
                    </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>