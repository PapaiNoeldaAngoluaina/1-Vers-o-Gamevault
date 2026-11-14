<?php
require_once __DIR__ . '/config.php';

function getProducts()
{
    $sql = "
        SELECT
            products.id,
            products.name,
            products.price,
            products.image,
            categories.name AS category,
            products.description
        FROM products
        INNER JOIN categories ON categories.id = products.category_id
        ORDER BY products.id
    ";

    return getConnection()->query($sql)->fetchAll();
}

function getProduct($id)
{
    $sql = "
        SELECT
            products.id,
            products.name,
            products.price,
            products.image,
            categories.name AS category,
            products.description
        FROM products
        INNER JOIN categories ON categories.id = products.category_id
        WHERE products.id = :id
        LIMIT 1
    ";

    $statement = getConnection()->prepare($sql);
    $statement->execute(['id' => (int) $id]);

    return $statement->fetch() ?: null;
}
