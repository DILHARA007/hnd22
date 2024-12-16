<?php
include('db.php');

$orderID = $_GET['order_id'];

// Query to fetch product details based on the order ID
$query = "
    SELECT 
        o.order_id, 
        o.item_name, 
        o.selling_price, 
        o.qty_available, 
        c.city, 
        u.username AS seller_name, 
        o.image_url, 
        DATE_ADD(o.order_date, INTERVAL 14 DAY) AS deliver_date
    FROM order_details o
    JOIN customers c ON o.seller_id = c.customer_id
    JOIN users u ON o.seller_id = u.user_id
    WHERE o.order_id = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $orderID);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        'order_id' => $row['order_id'],
        'item_name' => $row['item_name'],
        'selling_price' => $row['selling_price'],
        'qty_available' => $row['qty_available'],
        'city' => $row['city'],
        'seller_name' => $row['seller_name'],
        'image_url' => $row['image_url'],
        'deliver_date' => $row['deliver_date'],
    ]);
} else {
    echo json_encode(['error' => 'Order not found']);
}

$conn->close();
?>
