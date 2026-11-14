<?php
require_once 'config.php';

function getProducts() {
    return [
        1 => [
            'id'          => 1,
            'name'        => 'Half‑Life: Alyx',
            'price'       => 39.99,
            'image'       => 'assets/images/hla.jpg',
            'category'    => 'FPS',
            'description' => 'VR shooter set in the Half‑Life universe.'
        ],
        2 => [
            'id'          => 2,
            'name'        => 'Portal 2',
            'price'       => 19.99,
            'image'       => 'assets/images/portal2.jpg',
            'category'    => 'Puzzle',
            'description' => 'Co‑op puzzle platformer.'
        ],
        3 => [
            'id'          => 3,
            'name'        => 'The Witcher 3: Wild Hunt',
            'price'       => 59.99,
            'image'       => 'assets/images/witcher3.jpg',
            'category'    => 'RPG',
            'description' => 'Open‑world action RPG with deep story.'
        ]
    ];
}

function getProduct($id) {
    $products = getProducts();
    return $products[$id] ?? null;
}
?>