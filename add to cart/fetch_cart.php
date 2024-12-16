<?php
session_start();
//require 'db_connection.php'; // Database connection script
require 'db.php'; // Database connection script

// Assuming user is logged in
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM cart_items WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

echo json_encode($cart_items);
?>
