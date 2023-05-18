<?php
include 'connection.php';

// Jumlah produk per halaman
$limit = 15;

// Hitung jumlah total produk
$sql = "SELECT DISTINCT COUNT(DISTINCT product_name) as total FROM product where product_id in (select product_id from wishlist_product) order by product_name asc";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_products = $row['total'];

// Hitung jumlah halaman yang dibutuhkan
$total_pages = ceil($total_products / $limit);

// Tentukan halaman saat ini
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung offset
$offset = ($current_page - 1) * $limit;

// Query untuk menampilkan produk pada halaman ini
$sql = "SELECT DISTINCT product_name, product_price, product_url FROM product where product_id in (select product_id from wishlist_product) order by product_name asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $i = 0;
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_url = $row['product_url'];
        ?>

        <div class="col-md-4">
            <div class="single-new-arrival mb-50 text-center">
                <div class="popular-img">
                    <img src="<?php echo $product_url; ?>" alt="">
                    <div class="favorit-items">
                        <img src="assets/images/logo/love-full1.png" alt="">
                    </div>
                </div>
                <div class="popular-caption">
                    <h3><a href="product_details.php"><?php echo $product_name; ?></a></h3>
                    <span>Rp. <?php echo number_format($product_price, 0, ',', '.'); ?></span>
                    <br>
                    <button id="open-popup" type="submit" class="btn btn-primary detailkiri details" onclick="none">Check Out</button>
                </div>
            </div>
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