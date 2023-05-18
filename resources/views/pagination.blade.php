<?php

include 'connection.php';

// Jumlah produk per halaman
$limit = 15;

// $sql = "SELECT PRODUCT_ID FROM product";
// $category_id = $_GET['category_id'];
// $size = substr($product_id, 4, 1);
// $price = $_GET['product_price'];
// Query untuk menampilkan produk pada halaman ini
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung offset
$offset = ($current_page - 1) * $limit;
if (!isset($_SESSION['shop_now'])) {
    $_SESSION['shop_now'] = "";
}
if ($_SESSION['shop_now'] == "") {
    $selected_category = $_GET['select2'] ?? '';
    $selected_size = $_GET['select3'] ?? '';
    $selected_price_range = $_GET['select4'] ?? '';
    $price_range = explode('-', $selected_price_range);
            $price_min = str_replace(['Rp', '.'], '', $price_range[0]);
            $price_max = str_replace(['Rp', '.'], '', $price_range[0]);

    if (empty($selected_category) && empty($selected_size) && empty($selected_price_range)) {
        $sqlpage = "SELECT COUNT(DISTINCT product_name) as total FROM product";
        $sql = "SELECT DISTINCT product_name, product_price, product_url, product_detail FROM product LIMIT $limit OFFSET $offset";
    } else {
        $sqlpage = "SELECT COUNT(DISTINCT product_name) as total FROM product WHERE 1=1";

        if (!empty($selected_category)) {
            $sqlpage .= " AND category_id = (SELECT category_id FROM category WHERE category_name = '$selected_category')";
        }

        $sql = "SELECT DISTINCT product_name, product_price, product_url, product_detail FROM product WHERE 1=1";

        if (!empty($selected_category)) {
            $sql .= " AND category_id = (SELECT category_id FROM category WHERE category_name = '$selected_category')";
        }

        if (!empty($selected_size)) {
            if ($selected_size == "All Size") {
                $sql .= " AND SUBSTR(product_id, 5, 1) = '0'";
            } else {
                // Tambahkan filter ukuran berdasarkan select3
                $sql .= " AND (SELECT SUBSTR(product_id, 5, 1) LIKE '$selected_size%')";
            }
        }


        if (!empty($selected_price_range)) {
            
            
            // echo "Price Min: " . $price_min . "<br>";
            // echo "Price Max: " . $price_max . "<br>";
            $sql .= " AND product_price >= $price_min AND product_price <= $price_max";


        }
            
        $sql .= " LIMIT 25 OFFSET $offset";
    }
} else if (isset($_SESSION['shop_now'])) {
    $selected_category = $_SESSION['shop_now'];
    $selected_size = $_GET['select3'] ?? '';
    $selected_price_range = $_GET['select4'] ?? '';

    $sqlpage = "SELECT COUNT(DISTINCT product_name) as total FROM product WHERE category_id = (SELECT category_id FROM category WHERE category_name = '$selected_category')";
    $sql = "SELECT DISTINCT product_name, product_price, product_url, product_detail FROM product WHERE category_id = (SELECT category_id FROM category WHERE category_name = '$selected_category')";

    if (!empty($selected_size)) {
        if ($selected_size == "All Size") {
            $sql .= " AND SUBSTR(product_id, 5, 1) = '0'";
        } else {
            // Tambahkan filter ukuran berdasarkan select3
            $sql .= " AND SUBSTR(product_id, 5, 1) LIKE '$selected_size%'";
        }
    }

    if (!empty($selected_price_range)) {
        $price_range = explode('-', $selected_price_range);
        $price_min = str_replace(['Rp', '.'], '', $price_range[0]);
            $price_max = str_replace(['Rp', '.'], '', $price_range[0]);
            // echo "Price Min: " . $price_min . "<br>";
            // echo "Price Max: " . $price_max . "<br>";
            $sql .= " AND product_price >= $price_max AND product_price <=  $price_min";

        
    }

    $sql .= " LIMIT $limit OFFSET $offset";
}



$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Tampilkan produk
} else {
    echo "No product found";
}

// $result = $conn->query($sql);
$resultpage = $conn->query($sqlpage);
$row = $resultpage->fetch_assoc();
$total_products = $row['total'];

// Hitung jumlah halaman yang dibutuhkan
$total_pages = ceil($total_products / $limit);

// Tentukan halaman saat ini
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung offset
$offset = ($current_page - 1) * $limit;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $i = 0;
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_url = $row['product_url'];
        $product_detail = $row['product_detail'];
        // $category_id = $row['category_id'];
        ?>
        

        <div class="col-md-4">
            <div class="single-new-arrival mb-50 text-center">
                
                <div class="popular-img">
                    <img src="<?php echo $product_url;?>" alt="">
                    <div class="favorit-items">
                    <img src="assets/images/logo/love.png" alt="" class="favorite" id="favorite-<?php echo $i; ?>" onclick="toggleImage(this)">
                    </div>
                </div>
                <div class="popular-caption">
                   
                <h3><a href="product_details.php?product_name=<?php echo urlencode($product_name); ?>"><?php echo $product_name; ?></a></h3>


                    <span>Rp. <?php echo number_format($product_price, 0, ',', '.'); ?></span>
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
        $i++;
        if ($i % 3 == 0) {
            echo '</div><div class="row">';
        }
    }
    echo '</div>';

    
}
$conn->close();

