<?php
require_once 'config.php';
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$action = $_GET['act'] ?? null;
$id     = intval($_GET['id'] ?? 0);
if ($action === 'update') {
    $id   = intval($_POST['id'] ?? $id);
}
// Basic validation of id
if ($id <= 0) {
    header('Location: '.BASE_URL.'cart.php');
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
        $qty = intval($_POST['quantity'] ?? 0);
        if ($qty > 0) {
            $_SESSION['cart'][$id] = $qty;
        } else {
            unset($_SESSION['cart'][$id]);
        }
        break;
    default:
        // No action
}
header('Location: '.BASE_URL.'cart.php');
exit;