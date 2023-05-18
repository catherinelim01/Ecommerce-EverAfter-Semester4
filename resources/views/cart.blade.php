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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/slicknav.css" />
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css" />
    <link rel="stylesheet" href="assets/css/gijgo.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/animated-headline.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/slick.css" />
    <link rel="stylesheet" href="assets/css/nice-select-profile.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body class="full-wrapper">
    
    <?php require('header.php'); ?>
    <main>
      <br>
      <div class="myshoppingbag">
      <h1>My Shopping Bag</h1>
      <br>
      <a href="shop.php"><p class="underline-text">Back to Shop</p></a>
      </div>
      <br><br>

    <div class="row title">
        <div class="col-12 col-md-10">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-3">
                    <h5>ITEM DETAILS</h5>
                </div>
                <div class="col-0 d-none d-md-block col-md-2 mr-30 ">   
                </div>
                <div class="col-0 d-none d-md-block col-md-2 ">
                    <!-- Item price and quantity -->
                    <h5>QUANTITY</h5>
                </div>
                <div class="col-0 d-none d-md-block col-md-2 p-0">
                    <h5>SUBTOTAL</h5>
                </div>
                
                <div class="col-0 d-none d-md-block col-md-3">
                </div>
           
            </div>
            
        </div>
    </div>

<div class="row cartpage">
    <div class="produkdlmcart col-12 col-lg-9">
        <div class="row">
            <div class="col-5  col-sm-4 col-md-3 isicart">
                <br>
                <!-- Place your cart items here -->
                <div class="card cardcart">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <!-- Item image -->
                                <img src="assets/images/denim/2.jpg" alt="Item 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 col-sm-4 col-md-3 isicart">
                <br><br>    
                <h4>Kai Ripped Jacket</h4>
                <!-- Item size and price -->
                <br><br>
                <p>Size: All Size</p>
                <p>Price: IDR 260,000</p>
            </div>
            <div class="col-2 isicart">
                <br><br>
                <!-- Item price and quantity -->
                <div class="input-group">
                    <span class="input-group-btn">
                        <!-- <button type="button" class="btn btn-secondary" id="decrementBtn">-</button> -->
                    </span>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" class="form-control">
                    <span class="input-group-btn">
                        <!-- <button type="button" class="btn btn-secondary" id="incrementBtn">+</button> -->
                    </span>
                </div>
            </div>
            <div class="col-2 isicart">
                <br><br>
                <p>IDR 260,000</p>
            </div>
        </div>

        <div class="row">
            <div class="col-5  col-sm-4 col-md-3 isicart">
                <br>
                <!-- Place your cart items here -->
                <div class="card cardcart">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <!-- Item image -->
                                <img src="assets/images/tops/7.jpg" alt="Item 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 col-sm-4 col-md-3 isicart">
                <br><br>    
                <h4>Kaelyn Checkered Sheer Top</h4>
                <!-- Item size and price -->
                <br><br>
                <p>Size: All Size</p>
                <p>Price: IDR 180,000</p>
            </div>
            <div class="col-2 isicart">
                <br><br>
                <!-- Item price and quantity -->
                <div class="input-group">
                    <span class="input-group-btn">
                        <!-- <button type="button" class="btn btn-secondary" id="decrementBtn">-</button> -->
                    </span>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" class="form-control">
                    <span class="input-group-btn">
                        <!-- <button type="button" class="btn btn-secondary" id="incrementBtn">+</button> -->
                    </span>
                </div>
            </div>
            <div class="col-2 isicart">
                <br><br>
                <p>IDR 180,000</p>
            </div>
        </div>
    </div>

    <div class="isitabelsummary col-12 col-lg-3 mt-5">
  <h5>ORDER SUMMARY</h5>
  <div class="card">
    <div class="card-body">
      <table class="summarytable">
        <tr>
          <td>Subtotal</td>
          <td class="text-right">IDR 440,000</td>
        </tr>
        <tr>
          <td>Tax(5%)</td>
          <td class="text-right">+ IDR 22,000</td>
        </tr>
        <tr>
          <td>Shipping</td>
          <td class="text-right">+ IDR 10,000</td>
        </tr>
        <tr>
          <td>
            Promo Code
            <br>
            <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Enter Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append pl-0">
    <td class="pl-0"><button class="btn apply text-right " type="button">Apply</button></td>
  </div>
</div>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
        <tr>
          <td>TOTAL</td>
          <td class="text-right">IDR 472,000</td>
        </tr>
      </table>
      <div class="checkout-wrapper text-center">
        <a href="payment.php"><button class="btn btn-primary co">CONTINUE TO PAYMENT</button></a>
      </div>
    </div>
  </div>
