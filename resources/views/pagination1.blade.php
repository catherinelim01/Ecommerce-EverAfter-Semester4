<?php

// Query to retrieve the total number of products
$sql_count = 'SELECT COUNT(DISTINCT product_name) as total FROM product WHERE product_id IN (SELECT product_id FROM wishlist_product)';
$result_count = DB::select($sql_count);
$total_products = $result_count[0]->total;

$limit = 15;
$total_pages = ceil($total_products / $limit);

// Determine the current page
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start_index = ($current_page - 1) * $limit;

$category = isset($_GET['select2']);
if ($category == null) {
    // Query to retrieve the products for the current page
    $sql = "SELECT DISTINCT p.product_name, p.product_price, p.product_url, wp.product_id, wp.wishlist_id FROM product p, wishlist w, wishlist_product wp WHERE p.product_id = wp.PRODUCT_ID and w.WISHLIST_ID = wp.WISHLIST_ID ORDER BY product_name ASC LIMIT $start_index, $limit";
    $result = DB::select($sql);
} else {
    // Query to retrieve the products for the current page and selected category
    $sql = "SELECT DISTINCT p.product_name, p.product_price, p.product_url, c.category_name FROM product p, category c WHERE p.category_id = c.category_id and product_id IN (SELECT product_id FROM wishlist_product) AND category_name = '$category' ORDER BY product_name ASC;";
    $result = DB::select($sql);
}

if (count($result) > 0) {
    $response = [];
    foreach ($result as $row) {
        $dt = new stdClass();
        $dt->product_name = $row->product_name;
        $dt->product_price = $row->product_price;
        $dt->product_url = $row->product_url;
        $dt->product_id = $row->product_id;
        $dt->wishlist_id = $row->wishlist_id;
        $response[] = $dt;
    }
    $hasil_json = json_encode($response);
    $data2 = json_decode($hasil_json, true);
}

?>

<?php for ($i = 0; $i < count($data2); $i++) { ?>
@csrf
<div class="col-md-4">
    <div class="single-new-arrival mb-50 text-center">
        <div class="popular-img">
            <img src="<?php echo $data2[$i]['product_url']; ?>" alt="">
            <div class="favorit-items">
                <img src="assets/images/logo/love-full1.png" alt="" id="favorite-<?php echo $i; ?>"
                    data-wishlist="<?php echo $data2[$i]['wishlist_id']; ?>" data-product="<?php echo $data2[$i]['product_id']; ?>" onclick="changeImage(this)">
            </div>
        </div>
        <div class="popular-caption">
            <h3><a href="product_details.php"><?php echo $data2[$i]['product_name']; ?></a></h3>
            <span>Rp. <?php echo number_format($data2[$i]['product_price'], 0, ',', '.'); ?></span>
            <br>
            <button id="open-popup" type="submit" class="btn btn-primary detailkiri details" onclick="none">Check
                Out</button>
        </div>
    </div>
</div>
<?php } ?>

<script>
    function changeImage(elem) {
        var image = elem;
        var index = image.id.substring(9);
        // var favoriteStatus = sessionStorage.getItem("favorite-" + index);

        // if (favoriteStatus == "true") {
        //     sessionStorage.setItem("favorite-" + index, "false");
        //     image.src = "assets/images/logo/love-full1.png";

        //     var wishlist_id = 'W00005';
        //     var product_id = elem.dataset.product;
        //     alert("wishlist_id: " + wishlist_id + "\nproduct_id: " + product_id);

        //     $.ajax({
        //         url: "/wishlist",
        //         type: "POST",
        //         data: {
        //             wishlist_id: wishlist_id,
        //             product_id: product_id
        //         },
        //         success: function(data) {
        //             console.log(data);
        //             location.reload(); // Memperbarui halaman setelah menghapus item dari wishlist
        //         }
        //     });
        // } else {
            sessionStorage.setItem("favorite-" + index, "true");
            image.src = "assets/images/logo/love.png";

            var wishlist_id = 'W00005';
            var product_id = elem.dataset.product;
            alert("wishlist_id: " + wishlist_id + "\nproduct_id: " + product_id);
            

            $.ajax({
                url: "/wishlistdelete",
                type: "POST",
                data: {
                    wishlist_id: wishlist_id,
                    product_id: product_id
                },
                success: function(data) {
                    console.log(data);
                    alert("Barang berhasil dihapus dari Favorite");
                }
               
            });
            
            location.reload(); // Memperbarui halaman setelah menghapus item dari wishlist
       // }
    }

    function filterByCategory(category) {
        var url = 'wishlist';
        if (category) {
            url += '?category=' + category;
        }
        window.location.href = url;
    }
</script>