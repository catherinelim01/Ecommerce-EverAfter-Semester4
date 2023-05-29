<?php


session_start();

// Menyimpan nilai filter ke dalam session saat filter dipilih
// if (isset($_GET['select2'])) {
//   $_SESSION['selected_category'] = $_GET['select2'];
// }

// if (isset($_GET['select3'])) {
//   $_SESSION['selected_size'] = $_GET['select3'];
// }

// if (isset($_GET['select4'])) {
//   $_SESSION['selected_price_range'] = $_GET['select4'];
// }

// Mendapatkan nilai filter dari session
$selected_category = $_SESSION['selected_category'] ?? '';
$selected_size = $_SESSION['selected_size'] ?? '';
$selected_price_range = $_SESSION['selected_price_range'] ?? '';
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
<script>
  window.addEventListener('load', function() {
    for (var i = 0; i < sessionStorage.length; i++) {
      var key = sessionStorage.key(i);
      var value = sessionStorage.getItem(key);
      if (key.startsWith('favorite-') && value == 'true') {
        var index = key.substring(9);
        var image = document.getElementById('favorite-' + index);
        image.src = "assets/images/logo/love-full1.png";
      }
    }
  });
</script>

<body class="full-wrapper">
  @csrf
  @include('header')
  <main>
    <!-- breadcrumb Start-->
    <div class="page-notification">
      <div class="container">
       
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- listing Area Start -->
    <div class="category-area">
      <!-- <div class="container"> -->
      <div class="row">
        <div class="col-xl-7 col-lg-8 col-md-10">
          <div class="section-tittle mb-50">
            <h2>Shop with us</h2>
            <?php

            use Illuminate\Support\Facades\DB;
            
            $totalProducts = DB::table('product')->select(DB::raw('COUNT(DISTINCT product_name) as total'))->first();
            if ($totalProducts) {
                echo '<p>Browse from ' . $totalProducts->total . ' latest items</p>';
            }
            
            ?>
          </div>
        </div>
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
         

            <form method="get" action="">
    <div class="select-job-items2">
        <select name="select2" onchange="this.form.submit()">
            <option value="">Category</option>
            <?php

            
            
            $categories = DB::table('category')->pluck('category_name');
            
            foreach ($categories as $category) {
                $selected = (isset($_GET['select2']) && $_GET['select2'] === $category) ? 'selected' : '';
                echo "<option value='$category' $selected>$category</option>";
            }
            
            ?>
        </select>
    </div>

    <div class="select-job-items2">
        <select name="select3" onchange="this.form.submit()">
            <option value="0">Type</option>
            <option value="S" <?php if(isset($_GET['select3']) && $_GET['select3'] === 'S') echo 'selected'; ?>>S</option>
            <option value="M" <?php if(isset($_GET['select3']) && $_GET['select3'] === 'M') echo 'selected'; ?>>M</option>
            <option value="L" <?php if(isset($_GET['select3']) && $_GET['select3'] === 'L') echo 'selected'; ?>>L</option>
            <option value="All Size" <?php if(isset($_GET['select3']) && $_GET['select3'] === 'All Size') echo 'selected'; ?>>All Size</option>
        </select>
    </div>


    <div class="select-job-items2">
  <select name="select4"onchange="this.form.submit()">
    <option value="">Price range</option>
    <?php

$prices = DB::table('product')
    ->select('product_price')
    ->distinct()
    ->orderBy('product_price', 'asc')
    ->get();

$previous_price = null;

foreach ($prices as $row) {
    $price = $row->product_price;

    if ($previous_price !== null) {
        $price_min = number_format($previous_price, 0, ",", ".");
        $price_max = number_format($price - 1, 0, ",", ".");
        $price_range = $price_min . '-' . $price_max;
        $selected = (isset($_GET['select4']) && $_GET['select4'] === $price_range) ? 'selected' : '';
        echo '<option value="' . $price_range . '" ' . $selected . '>';
        echo 'Rp' . $price_min . ' - Rp' . $price_max;
        echo '</option>';

        // Calculate number of intermediate price ranges
        $num_ranges = ($price - $previous_price - 1) / 100000;

        // Add intermediate price ranges
        for ($i = 1; $i <= $num_ranges; $i++) {
            $range_min = number_format($previous_price + ($i * 100000), 0, ",", ".");
            $range_max = number_format($previous_price + (($i + 1) * 100000) - 1, 0, ",", ".");
            $range = $range_min . '-' . $range_max;
            $selected = (isset($_GET['select4']) && $_GET['select4'] === $range) ? 'selected' : '';
            echo '<option value="' . $range . '" ' . $selected . '>';
            echo 'Rp' . $range_min . ' - Rp' . $range_max;
            echo '</option>';
        }
    }

    $previous_price = $price;
}

