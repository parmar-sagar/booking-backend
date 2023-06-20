<div class="modal-content">
    <div class="modal-header">
    <div class="row-customer">
    <h5 class="modal-title" id="exampleModalToggleLabel">Customer Name: {{$bookingDetails->userInfo->first_name}}</h5>
    <h5 class="modal-title" id="exampleModalToggleLabel">Booking Id: {{$bookingDetails->random_id}}</h5>
   </div></br>
 
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
            <table class="table mb-0">
                <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookingDetails->vehicleInfo as $vehicles)
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
            <!-- <div class="col-lg-1 col-md-1 col-sm-12">
            </div> -->
            <div class="col-lg-3 col-md-3 col-sm-12 text-center">
           <div class="row">
                <div class="col">
                    <div style="width:500px; margin-bottom: 6px;" id="reader">
                        
                    </div>
                </div>
                <form id="submit-code" action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
            <input type="text" id="Secuity-Vcode" class="form-control" placeholder="Security code" name="security_code" value="" required="">
            <input type="hidden" name='id' value="{{$bookingDetails->id}}">
            <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
            </div>
            <!--  -->
            <!-- @php $baseUrl = url("") ; @endphp -->
            <!-- <h1>{!! QrCode::size(80)->generate($baseUrl.'/admin/voucher-bookings/redeem-voucher/'.$bookingDetails->security_code.'/'.$bookingDetails->random_id) !!} </h1> -->
            </div>
            <div class="row">
            <!-- <label for="Security-code"><b>Security code</b></label><br> -->
            <!-- <form id="submit-code" action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
            <input type="text" id="Secuity-Vcode" class="form-control" placeholder="Security code" name="security_code" value="" required="">
            <input type="hidden" name='id' value="{{$bookingDetails->id}}">
            <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form> -->
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
      console.log(qrCodeMessage);
    window.location.href = (qrCodeMessage);
}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

var element = document.getElementById("reader__scan_region");
element.classList.add("bi-qr-code-scan");

$('#reader__dashboard_section_csr').on('click',function(){
        $('.bi-qr-code-scan').removeClass("bi-qr-code-scan");
});

</script>
  

