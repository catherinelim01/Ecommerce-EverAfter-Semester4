<?php
// if (isset($_POST['wishlist_id']) && isset($_POST['product_id'])) {
//     $wishlist_id = $_POST['wishlist_id'];
//     $product_id = $_POST['product_id'];

//     // Lakukan operasi yang diinginkan dengan wishlist_id dan product_id, misalnya menyimpannya ke database

//     echo 'Data berhasil disimpan.'; // Ganti pesan konfirmasi dengan yang sesuai
// }
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ever After | Fashion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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
    @csrf
    <!-- header -->
    @include('header')
    <main>
        <!-- breadcrumb Start-->
        <div class="page-notification">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Wishlist</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- halo -->
        <!-- listing Area Start -->
        <div class="category-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-50">
                            <h2>Wishlist</h2>
                            <?php
                            $count =
                                "SELECT COUNT(DISTINCT product_name) AS total  
                                                                                              FROM product 
                                                                                              WHERE product_id IN (SELECT product_id 
                                                                                                                   FROM wishlist_product wp 
                                                                                                                   LEFT JOIN wishlist w ON w.wishlist_id = wp.wishlist_id 
                                                                                                                   WHERE customer_id = '" .
                                session('customer_id') .
                                "')";
                            $count = DB::select($count);
                            $total = $count[0]->total;
                            echo '<p>Browse from ' . $total . ' wishlist</p>';
                            
                            session(['total_wishlist' => $total]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--? Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4 ">
                        <!-- Job Category Listing start -->
                        <div class="category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <!-- Select City items start -->
                                <div class="select-job-items2">
                                    <select name="select2" onchange="filterByCategory(this.value)">
                                        <option value="">Category</option>
                                        @php
                                            $categories = DB::table('category')
                                                ->select('category_name')
                                                ->get();
                                            foreach ($categories as $category) {
                                                echo '<option value="' . $category->category_name . '">' . $category->category_name . '</option>';
                                            }
                                        @endphp
                                    </select>
                                </div>

                                
                                <!-- </form> -->

                                <!--  Select City items End-->
                                <!-- Select State items start -->

                                <div class="select-job-items2">
                                    <select name="select3">
                                        <option value="">Type</option>
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                        <option value="">All Size</option>
                                    </select>
                                </div>

                                <!-- Select km items start -->

                                <div class="select-job-items2">
                                    <select name="select6">
                                        <option value="">Price range</option>
                                        @php
                                            $prices = DB::table('product')
                                                ->distinct()
                                                ->orderBy('product_price', 'asc')
                                                ->pluck('product_price');
                                        @endphp

                                        @php
                                            $priceIncrement = 50000; // Nilai penambahan harga untuk setiap range
                                            $priceStart = 0; // Harga awal
                                            $priceEnd = $priceStart + ($priceIncrement - 1); // Harga akhir untuk setiap range
                                            foreach ($prices as $price) {
                                                $price_min = number_format($priceStart, 0, ',', '.');
                                                $price_max = number_format($priceEnd, 0, ',', '.');
                                                $priceRange = 'Rp' . $price_min . ' - Rp' . $price_max;
                                                echo '<option value="' . $priceStart . '-' . $priceEnd . '">' . $priceRange . '</option>';
                                            
                                                // Mengupdate harga awal dan harga akhir untuk range berikutnya
                                                $priceStart += $priceIncrement;
                                                $priceEnd += $priceIncrement;
                                            
                                                // Batasi harga maksimal menjadi 1.000.000
                                                if ($priceEnd >= 1000000) {
                                                    break;
                                                }
                                            }
                                        @endphp
                                    </select>
                                </div>


                                <!--  Select km items End-->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!--?  Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8 ">
                        <!--? New Arrival Start -->
                        <!-- PRODUCT -->
                        <div class="new-arrival new-arrival2">
                            <div class="row">

                                @include ('pagination1')

                                <!-- HTML -->
                                <div class="col-xl-9 col-lg-9 col-md-8 offset-md-1 ">
                                    <!-- HTML -->
                                    <br>
                                    <div class="row justify-content-center" style="padding-bottom:20px;">
                                        <div class="room-btn mt-20">
                                            <?php
                                            
                                            $limit = 15;
                                            
                                            // Hitung jumlah total produk
                                            $sql =
                                                "SELECT COUNT(DISTINCT product_name) AS total  
                                                                                                                              FROM product 
                                                                                                                              WHERE product_id IN (SELECT product_id 
                                                                                                                                                   FROM wishlist_product wp 
                                                                                                                                                   LEFT JOIN wishlist w ON w.wishlist_id = wp.wishlist_id 
                                                                                                                                                   WHERE customer_id = '" .
                                                session('customer_id') .
                                                "')";
                                            $result = DB::select($sql);
                                            
                                            if (count($result) > 0) {
                                                $response = [];
                                                foreach ($result as $row) {
                                                    $dt = new stdClass();
                                                    $dt->total = $row->total;
                                                    $response[] = $dt;
                                                }
                                                $hasil_json = json_encode($response);
                                                $data = json_decode($hasil_json, true);
                                            }
                                            // Hitung jumlah halaman yang dibutuhkan
                                            $total_pages = ceil($data[0]['total'] / $limit);
                                            
                                            // Tentukan halaman saat ini
                                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                            
                                            // Hitung offset
                                            $offset = ($current_page - 1) * $limit; ?>


                                            <?php if ($current_page > 1): ?>
                                            <a style="padding-top: 2px;color:black;"
                                                href="{{ route('wishlist', ['page' => $current_page - 1]) }}"
                                                class="page-btn"><i class="fas fa-chevron-left"></i></a>
                                            <?php endif; ?>

                                            <?php if ($data[0]["total"] > 0): ?>
                                            <div class="page-numbers">
                                                <?php
                                                $max_pages = 5;
                                                $start_page = max($current_page - 2, 1);
                                                $end_page = min($current_page + 2, $total_pages);
                                                ?>

                                                <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                                                <?php if ($i == $current_page): ?>
                                                <a href="#" class="page-btn current-page">{{ $i }}</a>
                                                <?php else: ?>
                                                <a href="{{ route('wishlist', ['page' => $i]) }}"
                                                    class="page-btn">{{ $i }}</a>

                                                <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>
                                            <?php endif; ?>


                                            <?php if ($current_page < $total_pages): ?>
                                            <a style="padding-top: 5px;color:black;"
                                                href="{{ route('wishlist', ['page' => $current_page + 1]) }}"
                                                class="page-btn"><i class="fas fa-chevron-right"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- CSS -->
                                    <style>
                                        .room-btn {
                                            display: flex;
                                            justify-content: flex-end;
                                            align-items: center;
                                            margin-top: 20px;
                                        }

                                        .page-btn {
                                            background-color: transparent;
                                            border: none;
                                            color: #333;
                                            font-weight: bold;
                                            text-decoration: none;
                                            margin-left: 10px;
                                        }

                                        .page-numbers {
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                        }

                                        .page-numbers a {
                                            background-color: transparent;
                                            border: none;
                                            color: #333;
                                            font-weight: bold;
                                            text-decoration: none;
                                            margin: 0 5px;
                                            padding: 5px 10px;
                                            border-radius: 5px;
                                        }

                                        .page-numbers a:hover {
                                            background-color: #333;
                                            color: #fff;
                                        }

                                        .page-numbers .current {
                                            background-color: #333;
                                            color: #fff;
                                            border-radius: 5px;
                                            padding: 5px 10px;
                                        }
                                    </style>
                                    <!-- cart -->
                                    <div class="cart-container-login geser">
                                        <!-- {{-- @if (session('customer_id'))
      @php
          $loginTime = session('login_time');
          $currentTime = time();
          $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
      @endphp
  
      @if ($remainingTime > 0)
          <a href="/profile">
      @else
          <a href="#">
      @endif
          <div class="user mx-3" style="cursor:pointer;">
              <img src="{{ asset('assets/images/logo/person.svg') }}" alt="" />
          </div>
      </a>
  @endif --}} -->


                                        <a class="close login" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="30" height="32" fill="currentColor" class="bi bi-x"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg></a>

                                        <div class="row formlogin ">
                                            <div class="col-12 isilogin">
                                                <div class="cart-header login">
                                                    <h2>Log in</h2>
                                                </div>
                                                <form class="formlogin" action="{{ route('login') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group mt-20">
                                                        <input type="email" class="form-control"
                                                            name="customer_email" required
                                                            placeholder="Username or email address *"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group mt-20">
                                                        <input type="password" class="form-control"
                                                            name="customer_password" required placeholder="Password *"
                                                            id="inputPassword">
                                                    </div>
                                                    <!-- Tambahkan elemen lain yang diperlukan untuk form login -->
                                                    <button type="submit" class="btn btn-primary mt-10 login">LOG
                                                        IN</button>
                                                    <p class="signuphere mt-3">Don't have an account? <a
                                                            href="/login"><u>Sign Up</u></a> Here</p>
                                                </form>

                                            </div>
                                            <div class="col-12 isisignup">
                                                <div class="cart-header login">
                                                    <h2>Sign Up</h2>
                                                </div>
                                                <form class="formsignup" action="{{ route('register') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group mt-20 regis">
                                                        <label for="inputEmailRegis">Name *</label>
                                                        <input type="text" class="form-control"
                                                            id="inputNameRegis" name="customer_name" required
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group mt-10 regis">
                                                        <label for="inputEmailRegis">Email address *</label>
                                                        <input type="email" class="form-control"
                                                            id="inputEmailRegis" name="customer_email" required
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group mt-10 regis">
                                                        <label for="inputPasswordRegis">Password *</label>
                                                        <input type="password" class="form-control"
                                                            id="inputPasswordRegis" name="customer_password" required>
                                                    </div>
                                                    <small id="info" class="form-text">By providing your personal
                                                        information, you allow us to enhance your shopping experience
                                                        and securely manage your account.</small>
                                                    <button type="submit"
                                                        class="btn btn-primary login mt-10">REGISTER</button>
                                                    <a href="/registration" class="backlogin mt-3"><u>Back to
                                                            Login</u></a>
                                                </form>
                                            </div>

                                            <!-- cart login end -->

                                            <!-- cart -->
                                            <div class="cart-container">
                                                <a class="close cart" href="#"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="30"
                                                        height="32" fill="currentColor" class="bi bi-x"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
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
                                                            <h3><?php echo $data[$i]['PRODUCT_NAME']; ?></h3>
                                                            <p>Price: IDR <?php echo $data[$i]['PRODUCT_PRICE']; ?></p>
                                                            <p>Size: <?php echo $data[$i]['size']; ?></p>
                                                            <div style="display: flex; align-items: center;">
                                                                <p style="margin-right: 10px; ">Quantity:</p>
                                                                <input type="number" name="quantity" min="1"
                                                                    max="10" value="1"
                                                                    class="form-control quantityInput"
                                                                    data-subtotal-id="subtotal<?php echo $i; ?>"
                                                                    style="width: 60px; height: 24px;">
                                                            </div>

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

                                                            <td>
                                                                <h3>SUBTOTAL: </h3>
                                                            </td>
                                                            <td>
                                                                <h3>IDR <?php echo $data[0]['subtotal']; ?></h3>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        <!-- <tr class="total">
            <td>Total:</td>
            <td>IDR 260,000</td> -->
                                                        </tr>
                                                    </table>
                                                </div>


                                                <div class="cart-actions">
                                                    <a href="{{ url('cart') }}"><button
                                                            class="checkout-btn">CHECKOUT</button></a>
                                                    <a href="/shop"><button class="continue-shopping">CONTINUE
                                                            SHOPPING</button></a>
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
                                    <a href="{{ url('index') }}"><img src="assets/images/logo/logo_putih.png"
                                            alt="" /></a>
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
                                    <a href="https://instagram.com/"><svg class="change-my-color"
                                            xmlns="http://www.w3.org/2000/svg" width=18px viewBox="0 0 448 512">
                                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                        </svg></a>
                                    <a href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="foot row">
                        <div class="col-lg-12 footcat">
                            <h4>Shop Category</h4>
                        </div>

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
                                    <li><a href="https://wa.me/6281217641707/" target="_blank">(+62) 812-1764-1707</a>
                                    </li>
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
    @if (session('customer_id'))
        @php
            $loginTime = session('login_time');
            $currentTime = time();
            $remainingTime = $loginTime + 5 * 60 * 60 - $currentTime;
        @endphp

        @if ($remainingTime > 0)
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
                            if ($('.logocart-login').hasClass('active')) {
                                full.style.overflow = 'hidden';
                            }
                        });
                    } else if (window.innerWidth < 415) { // media query condition
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
                            if ($('.logocart-login').hasClass('active')) {
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
                // Mengambil token CSRF dari meta tag
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let csrfToken = $('meta[name="csrf-token"]').attr('content');

                $('h3 a').click(function(event) {
                    let isiLink = $(this).text();

                    // Mengirim permintaan AJAX dengan token CSRF
                    $.ajax({
                        method: "POST",
                        url: "/product_details",
                        data: {
                            _token: csrfToken, // Menyertakan token CSRF dalam data permintaan
                            link: isiLink
                        },
                        success: function(response) {
                            // Menampilkan div dengan hasil respons di dalamnya
                            console.log(response);
                        },

                    });
                });

                $('.footer-tittle.categ ul li a').click(function() {
                    // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
                    let isiShopNow = $(this).text();
                    $.ajax({
                        type: "POST",
                        url: "/shop",
                        data: {
                            shopnow: isiShopNow
                        },
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
                        data: {
                            shopnow: ""
                        },
                        success: function() {
                            console.log("Data berhasil dikirim ke PHP yyyyyyyyyyyyyy");
                        }
                    });
                });


                function updateSelectedText() {
                    var select3 = document.getElementsByName('select3')[0];
                    var selectedText = select3.options[select3.selectedIndex].text;
                    var selectedTextElement = document.getElementById('selected-text');
                    selectedTextElement.textContent = selectedText;
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
                login.style.display = "block";

            });

            signuphere.addEventListener('click', function(event) {
                event.preventDefault();
                isiSignup.style.display = 'block';
                login.style.display = "none";

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
                        login.style.display = "block";
                        full.style.overflow = 'visible';
                    });
                } else if (window.innerWidth < 415) { // media query condition
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
                        login.style.display = "block";
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
                        login.style.display = "block";
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
            // Mengambil token CSRF dari meta tag
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('h3 a').click(function(event) {
                let isiLink = $(this).text();

                // Mengirim permintaan AJAX dengan token CSRF
                $.ajax({
                    method: "POST",
                    url: "/product_details",
                    data: {
                        _token: csrfToken, // Menyertakan token CSRF dalam data permintaan
                        link: isiLink
                    },
                    success: function(response) {
                        // Menampilkan div dengan hasil respons di dalamnya
                        console.log(response);
                    },

                });
            });


            $('.footer-tittle.categ ul li a').click(function() {
                // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
                let isiShopNow = $(this).text();
                $.ajax({
                    type: "POST",
                    url: "/shop",
                    data: {
                        shopnow: isiShopNow
                    },
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
                    data: {
                        shopnow: ""
                    },
                    success: function() {
                        console.log("Data berhasil dikirim ke PHP yyyyyyyyyyyyyy");
                    }
                });
            });


            function updateSelectedText() {
                var select3 = document.getElementsByName('select3')[0];
                var selectedText = select3.options[select3.selectedIndex].text;
                var selectedTextElement = document.getElementById('selected-text');
                selectedTextElement.textContent = selectedText;
            }
        </script>
    @endif
</body>

</html>
