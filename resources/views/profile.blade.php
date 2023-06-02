<?php
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

// ...

if (Session::has('customer_id')) {
    $loginTime = Session::get('login_time');
    $currentTime = time();
    $inactiveTime = 5 * 60 * 60; // 5 hours in seconds

    if (($currentTime - $loginTime) >= $inactiveTime) {
        // Redirect to the login page or perform other actions
        return redirect('/login');
    }

    // Add your profile page logic here
} else {
    // Redirect to the login page or display an error message
    return redirect('/login');
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Ever After | Fashion</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="manifest" href="{{ asset('site.webmanifest')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />

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
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select-profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

  <style type="text/css">
        .popup {
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5);
          z-index: 9999;
          overflow: auto;
        }

        .popup-inner {
          position: absolute;
          left: 50%;
          top: 40%;
          width: 60%;
          transform: translate(-50%, -20%);
          background-color: #fff;
          border-radius: 5px;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);

        }

        .overlay {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background: rgba(0, 0, 0, 0.7);
          transition: opacity 500ms;
          visibility: hidden;
          opacity: 0;
        }

        .overlay:target {
          visibility: visible;
          opacity: 1;
        }

        .popup .close {
          position: absolute;
          top: 20px;
          right: 30px;
          transition: all 200ms;
          font-size: 30px;
          font-weight: bold;
          text-decoration: none;
          color: #333;

        }

        .card-stepper {
          z-index: 0
        }

        #progressbar-2 {
          color: #455A64;
        }

        #progressbar-2 li {
          list-style-type: none;
          font-size: 13px;
          width: 33.33%;
          float: left;
          position: relative;
        }

        #progressbar-2 #step1:before {
          content: '\f058';
          font-family: "Font Awesome 5 Free";
          color: #fff;
          width: 37px;
          margin-left: 0px;
          padding-left: 0px;
        }

        #progressbar-2 #step2:before {
          content: '\f058';
          font-family: "Font Awesome 5 Free";
          color: #fff;
          width: 37px;
        }

        #progressbar-2 #step3:before {
          content: '\f058';
          font-family: "Font Awesome 5 Free";
          color: #fff;
          width: 37px;
          margin-right: 0;
          text-align: center;
        }

        #progressbar-2 #step4:before {
          content: '\f111';
          font-family: "Font Awesome 5 Free";
          color: #fff;
          width: 37px;
          margin-right: 0;
          text-align: center;
        }

        #progressbar-2 li:before {
          line-height: 37px;
          display: block;
          font-size: 12px;
          background: #c5cae9;
          border-radius: 50%;
        }

        #progressbar-2 li:after {
          content: '';
          width: 100%;
          height: 10px;
          background: #c5cae9;
          position: absolute;
          left: 0%;
          right: 0%;
          top: 15px;
          z-index: -1;
        }

        #progressbar-2 li:nth-child(1):after {
          left: 1%;
          width: 100%
        }

        #progressbar-2 li:nth-child(2):after {
          left: 1%;
          width: 100%;
        }

        #progressbar-2 li:nth-child(3):after {
          left: 1%;
          width: 100%;
          background: #c5cae9 !important;
        }

        #progressbar-2 li:nth-child(4) {
          left: 0;
          width: 37px;
        }

        #progressbar-2 li:nth-child(4):after {
          left: 0;
          width: 0;
        }

        #progressbar-2 li.active:before,
        #progressbar-2 li.active:after {
          background: #EEA2A2;
        }

        .box-close {
          position: absolute;
          top: 0;
          right: 15px;
          text-decoration: none;
          font-size: 30px;
        }

        .box a {
          display: inline-block;
          background-color: #fff;
          padding: 15px;
          border-radius: 3px;
        }
      </style>
</head>

