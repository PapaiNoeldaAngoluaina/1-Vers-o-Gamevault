<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$action = $_GET['act'] ?? null;
// For update, id can come via POST as well
$id     = intval($_GET['id'] ?? 0);
if ($action === 'update') {
    $id   = intval($_POST['id'] ?? $id);
}
switch ($action) {
    case 'add':
        if ($id && !isset($_SESSION['cart'][$id])) {
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
}
header('Location: cart.php');
exit;