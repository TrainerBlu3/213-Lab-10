<?php
session_start();

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (isset($_SESSION['basket'][$id])) {
    unset($_SESSION['basket'][$id]);
}

header('Location: cart.php');
exit;
