<?php
if (isset($_POST['voucherCode'])) {
  echo session('voucherCode');
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ever After | Fashion</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="manifest" href="site.webmanifest" />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/favicon.ico"
    />
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

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
    @csrf
    @include('header')
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
          <?php
          $sql="SELECT FORMAT((p.PRODUCT_PRICE * '" . session('value') . "'),0) AS SUBTOTAL, p.PRODUCT_NAME, FORMAT(p.PRODUCT_PRICE,0) AS PRODUCT_PRICE, p.PRODUCT_URL, IF(substr(p.PRODUCT_ID, 5, 1) = '0', 'All Size', IF(substr(p.PRODUCT_ID, 5, 1) = 'S', 'S', IF(substr(p.PRODUCT_ID, 5, 1) = 'M', 'M', 'L'))) AS size FROM PRODUCT p JOIN PRODUCT_CART pc ON p.PRODUCT_ID = pc.PRODUCT_ID JOIN `CART` c ON c.CART_ID = pc.CART_ID JOIN customer cu ON cu.CUSTOMER_ID = c.CUSTOMER_ID WHERE cu.CUSTOMER_ID = '" . session('customer_id') . "';";
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
                
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
            for($i = 0; $i < count($data); $i++) { 
              ?>
        <div class="row">
            <div class="col-5  col-sm-4 col-md-3 isicart">
                <br>
                <!-- Place your cart items here -->
                <div class="card cardcart">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <!-- Item image -->
                                <img src="<?php echo $data[$i]['PRODUCT_URL']; ?>" alt="Item 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 col-sm-4 col-md-3 isicart">
                <br><br>    
                <h4><?php echo $data[$i]["PRODUCT_NAME"]; ?></h4>
                <!-- Item size and price -->
                <br><br>
                <p>Size: <?php echo $data[$i]["size"]; ?></p>
                <p class="price">Price: IDR <?php echo $data[$i]["PRODUCT_PRICE"]; ?></p>
            </div>

            <div class="col-2 isicart">
                <br><br>
                <!-- Item price and quantity -->
                <div class="input-group">
                    <span class="input-group-btn">
                        <!-- <button type="button" class="btn btn-secondary" id="decrementBtn">-</button> -->
                    </span>
                    <input type="number"name="quantity" min="1" max="10" value="1" class="form-control quantityInput" data-subtotal-id="subtotal<?php echo $i?>">
                    <span class="input-group-btn">
                        <!-- <button type="button" class="btn btn-secondary" id="incrementBtn">+</button> -->
                    </span>
                </div>
            </div>

            <div class="col-2 isicart">
                <br><br>
                <p id="subtotal<?php echo $i?>">IDR</p>
            </div>
            
        </div>

        <?php } ?>
    <?php } ?>
    </div>
    <div class="isitabelsummary col-12 col-lg-3 mt-5">
  <h5>ORDER SUMMARY</h5>
  <div class="card">
    <div class="card-body">
      <table class="summarytable">
      <?php 
    $sql="SELECT VOUCHER_NAME FROM VOUCHER";
    $result= DB::select($sql);
    $potongan = null;
    if (count($result) > 0) {
      $response = [];
      foreach ($result as $row) {
          $dt = new stdClass();
          $dt->VOUCHER_NAME = $row->VOUCHER_NAME;
          
          $response[] = $dt;
      }
      
      $hasil_json=json_encode($response);
      $data = json_decode($hasil_json,true);
      for($i = 0; $i < count($data); $i++) { 
        if(session('voucherCode') && $data[$i]['VOUCHER_NAME'] == session('voucherCode')){
          $potongan = session('voucherCode');
          
        }
      }}
        ?>
      <?php
        if(session('voucherCode')){
          $sql="SELECT format(o.grand_total,0) as grand_total, FORMAT((o.grand_total ) * ((select voucher.DISCOUNT from voucher where voucher_name = '" . $potongan . "')/100), 0) AS total_potongan, format(convert((5/100)*o.GRAND_TOTAL,int),0) as pajak, format(d.delivery_cost,0) as delivery_cost ,format((o.grand_total - o.total_potongan + convert((5/100)*o.GRAND_TOTAL,int) +d.delivery_cost),0) as total
          from `order` o left join product_order po on o.order_id = po.order_id left join product p on po.product_id = p.product_id left join delivery d on d.delivery_id = o.delivery_id left join address a on a.CUSTOMER_ID = o.CUSTOMER_ID left join category ca on ca.CATEGORY_ID = p.CATEGORY_ID left join payment pa on pa.payment_id = o.payment_id where o.customer_id  = '" . session('customer_id') . "'  order by o.order_id desc;";
          }else{
            $sql="SELECT format(o.grand_total,0) as grand_total, format(o.total_potongan,0) as total_potongan ,format(convert((5/100)*o.GRAND_TOTAL,int),0) as pajak, format(d.delivery_cost,0) as delivery_cost ,format((o.grand_total - o.total_potongan + convert((5/100)*o.GRAND_TOTAL,int) +d.delivery_cost),0) as total
          from `order` o left join product_order po on o.order_id = po.order_id left join product p on po.product_id = p.product_id left join delivery d on d.delivery_id = o.delivery_id left join address a on a.CUSTOMER_ID = o.CUSTOMER_ID left join category ca on ca.CATEGORY_ID = p.CATEGORY_ID left join payment pa on pa.payment_id = o.payment_id where o.customer_id  = '" . session('customer_id') . "' order by o.order_id desc;";
          }
          
          $result= DB::select($sql);
        
          if (count($result) > 0) {
            $response = [];
            foreach ($result as $row) {
                $dt = new stdClass();
                $dt->grand_total = $row->grand_total;
                $dt->total_potongan = $row->total_potongan;
                $dt->pajak = $row->pajak;
                $dt->delivery_cost = $row->delivery_cost;
                $dt->total = $row->total;
                
                
                $response[] = $dt;
            }
            
            $hasil_json=json_encode($response);
            $data = json_decode($hasil_json,true);
          
              ?>
      
 


      <tr>
          <td>Subtotal</td>
          <td class="text-right">IDR <?php echo $data[0]["grand_total"]; ?></td>
        </tr>
        <tr>
          <td>Tax(5%)</td>
          <td class="text-right">+ IDR <?php echo $data[0]["pajak"]; ?></td>
        </tr>
        <tr>
    <td>
        Promo Code
        <br>

        <form action="">
        <div class="input-group mb-3">
          <input type="text" class="form-control vocer" placeholder="Enter Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append pl-0">
            <td class="pl-0"><button class="btn apply text-right apply" type="submit">Apply</button></td>
            <TR>
            <td class="pl-0 isivocer text-right"><p><?php echo (session('voucherCode')) ? '-IDR ' . $data[0]["total_potongan"] : 'N/A'; ?></p></td>
            

            </TR>
          </div>
        </div>
          </form>

          
    </td>
</tr>


        <tr>
        <tr>
  

</tr>

        
        <tr>
          <td colspan="2"><hr></td>
        </tr>
        <tr>
          <td>Shipping</td>
          <td class="text-right">+ IDR 10,000</td>
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
<?php } ?>

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
    @php
    $customerId = session('customer_id');

    $addresses = \App\Models\Address::join('customer AS cu', 'address.customer_id', '=', 'cu.customer_id')
        ->select('cu.customer_name', 'address.address', 'address.phone')
        ->where('cu.customer_id', $customerId)
        ->get();
    @endphp

    @foreach ($addresses as $address)
    <p>{{ $address->customer_name }}</p>
    <p>{{ $address->address }}</p>
    <p>{{ $address->phone }}</p>
    @endforeach

    @if ($addresses->isEmpty())
    <p>Tidak ada data alamat yang ditemukan.</p>
    @endif
