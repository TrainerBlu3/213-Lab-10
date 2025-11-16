<?php
session_start();

$id  = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$qty = filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 99]]);

if (isset($_SESSION['basket'][$id]) && $qty) {
    $_SESSION['basket'][$id]['qty'] = $qty;
}

header('Location: cart.php');
exit;