</div>


    <br><br><br>

    <div class="pilihalamat col-12 mt-5">
  <h5>CHOOSE ADDRESS</h5>
  <div class="row">
  <div class="col-12 col-md-6 col-lg-6 mt-14">
      <div class="card card-address">
        <div class="pilihalamat card-header">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="shippingAddress" id="address1" checked>
        </div>
          <div class="judulheader">
             Address 1
          </div>
        </div>
        <div class="preview-add">
          <p>nama</p>
          <p>tes</p>
          <p>kota</p>
          <p>indo</p>
        </div>
        
      </div>
    </div>


    <div class="col-12 col-md-6 col-lg-6 mt-14">
      <div class="card card-address">
        <div class="pilihalamat card-header">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="shippingAddress" id="address2" checked>
        </div>
          <div class="judulheader">
             Address 2
          </div>
        </div>
        <div class="preview-add">
          <p>nama</p>
          <p>tes</p>
          <p>kota</p>
          <p>indo</p>
        </div>
        
      </div>
    </div>
    </div>
  </div>


<div class="pilihshipment col-12 mt-5">
  <h5>PICK YOUR SHIPPING METHOD</h5>
  <div class="row">
    <div class="col-12 ">
      <div class="card card-address">
        <div class="pilihshipment card-header">
          <div class="form-check">
            <select class="form-select" name="shippingAddress" id="addressSelect">
              <option value="JNE REG" selected>JNE REG</option>
              <option value="JNT REG">JNT REG</option>
              <option value="SiCepat REG">SiCepat REG</option>
            </select>
          </div>
         
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>

</div>

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
              <input type="email" class="form-control" id="inputEmail" required placeholder="Email address *" aria-describedby="emailHelp">
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
          <img src="assets/images/denim/2.jpg" alt="Product Image">
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
          <img src="assets/images/tops/7.jpg" alt="Product Image">
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

    <br><br><br>
   
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
                    <a href="index.php"
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
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slick-slider , Owl-Carousel ,slick-nav -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- One Page, Animated-HeadLin, Date Picker -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>
    <script src="./assets/js/gijgo.min.js"></script>

    <!-- Nice-select, sticky,Progress -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
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
              logocart.addEventListener('click', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'block';
                  full.style.overflow = 'hidden';
                  containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });

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
              logocart.addEventListener('click', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'block';
                  full.style.overflow = 'hidden';
                  containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
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
              logocart.addEventListener('click', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'block';
                  full.style.overflow = 'hidden';
                  containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });

              $(".close.cart").on('click', function(event) {
                event.preventDefault();
                containercart.style.animation = 'slideInToRightMobile 1s forwards';
                full.style.overflow = 'visible';
                if($('.logocart-login').hasClass('active')){
                  full.style.overflow = 'hidden';
                }
              });

              logocartlogin.addEventListener('click', function(event) {
              event.preventDefault();
              full.style.overflow = 'hidden';
              containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              // $('.cart-container-login').one('animationend', function() {
              //     $(document).on('click', function(event) {
              //         if ($('.cart-container-login').css('right') === '0px') {
              //         const container = $('.cart-container-login');
              //         const iconcart = $('.logocart-login');

              //         if (!container.is(event.target) && container.has(event.target).length === 0 && !iconcart.is(event.target) && iconcart.has(event.target).length === 0) {
              //             // Click was outside the div, do something here
              //             event.preventDefault();
              //             containercartlogin.style.animation = 'slideInToRightMobile 1s forwards';
              //             isiSignup.style.display = 'none';
              //             login.style.display="block";
              //             full.style.overflow = 'visible';
              //         }
              //         }
              //     });
              // });
              
              });

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

      function updateImageSrc(screenWidth) {
          // Select elemen gambar
          const imgHeart = document.getElementById('heart');
          const imgCard = document.getElementById('cart');
          // Add event listener to detect media query change
          
          if (window.innerWidth < 576) { // media query condition
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

    const address = document.querySelector('.sidebar li:nth-child(3)');
    const profile = document.querySelector('.sidebar li:nth-child(2)');
    const accDiv = document.querySelector('.acc');
    const addressDiv = document.querySelector('.address');

    accDiv.style.display = "block";
    addressDiv.style.display = "none";

    address.addEventListener('click', function(event) {
      event.preventDefault();
      accDiv.style.display = 'none';
      addressDiv.style.display = 'block';
      address.style.backgroundColor = '#FFD4C2';
      profile.style.backgroundColor = '';
    });

    profile.addEventListener('click', function(event) {
      event.preventDefault();
      addressDiv.style.display = 'none';
      accDiv.style.display = 'block';
      address.style.backgroundColor = '';
      profile.style.backgroundColor = '#FFD4C2';
    });
    
    var quantityInput = document.getElementById("quantity");
        var incrementBtn = document.getElementById("incrementBtn");
        var decrementBtn = document.getElementById("decrementBtn");

        incrementBtn.addEventListener("click", function() {
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        decrementBtn.addEventListener("click", function() {
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
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