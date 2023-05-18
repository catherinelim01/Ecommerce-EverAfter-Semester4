<?php
  session_start();
  
  if (isset($_POST['link'])) {
    $link = $_POST['link'];
    $_SESSION['link_tes'] = $link;
    
    echo 'Data berhasil disimpan ke session.';


//   }
//   if (isset($_SESSION['link_tes'])) {
//     echo  $_SESSION['link_tes'];
//   } else {
//     echo 'Belum yang disimpan di session.';
  }
  elseif (isset($_POST['relatedproduct'])) {
    $relatedproduct = $_POST['relatedproduct'];
    $_SESSION['related_product'] = $relatedproduct;
}

  
  // session_unset();
?>


<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ever After | Fashion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body class="full-wrapper">
<?php require('header.php'); ?>
    <main>
        <!-- breadcrumb Start-->
        <div class="page-notification">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">shop</a></li> 
                                <li class="breadcrumb-item"><a href="#">Product Details</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End-->
        <!--?  Details start -->
        <div class="new-arrival new-arrival2">
        <?php
        include 'connection.php';
        if (isset($_SESSION['link_tes'] )) {
          $sql = "SELECT DISTINCT product_name, product_id, product_price, product_url, product_detail, category_id FROM product WHERE product_id = (select product_id from product where product_name LIKE '%".$_SESSION['link_tes']."%' limit 1);";
          $sql2 = "SELECT DISTINCT product_id FROM product WHERE product_name  LIKE '%".$_SESSION['link_tes']."%' order by product_id desc";
          
          // $_SESSION['link_tes']="";
        }
        
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_name = $row['product_name'];
                $category_id = $row['category_id'];
                $product_price = $row['product_price'];
                $product_url = $row['product_url'];
                $product_detail = $row['product_detail'];
        ?>
                <!-- informasi produk di sini -->
                <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-30">
                    <div class="map">
                        <img src="<?php echo $product_url; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="small-tittle">
                    <div class="section-tittle mb-10 " >
                        <h2 style="font-size: 50px;"><?php echo $product_name; ?></h2>
                      </div>
                        <h1>Rp <?php echo number_format($product_price, 0, ',', '.'); ?></h1>
                        <?php 
    echo 'Size: '; 
    if ($result2->num_rows > 0) {
        echo '<div class="button-group">';
        while ($row = $result2->fetch_assoc()) {
            $product_id = $row['product_id'];
            $size = substr($product_id, 4, 1);
            if ($size == '0') {
                echo 'All Size';
            } else {
                if (strpos($product_id, 'L') !== false) {
                    echo '<button class="button-17" role="button">L</button>';
                }
                if (strpos($product_id, 'M') !== false) {
                    echo '<button class="button-17" role="button">M</button>';
                } 
                if (strpos($product_id, 'S') !== false) {
                    echo '<button class="button-17" role="button">S</button>';
                } 
            }
        }
        echo '</div>';
    }