</div>


            </div>
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

    @if(session('customer_id'))
@php
    $loginTime = session('login_time');
    $currentTime = time();
    $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
@endphp

@if($remainingTime > 0)
<script>
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
    $(".quantityInput").on("input", function() {
      let harga = $(this).closest(".isicart").prev().find(".price").text();
      let quantity = $(this).val();
      let substr = harga.substring(10); // Menghapus "IDR " dari substring
      let parsedInt = parseInt(substr.replace(",", ""), 10); // Menghapus koma dan mengonversi ke integer
      console.log(harga);
      // Menghitung subtotal berdasarkan quantity dan price
      let subtotal = quantity * parsedInt;

      // Mengubah teks pada elemen subtotal yang sesuai
      let subtotalId = $(this).data("subtotal-id");
      $("#" + subtotalId).text("IDR " + subtotal);
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
</script>

@endif
@else
    <script>
        $(document).ready(function() {
        $(".quantityInput").on("input", function() {
          let harga = $(this).closest(".isicart").prev().find(".price").text();
          let quantity = $(this).val();
          let substr = harga.substring(10); // Menghapus "IDR " dari substring
          let parsedInt = parseInt(substr.replace(",", ""), 10); // Menghapus koma dan mengonversi ke integer
          console.log(harga);
          // Menghitung subtotal berdasarkan quantity dan price
          let subtotal = quantity * parsedInt;

          // Mengubah teks pada elemen subtotal yang sesuai
          let subtotalId = $(this).data("subtotal-id");
          $("#" + subtotalId).text("IDR " + subtotal);
        });
      });
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

  </script>
  @endif
  </body>
</html>