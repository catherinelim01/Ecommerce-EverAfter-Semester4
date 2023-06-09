<?php
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// ...
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   // Ambil data dari form
//   if (isset($_POST['updateProfile'])) {
//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $customer_email = $_POST['customer_email'];
//     $password = $_POST['password'];
//     $new_password = $_POST['new_password'];
//     $confirm_password = $_POST['confirm_password'];
    
//     $sql = "UPDATE CUSTOMER
//     SET CUSTOMER_NAME = CONCAT('$first_name', ' ', '$last_name'),
//         CUSTOMER_EMAIL = '$customer_email'";
//     DB::update($sql);
    
//   }
// }

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
          /* background: #c5cae9 !important; */
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
        <?php 
          $sql="SELECT CASE 
          WHEN LENGTH(customer_name) - LENGTH(REPLACE(customer_name, ' ', '')) = 0 THEN customer_name
          ELSE SUBSTRING_INDEX(customer_name, ' ', 1)
        END AS first_name,
        CASE 
          WHEN LENGTH(customer_name) - LENGTH(REPLACE(customer_name, ' ', '')) = 0 THEN ''
          ELSE SUBSTRING_INDEX(customer_name, ' ', -1)
        END AS last_name,
        customer_email,
        customer_password
      FROM 
        customer WHERE customer_id = '" . session('customer_id') . "'";
          $result= DB::select($sql);
        
          if (count($result) > 0) {
            $response = [];
            foreach ($result as $row) {
                $dt = new stdClass();
                $dt->first_name = $row->first_name;
                $dt->last_name = $row->last_name;
                $dt->customer_email = $row->customer_email;
                $dt->customer_password = $row->customer_password;
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
            ?>
          <form method="POST" class="formInsert" action="/profile"> 
          @csrf
            <label class="editprofile mb-10">EDIT PROFILE</label>
            <div class="form-row">
              <div class="col">
                <input type="text" class="form-control" required placeholder="First name *" name="first_name" value="<?php echo $data[0]["first_name"] ?>">
              </div>
              <div class="col">
              <input type="text" class="form-control"  placeholder="Last name " name="last_name" value="<?php echo isset($data[0]["last_name"]) ? $data[0]["last_name"] : "" ?>">

              </div>
            </div>
            <div class="form-group mt-20">
              <input type="email" class="form-control" id="exampleInputEmail1" name="customer_email" required placeholder="Email address *" value="<?php echo $data[0]["customer_email"] ?>" aria-describedby="emailHelp">
            </div>
            <div class="form-group mt-20">
              <label class="editprofile mb-10">CHANGE PASSWORD</label>
              <input type="password" class="form-control" name="password"  placeholder="Current password" id="currpass">
              <input type="password" class="form-control mt-10" name="new_password"  placeholder="New password" id="newpass">
              <input type="password" class="form-control mt-10" name="confirm_password"  placeholder="Confirm new password" id="confirmpass">
            </div>
            @if (session('error'))
    <div class="alert alert-danger" style="font-size:12px">
        {{ session('error') }}
    </div>
@endif
<div class="row">
          <div class="col-6 pl-0">
            <button type="submit" name="action" value="updateProfile" class="btn btn-primary mt-10 pb-20 login">SAVE CHANGES</button>
            </div>
            <div class="col-6 pr-0"  style="text-align:end;">
            <button type="submit" name="action" value="logout" class="btn btn-primary mt-10 pb-20 login">LOG OUT</button>
            </div>
            </div>
          </form>
          <?php } ?>
        </div>

        <?php
            $sql = "SELECT * FROM address a left join customer c on a.customer_id = c.customer_id WHERE a.customer_id ='" . session('customer_id') . "';";
            $result = DB::select($sql);
            
            if (count($result) > 0) {
                $response = [];
                foreach ($result as $row) {
                    $dt = new stdClass();
                    $dt->customername = $row->CUSTOMER_NAME;
                    $dt->phone = $row->PHONE;
                    $dt->address = $row->ADDRESS;
                    $response[] = $dt;
                }
                $hasil_json = json_encode($response);
                $data2 = json_decode($hasil_json, true);
            }
            ?>

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
                                <p><?php echo $data2[0]['phone']; ?></p>
                                <p><?php
                                $string = $data2[0]['address'];
                                $substring = str_replace(', Indonesia', '', $string);
                                echo $substring;
                                ?></p>
                                <p><?php
                                $string = $data2[0]['address'];
                                $substring = substr($string, strrpos($string, ', ') + 2);
                                echo $substring;
                                ?></p>
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
                                <p><?php echo $data2[1]['phone']; ?></p>
                                <p><?php
                                $string = 'Jl HR Rasuna Said Kav H 1-2 Puri Matari Dki Jakarta, 12920,Indonesia';
                                $substring = str_replace(',Indonesia', '', $string);
                                echo $substring; // Output: Jl HR Rasuna Said Kav H 1-2 Puri Matari Dki Jakarta, 12920
                                
                                ?></p>
                                </p>
                                <p><?php
                                $string = 'Jl HR Rasuna Said Kav H 1-2 Puri Matari Dki Jakarta, 12920, Indonesia';
                                $lastCommaPosition = strrpos($string, ',');
                                $country = substr($string, $lastCommaPosition + 2);
                                
                                echo $country;
                                ?></p>
                            </div>
            </div>
          </div>
        </div>
        
        <div class="row dalemeditaddress isi mb-40 mt-20">
        <form action="/profile" method="POST">
          @csrf
            <label class="editprofile mb-10">EDIT SHIPPING ADDRESS</label>


            <select name="country" required class="mt-20 country">
              <option value="Indonesia">Indonesia</option>
            </select><br><br>

            <select name="province" required class="mt-20 province">
            <option value="">Province *</option>
            <?php 
          $sql="SELECT title, province_id FROM `provinces`;";
          $result= DB::select($sql);
        
          if (count($result) > 0) {
            $response = [];
            foreach ($result as $row) {
                $dt = new stdClass();
                $dt->title = $row->title;
                $dt->province_id = $row->province_id;
                
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
            for($i = 0; $i < count($data); $i++) { ?>
              
              <option><?php echo $data[$i]["title"] ?></option>
              <?php }} ?>
            </select><br><br>

            <select name="CityTes"  class="mt-20 CityTes">
            <option disabled selected>Town/City *</option>
              <!-- <option value="" disabled selected>Town/City *</option> -->
              <?php 
          // $sql2="SELECT title, province_id FROM `cities` where province_id = (SELECT province_id from provinces where title = '" . session('selectedTitle') . "') ;";
          // $result2= DB::select($sql2);
          // echo $sql2;
        
          // if (count($result2) > 0) {
          //   $response2 = [];
          //   foreach ($result2 as $row) {
          //       $dt = new stdClass();
          //       $dt->title = $row->title;
          //       $dt->province_id = $row->province_id;
          //       $response2[] = $dt;
          //   }
            
          //   $hasil_json2=json_encode($response2);
          //   $data2 = json_decode($hasil_json2,true);
          //   for($i = 0; $i < count($data2); $i++) { ?>
          
              <?php
            //  }} 
             ?>
            </select><br><br>

            <div class="form-row">
              <div class="col mt-20">
              <input type="text" name="subdistrict" class="form-control" required placeholder="Subdistrict *">
              
              </div>
              <div class="col mt-20">
                <input type="text" name="postalCode" class="form-control" required placeholder="Postal Code *">
              </div>
            </div>
            <div class="form-group mt-20">
              <input type="text" class="form-control" name="street" id="street" required placeholder="Street, Street Number, Apartment *">
            </div>
            <div class="form-group mt-20">
                            <input type="text" class="form-control" id="phone" required name ="phone" placeholder="Phone *"
                                title="Please enter numbers only"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>

            <div class="butt d-flex" style="justify-content: space-between;">
            <button type="submit" name="action" value="updAddress" class="btn btn-primary mt-10 pb-20 login">SAVE ADDRESS</button>
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
          $sql="SELECT DATE_FORMAT(MAX(o.order_date), '%d %b %Y') as tanggal, o.order_id, MAX(p.product_name) as product_name, IF(SUBSTR(MAX(po.product_id), 5, 1) = '0', 'All Size', SUBSTR(MAX(po.product_id), 5, 1)) as size, FORMAT(MAX(p.product_price), 0) as product_price, (select po.qty from product_order po, customer c,`order` o where o.CUSTOMER_ID = c.customer_id and o.CUSTOMER_ID = '" . session('customer_id') . "' and po.ORDER_ID = o.order_id order by 1 asc limit 1) as qty_item , SUM(po.qty) as qty, MAX(d.delivery_name) as delivery_name, FORMAT(MAX(d.delivery_cost), 0) as delivery_cost, MAX(a.address) as address, format(o.grand_total - (o.grand_total*(v.discount/100)) + (convert((5/100)*(o.grand_total-(o.grand_total*(v.discount/100))),int)) + d.delivery_cost,0) as total,(select p.PRODUCT_URL from product p ,product_order po, customer c,`order` o where po.PRODUCT_ID = p.PRODUCT_ID and o.CUSTOMER_ID = c.customer_id and o.CUSTOMER_ID = '" . session('customer_id') . "' and po.ORDER_ID = o.order_id order by 1 asc limit 1) as product_url
          FROM `order` as `o`
          LEFT JOIN `product_order` as `po` ON `o`.`order_id` = `po`.`order_id`
          LEFT JOIN `product` as `p` ON `po`.`product_id` = `p`.`product_id`
          LEFT JOIN `delivery` as `d` ON `d`.`delivery_id` = `o`.`delivery_id`
          LEFT JOIN `address` as `a` ON `a`.`CUSTOMER_ID` = `o`.`CUSTOMER_ID` AND a.ADDRESS_ID = o.ADDRESS_ID
          LEFT JOIN voucher v on v.VOUCHER_ID = o.VOUCHER_ID
          WHERE `o`.`CUSTOMER_ID` = '" . session('customer_id') . "'
          GROUP BY `o`.`order_id` , o.grand_total, v.discount, d.delivery_cost
          ORDER BY `o`.`order_id` asc
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
                $dt->qty_item = $row->qty_item;
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
                  <p>Qty: <?php echo $data[$i]["qty_item"]; ?></p>
                  <button id="open-popup" type="submit" class="btn btn-primary detailkiri details" onclick="document.querySelector('.popup').style.display = 'block'">Details</button>
                </div>
                <div class="col-2 col-sm-3">
                  <br><br>
                  <p class="total-order mb-0">Total</p>
                  <h4 class="text-dark">IDR <?php echo $data[$i]["total"]; ?></h4>
                  <button type="submit" class="btn btn-primary detailkanan details mt-20">Details</button>
                  <p class="mt-4">Total Items : <?php echo $data[$i]["qty"]; ?></p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/decimal.js/10.3.1/decimal.min.js"></script>
@if(session('customer_id'))
@php
    $loginTime = session('login_time');
    $currentTime = time();
    $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
@endphp

@if($remainingTime > 0)
<script>
  $(document).ready(function() {
  $('.province').change(function() {
    $('.CityTes .current').text('Town/City *');
    // Mendapatkan nilai dari pilihan yang dipilih
    const selectedTitle = $(this).find('option:selected').text();
    // Mengirim data melalui AJAX ke endpoint /profile
    $.ajax({
      url: '/profile-city',
      type: 'POST',
      data: { selectedTitle: selectedTitle },
      success: function(response) {
        console.log(response);
        $(".CityTes ul").html(response.content).show(); // Respons berhasil diterima dari server
        // $(".CityTes").remove();
        // $(".CityTes").hide();

      },
      error: function(xhr, status, error) {
        console.error('Terjadi kesalahan saat mengirim data.');
      }
    });
  

  });
  
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
            data: { shopnow: isiShopNow }
          });
        });
        
        $('.browsemore').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          $.ajax({
            type: "POST",
            url: "/shop",
            data: { shopnow: "" }
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
            data: { shopnow: isiShopNow }
          });
        });
        
        $('.browsemore').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          $.ajax({
            type: "POST",
            url: "/shop",
            data: { shopnow: "" }
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