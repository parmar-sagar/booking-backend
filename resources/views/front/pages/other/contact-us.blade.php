<x-front.master-layout>
<div id="barba-wrappers" aria-live="polite">
  <div class="barba-container">
    <div class="section">
      <div class="row row--g-10">
        <div class="col-12 col-lg-6 offset-lg-1 col-xxl-5 offset-xxl-1">
          <header class="text-center-on-mobile">
            <div class="headline-wave animated fadeInLeft active">
              <h1 class="headline-2">Contact Us</h1>
              <svg width="100px" height="16px" class="stroke-orange">
                <use xlink:href="fonts/icons.svg#icon-wave-squiggle"></use>
              </svg>
            </div>
            <div class="content mt-10em animation-delay-1 animated fadeInLeft active">
              <p>We look forward to partnering with you in providing you with the best customer experience and satisfaction guaranteed. At Quads Dubai, Our clients are our business hence we assure the highest level of quality and service.</p>
              <p>Our Customer Service Staff is available 24/7, so feel free to contact us anytime.</p>
            </div>
            <div class="media-arrow-wrapper">
              <svg width="315px" height="27px" class="media-arrow animation-delay-5 animated fadeInLeft active">
                <use xlink:href="fonts/icons.svg#icon-contact-arrow"></use>
              </svg>
            </div>
            <div class="headline-wave headline-wave--mobile animation-delay-2 animated fadeInLeft active">
              <h3 class="headline-3">Useful Information</h3>
              <svg width="100px" height="16px" class="stroke-orange">
                <use xlink:href="fonts/icons.svg#icon-wave-squiggle"></use>
              </svg>
            </div>
            <div class="content mt-10em pb-20em animation-delay-3 animated fadeInLeft active">
              <h3>Mobile Number</h3>
              <p>
                <a href="tel:+971 52 132 9715">+971 52 132 9715</a>
              </p>
              <h3>Email ID</h3>
              <p>
                <a href="mailto:quadsdubai@gmail.com">quadsdubai@gmail.com</a>
              </p>
            </div>
            <a class="animation-delay-4 btn btn--black animated fadeInLeft active" href="javascript:void(0)" title="See Useful Information"> See Useful Information </a>
          </header>
        </div>
        <div class="col-12 col-lg-4 col-xxl-4 offset-xxl-1">
            <!-- <figure class="bg-media--glasses">
              <img src="fonts/wm-glasses.svg" alt="Background">
            </figure> -->
            <form id="submit-form" class="form form--contact animated fadeInUp active" method="POST"  autocomplete="off" enctype="multipart/form-data">
              @csrf
              <h2 class="headline-3 color-white mb-5em">Contact Form</h2>
              <div class="form__row">
                <div class="form__group">
                  <input type="text" name="name" id="name" placeholder="Name" class="form__input" required="">
                </div>
              </div>
              <div class="form__row">
                <div class="form__group">
                  <input type="text" name="email" id="email" placeholder="Email" class="form__input" required="">
                </div>
              </div>
              <div class="form__row">
                <div class="form__group">
                  <textarea name="message" class="form__textarea" placeholder="message" required></textarea>
                </div>
              </div>
              <div>
                  <button class="btn btn--white btn--full">Send</button>
              </div>
              <div class="loading"></div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</x-front.master-layout>
<script>
$(document).ready(function(){
  $(document).on('submit','#submit-form',function(e){
    e.preventDefault();
      $.ajax({
          type: $(this).prop('method'),
          url: 'contact-us',
          data:new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
              if((response.error)){
                toastr.error(response.error);
              }else{
                $("#section").load(window.location + " #section");
                toastr.success(response.success); 
              }
          },error: function (error){
            toastr.warning(error);
          }
      });
  });
});
</script>