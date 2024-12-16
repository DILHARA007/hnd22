<?php
session_start();
//require 'db_connection.php';
require 'db.php';

$user_id = $_SESSION['user_id'];
$item_id = $_POST['item_id'];

$sql = "DELETE FROM cart_items WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $item_id, $user_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Item removed from cart"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to remove item"]);
}
?>
