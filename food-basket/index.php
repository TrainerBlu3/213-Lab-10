<?php
session_start();
$catalog = require __DIR__ . '/catalog.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Food Basket — Menu</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 16px; }
    .card { border: 1px solid #ddd; padding: 16px; border-radius: 8px; }
    .price { font-weight: bold; }
    .actions { margin-top: 8px; }
    input[type=number] { width: 80px; }
  </style>
</head>
<body>
  <h1>Menu</h1>
  <p><a href="cart.php">View Basket</a></p>

  <div class="grid">
    <?php foreach ($catalog as $id => $item): ?>
      <div class="card">
        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
        <p class="price">$<?php echo number_format($item['price'], 2); ?></p>
        <form class="actions" method="post" action="add_item.php">
          <input type="hidden" name="id" value="<?php echo (int)$id; ?>">
          <label>
            Qty:
            <input type="number" name="qty" value="1" min="1" max="99" required>
          </label>
          <button type="submit">Add to Basket</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>
