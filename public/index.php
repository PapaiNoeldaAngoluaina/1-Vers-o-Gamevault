<?php
require_once '../src/functions.php';
include '../templates/header.php';
$q = trim($_GET['q'] ?? '');
$filterCat = $_GET['cat'] ?? '';
$allProducts = getProducts();
$categories = array_unique(array_column($allProducts, 'category'));
$products = [];
foreach ($allProducts as $p) {
    if (($filterCat === '' || $p['category'] == $filterCat) && (empty($q) || stripos($p['name'], $q)!==false)) {
        $products[] = $p;
    }
}
?>
<h2 class="mb-4">Filtrar Jogos</h2>
<form method="get" class="mb-4">
  <div class="row g-2 align-items-center">
    <div class="col-auto"><input type="text" name="q" placeholder="Buscar" value="<?= htmlspecialchars($q) ?>" class="form-control"></div>
    <div class="col-auto"><select name="cat" class="form-select"><option value="">Todas</option><?php foreach ($categories as $c): ?><option value="<?= $c ?>" <?= $filterCat===$c?'selected':'' ?>><?= $c ?></option><?php endforeach; ?></select></div>
    <div class="col-auto"><button type="submit" class="btn btn-outline-primary">Filtrar</button></div>
  </div>
</form>
<h2 class="mb-4">Jogos em Destaque</h2>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php if (!$products): ?>
        <p>Nenhum jogo encontrado.</p>
    <?php else: foreach ($products as $p): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="<?= BASE_URL ?><?= $p['image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($p['name']) ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= htmlspecialchars($p['name']) ?></h5>
                    <p class="mt-auto fw-bold">R$ <?= number_format($p['price'], 2, ',', '.') ?></p>
                    <a href="<?= BASE_URL ?>product.php?id=<?= $p['id'] ?>" class="btn btn-primary mt-2">Detalhes</a>
                </div>
            </div>
        </div>
    <?php endforeach; endif; ?>
</div>
<?php include '../templates/footer.php'; ?>