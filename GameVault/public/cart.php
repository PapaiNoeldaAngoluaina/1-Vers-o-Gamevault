<?php
require_once '../src/functions.php';
include '../templates/header.php';
$products = getProducts();
$cart     = $_SESSION['cart'] ?? [];
$total    = 0;
?>
<h2>Seu Carrinho</h2>
<?php if (!$cart): ?>
    <p>Carrinho vazio.</p>
<?php else: ?>
    
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Jogo</th><th>Preço Unit.</th><th>Quantidade</th><th>Total</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $pid => $qty): 
                    $p = getProduct($pid);
                    if (!$p) continue;
                    $subtotal = $p['price'] * $qty;
                    $total += $subtotal; ?>
                    <tr>
                        <td><?= htmlspecialchars($p['name']) ?></td>
                        <td>R$ <?= number_format($p['price'], 2, ',', '.') ?></td>
                        <td><input type="number" name="quantity" value="<?= $qty ?>" min="1" class="form-control w-50"></td>
                        <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                        <td><a href="<?= BASE_URL ?>../src/cart_handler.php?act=remove&id=<?= $pid ?>" class="btn btn-danger btn-sm">Remover</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    

    <h4>Total: R$ <?= number_format($total, 2, ',', '.') ?></h4>
    <a href="<?= BASE_URL ?>checkout.php" class="btn btn-primary">Finalizar Compra</a>
<?php endif; ?>
<?php include '../templates/footer.php'; ?>