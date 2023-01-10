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
                  <a class="animation-delay-4 btn btn--black animated fadeInLeft active" href="/useful-information" title="See Useful Information"> See Useful Information </a>
                </header>
              </div>
              <div class="col-12 col-lg-4 col-xxl-4 offset-xxl-1">
                <figure class="bg-media--glasses">
                  <img src="fonts/wm-glasses.svg" alt="Background">
                </figure>
                <form id="form-id" class="form form--contact animated fadeInUp active" onsubmit="return App.submitForm({form: this, url: '/ajax/sendForm'});" novalidate="novalidate">
                  <h2 class="headline-3 color-white mb-5em">Contact Form</h2>
                  <div class="form__row">
                    <div class="form__group">
                      <input type="text" name="name" id="name" class="form__input" required="">
                      <label class="form__label">Name</label>
                    </div>
                  </div>
                  <div class="form__row">
                    <div class="form__group">
                      <input type="text" name="email" id="email" class="form__input" required="">
                      <label class="form__label">Email Address</label>
                    </div>
                  </div>
                  <div class="form__row">
                    <div class="form__group">
                      <textarea name="message" class="form__textarea"></textarea>
                      <label class="form__label">Message</label>
                    </div>
                  </div>
                  <input type="hidden" name="type" value="contact" class="filled">
                  <input type="hidden" name="page_id" value="8" class="filled">
                  <input type="hidden" name="page_slug" value="contact" class="filled">
                  <div class="form__row text-align-right">
                    <button class="btn btn--white btn--full" type="submit">Send</button>
                  </div>
                  <div class="loading"></div>
                </form>
              </div>
            </div>
          </div>
        <!--  <main class="l-main">
            <section class=" section  ">
              <div class="">
                <div class="row row--g-10">
                  <div class="col-12 col-lg-6 offset-lg-3 col-xxl-4 offset-xxl-4">
                    <div class="card card--shadow-purple bg-purple">
                      <div class="card__content">
                        <div class="headline-wave">
                          <h3 class="headline-4">Join Your Backpacking Community</h3>
                          <svg width="100px" height="16px" class="stroke-orange">
                            <use xlink:href="fonts/icons.svg#icon-wave-squiggle"></use>
                          </svg>
                        </div>
                        <div class="content mt-5em"> Keep up to date with us on social media. </div>
                        <ul class="social-media mt-10em">
                          <li class="social-media__item">
                            <a class="l-footer__social-link social-media__link" target="_blank" rel="noopener noreferrer" href="#" title="Facebook" aria-label="Our Facebook">
                              <svg width="43.14px" height="43.14px" class="social-media__icon">
                                <use xlink:href="fonts/icons.svg#icon-facebook"></use>
                              </svg>
                            </a>
                          </li>
                          <li class="social-media__item">
                            <a class="l-footer__social-link social-media__link" target="_blank" rel="noopener noreferrer" href="#" title=" YouTube" aria-label="Our YouTube">
                              <svg width="43.14px" height="43.14px" class="social-media__icon">
                                <use xlink:href="fonts/icons.svg#icon-youtube"></use>
                              </svg>
                            </a>
                          </li>
                          <li class="social-media__item">
                            <a class="l-footer__social-link social-media__link" target="_blank" rel="noopener noreferrer" href="#" title="Instagram" aria-label="Our Instagram">
                              <svg width="43.14px" height="43.14px" class="social-media__icon">
                                <use xlink:href="fonts/icons.svg#icon-instagram"></use>
                              </svg>
                            </a>
                          </li>
                          <li class="social-media__item">
                            <a class="l-footer__social-link social-media__link" target="_blank" rel="noopener noreferrer" href="#" title="Our Facebook Group" aria-label="Our Facebook Group">
                              <svg width="43.14px" height="43.14px" class="social-media__icon">
                                <use xlink:href="fonts/icons.svg#icon-fb-group"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </main>-->
        </div>
      </div>
    </x-front.master-layout>