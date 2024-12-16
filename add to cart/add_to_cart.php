<?php
session_start();
//require 'db_connection.php';
require 'db.php';

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_image = $_POST['product_image'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO cart_items (user_id, product_id, product_name, product_image, quantity, price) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissid", $user_id, $product_id, $product_name, $product_image, $quantity, $price);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Item added to cart"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to add item"]);
}
?>
