<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css')}}" rel="stylesheet" type="text/css" />
    <title>Quartz Dubai</title>
  </head>
  <style>
    li.list-group-item:before {
      position: absolute !important;
      content: "" !important;
      height: 20px !important;
      width: 7px !important;
      background: #ffc107 !important;
      top: 35% !important;
      left: 1% !important;
    }
  </style>

  <body>
    <!-- navabar start    -->
    <nav class="navbar navbar-expand-lg bg-light px-lg-5">
      <div class="container-fluid">
        <div class="logo-toggle">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img
            src="{{ asset('assets/front/images\image_2022_11_21T04_57_12_733Z-U-bg.png')}}"
            alt=""
            style="width: 100px; height: 100px"
          />
        </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-5">
            <li class="nav-item mx-3 fs-3 text">
              <a class="nav-link active" aria-current="page" href="#">Tours</a>
            </li>
            <li class="nav-item mx-3 fs-3 text">
              <a class="nav-link" href="#">Deals</a>
            </li>
            <li class="nav-item mx-3 fs-3 text">
              <a class="nav-link">About</a>
            </li>
            <li class="nav-item mx-3 fs-3 text">
              <a class="nav-link">Contact</a>
            </li>
          </ul>

          <button
            class="btn btn-warning btn-md rounded-pill fs-3 text"
            type="submit"
          >
            <span class="glyphicon glyphicon-log-in">
              <i class="fas fa-sign-in-alt"> </i>
            </span>
            Search
          </button>
        </div>
      </div>
    </nav>
    <!-- navabar start  -->

    <!-- carousel start -->
    <section Id="BuggySEC-1" class="Buggy-sec-1">
      <video autoplay muted loop id="myVideo">
        <source src="{{ asset('assets/front/Images/video.mp4')}}" type="video/mp4" />
        Your browser does not support HTML5 video.
      </video>
      <div class="overlay">
        <div class="content">
          <h1>
            Desert Advanture<br />
            for solo Travellers
          </h1>
          <p>Travel & Make New Friends!</p>
          <a href="#"
            ><button
              type="button"
              class="discover-btn btn btn-md rounded-pill text-white text-center"
              style="
                color: rgb(255, 255, 255);
                background-color: #62c0c0;
                padding: 16px 20px;
              "
            >
              Discover Tours
            </button></a
          >
        </div>
      </div>
      <div class="blob-container position-absolute">
        <div class="play-btn position-relative">
        <div class="blob">
          <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="70%" id="blobSvg">
              <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" style="stop-color: rgba(142, 201, 207, 0.419);"></stop>
                  <stop offset="100%" style="stop-color: rgba(0, 170, 255, 0.435);"></stop>
                </linearGradient>
              </defs>
              <path fill="url(#gradient)"  style="stroke:rgb(160, 205, 227);;stroke-width:40">
              <animate attributeName='d' repeatCount='indefinite' dur='5000ms'
              values='M457,317.5Q460,385,404,424.5Q348,464,283,467.5Q218,471,158.5,447.5Q99,424,74,366.5Q49,309,30,244.5Q11,180,52.5,125Q94,70,155,41Q216,12,275.5,38.5Q335,65,388.5,96Q442,127,448,188.5Q454,250,457,317.5Z;
              
              M435.5,304.5Q420,359,386.5,418Q353,477,284,485.5Q215,494,151.5,465.5Q88,437,65,374Q42,311,48,251.5Q54,192,79.5,137.5Q105,83,162,57.5Q219,32,279.5,42Q340,52,388,91.5Q436,131,443.5,190.5Q451,250,435.5,304.5Z;
              
              M459.5,309.5Q436,369,393,418.5Q350,468,282.5,480Q215,492,163,451Q111,410,61,365Q11,320,26.5,254.5Q42,189,79,142Q116,95,166,54Q216,13,281,27Q346,41,403,78Q460,115,471.5,182.5Q483,250,459.5,309.5Z;
  
              M440,304.5Q420,359,381,405.5Q342,452,281,454Q220,456,161.5,438Q103,420,62.5,368.5Q22,317,17,248.5Q12,180,57,129.5Q102,79,160,54.5Q218,30,279.5,40Q341,50,394,87Q447,124,453.5,187Q460,250,440,304.5Z;
  
              M457,317.5Q460,385,404,424.5Q348,464,283,467.5Q218,471,158.5,447.5Q99,424,74,366.5Q49,309,30,244.5Q11,180,52.5,125Q94,70,155,41Q216,12,275.5,38.5Q335,65,388.5,96Q442,127,448,188.5Q454,250,457,317.5Z;'> 
          </animate> 
           </path>
          </svg>
         </div>
         <a id="button" href="https://youtu.be/tMdH0H4OB7Q" target="_blank" ><i class="fa-solid fa-play"></i></a> 
          </div>
    </div>
    </section>
    <!--<div
      id="carouselExampleDark"
      class="carousel carousel-dark slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
      </div>
      <div class="carousel-inner">
        <div
          class="carousel-item active position-relative"
          data-bs-interval="10000"
        >
          <img
            src="images\homepage\2000000012.png"
            class="d-block w-100 imag-fluid"
            alt="..."
          />
          <div
            class="carousel-caption d-none d-md-block position-absolute top-0 end-0 start-0 bottom-0 overview"
            style="background-color: #0000004d !important"
          >
            <div class="row row ms-5 ps-5">
              <div
                class="col-lg-6 col-md-12 col-6 position-absolute top-50 ps-5 ms-5"
              >
                <h5 class="fs-1 text text-light text-start text fw-bold">
                  First slide label
                </h5>
                <h5 class="fs-1 text-light text-start fw-bold">
                  The five boxing wizards jump quickly.
                </h5>
                <p class="text-light text-start">
                  Some representative placeholder content for the first slide.
                </p>
                <button
                  type="button"
                  class="btn btn-warning text-dark btn-md rounded-pill fs-4 mt-5"
                  style="float: left"
                >
                  Primary button
                </button>
              </div>
              <div class="col-md-6 col-6"></div>
            </div>
          </div>
        </div>
        <div class="carousel-item position-relative" data-bs-interval="2000">
          <img
            src="images\homepage\5LEO4EQIRJAIPGQKD5RJHNSYOY.png"
            class="d-block w-100"
            alt="..."
          />
          <div
            class="carousel-caption d-none d-md-block position-absolute top-0 end-0 start-0 bottom-0 overview"
            style="background-color: #0000004d !important"
          >
            <div class="row row ms-5 ps-5">
              <div
                class="col-lg-6 col-md-12 col-6 position-absolute top-50 ps-5 ms-5"
              >
                <h5 class="fs-1 text-light text-start fw-bold">
                  First slide label
                </h5>
                <h5 class="fs-1 text-light text-start text fw-bold">
                  Some representative placeholder
                </h5>
                <p class="text-light text-start">
                  Some representative placeholder content for the first slide.
                </p>
                <button
                  type="button"
                  class="btn btn-warning btn-md rounded-pill fs-4 tex mt-5"
                  style="float: left"
                >
                  Primary button
                </button>
              </div>
              <div class="col-md-6 col-6"></div>
            </div>
          </div>
        </div>

        <div class="carousel-item position-relative">
          <img
            src="images\Dune Buggy Images\Polaris 2 Seater\9-overview-gallery-media-05-lg.jpg"
            class="d-block w-100"
            alt="..."
          />
          <div
            class="carousel-caption d-none d-md-block position-absolute top-0 end-0 start-0 bottom-0 overview"
            style="background-color: #0000004d !important"
          >
            <div class="row row ms-5 ps-5">
              <div
                class="col-lg-6 col-md-12 col-6 position-absolute top-50 ps-5 ms-5 d-block"
              >
                <h5 class="fs-1 text-light text-start fw-bold">
                  First slide label
                </h5>
                <h5 class="fs-1 text-light text-start text fw-bold">
                  Some representative placeholder
                </h5>
                <p class="text-light text-start">
                  Some representative placeholder content for the first slide.
                </p>
                <button
                  type="button"
                  class="btn btn-warning btn-md rounded-pill fs-4 tex mt-5"
                  style="float: left"
                >
                  Primary button
                </button>
              </div>
              <div class="col-md-6 col-6"></div>
            </div>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleDark"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleDark"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>-->

    <!-- carousel end -->
    <!--section 2 start-->
    <div
      class="container-fluid p-lg-5 p-md-1 justify-content-center"
      style="margin: 0px; padding: 0px; overflow: hidden"
    >
      <h1 class="text-center mt-5">Popular Tours</h1>
      <div class="row m-lg-5">
        <div
          class="col-sm-4 col-md-6 col-lg-4 mt-5 d-flex justify-content-center position-relative Popular-Card_Tour"
        >
          <div
            class="card border rounded"
            style="width: 24rem; border: 5px solid #60c0bf !important"
          >
            <div
              class="block-bottom position-absolute translate-middle"
              style="
                width: 100px;
                height: 100px;
                background-color: #60c0bf;
                z-index: -1;
                left: 91%;
                top: 6%;
                border-radius: 10px;
              "
            ></div>
            <img
              src="{{ asset('assets/front/images/homepage/2018CANAM_SPREAD_Maverick-X3-Xds-TURBO-R-Triple-Black-Beach-1 (2).png')}}"
              class="card-img-top"
              alt="..."
            />
            <button
              class="btn btn-warning btn-md rounded-pill text-center position-absolute top-0 end-0"
              style="
                margin-top: 2%;
                margin-right: 2%;
                background-color: #b9dcd5;
                color: #fff;
                border: 0px;
              "
            >
              From
              <span
                class="text-white rounded-pill"
                style="background-color: #74c0be; padding: 4px 6px"
              >
                AEDSSO</span
              >
            </button>

            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
              <div class="row">
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                  </ul>
                </div>
              </div>
              <br />
              <div class="col d-flex justify-content-center">
                <button
                  type="button"
                  class=" btn-warning btn-md rounded-pill text-white tex text-center" style="background-color: #60c0bf;
                  border: none;
                  padding: 10px 16px;"
                >
                  View Tours
                </button>
              </div>
            </div>
            <div
              class="block position-absolute translate-middle"
              style="
                width: 100px;
                height: 100px;
                background-color: #60c0bf;
                z-index: -1;
                right: 64%;
                top: 94%;
                border-radius: 10px;
              "
            ></div>
          </div>
        </div>

        <div
          class="col-sm-4 col-md-6 col-lg-4 mt-5 d-flex justify-content-center position-relative Popular-Card_Tour"
        >
          <div
            class="card border rounded"
            style="width: 24rem; border: 5px solid #7579e7 !important"
          >
            <div
              class="block-bottom position-absolute translate-middle"
              style="
                width: 100px;
                height: 100px;
                background-color: #7579e7;
                z-index: -1;
                left: 91%;
                top: 6%;
                border-radius: 10px;
              "
            ></div>
            <img
              src="{{ asset('assets/front/images\homepage\Polaris-XP-PRO0.png')}}"
              class="card-img-top"
              alt="..."
            />
            <button
              class="btn btn-info btn-md rounded-pill text-center position-absolute top-0 end-0"
              style="
                margin-top: 2%;
                margin-right: 2%;
                background-color: #7678e5;
                color: #fff;
                border: 0px;
              "
            >
              From
              <span
                class="rounded-pill"
                style="background-color: #74c0be; padding: 4px 6px"
              >
                AEDSSO</span
              >
            </button>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
              <div class="row">
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                  </ul>
                </div>
              </div>
              <br />
              <div class="col d-flex justify-content-center">
                <button
                  type="button"
                  class=" btn-warning btn-md rounded-pill text-white tex text-center" style="background-color: #60c0bf;
                  border: none;
                  padding: 10px 16px;"
                >
                  View Tours
                </button>
              </div>
            </div>
            <!-- <div class="block position-absolute  translate-middle" style="width:100px;height: 100px;background-color: #f71329;z-index: -1;left: 91%;top: 6%;"></div> -->
            <div
              class="block position-absolute translate-middle"
              style="
                width: 100px;
                height: 100px;
                background-color: #7579e7;
                z-index: -1;
                right: 64%;
                top: 94%;
                border-radius: 10px;
              "
            ></div>
          </div>
        </div>

        <div
          class="col-sm-4 col-md-6 col-lg-4 mt-5 d-flex justify-content-center Popular-Card_Tour"
        >
          <div
            class="card border rounded"
            style="width: 24rem; border: 5px solid #ff8c92 !important"
          >
            <div
              class="block-bottom position-absolute translate-middle"
              style="
                width: 100px;
                height: 100px;
                background-color: #ff8c92;
                z-index: -1;
                left: 91%;
                top: 6%;
                border-radius: 10px;
              "
            ></div>
            <img
              src="{{ asset('assets/front/images\Dune Buggy Images\Polaris 2 Seater\XP1K2_DSC_1206.jpg')}}"
              class="card-img-top"
              alt="..."
            />
            <button
              class="btn btn-primary btn-md rounded-pill tex text-center position-absolute top-0 end-0"
              style="
                margin-top: 2%;
                margin-right: 2%;
                background-color: #ff8c92;
                color: #fff;
                border: 0px;
              "
            >
              From
              <span
                class="text-white rounded-pill"
                style="background-color: #74c0be; padding: 4px 6px"
              >
                AEDSSO</span
              >
            </button>
            <div class=""></div>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
              <div class="row">
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                  </ul>
                </div>
                <div class="col">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                  </ul>
                </div>
              </div>
              <br />
              <div class="col d-flex justify-content-center">
                <button
                  type="button"
                  class="btn-md rounded-pill text-white tex text-center" style="background-color: #60c0bf;
                  border: none;
                  padding: 10px 16px;"
                >
                  View Tours
                </button>
              </div>
            </div>
            <div
              class="block position-absolute translate-middle"
              style="
                width: 100px;
                height: 100px;
                background-color: #ff8c92;
                z-index: -1;
                left: 9%;
                top: 94%;
                border-radius: 10px;
              "
            ></div>
          </div>
        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <div class="col-12 d-flex justify-content-center">
          <a href="#"
              ><button
                type="button"
                class="btn btn-md rounded-pill text-white tex text-center"
                style="
                  color: rgb(255, 255, 255);
                  background-color: #7e92ff;
                  padding: 16px 20px;
                "
              >
                View All Tours
              </button></a
            >
        </div>
      </div>
    </div>
    <!--section 2 end-->
    <!--section 3 start-->
    <section class="Buggy-sec-3 mt-2">
      <div class="container-fluid">
        <div class="row position-relative">
          <div class="col-sm-12 col-xs-12 col-lg-8 col-md-12 tab-buttons p-0">
            <button
              class="tablink"
              onclick="openPage('Home', this, '#7579e7')"
              id="defaultOpen"
            >
            <img
            src="{{ asset('assets/front/images/Dune Buggy Images/Others/Aishwarya-Pissay-in-action-in-her-Yamaha-450F-1024x683.jpg')}}"
          /> <div class="overlay position-absolute"></div>
            <h1> Moter Bike</h1>
            </button>
            <button class="tablink" onclick="openPage('News', this, '#67c1c2')">
              <img
            src="{{ asset('assets/front/images/Dune Buggy Images/Others/DSC_9798-915x612-1.webp')}}"
          /> <div class="overlay position-absolute"></div>
            <h1> Quad Biking</h1>
              
            </button>
            <button
              class="tablink"
              onclick="openPage('Contact', this, '#2dbcff')"
            ><img
            src="{{ asset('assets/front/images/Dune Buggy Images/Others/2020-Polaris-RZR-Pro-XP.jpg')}}"
          /> <div class="overlay position-absolute"></div>
            <h1> Dune Buggy</h1>
              
            </button>
            <button
              class="tablink"
              onclick="openPage('About', this, '#ff4d54')"
            >
            <img
            src="{{ asset('assets/front/images/Dune Buggy Images/Others/Buggy-Polaris-RZR-Turbo-4-Seater-1-Hour-Drive-Time.jpg')}}"
          /> <div class="overlay position-absolute"></div>
            <h1 class="tabbartext"> Desert Advanture</h1>
              
            </button>
          </div>
          <div class="col-12 p-0">
            <div id="Home" class="tabcontent">
              <div class="sec2 text-center">
              <h1>Our Tours</h1>
              <p>Explore our unbelievable tours package from Monster Experience</p>
              </div>
              <div class="content-tab1">
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ">
                    <img
                      src="{{ asset('assets/front/images/Dune Buggy Images/Others/Aishwarya-Pissay-in-action-in-her-Yamaha-450F-1024x683.jpg')}}"
                    />
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-7 col-md-7">
                    <h2>Yamaha Raptor 700cc</h2>
                    <div class="row">
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                      <div class="point-text">
                      <h4>Length</h4>
                      <p>21 Days</p>
                      </div>
                      <div class="point-text">
                        <h4>Length</h4>
                        <p>21 Days</p>
                        </div>
                        <div class="point-text">
                          <h4>Length</h4>
                          <p>21 Days</p>
                          </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                        <div class="point-text">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text">
                            <h4>Length</h4>
                            <p>21 Days</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                    <h2>Highlights</h2>
                    <p><li>Explore incredibly beautiful terrain in a powerful 4x4 buggy</li>
                    <li>Self-drive experience accompanied by our tour guides</li><li>Make memories that will last a lifetime</li><li>Highest quality fleet, service & facilities in the industry</li></p>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="News" class="tabcontent">
              <div class="sec2 text-center">
                <h1>Our Tours</h1>
                <p>Explore our unbelievable tours package from Monster Experience</p>
                </div>
              <div class="content-tab2">
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ">
                    <img
                      src="{{ asset('assets/front/images/Dune Buggy Images/Others/DSC_9798-915x612-1.webp')}}"
                    />
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-7 col-md-7">
                    <h2>Yamaha Raptor 700cc</h2>
                    <div class="row">
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                      <div class="point-text2">
                      <h4>Length</h4>
                      <p>21 Days</p>
                      </div>
                      <div class="point-text2">
                        <h4>Length</h4>
                        <p>21 Days</p>
                        </div>
                        <div class="point-text2">
                          <h4>Length</h4>
                          <p>21 Days</p>
                          </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                        <div class="point-text2">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text2">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text2">
                            <h4>Length</h4>
                            <p>21 Days</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                    <h2>Highlights</h2>
                    <p><li>Explore incredibly beautiful terrain in a powerful 4x4 buggy</li>
                    <li>Self-drive experience accompanied by our tour guides</li><li>Make memories that will last a lifetime</li><li>Highest quality fleet, service & facilities in the industry</li></p>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            </div>

            <div id="Contact" class="tabcontent">
              <div class="sec2 text-center">
                <h1>Our Tours</h1>
                <p>Explore our unbelievable tours package from Monster Experience</p>
                </div>
              <div class="content-tab3">
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ">
                    <img
                      src="{{ asset('assets/front/images/Dune Buggy Images/Others/2020-Polaris-RZR-Pro-XP.jpg')}}"
                    />
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-7 col-md-7">
                    <h2>Yamaha Raptor 700cc</h2>
                    <div class="row">
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                      <div class="point-text3">
                      <h4>Length</h4>
                      <p>21 Days</p>
                      </div>
                      <div class="point-text3">
                        <h4>Length</h4>
                        <p>21 Days</p>
                        </div>
                        <div class="point-text3">
                          <h4>Length</h4>
                          <p>21 Days</p>
                          </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                        <div class="point-text3">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text3">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text3">
                            <h4>Length</h4>
                            <p>21 Days</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                    <h2>Highlights</h2>
                    <p><li>Explore incredibly beautiful terrain in a powerful 4x4 buggy</li>
                    <li>Self-drive experience accompanied by our tour guides</li><li>Make memories that will last a lifetime</li><li>Highest quality fleet, service & facilities in the industry</li></p>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            </div>

            <div id="About" class="tabcontent">
              <div class="sec2 text-center">
                <h1>Our Tours</h1>
                <p>Explore our unbelievable tours package from Monster Experience</p>
                </div>
              <div class="content-tab4">
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 ">
                    <img
                      src="{{ asset('assets/front/images/Dune Buggy Images/Others/Buggy-Polaris-RZR-Turbo-4-Seater-1-Hour-Drive-Time.jpg')}}"
                    />
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-7 col-md-7">
                    <h2>Yamaha Raptor 700cc</h2>
                    <div class="row">
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                      <div class="point-text4">
                      <h4>Length</h4>
                      <p>21 Days</p>
                      </div>
                      <div class="point-text4">
                        <h4>Length</h4>
                        <p>21 Days</p>
                        </div>
                        <div class="point-text4">
                          <h4>Length</h4>
                          <p>21 Days</p>
                          </div>
                    </div>
                    <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                        <div class="point-text4">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text4">
                          <h4>Length</h4>
                          <p>21 Days</p>
                        </div>
                        <div class="point-text4">
                            <h4>Length</h4>
                            <p>21 Days</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-lg-6 col-md-6">
                    <h2>Highlights</h2>
                    <p><li>Explore incredibly beautiful terrain in a powerful 4x4 buggy</li>
                    <li>Self-drive experience accompanied by our tour guides</li><li>Make memories that will last a lifetime</li><li>Highest quality fleet, service & facilities in the industry</li></p>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-xs-12 col-lg-3 col-md-3 position-relative">
                    <div class="row p-0">
                      <div class="col-12">
                        <img
                          src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                        />
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--section 3 end-->
    <!--section 4 start-->
    <section class="Buggy-sec-4 p-3">
      <div class="container p-5">
        <div class="row">
          <div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 position-relative">
            <div class="square-top1"></div>
            <div class="square-bottom1"></div>
            <div class="blob-container position-absolute " style="z-index:2;right:73%; top:26%">
              <div class="play-btn position-relative">
              <div class="blob">
                <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="70%" id="blobSvg">
                    <defs>
                      <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color: rgba(142, 201, 207, 0.419);"></stop>
                        <stop offset="100%" style="stop-color: rgba(0, 170, 255, 0.435);"></stop>
                      </linearGradient>
                    </defs>
                    <path fill="url(#gradient)"  style="stroke:rgb(160, 205, 227);;stroke-width:40">
                    <animate attributeName='d' repeatCount='indefinite' dur='5000ms'
                    values='M457,317.5Q460,385,404,424.5Q348,464,283,467.5Q218,471,158.5,447.5Q99,424,74,366.5Q49,309,30,244.5Q11,180,52.5,125Q94,70,155,41Q216,12,275.5,38.5Q335,65,388.5,96Q442,127,448,188.5Q454,250,457,317.5Z;
                    
                    M435.5,304.5Q420,359,386.5,418Q353,477,284,485.5Q215,494,151.5,465.5Q88,437,65,374Q42,311,48,251.5Q54,192,79.5,137.5Q105,83,162,57.5Q219,32,279.5,42Q340,52,388,91.5Q436,131,443.5,190.5Q451,250,435.5,304.5Z;
                    
                    M459.5,309.5Q436,369,393,418.5Q350,468,282.5,480Q215,492,163,451Q111,410,61,365Q11,320,26.5,254.5Q42,189,79,142Q116,95,166,54Q216,13,281,27Q346,41,403,78Q460,115,471.5,182.5Q483,250,459.5,309.5Z;
        
                    M440,304.5Q420,359,381,405.5Q342,452,281,454Q220,456,161.5,438Q103,420,62.5,368.5Q22,317,17,248.5Q12,180,57,129.5Q102,79,160,54.5Q218,30,279.5,40Q341,50,394,87Q447,124,453.5,187Q460,250,440,304.5Z;
        
                    M457,317.5Q460,385,404,424.5Q348,464,283,467.5Q218,471,158.5,447.5Q99,424,74,366.5Q49,309,30,244.5Q11,180,52.5,125Q94,70,155,41Q216,12,275.5,38.5Q335,65,388.5,96Q442,127,448,188.5Q454,250,457,317.5Z;'> 
                </animate> 
                 </path>
                </svg>
               </div>
               <a id="button" href="https://youtu.be/tMdH0H4OB7Q" target="_blank" ><i class="fa-solid fa-play"></i></a> 
                </div>
          </div>
            <div class="video-sec">
              <video width="400" height="340" controls>
                <source src="movie.mp4" type="video/mp4" />
                <source src="movie.ogg" type="video/ogg" />
                Your browser does not support the video tag.
              </video>
            </div>
          </div>

          <div class="col-sm-12 col-xs-12 col-lg-7 col-md-7">
            <div class="row">
              <div class="col-sm-6 Gallery-dest">
                <img
                  src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM (2).jpeg')}}"
                />
              </div>
              <div class="col-sm-6 Gallery-dessert">
                <img
                  src="{{ asset('assets/front/images/Dune Buggy Images/Overnight Desert Safari/WhatsApp Image 2022-02-04 at 2.14.40 PM.jpeg')}}"
                />
              </div>
            </div>
            <div class="row">
              <div class="card p-3">
                <p>
                  This was such an amazing experience! Still can't belive how
                  much we did in 20 days.This was such an amazing experience!
                  Still can't belive how much we did in 20 days.
                </p>
                <h6>Mayburg</h6>
                <h6>22-11-2022</h6>
              </div>
            </div>
            <div class="row Star-rating"><div class="col-12"><span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
              <span class="fa fa-star"></span></div>
              <div class="col-12"><a href=""><h2>View Our Rating on Facebook</h2></a></div>
          </div>
        </div>
      </div>
    </section>
    <!--section 4 end-->
    <!--section 5 start-->
    <section class="Buggy-sec-5 p-4">
      <div class="container p-5">
        <div class="row pb-3">
          <div class="text-center">
            <h2>Tour Deals</h2>
            <p>
              Find the full details of the Multi-tour Discount and other and<br />
              travel limited travel deals on select tours below!
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-6 col-lg-4 col-xl-4 position-relative tour_deal_cards">
            <div class="square-top" style="background-color: #8c9dff"></div>
            <div class="square-bottom" style="background-color: #8c9dff"></div>
            <div class="Moterbike bg-white">
              <img
                src="{{ asset('assets/front/images/Dune Buggy Images/Others/Aishwarya-Pissay-in-action-in-her-Yamaha-450F-1024x683.jpg')}}"
              />
              <div
                class="overlay position-absolute"
                style="background-color: #858ce7ad"
              >
                <div class="text-center text-white align-items-center">
                  <h1>15%</h1>
                  <h3>Discount on next tour</h3>
                  <a href="#">
                    <button
                      type="button"
                      class="btn btn-light rounded-pill"
                      style="color: #7e92ff"
                    >
                      Moter Bike
                    </button></a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-6 col-lg-4 col-xl-4 position-relative tour_deal_cards">
            <div class="square-top" style="background-color: #69d7de"></div>
            <div class="square-bottom" style="background-color: #69d7de"></div>
            <div class="Moterbike safari bg-white">
              <img
                src="{{ asset('assets/front/images/Dune Buggy Images/Others/DSC_9798-915x612-1.webp')}}"
              />
              <div
                class="overlay position-absolute"
                style="background-color: #00fff487"
              >
                <div class="text-center text-white align-items-center">
                  <h1>15%</h1>
                  <h3>Discount on next tour</h3>
                  <a href="#">
                    <button
                      type="button"
                      class="btn btn-light rounded-pill"
                      style="color: #55c1c9"
                    >
                      Safari
                    </button></a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-6 col-lg-4 col-xl-4 position-relative tour_deal_cards">
            <div class="square-top" style="background-color: #ff8c7c"></div>
            <div class="square-bottom" style="background-color: #ff8c7c"></div>
            <div class="Moterbike beduin bg-white">
              <img
                src="{{ asset('assets/front/images/Dune Buggy Images/Others/Off-Road-Dune-Buggy-Dubai-3.jpg')}}"
              />
              <div
                class="overlay position-absolute"
                style="background-color: #ff988b9c"
              >
                <div class="text-center text-white align-items-center">
                  <h1>15%</h1>
                  <h3>Discount on next tour</h3>
                  <a href="#">
                    <button
                      type="button"
                      class="btn btn-light rounded-pill"
                      style="color: #fd8474"
                    >
                      Beduin Adventure
                    </button></a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row p-3">
          <div class="col d-flex justify-content-center">
            <a href="#"
              ><button
                type="button"
                class="btn btn-md rounded-pill text-white tex text-center"
                style="
                  color: rgb(255, 255, 255);
                  background-color: #7e92ff;
                  padding: 16px 20px;
                "
              >
                View More Deals
              </button></a
            >
          </div>
        </div>
      </div>
    </section>
    <section class="Sec-6">
      <a href="#BuggySEC-1"><div class="back-to-top">
        <div class="back-to-top-inner">
        <svg viewBox="0 0 24 24" class="Icon__IconComponent-xohm6-0 eMJbst">
        <path d="M7.997 10l3.515-3.79a.672.672 0 0 1 .89-.076l.086.075L16 10 13 10.001V18h-2v-7.999L7.997 10z"></path>
        </svg>
        </div>
        </div></a>
    </section>
    <!--section 5 end-->

    <footer class="pt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img
              src="{{ asset('assets/front/images\image_2022_11_21T04_57_12_733Z-U-bg.png')}}"
              alt=""
              style="width: 100%; height: 100px"
            />
            <p class="mt-2 text-white">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Temporibus laboriosam ab, tempore odit facere nobis pariatur
              repellendus beatae eveniet ducimus.
            </p>
          </div>
          <div class="col-lg-3 pl-5 list_here">
            <h3 class="ftr_dcrtn">Imaportant links</h3>
            <ul class="list-group list-group-flush lst">
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i
                  >Home</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  About Us</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  Contact Us</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  Services`</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  T&C</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                </a>
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  List one</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  List one</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  lorem ipsum</a
                >
              </li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h3 class="ftr_dcrtn">loerm Ipsum</h3>
            <ul class="list-group list-group-flush lst">
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i
                  >lorem ipnsum</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  lorem ipsum 27dk
                </a>
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  Contact Us</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  lorem hollorem
                </a>
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  T&C</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                </a>
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  lorem ipsum</a
                >
              </li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h3 class="ftr_dcrtn">Contact Us</h3>
            <ul class="list-group list-group-flush lst">
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i
                ></a>
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>+
                  91 0987654321</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  abcd@gmailcom</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i class="fas fa-angle-right" style="font-size: 24px"></i>
                  345and@gmail.com`</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i
                    class="fas fa-angle-right"
                    style="font-size: 24px"
                  ></i> Northen Himalays 24 Shimla streeet</a
                >
              </li>
              <li>
                <a class="ft-list" href="#"
                  ><i
                    class="fas fa-angle-right"
                    style="font-size: 24px"
                  ></i> 17178y384</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container-fluid pt-3 pb-3">
        <div class="row text-center text-light">
          <p>© 2022. All Rights Reserved. Design by Quadas Dubai</p>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/front/js/script.js')}}"></script>
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
