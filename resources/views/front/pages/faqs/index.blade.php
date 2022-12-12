<x-front.master-layout>
    <div id="barba-wrapper" aria-live="polite">
      <div class="barba-container">
        {{-- <header class="l-header">
          <div class="row row--full row--g-10">
            <div class="col-lg-6 offset-lg-3 text-center">
              <div class="headline-wave headline-wave--center animated fadeInLeft active">
                <h1 class="headline-2">Useful Information</h1>
                <svg width="100px" height="16px" class="stroke-orange">
                  <use xlink:href="fonts/icons.svg#icon-wave-squiggle"></use>
                </svg>
              </div>
              <div class="content mt-10em animation-delay-1 animated fadeInLeft active">
                <p> Find answers to your questions before joining a tour so that you can find out exactly what you want to know. </p>
              </div>
            </div>
          </div>
          <div class="l-header__footer filter filter--padding-sm filter--with-dropdown show">
            <div class="row row--g-10">
              <div class="col-lg-4 offset-lg-4 col-xl-2 offset-xl-5 filter__col">
                <select class="select select--orange js-redirect filled" data-label="Filter By Country" sb="10148526" style="display: none;">
                  <option value="?country=Thailand" selected="">Thailand</option>
                  <option value="?country=Vietnam">Vietnam</option>
                  <option value="?country=Bali">Bali</option>
                  <option value="?country=Cambodia">Cambodia</option>
                  <option value="?country=Sri Lanka">Sri Lanka</option>
                  <option value="?country=India">India</option>
                  <option value="?country=Philippines">Philippines</option>
                </select>
              </div>
            </div>
          </div>
        </header> --}}
        <main>
          <section class="section">
            <div class="row row--g-10">
              <div class="col-12 col-xl-10 offset-xl-1">
                <div class="faq faq--orange animated fadeInUp active">
                  <nav class="faq__filter">
                    <input type="radio" id="opt0" name="faq-categories" class="chip chip--radio-input filled" onclick="App.categoryFilter('general-questions');" checked="">
                    <label for="opt0" class="chip chip--radio-label chip--grey"> General Questions </label>
                    <input type="radio" id="opt1" name="faq-categories" class="chip chip--radio-input filled" onclick="App.categoryFilter('food-amp-accommodation');">
                    <!-- <label for="opt1"
                          class="chip chip--radio-label chip--grey"> Food &amp; Accommodation </label><input type="radio"
                          id="opt2" name="faq-categories" class="chip chip--radio-input filled"
                          onclick="App.categoryFilter('flights-visas');"><label for="opt2"
                          class="chip chip--radio-label chip--grey"> Flights &amp; Visas </label><input type="radio"
                          id="opt3" name="faq-categories" class="chip chip--radio-input filled"
                          onclick="App.categoryFilter('tour-confirmation');"><label for="opt3"
                          class="chip chip--radio-label chip--grey"> Tour Confirmation </label><input type="radio" id="opt4"
                          name="faq-categories" class="chip chip--radio-input filled"
                          onclick="App.categoryFilter('what-to-bring');"><label for="opt4"
                          class="chip chip--radio-label chip--grey"> What To Bring </label><input type="radio" id="opt5"
                          name="faq-categories" class="chip chip--radio-input filled"
                          onclick="App.categoryFilter('daily-itinerary-amp-trips');"><label for="opt5"
                          class="chip chip--radio-label chip--grey"> Daily Itinerary &amp; Trips </label> -->
                  </nav>
                  <div class="faq__list js-faq-filter-items">
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#3616703226224')">
                        <h4 class="headline-5">Where Can I ride the Buggy or Quad Bikes?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="3616703226224">
                        <p>Dune Buggy is driven at our desert place in the open desert with red sand dunes. Whereas, quad bikes are driven either fenced area or open area of the desert, depends upon the package booked for the tour. </p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#41167032262221')">
                        <h4 class="headline-5">Is Pickup / Drop off available from Dubai?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="41167032262221">
                        <p>We are currently offering free pickup and drop off service from hotels and residences in Dubai. </p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#40167032262222')">
                        <h4 class="headline-5">What is the pickup time available for Dune Buggy / Quad Bike Tours?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="40167032262222">
                        <p>Pickup time slots are available upon booking. Choose your preferred time slot while you book your tour. We are doing these tours from Sunrise to Sunset. We can also provide these tours during night time. </p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#39167032262223')">
                        <h4 class="headline-5">What is the total duration of dune buggy / quad bike tour?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="39167032262223">
                        <p>Average total duration of the tour is about 3-4 Hours. For some tours, it takes more time to complete other activities that you book during the booking. </p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#38167032262224')">
                        <h4 class="headline-5">Do we need to bring a valid ID for riding a quad bike or buggy ride?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="38167032262224">
                        <p>You must bring one of the original ID with you on tour day. Driving License, National ID Card or any other photo ID is required. </p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#37167032262225')">
                        <h4 class="headline-5">Is there a minimum age for dune buggy riding?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="37167032262225">
                        <p>Minimum age for a driver is 14 years for dune buggy. People on a passenger side can be a minimum age of 5 years</p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#35167032262226')">
                        <h4 class="headline-5">Is there a minimum age for Quad Bike riding?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="35167032262226">
                        <p>We have different quad bikes for different age groups. Please see the details in that specific quad bike tour section.</p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#34167032262227')">
                        <h4 class="headline-5">What should I wear on a dune buggy ride?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="34167032262227">
                        <p>It is recommended that you wear full sleeved clothes and closed toed shoes to protect yourself from the sand.</p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#33167032262228')">
                        <h4 class="headline-5">What are some of the Dubai desert adventure activities other than dune buggy riding / quad bike riding?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="33167032262228">
                        <p>We have additional options available like Sand Boarding, Camel Rides, Dune Bashing and many more. Please see additional options available during checkout of every tour.</p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#32167032262229')">
                        <h4 class="headline-5">How many passengers will be there in a dune buggy?</h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="32167032262229">
                        <p>We have a buggy from 1 Seater, 2-Seater and 4 Seaters. </p>
                      </div>
                    </article>
                    <article class=" faq__list-item  " data-filter-category="general-questions">
                      <div class="faq__list-item-header" onclick="App.toggleItem(this, '#31167032262230')">
                        <h4 class="headline-5">Do I need to pre-book my tickets for dune buggy/quad bike riding in Dubai? </h4>
                        <span class="faq__list-item-button" aria-label="Close the Answer">
                          <svg width="36px" height="36px">
                            <use xlink:href="fonts/icons.svg#icon-close"></use>
                          </svg>
                        </span>
                      </div>
                      <div class="faq__list-item-answer" id="31167032262230">
                        <p>Yes, since it’s a very popular tour in Dubai, booking must be made before your arrival at our desert place. We do not guarantee the availability of bikes or buggies without prior booking. </p>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>
  </x-front.master-layout>