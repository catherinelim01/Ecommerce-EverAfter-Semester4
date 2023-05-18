<?php

include 'connection.php';

$product_id_query = $_POST['product_id_query'];

$result = $conn->query($product_id_query);
$row = $result->fetch_assoc();
$product_id = $row['PRODUCT_ID'];

$wishlist_id_query = "SELECT IFNULL(MAX(WISHLIST_ID), 0) + 1 AS NEW_WISHLIST_ID FROM wishlist_product";
$result = $conn->query($wishlist_id_query);
$row = $result->fetch_assoc();
$wishlist_id = $row['NEW_WISHLIST_ID'];

$insert_query = "INSERT INTO wishlist_product (WISHLIST_ID, PRODUCT_ID) VALUES ($wishlist_id, $product_id)";
if ($conn->query($insert_query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insert_query . "<br>" . $conn->error;
}

$conn->close();
