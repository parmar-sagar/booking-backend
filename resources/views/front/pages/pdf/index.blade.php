<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
  </head>
  <style>
    @font-face {
    font-family: SourceSansPro;
    src: url(SourceSansPro-Regular.ttf);
  }
  
  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  
  a {
    color: #0087C3;
    text-decoration: none;
  }
  
  .invoice {
    position: relative;
    width: 19cm;
    height: 23cm;
    margin: 0 auto;
    color: #555555;
    background: #fbfbfb;
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-family: SourceSansPro;
    /* padding: 20px; */
  }
  
  header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
  }
  
  #logo {
    float: left;
    margin-top: 8px;
    text-align: center;
    width: 50%;
    background-image:  }
  
  #logo img {
    height: 120px;
  }
  
  #company {
    float: left;
    text-align: right;
    width: 50%;
  }
  
  
  #details {
    margin-bottom: 50px;
  }
  
  #client {
    padding-left: 6px;
    border-left: 6px solid #0087C3;
    float: left;
  }
  
  #client .to {
    color: #777777;
  }
  
  h2.name {
    font-size: 1.4em;
    font-weight: normal;
    margin: 0;
  }
  
  #invoice {
    float: right;
    text-align: right;
  }
  
  #invoice h1 {
    color: #0087C3;
    font-size: 2.4em;
    line-height: 1em;
    font-weight: normal;
    margin: 0  0 10px 0;
  }
  
  #invoice .date {
    font-size: 1.1em;
    color: #777777;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 100px;
  }
  
  table th,
  table td {
    padding: 20px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
  }
  
  table th {
    white-space: nowrap;        
    font-weight: normal;
  }
  
  table td {
    text-align: right;
  }
  
  table td h3{
    color: #360edc;
    font-size: 1.2em;
    font-weight: normal;
    margin: 0 0 0.2em 0;
  }
  
  table .no {
    /* color: #FFFFFF; */
    font-size: 1.6em;
    /* background: #57B223; */
  }
  table .head-color {
    color: #ffffff;
    background: #6d4aff !important;
  }
  
  table .desc {
    text-align: left;
  }
  
  table .unit {
    background: #DDDDDD;
  }
  
  table .qty {
  }
  
  /* table .total {
    background: #57B223;
    color: #FFFFFF;
  } */
  
  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }
  
  table tbody tr:last-child td {
    border: none;
  }
  
  table tfoot td {
    padding: 10px 20px;
    background: #FFFFFF;
    border-bottom: none;
    font-size: 1.2em;
    white-space: nowrap; 
    border-top: 1px solid #AAAAAA; 
  }
  
  table tfoot tr:first-child td {
    border-top: none; 
  }
  
  table tfoot tr:last-child td {
    color: #360edc;
    font-size: 1.4em;
    border-top: 1px solid #360edc; 
  
  }
  
  table tfoot tr td:first-child {
    border: none;
  }
  
  #thanks{
    font-size: 2em;
    margin-bottom: 50px;
  }
  
  #notices{
    float: right;
    padding-right: 40px;
    /* border-left: 6px solid #0087C3;   */
  }
  .large-sign {
    font-size: 1.4em;
    border-top: 2px solid #aaaaaa;
    width: 150px;
    text-align: center;
    padding: 10px;
    padding-bottom: 0px;
  }
  #notices .notice {
    font-size: 1em;
    text-align: center;
  }
  td.logodetails {
  text-align: left;
}
span.logoname {
  /* text-align: center; */
  font-size: 1.5em;
  font-weight: bold;
  color: black;
  padding-bottom: 0px;
}
span.logosubheading {
  /* text-align: center; */
  font-size: 1em;
  font-weight: bold;
  color: #1ebbd7;
  padding-top: 0px;
}
td.companyaddress {
  text-align: left;
  padding-top: 0px;
  padding-bottom: 0px;
}
  
  footer {
    color: #777777;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #AAAAAA;
    padding: 8px 0;
    text-align: center;
  }
  
  
  </style>
  <body>
    <div class="invoice">
      <header class="clearfix">
        <div id="logo">
          <!-- <img src="{{asset ('assets/front/images/logo1.png')}}"> -->
          
          <!-- <img src="{{asset ('assets/front/css/logo/logoquads.png')}}" style="width: 200px; height: 200px"> -->
        </div>
        <div id="company">
          <h1>INVOICE</h1>
          <div class="date">Date of Booking: {{ date('d M Y',strtotime($bookingInfo->created_at)) }}</div>
          <div class="date">Booking Number: {{ $bookingInfo->random_id }}</div>
        </div>
      </header>
      <main>
        <div id="details" class="clearfix">
          <div id="client">
            <div class="to">INVOICE TO:</div>
            <h2 class="name">{{ $bookingInfo->first_name." ".$bookingInfo->last_name }}</h2>
            <div class="email"><a href="mailto:{{ $bookingInfo->email }}">{{ $bookingInfo->email }}</a></div>
            <div class="email"><a href="javascript:void(0)"></a>{{ $bookingInfo->mobile }}</div>
          </div>
          <div id="invoice">
            <!-- <h1>INVOICE</h1> -->
            <div class="date">{{ $bookingInfo->status }}</div>
            <div class="date">lOCATION({{ $bookingInfo->pickup_location }})</div>
          </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="no head-color">#</th>
              <th class="desc head-color">VEHICLE DETAILS</th>
              <th class="desc head-color">BOOKING TIME</th>
              <th class="qty head-color">QUANTITY</th>
              <th class="total head-color">TOTAL</th>
            </tr>
          </thead>
          <tbody>
            @foreach($bookingInfo->vehicleInfo as $key => $vehicle)
            <tr>
              <td class="no"></td>
              <td class="desc"><h3>{{ $vehicle->name }}</h3>
              @php $extraProducts = json_decode($vehicle->extra_product) @endphp
              @if(isset($extraProducts))
              @foreach($extraProducts as $product)
              EXTRA :&nbsp; {{$product->title}}<br>
              PRICE :&nbsp; {{$product->price}}<br>
              @endforeach
              @endif
            </td>
              <td class="qty">{{ $vehicle->booking_time }}</td>
              <td class="qty">{{ $vehicle->quantity }}</td>
              <td class="unit">{{ $vehicle->price }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">SUBTOTAL</td>
              <td>{{ $bookingInfo->sub_total }}</td>
            </tr>
            <tr>
              <td colspan="2" class="logodetails"><span class="logoname">QUADS DUBAI</span> <br> <span class="logosubheading">ADVENTURE STARTS HERE</span> </td>
              <td colspan="2">EXTRA ACTIVITIES(%)</td>
              <td>@if(isset($bookingInfo->extra_amount)){{ $bookingInfo->extra_amount }}@endif</td>
            </tr>
            <tr>
              <td colspan="2" class="companyaddress">xyz, street1, dubai 145006 , UAE <br>quadsdubai@gmail.com<br> +971 52 132 9715</td>
              <td colspan="2">DISCOUNT</td>
              <td>@if(isset($bookingInfo->discount)){{ $bookingInfo->discount }}@endif</td>
            </tr>
            <tr>
              <td colspan="2"></td>
              <td colspan="2">GRAND TOTAL</td>
              <td>@if(isset($bookingInfo->total)){{ $bookingInfo->total }}@endif</td>
            </tr>
          </tfoot>
        </table>
        <div id="notices">
          <div class="large-sign">SIGNATURE</div>
          <div class="notice">Quads Dubai</div>
        </div>
        </main>
      <footer>
        Invoice was created on a computer and is valid without the signature and seal.
      </footer>
    </div>
  </body>
</html>