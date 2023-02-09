<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  body {
    width: 100%;
    height: 100%;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-top: 20px !important;
    margin-bottom: 10px !important;
    font-family: poppins;
}
p {  
    font-size: 12px;
}
.Gateway-tours {
    border: 2px solid #dddddd;
}
a#ls-footer-mobile_ad {
    align-items: center;
    display: flex;
}
p.voucher-expiry {
    color: #585858;
    font-size: 13px;
    font-weight: 400;
}
.voucher-code h4, .security-code h4 {
    display: inline-flex;
    padding-left: 8px;
    font-weight: 400;
    font-size: 16px;
    margin: 0px;
}
.voucher-code p, .security-code p {
    margin: 0px;
    color: #979797;
}
.barcode-img p {
    color: #979797;
}
.Tour-img img {
    height: 140px;
    width: 190px;
    /* height: 180px;
    width: 246px; */
}
.barcode-scanner img {
    width: 28%;
}
.barcode-scanner {
    padding-top: 20px;
    text-align: center;
}
span.booking {
    color: #979797;
}
.Cancel-policy h4 {
    margin: 0px;
}
.Order-dtl h4 {
    margin: 0px;
}
  </style>
</head>
<body>
    <div class="Gateway-tours">
      <div class="row" style="display: flex;">
       <div class="col-4" style="width:38.66%; padding: 10px;">
         <h5>Tours</h5>
         <p style="color:#979797;font-size: 16px;margin: 4px 0px;font-weight: 300;">Hatta mountain safari for two</p>
         <p class="voucher-expiry">
          Use this voucher by 30.12.2022</p>	
          <h4 class="Barcode"><p>AE756AC6C7</p></h4>
       </div>
       <div class="col-4" style="width:29%">
       </div>
       <div class="col-4" style="width:33.33%; background-color:#f6f7f8; padding:15px">
        <div class="Tour-img"><img src="/Sourabh/Html code/pdf ticket html template/456024.jpg" alt="tours"></div>
        <div class="voucher-code"><i class="fa-brands fa-google"></i>
          <h4>Voucher Code</h4>
          <p>VS-H9R1-N6LX-5NHY-KRK5</p>
        </div>
        <div class="security-code"><i class="fa-regular fa-key"></i>
          <h4>Security Code</h4>
          <p>VS-H9R1-N6LX-5NHY-KRK5</p>
        </div>
       </div>
      </div>
    </div>
    <div class="row">
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
        <tr>
            <td align="left" style="padding-top: 20px;">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                      <h4 style="background-color: rgb(238, 238, 238);padding: 10px;margin: 10px 0px;">Booking Details</h4>
                      <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px 5px 10px;">
                            Name
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            {{$bookingInfo->first_name}}
                        </td>
                    </tr>
                    <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px 5px 10px;">
                            Number Of Person
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            {{$bookingInfo->no_of_travelers}}
                        </td>
                    </tr>
                    <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                            Booking Date
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                        {{$bookingInfo->create_at}}
                        </td>
                    </tr>
                    <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                            Pickup Location
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                        {{$bookingInfo->pickup_location}}
                        </td>
                    </tr>
                  <tr>
                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                        Payment Method
                    </td>
                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                    {{$bookingInfo->payment_method}}
                    </td>
                </tr
                  <tr>
                        <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            Order Confirmation Id:
                        </td>
                        <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                            #2345678
                        </td>
                    </tr>
                    <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            Purchased Item (1)
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            $100.00
                        </td>
                    </tr>
                    <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                            Shipping + Handling
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                            $10.00
                        </td>
                    </tr>
                    <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                            Sales Tax
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                            $5.00
                        </td>
                    </tr>
                </table>
            </td> 
        </tr>
    </table>
    </div>
    <div class="Cancel-policy">
    <h4>Refund and Cancel policy</h4>
    <p style="color:#979797">
            1. Amount once paid through the payment gateway shall not be refunded other than in the
            following circumstances:<br>
            • Multiple times debiting of Customer’s Card/Bank Account due to technical error OR Customer's
            account being debited with excess amount in a single transaction due to technical error. In such
            cases, excess amount excluding Payment Gateway charges would be refunded to the Customer.
            • Due to technical error, payment being charged on the Customer’s Card/Bank Account but the
            enrolment for the examination is unsuccessful. Customer would be provided with the enrolment
            by NISM at no extra cost. However, if in such cases, Customer wishes to seek refund of the
            amount, he/she would be refunded net the amount, after deduction of Payment Gateway
            charges or any other charges.<br>
            2. The Customer will have to make an application for refund along with the transaction number
            and original payment receipt if any generated at the time of making payments.<br>
            3. The application in the prescribed format should be sent to paymentonline@stfc.co.in

    </p>
    <hr>
    </div>
    <div class="row right-to-order" style="width: 100%;  display: inline-flex;">
       <div class="col-6 Order-dtl" style="width:50%; padding: 10px;">
         <h4>How To Use</h4>
          <p style="color:#979797">1. Appointment required. Call for reservation
              or cancellation 055 399 3387 or 050 176 5366
              at least 24 hours before it & cancellation must
              be made at least 24 hours before it. Present
              printed Groupon on arrival.
          </p>
          <h4>Redeem At</h4>
          <p style="color:#979797">Office No. 4, Opposite to Al Rashidiya Ladies<br>
            Park<br>
            Ajman
          </p>
          <h4>The Fine Print</h4>
          <p style="color:#979797">Expires 180 days after purchase. Limit 50 per
            person, may buy 50 additional as a gift.
            Booking required by phone, contact 055 399
            3387 or 050 176 5366. Prior
            booking/cancellation (subject to availability)
            
            
          </p>
       </div>
       <div class="col-6 Gate-tour" style="width:50%; padding: 10px;">
         <p style="color:#979797"> at least 24 hours in advance. Minimum 5
            persons are needed to schedule the tour. Pick
            up time: 8.30am-9.30am. Drop off time: 1.30pm2.30pm.
             Pick up and drop off points in Dubai:
          Almulla Plaza (main entrance), Deira City
          Center (Day to Day opposite to DCC), Mall of
          Emirates (Lulu hypermarket behind MOE),
          Dragon Mart (main entrance next to fountain
          area), Burjuman Center (Spinneys next to
          Burjaman). Pick up and drop off points in
          Sharjah: Mega Mall, Sharjah City Center,
          Sahara Center. Surcharge for lunch at Hatta
          Fort Hotel to be paid directly to the partner.
          Residents must bring their Emirates ID with
          them on tour day. Tourists must have their
          original passport and visa on date of tour.
          Printed voucher must be presented. Groupon
          prices are inclusive of VAT where applicable.
          <a style="color: #41b1f6;text-decoration: none;" href="https://www.groupon.ae/universal-fine-print#UFP">See the rules</a> that apply to all deals.</p>	
       </div>
    </div>
</body>
</html>