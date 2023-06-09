<?php session('subtotalpayment'); ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

  </head>
  <body class="full-wrapper">
    @csrf
    @include('header')

    <main>
      <br>
      <div class="myshoppingbag">
      <h1>Choose Payment Method</h1>
      <p>All transaction are secured & encrypted.</p>
      </div>
      <br><br>
      
      
      <div class="row cartpage">
  <div class="col-12 col-lg-9">

  <div class="row">
  <div class="col-12 col-lg-11 isicart">
    <br>
    <div id="description1" class="paymentdesc">Description for Menu 1</div>
     <!-- Penambahan kode berikut -->
     @php
    use App\Models\Payment;
    $payments = Payment::select('PAYMENT_METHOD', 'PAYMENT_DETAIL')->get();
    @endphp

    @foreach ($payments as $payment)
        <div class="pilihpayment navbar-light bg-light">
            <input type="radio" class="navbar-toggler-input" id="menu{{ $loop->iteration + 1 }}" name="menu" onclick="toggleDescription({{ $loop->iteration + 1 }})">
            <label class="jenispayment navbar-toggler-label" for="menu{{ $loop->iteration + 1 }}">{{ $payment->PAYMENT_METHOD }}</label>
            <div id="description{{ $loop->iteration + 1 }}" class="paymentdesc">{!! nl2br($payment->PAYMENT_DETAIL) !!}</div>
        </div><br>
    @endforeach
    <!-- Penambahan kode berakhir -->


 <div class="checkout-wrapper text-center">
      <a href="#"><button class="btn btn-primary co" onclick="validatePayment()">PLACE ORDER</button></a>
    </div>