<body class="full-wrapper">
@csrf
@include('header')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <main>
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="sidebar">
          <h1>My Account</h1>
          <ul>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Addresses</a></li>
          </ul>
        </div>
      </div>
      <div class="col-12 col-md-8 pr-20 acc">
        <div class="row profiletitle">
          <h1>Profile</h1>
        </div>
        <div class="row isi mb-40">
          <form action="">
            <label class="editprofile mb-10">EDIT PROFILE</label>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" required placeholder="First name *">
              </div>
              <div class="col">
                <input type="text" class="form-control" required placeholder="Last name *">
              </div>
            </div>
            <div class="form-group mt-20">
              <input type="email" class="form-control" id="exampleInputEmail1" required placeholder="Email address *" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-20">
              <label class="editprofile mb-10">CHANGE PASSWORD</label>
              <input type="password" class="form-control" required placeholder="Current password" id="currpass">
              <input type="password" class="form-control mt-10" required placeholder="New password" id="newpass">
              <input type="password" class="form-control mt-10" required placeholder="Confirm new password" id="confirmpass">
            </div>
            <button type="submit" class="btn btn-primary mt-10 pb-20 login">SAVE CHANGES</button>
          </form>

        </div>

      </div>
      <div class="col-12 col-md-8 pr-20 address">
        <div class="row profiletitle address">
          <h1>Shipping Address</h1>
        </div>
        <div class="row card-address-all">
          <div class="col-12 col-md-5 mt-20">
            <div class="card card-address ">
              <div class="card-header">
                <div class="judulheader">
                  Shipping Address
                </div>
                <div class="kananheader">
                  <span class="editaddress">edit</span>
                  

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

          <div class="col-12 col-md-5 mt-20">
            <div class="card card-address ">
              <div class="card-header">
                <div class="judulheader">
                  Shipping Address
                </div>
                <div class="kananheader">
                  <span class="editaddress2">edit</span>
                  

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
        <div class="row dalemeditaddress isi mb-40 mt-20">
          <form action="">
            <label class="editprofile mb-10">EDIT SHIPPING ADDRESS</label>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" required placeholder="First name *">
              </div>
              <div class="col">
                <input type="text" class="form-control" required placeholder="Last name *">
              </div>
            </div>

            <select name="country" required class="mt-20 country">
              <option value="" disabled selected>Country *</option>
              <option value="Indonesia">Indonesia</option>
            </select><br><br>

            <select name="province" required class="mt-20 province">
              <option value="" disabled selected>Province *</option>
              <option value="Australia">Jawa Timur</option>
              <option value="Malaysia">Jawa Barat</option>
              <option value="Singapore">Jawa Tengah</option>
              <option value="Taiwan">Bali</option>
            </select><br><br>

            <select name="City" required class="mt-20 City">
              <option value="" disabled selected>Town/City *</option>
              <option value="Australia">Surabaya</option>
              <option value="Malaysia">Mojokerto</option>
              <option value="Singapore">Malang</option>
              <option value="Taiwan">Madiun</option>
            </select><br><br>

            <div class="form-row">
              <div class="col">
                <select name="Subdistrict" required class="mt-20 Subdistrict">
                  <option value="" disabled selected>Subdistrict *</option>
                  <option value="Australia">Sambikerep</option>
                  <option value="Malaysia">Benowo</option>
                  <option value="Singapore">Tandes</option>
                  <option value="Taiwan">Rungkut</option>
                </select><br><br>
              </div>
              <div class="col mt-20">
                <input type="text" class="form-control" required placeholder="Postal Code *">
              </div>
            </div>
            <div class="form-group mt-20">
              <input type="text" class="form-control" id="street" required placeholder="Street, Street Number, Apartment *">
            </div>
            <div class="butt d-flex" style="justify-content: space-between;">
            <button type="submit" class="btn btn-primary mt-10 pb-20 login">SAVE ADDRESS</button>
            <a class="btn btn-primary mt-10 pb-20 login btnback" href="#">BACK</a>
            </div>
          </form>

        </div>

      </div>

