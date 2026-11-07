<?php
require_once '../src/functions.php';
include '../templates/header.php';
$cart     = $_SESSION['cart'] ?? [];
$total    = 0;
?>
<h2>Seu Carrinho</h2>
<?php if (!$cart): ?>
    <p>Carrinho vazio.</p>
<?php else: ?>
    <table class="table table-bordered align-middle cart-table">
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
                    <td>
                        <form action="<?= BASE_URL ?>../src/cart_handler.php?act=update" method="post">
                            <input type="hidden" name="id" value="<?= $pid ?>">
                            <div class="input-group input-group-sm">
                                <input type="number" name="quantity" value="<?= $qty ?>" min="1" class="form-control">
                                <button type="submit" class="btn btn-outline-secondary">Atualizar</button>
                            </div>
                        </form>
                    </td>
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