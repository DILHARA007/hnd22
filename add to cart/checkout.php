<?php
session_start();
//require 'db_connection.php';
require 'db.php';

$user_id = $_SESSION['user_id'];
$order_items = json_decode($_POST['order_items'], true); // Cart items
$total_price = $_POST['total_price'];

$sql = "INSERT INTO orders (user_id, total_price, order_date) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("id", $user_id, $total_price);

if ($stmt->execute()) {
    $order_id = $stmt->insert_id;

    // Save each item in the order_items table
    foreach ($order_items as $item) {
        $sql_item = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                     VALUES (?, ?, ?, ?)";
        $stmt_item = $conn->prepare($sql_item);
        $stmt_item->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
        $stmt_item->execute();
    }

    // Clear cart
    $sql_clear = "DELETE FROM cart_items WHERE user_id = ?";
    $stmt_clear = $conn->prepare($sql_clear);
    $stmt_clear->bind_param("i", $user_id);
    $stmt_clear->execute();

    echo json_encode(["success" => true, "message" => "Order placed successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Checkout failed"]);
}
?>
