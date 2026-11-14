<?php
require_once '../src/functions.php';
include '../templates/header.php';
$cart = $_SESSION['cart'] ?? [];
if (!$cart) {
    echo '<p>Carrinho vazio. <a href="index.php">Voltar ao catálogo</a></p>';
    include '../templates/footer.php';
    exit;
}
$total = 0;
foreach ($cart as $pid => $qty) {
    $product = getProduct($pid);
    if ($product) {
        $total += $product['price'] * $qty;
    }
}
?>
<h2>Finalizar Compra</h2>
<p>Esta é uma simulação. Todos os valores são fictícios.</p>
<form action="checkout.php" method="post">
    <div class="mb-3"><label for="payment" class="form-label">Método de Pagamento</label>
        <select id="payment" name="payment" class="form-select">
            <option value="pix">PIX (Simulado)</option>
            <option value="boleto">Boleto (Simulado)</option>
            <option value="cartao">Cartão de Crédito (Simulado)</option>
        </select></div>
    <h4>Total: R$ <?= number_format($total, 2, ',', '.') ?></h4>
    <button type="submit" class="btn btn-success mt-3">Concluir Compra</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<div class="alert alert-success mt-4">Compra concluída com sucesso! (Simulação)</div>';
    $_SESSION['cart'] = [];
}
?>
<?php include '../templates/footer.php'; ?>