?>

                          <style>
                          .button-17 {
                            align-items: center;
                            appearance: none;
                            background-color: #fff;
                            border-radius: 24px;
                            border-style: none;
                            box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
                            box-sizing: border-box;
                            color: #3c4043;
                            cursor: pointer;
                            display: inline-block;
                            fill: currentcolor;
                            font-family: "Google Sans",Roboto,Arial,sans-serif;
                            font-size: 14px;
                            font-weight: 500;
                            height: 35px;
                            justify-content: center;
                            letter-spacing: .25px;
                            line-height: normal;
                            max-width: 100%;
                            overflow: visible;
                            padding: 2px 24px;
                            margin-right: 10px;
                            position: relative;
                            text-align: center;
                            text-transform: none;
                            transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
                            user-select: none;
                            -webkit-user-select: none;
                            touch-action: manipulation;
                            width: auto;
                            will-change: transform,opacity;
                            z-index: 0;
                          }

                          .button-17:hover {
                            border: 2px solid #eea2a2;
                            
                            
                          }

                          .button-17:active {
                            box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
                            outline: none;
                          }

                          .button-17:focus {
                            outline: none;
                            background: #eea2a2;
                            color: white;
                          }

                          .button-17:not(:disabled) {
                            box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
                          }

                          .button-17:not(:disabled):hover {
                            box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
                          }

                          .button-17:not(:disabled):focus {
                            box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
                          }

                          .button-17:not(:disabled):active {
                            box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
                          }

                          .button-17:disabled {
                            box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
                          }
                          </style>
                    </div>
                    <br>
                    <div class="quantity">
                        <label for="quantity">Quantity:</label><br>
                        <input type="number" id="quantity" name="quantity"value="1" min="1" style="width: 293px;">
                    </div><br>
                    <div class="add-to-cart">
                        <button class="btn">Add to Cart</button>
                        <button class="btn">Checkout</button>
                    </div><br>
                    <div class="product-info" onclick="showProductDetail()">
                        <p>Product Description</p>
                    </div>
                   
                        <p><?php echo $product_detail; ?></p>
                  
                </div>
            </div>
            
       
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="related-title">Related Products</h2>
                    
                </div>
            </div>
            <div class="row">
        <?php
        $related_product_name = $_GET['product_name'] ?? '';

        // Jika nilai $related_product_name tidak kosong, tambahkan ke dalam kondisi WHERE
        $where_clause = "";
        if (!empty($related_product_name)) {
          // Ambil kategori produk yang dipilih
          $category_id_query = "SELECT category_id FROM product WHERE product_name = '$related_product_name'";
          $category_id_result = mysqli_query($conn, $category_id_query);
          $category_id_row = mysqli_fetch_assoc($category_id_result);
          $category_id = $category_id_row['category_id'];
        }
        
        // Query untuk mengambil 4 produk terkait dari kategori yang sama
        $related_sql = "SELECT DISTINCT p2.product_name, p2.product_price, p2.product_url, p2.product_detail 
                        FROM product p1
                             JOIN product p2 ON p1.category_id = p2.category_id
                             JOIN category c ON p2.category_id = c.category_id
                        WHERE 1=1 $where_clause
                              AND p2.category_id = '$category_id'
                              
                        ORDER BY RAND()
                        LIMIT 4";
        
                $related_result = $conn->query($related_sql); 
                     
                if ($related_result->num_rows > 0) {
                    while ($row_related = $related_result->fetch_assoc()) {
                        $related_product_name = $row_related['product_name'];
                        // $related_product_id = $row_related['product_id'];
                        $related_product_price = $row_related['product_price'];
                        $related_product_url = $row_related['product_url'];
                        // $category_id = $row['category_id'];
                ?>
                        <div class="col-md-3">
                            <div class="single-new-arrival mb-50 text-center">
                                <div class="popular-img">
                                    <img src="<?php echo $related_product_url; ?>" alt="">
                                    <div class="favorit-items">
                                      <img src="assets/images/logo/love.png" alt="" class="favorite" id="favorite-<?php echo $i; ?>" onclick="toggleImage(this)">
                                    </div>
                                </div>
                                <div class="popular-caption">
                                <h3><a href="product_details.php"><?php echo $related_product_name; ?></a></h3>
        
                               
                                    <span>Rp. <?php echo number_format($related_product_price, 0, ',', '.'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            // Tampilkan pesan jika tidak ada produk dengan product_id yang sesuai
                            echo "Product not found";
                        }}}
                        ?>
        <style>
          .product-info:hover {
          cursor: pointer;
        }
        .add-to-cart button {
          font-size: 14px;
          padding: 20px 30px;
        }
        
        </style>
        <script>
            function showProductDetail() {
                var productDetail = document.getElementById("product-detail");
                if (productDetail.style.display === "none") {
                    productDetail.style.display = "block";
                } else {
                    productDetail.style.display = "none";
                }
            }
        </script>
        </div>

        <!-- <div class="directory-details pt-padding">
         
        
        <div class="container">
  <div class="row">
    <div class="col-lg-5">
      <div class="map">
        <img src="assets/images/tops/1.jpeg" alt="">
      </div>
    </div>
    <div class="col-lg-7">
      <div class="directory-cap mb-40">
        <h1 class="product-name mb-3">Ruffled Blouse</h1>
        <h3 class="product-price">$29.99</h3>
        <div class="size-buttons mb-3">
          <label for="size">Size:</label><br>
          <button type="button" class="btn btn-outline-secondary mr-3 btn-size">XS</button>
          <button type="button" class="btn btn-outline-secondary mr-3 btn-size">S</button>
          <button type="button" class="btn btn-outline-secondary mr-3 btn-size">M</button>
          <button type="button" class="btn btn-outline-secondary mr-3 btn-size">L</button>
          <button type="button" class="btn btn-outline-secondary mr-3 btn-size">XL</button>
          <button type="button" class="btn btn-outline-secondary mr-3 btn-size">XXL</button>
          <button type="button" class="btn btn-outline-secondary btn-size-all">All Sizes</button>
        </div>
        <div class="quantity mb-3">
          <label for="quantity">Quantity:</label>
          <select name="quantity" id="quantity" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="submit-info">
          <button class="btn btn-primary mr-3 btn-add-to-cart" type="submit">ADD TO CART</button>
          <button class="btn btn-success btn-checkout" type="submit">CHECK OUT</button>
        </div>
        <p class="product-info mt-3"><em>Product Info:</em> The ruffled blouse is a feminine and elegant addition to any wardrobe. With its lightweight fabric and cascading ruffles, it is perfect for dressing up or down for any occasion.</p>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-4">
    <div class="map">
      <img src="assets/images/tops/1.jpeg" alt="">
    </div>
  </div>
  <div class="col-md-8">
    <h2 class="product-name mb-3">Charlotte Ruffle Blouse</h2>
    <p class="product-price">Rp.150.000</p>
    <div class="form-group">
      <label for="size">Size:</label><br>
      <select class="form-control" id="size">
        <option>All Size</option>
        <option>S</option>
        <option>M</option>
        <option>L</option>
      </select>
    </div>
    <div class="form-group">
    <br><br><label for="quantity">Quantity:</label>
      <input type="number" class="form-control" id="quantity" value="1" min="1" max="10">
    </div>
    <button type="button" class="btn btn-sm btn-outline-dark mr-2 mb-2">Add to Cart</button>
    <button type="button" class="btn btn-sm btn-success mb-2">Checkout</button><br>
    <a href="#" class="text-primary mt-3" data-toggle="collapse" data-target="#product-info">Product Info</a>

    <div id="product-info" class="collapse mt-3">
      <p id="description">Description:</p>
      <p>The ruffled blouse is a feminine and elegant addition to any wardrobe. With its lightweight fabric and cascading ruffles, it is perfect for dressing up or down for any occasion.</p>
    </div>
  </div>
