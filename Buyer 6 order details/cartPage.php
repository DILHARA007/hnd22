<?php
session_start();

// Get order details from query string or session
$orderID = $_GET['order_id'];
$qty = $_GET['qty'];

// Here, you would add the order details to the cart (in session or database)
$_SESSION['cart'][$orderID] = [
    'order_id' => $orderID,
    'qty' => $qty,
];

// You could further process the cart or redirect the user to a checkout page
header('Location: checkoutPage.php');
exit;
?>
