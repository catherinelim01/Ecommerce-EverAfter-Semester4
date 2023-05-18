<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ever After | Fashion</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="manifest" href="site.webmanifest" />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.ico"
    />

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/progressbar_barfiller.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/gijgo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/animated-headline.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  </head>
  <body class="full-wrapper">
    <!-- ? Preloader Start -->
    {{-- <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="preloader-circle"></div>
          <div class="preloader-img pere-text">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="" />
          </div>
        </div>
      </div>
    </div --}}
    <!-- Preloader Start-->
    @include('header')
    <!-- header end -->
    <main>
      <!--? Hero Area Start-->
      <div class="container-fluid">
        <div class="slider-area">

          <div class="slider-active dot-style">
            <!-- Single -->
            <div
              class="single-slider slider-bg1 hero-overly slider-height d-flex align-items-center"
            >
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-9">
                    <!-- Hero Caption -->
                    <div class="hero__caption">
                      <h1>fashion<br />changing<br />always</h1>
                      <a href="shop.php" class="btn shopnow browsemore">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single -->
            <div
              class="single-slider slider-bg2 hero-overly slider-height d-flex align-items-center"
            >
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-9">
                    <!-- Hero Caption -->
                    <div class="hero__caption">
                      <h1>fashion<br />changing<br />always</h1>
                      <a href="shop.php" class="btn shopnow">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single -->
            <div
              class="single-slider slider-bg3 hero-overly slider-height d-flex align-items-center"
            >
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-xl-8 col-lg-9">
                    <!-- Hero Caption -->
                    <div class="hero__caption">
                      <h1>fashion<br />changing<br />always</h1>
                      <a href="shop.php" class="btn shopnow">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Hero -->
      <!--? Popular Items Start -->
      <div class="popular-items pt-50">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-popular-items mb-50 text-center wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".1s"
              >
                <div class="popular-img">
                  <img src="{{ asset('assets/images/tops/4.jpg') }}" alt="" />
                  <div class="img-cap">
                    <span>Tops</span>
                  </div>
                  <div class="favorit-items">
                    <a href="shop.php" class="btn shopnow">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-popular-items mb-50 text-center wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".2s"
              >
                <div class="popular-img">
                  <img src="{{ asset('assets/images/dresses/19.jpeg') }}" alt="" />
                  <div class="img-cap">
                    <span>Dresses</span>
                  </div>
                  <div class="favorit-items">
                    <a href="shop.php" class="btn shopnow">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-popular-items mb-50 text-center wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".4s"
              >
                <div class="popular-img">
                  <img src="{{ asset('assets/images/shorts/5.jpg') }}" alt="" />
                  <div class="img-cap">
                    <span>Shorts</span>
                  </div>
                  <div class="favorit-items">
                    <a href="shop.php" class="btn shopnow">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-popular-items mb-50 text-center wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".6s"
              >
                <div class="popular-img">
                  <img src="{{ asset('assets/images/skirts/9.jpg') }}" alt="" />
                  <div class="img-cap">
                    <span>Skirts</span>
                  </div>
                  <div class="favorit-items">
                    <a href="shop.php" class="btn shopnow">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-popular-items mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".1s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/trousers/7.jpeg') }}" alt="" />
                    <div class="img-cap">
                      <span>Trousers</span>
                    </div>
                    <div class="favorit-items">
                      <a href="shop.php" class="btn shopnow">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-popular-items mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".2s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/jumpsuits/6.jpg') }}" alt="" />
                    <div class="img-cap">
                      <span>Jumpsuits</span>
                    </div>
                    <div class="favorit-items">
                      <a href="shop.php" class="btn shopnow">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-popular-items mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".4s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/sets/5.jpg') }}" alt="" />
                    <div class="img-cap">
                      <span>Sets</span>
                    </div>
                    <div class="favorit-items">
                      <a href="shop.php" class="btn shopnow">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-popular-items mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".6s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/denim/10.jpg') }}" alt="" />
                    <div class="img-cap">
                      <span>Denim</span>
                    </div>
                    <div class="favorit-items">
                      <a href="shop.php" class="btn shopnow">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div
                    class="single-popular-items mb-50 text-center wow fadeInUp"
                    data-wow-duration="1s"
                    data-wow-delay=".4s"
                  >
                    <div class="popular-img">
                      <img src="{{ asset('assets/images/outerwear/7.jpg') }}" alt="" />
                      <div class="img-cap">
                        <span>Outerwear</span>
                      </div>
                      <div class="favorit-items">
                        <a href="shop.php" class="btn shopnow">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div
                    class="single-popular-items mb-50 text-center wow fadeInUp"
                    data-wow-duration="1s"
                    data-wow-delay=".1s"
                  >
                    <div class="popular-img">
                      <img src="{{ asset('assets/images/bags/11.jpg') }}" alt="" />
                      <div class="img-cap">
                        <span>Bags</span>
                      </div>
                      <div class="favorit-items">
                        <a href="shop.php" class="btn shopnow">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div
                    class="single-popular-items mb-50 text-center wow fadeInUp"
                    data-wow-duration="1s"
                    data-wow-delay=".2s"
                  >
                    <div class="popular-img">
                      <img src="{{ asset('assets/images/fragrance/3.jpg') }}" alt="" />
                      <div class="img-cap">
                        <span>Fragrance</span>
                      </div>
                      <div class="favorit-items">
                        <a href="shop.php" class="btn shopnow">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="single-popular-items mb-50 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                    <div class="popular-img">
                      <img src="{{ asset('assets/images/accessories/11.jpeg') }}" alt="" />
                      <div class="img-cap">
                        <span>Accessories</span>
                      </div>
                      <div class="favorit-items">
                        <a href="shop.php" class="btn shopnow">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Popular Items End -->
        <!--? New Arrival Start -->
        <div class="new-arrival">
          <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-8 col-md-10">
                <div
                  class="section-tittle mb-60 text-center wow fadeInUp"
                  data-wow-duration="2s"
                  data-wow-delay=".2s"
                >
                  <h2>NEW<br />ARRIVAL</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-new-arrival mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".1s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/tops/11.jpeg') }}" alt="" />
                    <div class="favorit-items">
                      <!-- <span class="flaticon-heart"></span> -->
                      <img src="{{ asset('assets/images/logo/love.png') }}" alt="" />
                    </div>
                  </div>
                  <div class="popular-caption">
                    <h3>
                      <a href="product_details.html">Yuna Tweed Crop Top</a>
                    </h3>
                    <span>IDR 230,000</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-new-arrival mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".2s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/dresses/20.jpeg') }}" alt="" />
                    <div class="favorit-items">
                      <!-- <span class="flaticon-heart"></span> -->
                      <img src="{{ asset('assets/images/logo/love.png') }}" alt="" />
                    </div>
                  </div>
                  <div class="popular-caption">
                    <h3>
                      <a href="#">Sunhwa Floral Dress</a>
                    </h3>
                    <span>IDR 220,000</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-new-arrival mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".3s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/bags/12.jpg') }}" alt="" />
                    <div class="favorit-items">
                      <!-- <span class="flaticon-heart"></span> -->
                      <img src="{{ asset('assets/images/logo/love.png') }}" alt="" />
                    </div>
                  </div>
                  <div class="popular-caption">
                    <h3>
                      <a href="product_details.html"
                        >Yerim Scrunch Shoulder Bag</a
                      >
                    </h3>
                    <span>IDR 185,000</span>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div
                  class="single-new-arrival mb-50 text-center wow fadeInUp"
                  data-wow-duration="1s"
                  data-wow-delay=".4s"
                >
                  <div class="popular-img">
                    <img src="{{ asset('assets/images/accessories/5.jpeg') }}" alt="" />
                    <div class="favorit-items">
                      <!-- <span class="flaticon-heart"></span> -->
                      <img src="{{ asset('assets/images/logo/love.png') }}" alt="" />
                    </div>
                  </div>
                  <div class="popular-caption">
                    <h3><a href="product_details.html">Meow Beanie</a></h3>
                    <span>IDR 150,000</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Button -->
          <div class="row justify-content-center">
            <div class="room-btn">
              <a href="shop.php" class="border-btn browsemore">Browse More</a>
            </div>
          </div>
        </div>
      </div>
      <!--? New Arrival End -->
      <!--? collection -->
      <section
        class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15"
        data-background="{{ asset('assets/img/gallery/section_bg01.png') }}"
      >
        <div class="container-fluid"></div>
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-9">
            <div class="single-question text-center">
              <h2
                class="wow fadeInUp"
                data-wow-duration="2s"
                data-wow-delay=".1s"
              >
                Trendy Fashion for Women
              </h2>
              <a
                href="about.html"
                class="btn wow fadeInUp"
                data-wow-duration="2s"
                data-wow-delay=".4s"
                >About Us</a
              >
            </div>
          </div>
        </div>
      </section>
      <!-- End collection -->

      <!--? Services Area Start -->
      <div class="categories-area section-padding40 gray-bg">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-cat mb-50 wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".2s"
              >
                <div class="cat-icon">
                  <img src="{{ asset('assets/img/icon/services1.svg') }}" alt="" />
                </div>
                <div class="cat-cap">
                  <p>Fast Delivery</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-cat mb-50 wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".2s"
              >
                <div class="cat-icon">
                  <img src="{{ asset('assets/img/icon/services2.svg') }}" alt="" />
                </div>
                <div class="cat-cap">
                  <p>Secure Payment</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-cat mb-30 wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".4s"
              >
                <div class="cat-icon">
                  <img src="{{ asset('assets/img/icon/services3.svg') }}" alt="" />
                </div>
                <div class="cat-cap">
                  <p>Special Offers</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div
                class="single-cat wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay=".5s"
              >
                <div class="cat-icon">
                  <img src="{{ asset('assets/img/icon/services4.svg') }}" alt="" />
                </div>
                <div class="cat-cap">
                  <p>Customer Support</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--? Services Area End -->
      <!-- cart -->
    <div class="cart-container-login geser">
      <a class="close login" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg></a>
      
      <div class="row formlogin ">
        <div class="col-12 isilogin">
          <div class="cart-header login">
            <h2>Log in</h2>
          </div>
          <form class="formlogin" action="profile.php">
            <div class="form-group mt-20">
              <input type="email" class="form-control" id="inputEmail" required placeholder="Username or email address *" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-20">
              <input type="password" class="form-control" required placeholder="Password *" id="inputPassword">
            </div>
            <div class="form-group form-check mt-10">
              <input type="checkbox" class="form-check-input" id="checkboxRemember">
              <label class="form-check-label remember" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary mt-10 login">LOG IN</button>
            <p class="signuphere mt-3">Don't have an account? <a href="#"><u>Sign Up</u></a> Here</p>
          </form>
        </div>
        <div class="col-12 isisignup">
          <div class="cart-header login">
            <h2>Sign Up</h2>
          </div>
          <form class="formsignup" action="profile.php">
            <div class="form-group mt-20">
            <input type="email" class="form-control" id="inputEmailRegis" required placeholder="Email address *" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-20">
            <input type="password" class="form-control" required placeholder="Password *" id="inputPasswordRegis">
            </div>
            <small id="info" class="form-text">By providing your personal information, you allow us to enhance your shopping experience and securely manage your account.</small>
            <button type="submit" class="btn btn-primary login mt-10">REGISTER</button>
            <a href="#" class="backlogin mt-3"><u>Back to Login</u></a>
        </form>
        </div>
      </div>
    </div>
  <!-- cart login end -->
 
  <!-- cart -->
  <div class="cart-container">
  <a class="close cart" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg></a>
    <div class="cart-header">
      <h2>Shopping Cart</h2>
    </div>
    <hr class="garisunderline">
    <div class="cart-items">
      <div class="row cart-item">
        <div class="col-5 item-image">
          <img src="{{ asset('assets/images/denim/2.jpg') }}" alt="" />
        </div>
        <div class=" col-7 item-details">
          <h3>Kai Ripped Jacket</h3>
          <p>Price: IDR 260,000</p>
          <p>Size: Allsize</p>
          <p>Quantity: 1</p>
          <button class="remove-btn mt-4">Remove</button>
        </div>
      </div>
      
      <div class="row cart-item">
        <div class="col-5 item-image">
          <img src="{{ asset('assets/images/tops/7.jpg') }}" alt="Product Image" />
        </div>
        <div class="col-7 item-details">
          <h3>Kaelyn Checkered Sheer Top</h3>
          <p>Price: IDR 180,000</p>
          <p>Size: All Size</p>
          <p>Quantity: 1</p>
          <button class="remove-btn mt-4">Remove</button>
        </div>

      </div>
      
    </div>
    <div class="cart-summary">
      <table>
        <tr>
          <td><h3>SUBTOTAL: </h3></td>
          <td><h3>IDR 440,000</h3></td>
        </tr>
        <!-- <tr class="total">
          <td>Total:</td>
          <td>IDR 260,000</td> -->
        </tr>
      </table>
    </div>

    
    <div class="cart-actions">
      <a href="cart.php"><button class="checkout-btn">CHECKOUT</button></a> 
      <button class="continue-shopping">CONTINUE SHOPPING</button>
    </div>
  </div>