</div>


    </div>
    <br><br>
  </div>


    <div class="col-12 col-lg-3 mt-5">
    <h5>Your Bag</h5>
  <div class="card">


    <div class="card-body">
  <?php
          $sql="SELECT FORMAT((p.PRODUCT_PRICE * '" . session('value') . "'),0) AS SUBTOTAL,pc.QTY, p.PRODUCT_NAME, FORMAT(p.PRODUCT_PRICE,0) AS PRODUCT_PRICE, p.PRODUCT_URL, IF(substr(p.PRODUCT_ID, 5, 1) = '0', 'All Size', IF(substr(p.PRODUCT_ID, 5, 1) = 'S', 'S', IF(substr(p.PRODUCT_ID, 5, 1) = 'M', 'M', 'L'))) AS size FROM PRODUCT p JOIN PRODUCT_CART pc ON p.PRODUCT_ID = pc.PRODUCT_ID JOIN `CART` c ON c.CART_ID = pc.CART_ID JOIN customer cu ON cu.CUSTOMER_ID = c.CUSTOMER_ID WHERE cu.CUSTOMER_ID = '" . session('customer_id') . "' ORDER BY p.PRODUCT_ID desc;";
          $result= DB::select($sql);
        
          if (count($result) > 0) {
            $response = [];
            foreach ($result as $row) {
                $dt = new stdClass();
                $dt->PRODUCT_NAME = $row->PRODUCT_NAME;
                $dt->size = $row->size;
                $dt->PRODUCT_PRICE = $row->PRODUCT_PRICE;
                $dt->PRODUCT_URL = $row->PRODUCT_URL;
                $dt->SUBTOTAL = $row->SUBTOTAL;
                $dt->QTY = $row->QTY;
                
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
            for($i = 0; $i < count($data); $i++) { 
              ?>
    <table class="summarytable">
   
          <tr>
            <td class="graytext"><?php echo $data[$i]["PRODUCT_NAME"]; ?></td>
            <td class="text-right graytext">x<?php echo $data[$i]["QTY"]; ?></td>
          </tr>
        <?php } ?>
      <?php } ?>
    </table>
    </div>
  </div>

<!-- 
  <div class="card">
  <div class="card-body">
    <table class="summarytable">
      
    </table>
  </div>
</div> -->



  <br><br> 

  <h5>Order Summary</h5>
  <div class="card">
    <div class="card-body">
      <table class="summarytable">
      @csrf
        <tr>
          <td>Subtotal</td>
          <td class="text-right"><?php echo session('subtotalpayment') ?></td>
        </tr>
        <tr>
          <td class="graytext">Tax(5%)</td>
          <td class="text-right graytext"><?php echo session('pajakpayment') ?></td>
        </tr>
        <tr>
          <td class="graytext">Shipping</td>
          <td class="text-right graytext"><?php echo session('shippingpayment') ?></td>
        </tr>
        <tr>
          <td class="graytext">Discount</td>
          <td class="text-right graytext"><?php echo session('diskonpayment') ?></td>

        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
        <tr>
          <td class="boldtext">TOTAL</td>
          <td class="text-right boldtext"><?php echo session('totalshipment') ?></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>
</div>


    <br><br><br>
   
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
          <form class="formlogin" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group mt-20">
                <input type="email" class="form-control" name="customer_email" required placeholder="Username or email address *" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-20">
                <input type="password" class="form-control" name="customer_password" required placeholder="Password *" id="inputPassword">
            </div>
            <!-- Tambahkan elemen lain yang diperlukan untuk form login -->
            <button type="submit" class="btn btn-primary mt-10 login">LOG IN</button>
            <p class="signuphere mt-3">Don't have an account? <a href="/login"><u>Sign Up</u></a> Here</p>
        </form>
        
        </div>
        <div class="col-12 isisignup">
          <div class="cart-header login">
              <h2>Sign Up</h2>
          </div>
          <form class="formsignup" action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group mt-20 regis">
                <label for="inputEmailRegis">Name *</label>
                <input type="text" class="form-control" id="inputNameRegis" name="customer_name" required aria-describedby="emailHelp">
            </div>
              <div class="form-group mt-10 regis">
                  <label for="inputEmailRegis">Email address *</label>
                  <input type="email" class="form-control" id="inputEmailRegis" name="customer_email" required aria-describedby="emailHelp">
              </div>
              <div class="form-group mt-10 regis">
                  <label for="inputPasswordRegis">Password *</label>
                  <input type="password" class="form-control" id="inputPasswordRegis" name="customer_password" required>
              </div>
              <small id="info" class="form-text">By providing your personal information, you allow us to enhance your shopping experience and securely manage your account.</small>
              <button type="submit" class="btn btn-primary login mt-10">REGISTER</button>
              <a href="/registration" class="backlogin mt-3"><u>Back to Login</u></a>
          </form>
      </div>
      
  <!-- cart login end -->
 
  
  <!-- side cart -->
  <div class="cart-container">
  <a class="close cart" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg></a>
    <div class="cart-header">
      <h2>Shopping Cart</h2>
    </div>
    <hr class="garisunderline">
    <div class="cart-items">
  <?php 
          $sql="SELECT p.product_id,p.PRODUCT_NAME,pc.QTY, FORMAT(p.PRODUCT_PRICE,0) AS PRODUCT_PRICE, p.PRODUCT_URL, IF(substr(p.PRODUCT_ID, 5, 1) = '0', 'All Size', IF(substr(p.PRODUCT_ID, 5, 1) = 'S', 'S', IF(substr(p.PRODUCT_ID, 5, 1) = 'M', 'M', 'L'))) AS size FROM PRODUCT p JOIN PRODUCT_CART pc ON p.PRODUCT_ID = pc.PRODUCT_ID JOIN `CART` c ON c.CART_ID = pc.CART_ID JOIN customer cu ON cu.CUSTOMER_ID = c.CUSTOMER_ID WHERE cu.CUSTOMER_ID = '" . session('customer_id') . "' GROUP BY p.PRODUCT_NAME, p.product_id, p.PRODUCT_PRICE, PRODUCT_URL , size, pc.QTY;";
          $result= DB::select($sql);
        
          if (count($result) > 0) {
            $response = [];
            foreach ($result as $row) {
                $dt = new stdClass();
                $dt->PRODUCT_NAME = $row->PRODUCT_NAME;
                $dt->size = $row->size;
                $dt->PRODUCT_PRICE = $row->PRODUCT_PRICE;
                $dt->PRODUCT_URL = $row->PRODUCT_URL;
                $dt->product_id = $row->product_id;
                $dt->QTY = $row->QTY;
                
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
            for ($i = 0; $i < count($data); $i++) { ?>
              <div class="row cart-item">
                <div class="col-5 item-image">
                  <img src="<?php echo $data[$i]['PRODUCT_URL']; ?>" alt="" />
                </div>
                <div class="col-7 item-details">
                  <h3><?php echo $data[$i]["PRODUCT_NAME"]; ?></h3>
                  <p class="price">Price: IDR <?php echo $data[$i]["PRODUCT_PRICE"]; ?></p>
                  <p>Size: <?php echo $data[$i]["size"]; ?></p>
                  <div style="display: flex; align-items: center;">
                    <p style="margin-right: 10px; ">Quantity:</p>
                    <input type="number" name="quantity" min="1" max="10" value="<?php echo $data[$i]["QTY"]; ?>" class="form-control quantityInput" data-subtotal-id="subtotal<?php echo $i?>" data-product-id="<?php echo $data[$i]['product_id']; ?>" style="width: 60px; height: 24px;">
                  </div>
                  <button class="remove-btn mt-4" data-product-id="<?php echo $data[$i]['product_id']; ?>">Remove</button>
                </div>
              </div>
              <p style="display:none;" id="subtotal<?php echo $i?>">IDR</p>
            <?php } ?>
    <?php } ?>
    </div>
    <div class="cart-summary">
      <table>
        <?php
        $sql="SELECT
  c.CART_ID,
  FORMAT(
    (
      SELECT SUM(p.PRODUCT_PRICE)
      FROM PRODUCT p
      JOIN PRODUCT_CART pc ON p.PRODUCT_ID = pc.PRODUCT_ID
      WHERE pc.CART_ID = c.CART_ID
    ),
    0
  ) AS subtotal
FROM
  CART c
WHERE
  c.CUSTOMER_ID = '" . session('customer_id') . "';
        ";
        $result= DB::select($sql);
      
        if (count($result) > 0) {
          $response = [];
          foreach ($result as $row) {
              $dt = new stdClass();
              $dt->subtotal = $row->subtotal;
              $response[] = $dt;
          }
          
          $hasil_json=json_encode($response);
          $data = json_decode($hasil_json,true);
            ?>
        <tr>
        
          <td><h3>SUBTOTAL: </h3></td>
          <td><h3 class = "subtotal-cart">IDR <?php echo $data[0]["subtotal"]; ?></h3></td>
        </tr>
        <?php } ?>
        <!-- <tr class="total">
          <td>Total:</td>
          <td>IDR 260,000</td> -->
        </tr>
      </table>
    </div>

    
    <div class="cart-actions">
      <a href="{{ url('cart') }}"><button class="checkout-btn">CHECKOUT</button></a> 
      <a href="/shop"><button class="continue-shopping">CONTINUE SHOPPING</button></a>
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
                    <a href="{{ url('index') }}"
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
                      <li><a href="{{ url('shop') }}">Tops</a></li>
                      <li><a href="{{ url('shop') }}">Dresses</a></li>
                      <li><a href="{{ url('shop') }}">Shorts</a></li>
                      <li><a href="{{ url('shop') }}">Skirts</a></li>
                      <li><a href="{{ url('shop') }}">Trousers</a></li>
                      <li><a href="{{ url('shop') }}">Jumpsuits</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle categ">
                    <ul class="">
                      <li><a href="{{ url('shop') }}">Sets</a></li>
                      <li><a href="{{ url('shop') }}">Denim</a></li>
                      <li><a href="{{ url('shop') }}">Outerwear</a></li>
                      <li><a href="{{ url('shop') }}">Bags</a></li>
                      <li><a href="{{ url('shop') }}">Fragrance</a></li>
                      <li><a href="{{ url('shop') }}">Accessories</a></li>
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
                  <li><a href="https://wa.me/6281217641707/" target="_blank">(+62) 812-1764-1707</a></li>
                    <li><a href="mailto:everafter@gmail.com">everafter@gmail.com</a></li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/decimal.js/10.3.1/decimal.min.js"></script>
    
    @if(session('customer_id'))
@php
    $loginTime = session('login_time');
    $currentTime = time();
    $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
@endphp

@if($remainingTime > 0)
<script>
     $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

let csrfToken = $('meta[name="csrf-token"]').attr('content');

function validatePayment() {
  console.log("halo");
  var paymentOptions = document.getElementsByName('menu');
  var isChecked = false;
  var selectedPayment = '';

  for (var i = 0; i < paymentOptions.length; i++) {
    if (paymentOptions[i].checked) {
      isChecked = true;
      selectedPayment = paymentOptions[i].value;
      break;
    }
  }

  if (!isChecked) {
    alert('Please choose your payment method first.');
  } else {
    showPopup();
  }

  function showPopup() {
    // Add your logic to show the popup
    console.log('Showing popup...');
    Swal.fire({
      title: 'Place Order',
      text: 'Are you sure you want to place the order?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, place order',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        // Kode yang ingin dijalankan jika pengguna mengklik "Yes, place order"
        // Kirim selectedPayment melalui AJAX menggunakan jQuery
        var orderData = {
         
        };

        $.ajax({
          url: '/payment/2', // Ganti dengan URL endpoint API Anda
          method: 'POST',
          data: { ORDER_ID: 'ORD00026',PAYMENT_ID: selectedPayment,DELIVERY_ID: 'D00026',ORDER_DATE: '<?php echo date('Y-m-d') ?>',DELETE_ORDER: '0',STATUS:'0'
         },
          success: function(response) {
            // Proses respons dari API jika berhasil
            console.log(response);
            Swal.fire(
              'Thank you for your order!',
              'We will send you the receipt via email within 24 hours after your order has been placed :)',
              'success'
            ).then(() => {
              window.location.href = '/payment';
            });
          },
          error: function(xhr, status, error) {
            // Proses kesalahan jika terjadi kesalahan dalam permintaan AJAX
            console.error(error);
            Swal.fire(
              'Oops!',
              'An error occurred while placing the order. Please try again later.',
              'error'
            );
          }
        });
      }
    });
  }
}


  // function showPopup() {
  //   alert("Thank you for your order! We will send you the receipt via email within 24 hours after your order has been placed:)");
  // }
//   function showPopup() {
 
// }

$(document).ready(function() {

  // Fungsi untuk memperbarui nilai shippingCost
  // function updateShippingCost() {
  //   $.ajax({
  //     url: '/payment', // Ganti URL_ENDPOINT_AJAX dengan URL endpoint Ajax Anda
  //     method: 'GET',
  //     success: function(response) {
  //       $('#shippingCost').text('IDR ' + response); // Memperbarui nilai kolom shippingCost
  //     },
  //     error: function(xhr, status, error) {
  //       console.log(error); // Menangani kesalahan jika terjadi
  //     }
  //   });
  // }

  // // Panggil fungsi updateShippingCost saat halaman dimuat
  // updateShippingCost();

  // // Fungsi untuk memperbarui nilai TotalAll
  // function updateTotalAll() {
  //   $.ajax({
  //     url: '/payment', // Ganti URL_ENDPOINT_AJAX dengan URL endpoint Ajax Anda
  //     method: 'GET',
  //     success: function(response) {
  //       $('.TotalAll').text('IDR ' + response); // Memperbarui nilai kolom TotalAll
  //     },
  //     error: function(xhr, status, error) {
  //       console.log(error); // Menangani kesalahan jika terjadi
  //     }
  //   });
  // }

  // // Panggil fungsi updateTotalAll saat halaman dimuat
  // updateTotalAll();

  // // Panggil fungsi updateShippingCost dan updateTotalAll saat terjadi perubahan pada select
  // $('#addressSelect').on('change', function() {
  //   updateShippingCost();
  //   updateTotalAll();
  // });

  // Menyembunyikan semua elemen dengan kelas "paymentdesc"
  $(".paymentdesc").hide();
});

  $('#addressSelect').on('change', function() {
    // Ambil harga pengiriman dari database berdasarkan opsi yang dipilih
    var deliveryName = $(this).val();

    // Mengirim permintaan AJAX ke server untuk mendapatkan harga pengiriman
    $.ajax({
      url: '/getDeliveryCost', // Ganti dengan URL endpoint yang sesuai
      method: 'POST',
      data: { deliveryName: deliveryName },
      success: function(response) {
        // Mengupdate nilai IDR dengan harga pengiriman yang diterima dari server
        var formattedCost = response.deliveryCost.toLocaleString('en-ID');
        $('#shippingCost').text('+ IDR ' + formattedCost);
      }
    });
  });

  function continueToPayment() {
    var shippingMethod = $('#shippingCost').text();

    if (shippingMethod === '') {
      alert('Please choose your shipping method.');
    } else {
      window.location.href = '/payment';
    }
  }

    
    $(document).ready(function() {
    $(".quantityInput").on("input", function() {
      updateQuantity($(this));
    });

    $(".remove-btn").on("click", function() {
      var productId = $(this).data("product-id");
      removeProduct(productId);
      location.reload();
    });
  
    


    function updateQuantity(input) {
      // ... kode logika perhitungan subtotal ...
    }

    function removeProduct(productId) {
      $.ajax({
        url: "/remove-product", // Ubah URL sesuai dengan endpoint yang dituju
        method: "POST",
        data: { product_id: productId },
        success: function(response) {
          console.log(response);
          // Lakukan tindakan setelah produk dihapus, misalnya memperbarui tampilan atau memuat ulang halaman
        },
        error: function(error) {
          console.log(error);
          // Tangani kesalahan jika ada
        }
      });
    }
  });
    $(document).ready(function() {
    $('.quantityInput').on('change', function() {
      var productId = $(this).data('product-id');
      var quantity = $(this).val();

      // Kirim permintaan AJAX untuk memperbarui nilai di database
      $.ajax({
        url: '/update_quantity', // Ganti dengan URL yang sesuai
        method: 'POST',
        data: {
          productId: productId,
          quantity: quantity
        },
        success: function(response) {
          console.log('Nilai kuantitas berhasil diperbarui di database.');
        },
        error: function(xhr, status, error) {
          console.log('Terjadi kesalahan saat memperbarui nilai kuantitas di database.');
          console.log(error);
        }
      });
    });
  });
    $(document).ready(function() {
    $('.apply').click(function(event) {
      event.preventDefault();
      var voucherCode = $('.vocer').val().toUpperCase();
      console.log("Voucher Code: " + voucherCode);

      // Send the voucher code to the server-side PHP script using AJAX
      $.ajax({
        url: '/cart', // Replace with the actual path to your PHP script
        type: 'POST',
        data: { voucherCode: voucherCode },
        success: function(response) {
          console.log("Response from PHP: " + response);
          // Perform further actions based on the response from PHP
        },
        error: function() {
          console.log("Error occurred during AJAX request.");
        }
      });
      location.reload()
    });
  });
  $(document).ready(function() {
    // Menghitung total saat halaman dimuat
    calculateTotal();

    $(".quantityInput").on("input", function() {
      calculateTotal();
    });

    function calculateTotal() {
      var total = 0;
      var n = 10; // Nilai n yang sesuai
      total2 = BigInt(total);

      // Menghitung subtotal untuk setiap item
      $(".quantityInput").each(function() {
        let harga = $(this).closest(".cart-item").find(".price").text();
        let quantity = $(this).val();
        let substr = harga.substring(10); // Menghapus "IDR " dari substring
        let parsedInt = parseInt(substr.replace(",", ""), 10); // Menghapus koma dan mengonversi ke integer

        // Menghitung subtotal berdasarkan quantity dan price
        let subtotal = quantity * parsedInt;
        let subtotalId = $(this).data("subtotal-id");
        $("#" + subtotalId).text("IDR " + subtotal);

        total2 += BigInt(subtotal);
      });

      var subtotalFormatted = total2.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(/\./g, ',');

      $('.subtotal-cart').text(subtotalFormatted);
      var decimalValue = new Decimal(0.05);
      var result = decimalValue.times(total2.toString());
      var formattedResult = result.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      $('.totalCart').text("IDR "+subtotalFormatted);
      $('.pajakCart').text("IDR "+formattedResult);
      let diskon = $(".isivocer").find("p").text();
      subsdis = diskon.substring(5);
      var subsdis2 = BigInt(subsdis.replace(/,/g, ''));
      resultDiskon = BigInt(subsdis2.toString());
      var resultBigInt = BigInt(result.toString());

  // Penjumlahan variabel total2 dan resultBigInt
      var total = total2 + resultBigInt - resultDiskon;
      var totalNumber = Number(total);
      $('.TotalAll').text('IDR ' + totalNumber.toLocaleString('en-ID'));
      // Cetak hasil
    }
  });


  $(document).ready(function() {
    // Event listener untuk perubahan dropdown
    
    $('#addressSelect').on('change', function() {
      // Ambil harga pengiriman dari database berdasarkan opsi yang dipilih
      var deliveryName = $(this).val();

      // Mengirim permintaan AJAX ke server untuk mendapatkan harga pengiriman
      $.ajax({
        url: '/getDeliveryCost', // Ganti dengan URL endpoint yang sesuai
        method: 'POST',
        data: { deliveryName: deliveryName },
        success: function(response) {
          // Mengupdate nilai IDR dengan harga pengiriman yang diterima dari server
          var formattedCost = response.deliveryCost.toLocaleString('en-ID');
          $('#shippingCost').text('+ IDR ' + formattedCost);
          

          var total = 0;
      var n = 10; // Nilai n yang sesuai
      total2 = BigInt(total);

      // Menghitung subtotal untuk setiap item
      $(".quantityInput").each(function() {
        let harga = $(this).closest(".cart-item").find(".price").text();
        let quantity = $(this).val();
        let substr = harga.substring(10); // Menghapus "IDR " dari substring
        let parsedInt = parseInt(substr.replace(",", ""), 10); // Menghapus koma dan mengonversi ke integer

        // Menghitung subtotal berdasarkan quantity dan price
        let subtotal = quantity * parsedInt;
        let subtotalId = $(this).data("subtotal-id");

        total2 += BigInt(subtotal);
      });

      var subtotalFormatted = total2.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(/\./g, ',');

      var decimalValue = new Decimal(0.05);
      var result = decimalValue.times(total2.toString());
      var formattedResult = result.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      var resultBigInt = BigInt(result.toString());

      let diskon = $(".isivocer").find("p").text();
      subsdis = diskon.substring(5);
      var subsdis2 = BigInt(subsdis.replace(/,/g, ''));
      resultDiskon = BigInt(subsdis2.toString());

    

      let ongkir = $('#shippingCost').text();
      let resultOngkir = ongkir.substring(6);
      var subongkir = BigInt(resultOngkir.replace(/,/g, ''));
      ongkirFix = BigInt(subongkir.toString());

  // Penjumlahan variabel total2 dan resultBigInt
      var total = total2 + resultBigInt - resultDiskon + ongkirFix;
      var totalNumber = Number(total);
      $('.TotalAll').text('IDR ' + totalNumber.toLocaleString('en-ID'));
      // Cetak hasil
      console.log("Total: " + totalNumber );
        },
        error: function(xhr, status, error) {
          // Tangani error jika terjadi
          console.log(error);
        }
      });
    
    });
    $('.btnkepayment').click(function() {
      let totalproduktok = $('.totalCart').text();
      let totalpajaktok = $('.pajakCart').text();
        let diskontok = $(".isivocer").find("p").text();
        let shippingtok = $('#shippingCost').text();
        let totaltok = $('.TotalAll').text();
              // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
              $.ajax({
                type: "POST",
                url: "/payment",
                data: { subtotalpayment: totalproduktok,
                pajakpayment: totalpajaktok,
                diskonpayment: diskontok,
                shippingpayment: shippingtok,
                totalshipment: totaltok
                },
                success: function(response) {
                  console.log(response);
                }
              });
            });
  });
      const closecart = document.querySelector('.close.cart');
      const full = document.querySelector('.full-wrapper');
      const navprofile = document.querySelector('.slicknav_menu a.navprofile');
      const logocart = document.querySelector('.logocart');
      const containercart = document.querySelector('.cart-container');
      const navv = document.querySelector('a.navprofile');

      // containercart.style.display = "none";

      full.style.overflow = 'visible';
      navprofile.style.display = 'none';
      navv.style.display = 'none';

      function updateNavbar(screenWidth) {
          // Add event listener to detect media query change
          if (window.innerWidth >= 415 && window.innerWidth <= 576) {
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
          }
          else if (window.innerWidth < 415) { // media query condition
              navprofile.style.display = 'block';
              logocart.addEventListener('click', function(event) {
                  event.preventDefault();
                  // containercart.style.display = 'block';
                  full.style.overflow = 'hidden';
                  containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });
              navprofile.addEventListener('click', function(event) {
              event.preventDefault();
              full.style.overflow = 'hidden';
              containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              
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
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('.footer-tittle.categ ul li a').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          let isiShopNow = $(this).text();
          $.ajax({
            type: "POST",
            url: "/shop",
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
            url: "/shop",
            data: { shopnow: "" },
            success: function() {
              console.log("Data berhasil dikirim ke PHP yyyyyyyyyyyyyy");
            }
          });
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

        
        function toggleDescription(menuNumber) {
        var description = document.getElementById("description" + menuNumber);
        var radios = document.getElementsByName("menu");

        for (var i = 0; i < radios.length; i++) {
        var descriptionId = "description" + (i + 1);
          var currentDescription = document.getElementById(descriptionId);

        if (i + 1 === menuNumber) {
           description.style.display = "block";
          } else {
            currentDescription.style.display = "none";
          }
  }
}

        
</script>
@endif
@else
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
                  // event.preventDefault();
                  // // containercart.style.display = 'block';
                  // full.style.overflow = 'hidden';
                  // containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
                  event.preventDefault();
                  // containercart.style.display = 'none';
                  full.style.overflow = 'visible';
                  containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });

              // $(".close.cart").on('click', function(event) {
              //   event.preventDefault();
              //   containercart.style.animation = 'slideInToRightMobile 1s forwards';
              //   full.style.overflow = 'visible';
              //   if($('.logocart-login').hasClass('active')){
              //     full.style.overflow = 'hidden';
              //   }
              // });
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
                  // event.preventDefault();
                  // // containercart.style.display = 'block';
                  // full.style.overflow = 'hidden';
                  // containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
                  event.preventDefault();
                  full.style.overflow = 'hidden';
                  containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
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
                  // event.preventDefault();
                  // // containercart.style.display = 'block';
                  // full.style.overflow = 'hidden';
                  // containercart.style.animation = 'slideInFromRightMobile 0.5s forwards';
                  event.preventDefault();
                  full.style.overflow = 'hidden';
                  containercartlogin.style.animation = 'slideInFromRightMobile 0.5s forwards';
              });

              // $(".close.cart").on('click', function(event) {
              //   event.preventDefault();
              //   containercart.style.animation = 'slideInToRightMobile 1s forwards';
              //   full.style.overflow = 'visible';
              //   if($('.logocart-login').hasClass('active')){
              //     full.style.overflow = 'hidden';
              //   }
              // });

              logocartlogin.addEventListener('click', function(event) {
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
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('.footer-tittle.categ ul li a').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          let isiShopNow = $(this).text();
          $.ajax({
            type: "POST",
            url: "/shop",
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
            url: "/shop",
            data: { shopnow: "" },
            success: function() {
              console.log("Data berhasil dikirim ke PHP yyyyyyyyyyyyyy");
            }
          });
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

        function toggleDescription(menuNumber) {
        var description = document.getElementById("description" + menuNumber);
        var radios = document.getElementsByName("menu");

        for (var i = 0; i < radios.length; i++) {
        var descriptionId = "description" + (i + 1);
          var currentDescription = document.getElementById(descriptionId);

        if (i + 1 === menuNumber) {
           description.style.display = "block";
          } else {
            currentDescription.style.display = "none";
          }
  }
}

  </script>
  @endif
  </body>
</html>