</div> -->
<!-- <style>
    .text-primary {
        color-backg: #007bfBf;
        text-decoration: none;
    }

    .text-primary:hover {
        color: #0069d9;
        text-decoration: none;
    }
</style> -->


<!-- 
                    <div class="col-lg-8">
                        <div class="small-tittle mb-20">
                        <h2>Description</h2>
                        </div>
                        <div class="directory-cap mb-40">
                            <P>The ruffled blouse is a feminine and elegant addition to any wardrobe. With its lightweight fabric and cascading ruffles, it is perfect for dressing up or down for any occasion.</P>

                        </div>
                        </div>
                        </div> -->
                     
                                  
        <!--  Details End -->
        <!-- listing-area Area End -->
        <!--? Popular Locations Start 01-->
        <!-- <div class="popular-product pt-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="single-product mb-50">
                            <div class="location-img">
                                <img src="assets/img/gallery/popular-imtes1.png" alt="">
                            </div>
                            <div class="location-details">
                                <p><a href="product_details.html">Established fact that by the<br> readable content</a></p>
                                <a href="product_details.html" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="single-product mb-50">
                            <div class="location-img">
                                <img src="assets/img/gallery/popular-imtes2.png" alt="">
                            </div>
                            <div class="location-details">
                                <p><a href="product_details.html">Established fact that by the<br> readable content</a></p>
                                <a href="product_details.html" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Popular Locations End -->

       <!--? Services Area Start -->
      </div>
    </div>
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
                <img src="assets/img/icon/services1.svg" alt="" />
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
                <img src="assets/img/icon/services2.svg" alt="" />
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
                <img src="assets/img/icon/services3.svg" alt="" />
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
                <img src="assets/img/icon/services4.svg" alt="" />
              </div>
              <div class="cat-cap">
                <p>Customer Support</p>
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
<div id="back-top" >
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
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
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

  $('h3 a').click(function() {
          // Mengambil isi dari elemen a yang diklik
          let isiLink = $(this).text();
          $.ajax({
          type: "POST",
          url: "product_details.php",
          data: { link: isiLink },
          success: function() {
            console.log("tessssss berhasill");
          }
        });
        });

        $('h3 a').click(function() {
          // Mengambil isi dari elemen span yang merupakan sibling dari elemen .img-cap yang sama
          let isiRelated = $(this).text();
          $.ajax({
            type: "POST",
            url: "product_details.php",
            data: { relatedproduct: isiRelated },
            success: function() {
              console.log("Data berhasil dikirim ke PHP");
            }
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

        $(function() {
        // Get all size buttons
        var sizeButtons = $(".button-group button");

        // Check if a size button was previously clicked
        var selectedSize = localStorage.getItem("selectedSize");

        // If a size button was previously clicked, add "active" class to it
        if (selectedSize !== null) {
            sizeButtons.each(function() {
                if ($(this).text() === selectedSize) {
                    $(this).addClass("active");
                }
            });
        }

        // Add event listener to size buttons
        sizeButtons.on("click", function() {
            // Remove "active" class from all size buttons
            sizeButtons.removeClass("active");

            // Add "active" class to clicked size button
            $(this).addClass("active");

            // Save selected size to local storage
            localStorage.setItem("selectedSize", $(this).text());
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const sizeButtons = document.querySelectorAll('.button-17');

        function handleButtonClick(event) {
            event.preventDefault();
            console.log('Button clicked');
        }

        for (let i = 0; i < sizeButtons.length; i++) {
            sizeButtons[i].addEventListener('click', handleButtonClick);
        }
    });
    // function gambar love
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
</body>
</html>
