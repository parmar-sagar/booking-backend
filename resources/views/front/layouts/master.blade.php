<!DOCTYPE html>
<html dir="ltr" lang="en-GB">
  <head>
    <meta charset="utf-8" />
    <title>Quads Dubai Biking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="index.html" />
    <meta
      content="Quads Dubai | Backpacking trips for solo travellers"
    />

    <link rel="icon" href="favicon.ico" />
    <!-- <link rel="manifest" href="{{asset ('assets/front/manifest.json')}}" />  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('assets/front/styles/style.css')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="{{asset ('assets/dist/css/default/zebra_datepicker.min.css')}}" type="text/css">
   
    <link
      rel="preload"
      href="fonts/39040C_1_0.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <link
      rel="preload"
      href="fonts/39040C_0_0.woff2"
      as="font"
      type="font/woff2"
      crossorigin
    />
    <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link
      rel="apple-touch-icon-precomposed"
      href="{{asset ('assets/front/images/touch/ms-touch-icon-144x144-precomposed.png')}}"
    />
  </head>
  <body>

 <!-- ========== Header Start ========== -->
 @include('front.partials.header')
 <!-- ========== Header End ========== -->

 <!-- ========== Maine Content ========== -->
 {{ $slot }}
          {{-- content --}}
 <!-- ========== End ========== -->
   
 <!-- ========== Footer Start ========== -->
 @include('front.partials.footer')
 <!-- ========== Footer End ========== -->

  

    <!-- {{-- <script src="{{asset ('assets/front/scripts/app5a78.js?v=WpWqOtpeFX')}}"></script> --}} -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
 
  <script src="{{asset ('assets/front/js/app.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
  <script src="{{asset ('assets/dist/zebra_datepicker.min.js')}}"></script>
  <script src="{{asset ('assets/examples/examples.js')}}"></script>
 
    <link
      href="https://fonts.googleapis.com/css?family=Just+Another+Hand&amp;display=swap"
      rel="stylesheet"
      media="none"
      onload="if(media!='all')media='all'"
    />
    <script>
      toastr.options = {
        "positionClass": "toast-top-center",
      };
    </script>
  </body>
  <!-- Mirrored from www.backpackingtours.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Nov 2022 10:54:56 GMT -->
</html>