<!-- orders -->
      <div class="cartpage col-12 col-md-7 mb-30">
        <div class="row profiletitle">
          <h1>Orders</h1>
        </div>
        
      <?php 
          $sql="SELECT DATE_FORMAT(MAX(o.order_date), '%d %b %Y') as tanggal, o.order_id, MAX(p.product_name) as product_name, IF(SUBSTR(MAX(po.product_id), 5, 1) = '0', 'All Size', SUBSTR(MAX(po.product_id), 5, 1)) as size, FORMAT(MAX(p.product_price), 0) as product_price, SUM(po.qty) as qty, MAX(d.delivery_name) as delivery_name, FORMAT(MAX(d.delivery_cost), 0) as delivery_cost, MAX(a.address) as address, FORMAT(((MAX(o.grand_total) * SUM(po.qty)) - MAX(o.total_potongan) + CONVERT((5/100) * MAX(o.grand_total), INT) + MAX(d.delivery_cost)), 0) as total, MAX(p.product_url) as product_url
          FROM `order` as `o`
          LEFT JOIN `product_order` as `po` ON `o`.`order_id` = `po`.`order_id`
          LEFT JOIN `product` as `p` ON `po`.`product_id` = `p`.`product_id`
          LEFT JOIN `delivery` as `d` ON `d`.`delivery_id` = `o`.`delivery_id`
          LEFT JOIN `address` as `a` ON `a`.`CUSTOMER_ID` = `o`.`CUSTOMER_ID`
          WHERE `o`.`CUSTOMER_ID` = 'C00001'
          GROUP BY `o`.`order_id`
          ORDER BY `o`.`order_id` DESC;
          ";
          $result= DB::select($sql);
        
          if (count($result) > 0) {
            $response = [];
            foreach ($result as $row) {
                $dt = new stdClass();
                $dt->tanggal = $row->tanggal;
                $dt->order_id = $row->order_id;
                $dt->product_name = $row->product_name;
                $dt->size = $row->size;
                $dt->product_price = $row->product_price;
                $dt->qty = $row->qty;
                $dt->delivery_name = $row->delivery_name;
                $dt->delivery_cost = $row->delivery_cost;
                $dt->address = $row->address;
                $dt->total = $row->total;
                $dt->product_url = $row->product_url;
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
            for($i = 0; $i < count($data); $i++) { ?>
            <hr class="hr-order">
              <div class="d-flex pembungkusatas">
                <p class="header-transaction my-0 ml-15 text-dark"><?php echo $data[$i]["tanggal"]; ?></p>
                <span class="badge badge-success mx-3"> Sent</span>
                <p class="header-transaction my-0 orderid">INV/<?php echo $data[$i]["order_id"]; ?></p>
              </div>
              <div class="row mb-50">
                <div class="col-5 col-lg-4 ">
                  <!-- Place your cart items here -->
                  <div class="card cardcart">
                    <div class="card-body">
                      <div class="col-2 gbr">
                        <!-- Item image -->
                        <img src="<?php echo $data[$i]["product_url"]; ?>" alt="Item 1">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3 col-sm-4 col-lg-5 judulcard pl-0">
                  <h4 class="prodname" ><?php echo $data[$i]["product_name"]; ?></h4>
                  <!-- Item size and price -->
                  <br>
                  <p>Size: <?php echo $data[$i]["size"]; ?></p>
                  <p>Price: IDR <?php echo $data[$i]["product_price"]; ?></p>
                  <p>Qty: 1</p>
                  <button id="open-popup" type="submit" class="btn btn-primary detailkiri details" onclick="document.querySelector('.popup').style.display = 'block'">Details</button>
                </div>
                <div class="col-2 col-sm-3">
                  <br><br>
                  <p class="total-order mb-0">Total</p>
                  <h4 class="text-dark">IDR <?php echo $data[$i]["total"]; ?></h4>
                  <button type="submit" class="btn btn-primary detailkanan details mt-20">Details</button>
                </div>
              </div>  
            <?php } ?>
            <?php } ?>

        
      <hr class="hr-order">

  
            <!-- popup -->
            <div class="popup" class="overlay">
          </div>


          


      
      

          </div>
    </div>
    </div>
    </div>

    <!-- cart -->
    <div class="cart-container-login geser">
      <!-- {{-- @if(session('customer_id'))
    @php
        $loginTime = session('login_time');
        $currentTime = time();
        $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
    @endphp

    @if($remainingTime > 0)
        <a href="/profile">
    @else
        <a href="#">
    @endif
        <div class="user mx-3" style="cursor:pointer;">
            <img src="{{ asset('assets/images/logo/person.svg') }}" alt="" />
        </div>
    </a>
@endif --}} -->


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
  <?php 
          $sql="SELECT p.PRODUCT_NAME, FORMAT(p.PRODUCT_PRICE,0) AS PRODUCT_PRICE, p.PRODUCT_URL, IF(substr(p.PRODUCT_ID, 5, 1) = '0', 'All Size', IF(substr(p.PRODUCT_ID, 5, 1) = 'S', 'S', IF(substr(p.PRODUCT_ID, 5, 1) = 'M', 'M', 'L'))) AS size FROM PRODUCT p JOIN PRODUCT_CART pc ON p.PRODUCT_ID = pc.PRODUCT_ID JOIN `CART` c ON c.CART_ID = pc.CART_ID JOIN customer cu ON cu.CUSTOMER_ID = c.CUSTOMER_ID WHERE cu.CUSTOMER_ID = '" . session('customer_id') . "' GROUP BY p.PRODUCT_NAME, p.PRODUCT_PRICE, PRODUCT_URL , size;";
          $result= DB::select($sql);
        
          if (count($result) > 0) {
            $response = [];
            foreach ($result as $row) {
                $dt = new stdClass();
                $dt->PRODUCT_NAME = $row->PRODUCT_NAME;
                $dt->size = $row->size;
                $dt->PRODUCT_PRICE = $row->PRODUCT_PRICE;
                $dt->PRODUCT_URL = $row->PRODUCT_URL;
                
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
            for($i = 0; $i < count($data); $i++) { 
              ?>

      <div class="row cart-item">
        <div class="col-5 item-image">
        <img src="<?php echo $data[$i]['PRODUCT_URL']; ?>" alt="" />
        </div>
        <div class=" col-7 item-details">
          <h3><?php echo $data[$i]["PRODUCT_NAME"]; ?></h3>
          <p>Price: IDR <?php echo $data[$i]["PRODUCT_PRICE"]; ?></p>
          <p>Size: <?php echo $data[$i]["size"]; ?></p>
          <p>Quantity: 1</p>
          <button class="remove-btn mt-4">Remove</button>
        </div>
      </div>
      
      
      
    
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
          <td><h3>IDR <?php echo $data[0]["subtotal"]; ?></h3></td>
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
@if(session('customer_id'))
@php
    $loginTime = session('login_time');
    $currentTime = time();
    $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
@endphp

@if($remainingTime > 0)
<script>
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
    const orders = document.querySelector('.sidebar li:nth-child(1)');
    const accDiv = document.querySelector('.acc');
    const addressDiv = document.querySelector('.address');
    const editAddress = document.querySelector('.editaddress');
    const editAddress2 = document.querySelector('.editaddress2');
    const dalemeditaddress = document.querySelector('.dalemeditaddress');
    const cardAddress = document.querySelector('.card-address-all');
    const cartPage = document.querySelector('.cartpage');
    const btnback = document.querySelector('.btnback');
    const popup = document.querySelector('.popup');
    
    accDiv.style.display = "block";
    addressDiv.style.display = "none";
    dalemeditaddress.style.display = 'none';
    cartPage.style.display = 'none';

    editAddress.addEventListener('click', function(event) {
      event.preventDefault();
      cardAddress.style.display = 'none';
      dalemeditaddress.style.display = 'block';
    });
    btnback.addEventListener('click', function(event) {
      event.preventDefault();
      cardAddress.style.display = 'block';
      cardAddress.style.display = 'flex';
      dalemeditaddress.style.display = 'none';
    });
    editAddress2.addEventListener('click', function(event) {
      event.preventDefault();
      cardAddress.style.display = 'none';
      dalemeditaddress.style.display = 'block';
    });

    orders.addEventListener('click', function(event) {
      event.preventDefault();
      accDiv.style.display = 'none';
      addressDiv.style.display = 'none';
      cartPage.style.display = 'block';
      orders.style.backgroundColor = '#FFD4C2';
      profile.style.backgroundColor = '';
      address.style.backgroundColor = '';
      cardAddress.style.display = 'flex';
      dalemeditaddress.style.display = 'none';
    });

    address.addEventListener('click', function(event) {
      event.preventDefault();
      accDiv.style.display = 'none';
      addressDiv.style.display = 'block';
      cartPage.style.display = 'none';
      address.style.backgroundColor = '#FFD4C2';
      profile.style.backgroundColor = '';
      orders.style.backgroundColor = '';
    });

    profile.addEventListener('click', function(event) {
      event.preventDefault();
      addressDiv.style.display = 'none';
      accDiv.style.display = 'block';
      cartPage.style.display = 'none';
      address.style.backgroundColor = '';
      orders.style.backgroundColor = '';
      profile.style.backgroundColor = '#FFD4C2';
      cardAddress.style.display = 'flex';
      dalemeditaddress.style.display = 'none';
    });

      $('.full-wrapper').css('overflow', 'hidden');
    $('.details').click(function() {
  // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
  let isiorderid = $(this).closest('.row').prev().find('.orderid').text()
  let substrisiorder = isiorderid.substring(4);

  $.ajax({
    method: "POST",
    url: '/order_detail', // Menggunakan URL dengan parameter
    data: {
          orderid: substrisiorder
        },
        success: function(response) {
          // Menampilkan div dengan hasil respons di dalamnya
          console.log(response);
          // $(".popup").html(response).show();
          $(".popup").html(response.content).show();
        },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
});

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
    const orders = document.querySelector('.sidebar li:nth-child(1)');
    const accDiv = document.querySelector('.acc');
    const addressDiv = document.querySelector('.address');
    const editAddress = document.querySelector('.editaddress');
    const editAddress2 = document.querySelector('.editaddress2');
    const dalemeditaddress = document.querySelector('.dalemeditaddress');
    const cardAddress = document.querySelector('.card-address-all');
    const cartPage = document.querySelector('.cartpage');
    const btnback = document.querySelector('.btnback');
    const popup = document.querySelector('.popup');
    
    accDiv.style.display = "block";
    addressDiv.style.display = "none";
    dalemeditaddress.style.display = 'none';
    cartPage.style.display = 'none';

    editAddress.addEventListener('click', function(event) {
      event.preventDefault();
      cardAddress.style.display = 'none';
      dalemeditaddress.style.display = 'block';
    });
    btnback.addEventListener('click', function(event) {
      event.preventDefault();
      cardAddress.style.display = 'block';
      cardAddress.style.display = 'flex';
      dalemeditaddress.style.display = 'none';
    });
    editAddress2.addEventListener('click', function(event) {
      event.preventDefault();
      cardAddress.style.display = 'none';
      dalemeditaddress.style.display = 'block';
    });

    orders.addEventListener('click', function(event) {
      event.preventDefault();
      accDiv.style.display = 'none';
      addressDiv.style.display = 'none';
      cartPage.style.display = 'block';
      orders.style.backgroundColor = '#FFD4C2';
      profile.style.backgroundColor = '';
      address.style.backgroundColor = '';
      cardAddress.style.display = 'flex';
      dalemeditaddress.style.display = 'none';
    });

    address.addEventListener('click', function(event) {
      event.preventDefault();
      accDiv.style.display = 'none';
      addressDiv.style.display = 'block';
      cartPage.style.display = 'none';
      address.style.backgroundColor = '#FFD4C2';
      profile.style.backgroundColor = '';
      orders.style.backgroundColor = '';
    });

    profile.addEventListener('click', function(event) {
      event.preventDefault();
      addressDiv.style.display = 'none';
      accDiv.style.display = 'block';
      cartPage.style.display = 'none';
      address.style.backgroundColor = '';
      orders.style.backgroundColor = '';
      profile.style.backgroundColor = '#FFD4C2';
      cardAddress.style.display = 'flex';
      dalemeditaddress.style.display = 'none';
    });

      $('.full-wrapper').css('overflow', 'hidden');
    $('.details').click(function() {
  // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
  let isiorderid = $(this).closest('.row').prev().find('.orderid').text()
  let substrisiorder = isiorderid.substring(4);

  $.ajax({
    method: "POST",
    url: '/order_detail', // Menggunakan URL dengan parameter
    data: {
          orderid: substrisiorder
        },
        success: function(response) {
          // Menampilkan div dengan hasil respons di dalamnya
          console.log(response);
          // $(".popup").html(response).show();
          $(".popup").html(response.content).show();
        },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
});

  </script>
  @endif
</body>

</html>