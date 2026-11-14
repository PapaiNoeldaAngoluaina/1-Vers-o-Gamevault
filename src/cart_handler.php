<?php
require_once __DIR__ . '/functions.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_GET['act'] ?? '';
$id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);

if ($id <= 0 || !getProduct($id)) {
    header('Location: ' . BASE_URL . 'cart.php');
    exit;
}

switch ($action) {
    case 'add':
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = 1;
        }
        break;

    case 'remove':
        unset($_SESSION['cart'][$id]);
        break;

    case 'update':
        $quantity = (int) ($_POST['quantity'] ?? 0);

        if ($quantity > 0) {
            $_SESSION['cart'][$id] = $quantity;
        } else {
            unset($_SESSION['cart'][$id]);
        }
        break;
}

header('Location: ' . BASE_URL . 'cart.php');
exit;
