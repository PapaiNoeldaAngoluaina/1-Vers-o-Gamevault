<?php
require_once '../src/functions.php';
include '../templates/header.php';
$id = intval($_GET['id'] ?? 0);
$product = getProduct($id);
?>
<?php if (!$product): ?>
    <p>Produto não encontrado.</p>
<?php else: ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?= BASE_URL ?><?= $product['image'] ?>" class="img-fluid" alt="<?= htmlspecialchars($product['name']) ?>">
        </div>
        <div class="col-md-8">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p class="text-muted">Categoria: <?= htmlspecialchars($product['category']) ?></p>
            <p class="fw-bold">R$ <?= number_format($product['price'], 2, ',', '.') ?></p>
            <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>

            <form action="<?= BASE_URL ?>../src/cart_handler.php?act=add&id=<?= $product['id'] ?>" method="post">
                <button type="submit" class="btn btn-success">Adicionar ao Carrinho</button>
            </form>
        </div>
    </div>
<?php endif; ?>
<?php include '../templates/footer.php'; ?>