// Handle last price range
if ($previous_price !== null) {
    $price_min = number_format($previous_price, 0, ",", ".");
    $price_max = number_format($previous_price + 99999, 0, ",", ".");
    $price_range = $price_min . '-' . $price_max;
    $selected = (isset($_GET['select4']) && $_GET['select4'] === $price_range) ? 'selected' : '';
    echo '<option value="' . $price_range . '" ' . $selected . '>';
    echo 'Rp' . $price_min . ' - Rp' . $price_max;
    echo '</option>';
}

    ?>
  </select>
</div>










</form>






         
             
            </form>
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
        
          <?php
          $limit = 15;
          $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          $offset = ($current_page - 1) * $limit;
          
          if (!session()->has('shop_now')) {
              session()->put('shop_now', "");
          }
          
          if (session()->get('shop_now') == "") {
              $selected_category = request()->get('select2') ?? '';
              $selected_size = request()->get('select3') ?? '';
              $selected_price_range = request()->get('select4') ?? '';
              $price_range = explode('-', $selected_price_range);
              $price_min = str_replace(['Rp', '.'], '', $price_range[0]);
              $price_max = str_replace(['Rp', '.'], '', $price_range[0]);
          
              if (empty($selected_category) && empty($selected_size) && empty($selected_price_range)) {
                  $total_products = DB::table('product')->distinct('product_name')->count();
                  $results = DB::table('product')->distinct('product_name')
                      ->select('product_name', 'product_price', 'product_url', 'product_detail')
                      ->limit($limit)
                      ->offset($offset)
                      ->get();
              } else {
                  $query = DB::table('product')->distinct('product_name');
          
                  if (!empty($selected_category)) {
                      $category_id = DB::table('category')
                          ->where('category_name', $selected_category)
                          ->value('category_id');
                      $query->where('category_id', $category_id);
                  }
          
                  if (!empty($selected_size)) {
                      if ($selected_size == "All Size") {
                          $query->whereRaw("SUBSTR(product_id, 5, 1) = '0'");
                      } else {
                          $query->whereRaw("SUBSTR(product_id, 5, 1) LIKE '$selected_size%'");
                      }
                  }
          
                  if (!empty($selected_price_range)) {
                      $query->whereBetween('product_price', [$price_min, $price_max]);
                  }
          
                  $total_products = $query->count();
                  $results = $query->select('product_name', 'product_price', 'product_url', 'product_detail')
                      ->limit($limit)
                      ->offset($offset)
                      ->get();
              }
          } else {
              $selected_category = session()->get('shop_now');
              $selected_size = request()->get('select3') ?? '';
              $selected_price_range = request()->get('select4') ?? '';
              $category_id = DB::table('category')
                  ->where('category_name', $selected_category)
                  ->value('category_id');
          
              $query = DB::table('product')->distinct('product_name')->where('category_id', $category_id);
          
              if (!empty($selected_size)) {
                  if ($selected_size == "All Size") {
                      $query->whereRaw("SUBSTR(product_id, 5, 1) = '0'");
                  } else {
                      $query->whereRaw("SUBSTR(product_id, 5, 1) LIKE '$selected_size%'");
                  }
              }
          
              if (!empty($selected_price_range)) {
                  $price_range = explode('-', $selected_price_range);
                  $price_min = str_replace(['Rp', '.'], '', $price_range[0]);
                  $price_max = str_replace(['Rp', '.'], '', $price_range[1]);
                  $query->whereBetween('product_price', [$price_min, $price_max]);
              }
          
              $total_products = $query->count();
              $results = $query->select('product_name', 'product_price', 'product_url', 'product_detail')
                  ->limit($limit)
                  ->offset($offset)
                  ->get();
          }
          
          if ($results->count() > 0) {
              echo '<div class="row">';
              foreach ($results as $i => $row) {
                  $product_name = $row->product_name;
                  $product_price = $row->product_price;
                  $product_url = $row->product_url;
                  $product_detail = $row->product_detail;
                  ?>
          
                  <div class="col-md-4">
                      <div class="single-new-arrival mb-50 text-center">
                          <div class="popular-img">
                              <img src="{{ $product_url }}" alt="">
                              <div class="favorit-items">
                                  <img src="assets/images/logo/love.png" alt="" class="favorite" id="favorite-{{ $i }}" onclick="toggleImage(this)">
                              </div>
                          </div>
                          <div class="popular-caption">
                            
                            <h3><a href="{{ url('product_details') }}">{{ $product_name }}</a></h3>

                          
                            <span>Rp. {{ number_format($product_price, 0, ',', '.') }}</span>
                            <div id="product-info"></div>
                        </div>
                        
                      </div>
                      <script>
                          function toggleImage(elem) {
                              var image = elem;
                              var index = image.id.substring(9);
                              var favoriteStatus = sessionStorage.getItem("favorite-" + index);
                              if (favoriteStatus == "true") {
                                  sessionStorage.setItem("favorite-" + index, "false");
                                  image.src = "assets/images/logo/love.png";
                              } else {
                                  sessionStorage.setItem("favorite-" + index, "true");
                                  image.src = "assets/images/logo/love-full1.png";
                                  var product_name = elem.closest(".popular-caption").querySelector("h3").innerText;
                                  var product_id_query = "SELECT PRODUCT_ID FROM product WHERE PRODUCT_NAME = '" + product_name + "'";
                                  $.ajax({
                                      url: "insert_wishlist.php",
                                      type: "POST",
                                      data: { product_id_query: product_id_query },
                                      success: function(data) {
                                          console.log(data);
                                      }
                                  });
                              }
                          }
                      </script>
                  </div>
                  
                  <?php
                  if (($i + 1) % 3 == 0) {
                      echo '</div><div class="row">';
                  }
              }
              echo '</div>';
          } else {
              echo "No product found";
          }
          
          $total_pages = ceil($total_products / $limit);
          ?>
          
          <!-- HTML -->
          <div class="col-xl-9 col-lg-9 col-md-8 offset-md-1">
              <!-- HTML -->
              <div class="row justify-content-center" style="margin-bottom: 15px;">
                  <div class="room-btn mt-20">
                      <?php if ($current_page > 1): ?>
                          <a style="padding-top: 2px;color:black;" href="{{ route('shop', ['page' => ($current_page - 1)]) }}" class="page-btn"><i class="fas fa-chevron-left"></i></a>
                      <?php endif; ?>
          
                      <?php if ($results->count() > 0): ?>
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
                                      <a href="{{ route('shop', ['page' => $i]) }}" class="page-btn">{{ $i }}</a>
                                  <?php endif; ?>
                              <?php endfor; ?>
                          </div>
                      <?php endif; ?>
          
                      <?php if ($current_page < $total_pages): ?>
                          <a style="padding-top: 5px;color:black;" href="{{ route('shop', ['page' => ($current_page + 1)]) }}" class="page-btn"><i class="fas fa-chevron-right"></i></a>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
          
        </div>
          
          

              <!-- CSS -->
              <style>
                .room-btn {
                    display: flex;
                    justify-content: flex-end;
                    align-items: flex-start;
                    margin-top: 5px;
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

                .page-numbers .current-page {
                    background-color: #333; /* Tambahkan atribut background-color */
                    color: #fff;
                    border-radius: 5px;
                    padding: 5px 10px;
                }

              </style>
           


            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Button -->
    <!-- <div class="row justify-content-center">
    <div class="room-btn mt-20">
        <a href="catagori.html" class="border-btn">Browse More</a>
    </div>
</div>
</div> -->
    <!--? New Arrival End -->

    <!-- listing-area Area End -->
    <!--? Popular Items Start -->
    <!-- <div class="popular-items">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <img src="assets/img/gallery/popular1.png" alt="">
                        <div class="img-cap">
                            <span>Glasses</span>
                        </div>
                        <div class="favorit-items">
                            <a href="shop.html" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <img src="assets/img/gallery/popular2.png" alt="">
                        <div class="img-cap">
                            <span>Watches</span>
                        </div>
                        <div class="favorit-items">
                         <a href="shop.html" class="btn">Shop Now</a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-popular-items mb-50 text-center">
                <div class="popular-img">
                    <img src="assets/img/gallery/popular3.png" alt="">
                    <div class="img-cap">
                        <span>Jackets</span>
                    </div>
                    <div class="favorit-items">
                     <a href="shop.html" class="btn">Shop Now</a>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-popular-items mb-50 text-center">
            <div class="popular-img">
                <img src="assets/img/gallery/popular4.png" alt="">
                <div class="img-cap">
                    <span>Clothes</span>
                </div>
                <div class="favorit-items">
                 <a href="shop.html" class="btn">Shop Now</a>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
</div> -->
    <!-- Popular Items End -->
    <!--? Services Area Start -->
    <div class="categories-area section-padding40 gray-bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="cat-icon">
                <img src="assets/img/icon/services1.svg" alt="" />
              </div>
              <div class="cat-cap">
                <p>Fast Delivery</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="cat-icon">
                <img src="assets/img/icon/services2.svg" alt="" />
              </div>
              <div class="cat-cap">
                <p>Secure Payment</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
              <div class="cat-icon">
                <img src="assets/img/icon/services3.svg" alt="" />
              </div>
              <div class="cat-cap">
                <p>Special Offers</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-cat wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
              <div class="cat-icon">
                <img src="assets/img/icon/services4.svg" alt="" />
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
                  <a href="index.html"><img src="assets/images/logo/logo_putih.png" alt="" /></a>
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
                  <a href="https://instagram.com/"><svg class="change-my-color" xmlns="http://www.w3.org/2000/svg" width=18px viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                      <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
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
  <!--? Search model Begin -->
  <div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-btn">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Searching key.....">
      </form>
    </div>
  </div>
  <!-- Search model end -->
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

    $('.footer-tittle.categ ul li a').click(function() {
      // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
      let isiShopNow = $(this).text();
      $.ajax({
        type: "POST",
        url: "linksess.php",
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
        url: "linksess.php",
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
</body>

</html>