<!-- cart end -->

    </main>
    <footer>
      <!-- Footer Start-->
      <div class="footer-area footer-padding">
        <div class="container-fluid">
          <div class="row d-flex justify-content-between">
            <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8">
              <div class="single-footer-caption mb-50">
                <div class="single-footer-caption mb-30">
                  <!-- logo -->
                  <div class="footer-logo mb-35">
                    <a href="index.html"
                      ><img src="assets/images/logo/logo_putih.png" alt=""
                    /></a>
                  </div>
                  <div class="footer-tittle">
                    <div class="footer-pera">
                      <p>
                        "The most beautiful thing a woman can wear is
                        confidence." - Blake Lively
                      </p>
                    </div>
                  </div>
                  <!-- social -->
                  <div class="footer-social">
                  <a href="https://instagram.com/"><svg class="change-my-color" xmlns="http://www.w3.org/2000/svg" width=18px viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
                    <a href="https://facebook.com/"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="foot row">
              <div class="col-lg-12 footcat"><h4>Shop Category</h4></div>

              <div class="col-5">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle categ">
                    <ul>
                      <li><a href="shop.php">Tops</a></li>
                      <li><a href="shop.php">Dresses</a></li>
                      <li><a href="shop.php">Shorts</a></li>
                      <li><a href="shop.php">Skirts</a></li>
                      <li><a href="shop.php">Trousers</a></li>
                      <li><a href="shop.php">Jumpsuits</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle categ">
                    <ul class="">
                      <li><a href="shop.php">Sets</a></li>
                      <li><a href="shop.php">Denim</a></li>
                      <li><a href="shop.php">Outerwear</a></li>
                      <li><a href="shop.php">Bags</a></li>
                      <li><a href="shop.php">Fragrance</a></li>
                      <li><a href="shop.php">Accessories</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
              <div class="single-footer-caption mb-50">
                <div class="footer-tittle">
                  <h4>Get in touch</h4>
                  <ul>
                    <li><a href="#">(+62) 812-1764-1707</a></li>
                    <li><a href="#">everafter@gmail.com</a></li>
                    <li><a href="#">Surabaya, Indonesia</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer-bottom area -->
      <div class="footer-bottom-area">
        <div class="container">
          <div class="footer-border">
            <div class="row d-flex align-items-center">
              <div class="col-xl-12">
                <div class="footer-copy-right text-center">
                  <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | This template is made with
                    <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer End-->
    </footer>
    
    <!-- Scroll Up -->
    <div id="back-top">
      <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

