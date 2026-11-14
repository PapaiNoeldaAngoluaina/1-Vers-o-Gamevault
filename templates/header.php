<?php
require_once '../src/config.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>GameVault</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
<header class="bg-dark text-white py-3 mb-4">
  <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h5 mb-0"><a href="<?= BASE_URL ?>index.php" class="text-white">GameVault</a></h1>
      <nav>
          <a href="<?= BASE_URL ?>cart.php" class="text-white">Carrinho (<?php echo count($_SESSION['cart'] ?? []); ?>)</a>
      </nav>
  </div>
</header>
<div class="container">
