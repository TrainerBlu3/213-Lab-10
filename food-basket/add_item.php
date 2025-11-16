<?php
session_start();

$catalog = require __DIR__ . '/catalog.php';

$id  = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$qty = filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 99]]);

if (!$id || !$qty || !isset($catalog[$id])) {
    // Invalid input or unknown item → back to menu
    header('Location: index.php');
    exit;
}

// Initialize basket
if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = []; // key: id, value: ['name'=>..., 'price'=>..., 'qty'=>...]
}

// If item exists, increment; else set
if (isset($_SESSION['basket'][$id])) {
    $_SESSION['basket'][$id]['qty'] += $qty;
} else {
    $_SESSION['basket'][$id] = [
        'name'  => $catalog[$id]['name'],
        'price' => $catalog[$id]['price'],
        'qty'   => $qty,
    ];
}

header('Location: cart.php');
exit;