<!-- One Page, Animated-HeadLin, Date Picker -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/gijgo.min.js') }}"></script>

<!-- Nice-select, sticky,Progress -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/hover-direction-snake.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
   
    <script>
      const logocartlogin = document.querySelector('.logocart-login');
      const containercartlogin = document.querySelector('.cart-container-login');
      const btnclose = document.querySelector('.close.login');
      const closecart = document.querySelector('.close.cart');
      const full = document.querySelector('.full-wrapper');
      const signuphere = document.querySelector('.signuphere a u');
      const backlogin = document.querySelector('.backlogin u');
      const isiSignup = document.querySelector('.isisignup');
      const login = document.querySelector('.isilogin');
      const navprofile = document.querySelector('.slicknav_menu a.navprofile');
      const logocart = document.querySelector('.logocart');
      const containercart = document.querySelector('.cart-container');
      const navv = document.querySelector('a.navprofile');

      // containercart.style.display = "none";

      full.style.overflow = 'visible';
      isiSignup.style.display = 'none';
      navprofile.style.display = 'none';
      navv.style.display = 'none';

      backlogin.addEventListener('click', function(event) {
      event.preventDefault();
      isiSignup.style.display = 'none';
      login.style.display="block";

      });

      signuphere.addEventListener('click', function(event) {
      event.preventDefault();
      isiSignup.style.display = 'block';
      login.style.display="none";

      });

      function updateNavbar(screenWidth) {
        $('.logocart-login').on('click', function() {
            $(this).addClass('active');
        });
        $('.close.login').on('click', function() {
            $(".logocart-login.active").removeClass('active');
        });
          // Add event listener to detect media query change
          if (window.innerWidth >= 415 && window.innerWidth <= 576) {
              logocartlogin.addEventListener('click', function(event) {
                event.preventDefault();
                // containercart.style.display = 'none';
                full.style.overflow = 'visible';
                containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });
              logocart.addEventListener('mouseenter', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'block';
                  full.style.overflow = 'hidden';
                  containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });
              // logocartlogin.addEventListener('mouseenter', function(event) {
              //     event.preventDefault();
              //     // containercart.style.display = 'none';
              //     full.style.overflow = 'visible';
              //     containercart.style.animation = 'slideInToRightMobile 1s forwards';
              // });

              $(".close.cart").on('click', function(event) {
                event.preventDefault();
                containercart.style.animation = 'slideInToRightMobile 1s forwards';
                full.style.overflow = 'visible';
                if($('.logocart-login').hasClass('active')){
                  full.style.overflow = 'hidden';
                }
              });
              btnclose.addEventListener('click', function(event) {
              event.preventDefault();
              containercartlogin.style.animation = 'slideInToRightMobile 1s forwards';
              isiSignup.style.display = 'none';
              login.style.display="block";
              full.style.overflow = 'visible';
              });
          }
          
          else if (window.innerWidth < 415) { // media query condition
              navprofile.style.display = 'block';
              logocart.addEventListener('mouseenter', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'block';
                  full.style.overflow = 'hidden';
                  containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });
              // logocartlogin.addEventListener('mouseenter', function(event) {
              //     event.preventDefault();
              //     // containercart.style.display = 'none';
              //     full.style.overflow = 'visible';
              //     containercart.style.animation = 'slideInToRightMobile 1s forwards';
              // });
              
              containercart.addEventListener('mouseleave', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'none';
                  full.style.overflow = 'visible';
                  containercart.style.animation = 'slideInToRightMobile 1s forwards';
              });

              logocartlogin.addEventListener('click', function(event) {
              event.preventDefault();
              full.style.overflow = 'hidden';
              containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              
              });
              navprofile.addEventListener('click', function(event) {
              event.preventDefault();
              full.style.overflow = 'hidden';
              containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              
              });

              btnclose.addEventListener('click', function(event) {
              event.preventDefault();
              containercartlogin.style.animation = 'slideInToRightMobile 1s forwards';
              isiSignup.style.display = 'none';
              login.style.display="block";
              full.style.overflow = 'visible';
              });
          } else {
              navprofile.style.display = 'none';
              logocart.addEventListener('mouseenter', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'block';
                  full.style.overflow = 'hidden';
                  containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });

              // logocartlogin.addEventListener('mouseenter', function(event) {
              //     event.preventDefault();
              //     // containercart.style.display = 'none';
              //     full.style.overflow = 'visible';
              //     containercart.style.animation = 'slideInToRightMobile 1s forwards';
              // });
              
              containercart.addEventListener('mouseleave', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'none';
                  full.style.overflow = 'visible';
                  containercart.style.animation = 'slideInToRightMobile 1s forwards';
                  if($('.logocart-login').hasClass('active')){
                    full.style.overflow = 'hidden';
                    
                  }
              });

              logocartlogin.addEventListener('click', function(event) {
              event.preventDefault();
              full.style.overflow = 'hidden';
              containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              $('.cart-container-login').one('animationend', function() {
                  $(document).on('click', function(event) {
                      if ($('.cart-container-login').css('right') === '0px') {
                      const container = $('.cart-container-login');
                      const iconcart = $('.logocart-login');

                      if (!container.is(event.target) && container.has(event.target).length === 0 && !iconcart.is(event.target) && iconcart.has(event.target).length === 0) {
                          // Click was outside the div, do something here
                          event.preventDefault();
                          containercartlogin.style.animation = 'slideInToRightMobile 1s forwards';
                          isiSignup.style.display = 'none';
                          login.style.display="block";
                          full.style.overflow = 'visible';
                      }
                      }
                  });
              });
              
              });
              // navprofile.addEventListener('click', function(event) {
              // event.preventDefault();
              // full.style.overflow = 'hidden';
              // containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              // });

              btnclose.addEventListener('click', function(event) {
              event.preventDefault();
              containercartlogin.style.animation = 'slideInToRightMobile 1s forwards';
              isiSignup.style.display = 'none';
              login.style.display="block";
              full.style.overflow = 'visible';
              });
          };
      }

      updateNavbar(window.innerWidth);
      // Check screen size on window resize
      window.addEventListener("resize", function() {
          updateNavbar(window.innerWidth);
      });


        window.onpageshow = function(event) {
          if (event.persisted) {
            // Page is loaded from cache (user clicked back button)
            location.reload();
          }
        };
        function updateImageSrc(screenWidth) {
            // Select elemen gambar
            const imgHeart = document.getElementById('heart');
            const imgCard = document.getElementById('cart');
            // Add event listener to detect media query change
            
            if (window.innerWidth <= 576) { // media query condition
                imgHeart.src = 'assets/images/logo/heart-black.svg';
                imgCard.src = 'assets/images/logo/cart-black.svg';
            } else {
                imgHeart.src = 'assets/images/logo/heart.svg';
                imgCard.src = 'assets/images/logo/card.svg';
            };
        }

        updateImageSrc(window.innerWidth);
        // Check screen size on window resize
        window.addEventListener("resize", function() {
            updateImageSrc(window.innerWidth);
        });
        

        $('.btn.shopnow').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          let isiShopNow = $(this).closest('.single-popular-items').find('.img-cap span').text();
          $.ajax({
            type: "POST",
            url: "linksess.php",
            data: { shopnow: isiShopNow },
            success: function() {
              console.log("Data berhasil dikirim ke PHP");
            }
          });
        });
        $('.footer-tittle.categ ul li a').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          let isiShopNow = $(this).text();
          $.ajax({
            type: "POST",
            url: "linksess.php",
            data: { shopnow: isiShopNow },
            success: function() {
              console.log("Data berhasil dikirim ke PHP");
            }
          });
        });
        
        $('.browsemore').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          $.ajax({
            type: "POST",
            url: "linksess.php",
            data: { shopnow: "" },
            success: function() {
              console.log("Data berhasil dikirim ke PHP yyyyyyyyyyyyyy");
            }
          });
        });
        
    </script>
  </body>
</html>
