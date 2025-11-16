<?php
session_start();
$basket = $_SESSION['basket'] ?? [];
$total = 0.0;
foreach ($basket as $row) {
    $total += $row['price'] * $row['qty'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Checkout</title>
  <style> body { font-family: Arial, sans-serif; margin: 30px; } </style>
</head>
<body>
  <h1>Checkout (Simulation)</h1>
  <?php if (!$basket): ?>
    <p>Your basket is empty. <a href="index.php">Order something</a>.</p>
  <?php else: ?>
    <p>Thank you for your order! (In a real app, payment and order storage would happen here.)</p>
    <p><strong>Total charged:</strong> $<?php echo number_format($total, 2); ?></p>
    <p><a href="clear_cart.php">Clear Basket</a> | <a href="index.php">Back to Menu</a></p>
  <?php endif; ?>
</body>
</html>
