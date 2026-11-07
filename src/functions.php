<?php
require_once 'config.php';

function getProducts() {
    return [
        1 => [
            'id'          => 1,
            'name'        => 'Half‑Life: Alyx',
            'price'       => 20.00,
            'image'       => 'assets/images/Alyx.webp',
            'category'    => 'FPS',
            'description' => 'Entre novamente nas instalações da Aperture Science em Portal 2, uma aventura que combina quebra-cabeças inteligentes, humor e ficção científica. Utilize a Portal Gun para criar portais, manipular objetos e superar desafios cada vez mais complexos enquanto explora uma instalação misteriosa. Com uma campanha envolvente e personagens marcantes, cada sala de teste oferece uma nova maneira de desafiar sua criatividade e raciocínio.'
        ],
        2 => [
            'id'          => 2,
            'name'        => 'Portal 2',
            'price'       => 10.00,
            'image'       => 'assets/images/Portal 2.webp',
            'category'    => 'Puzzle',
            'description' => 'Vivencie uma nova perspectiva do universo Half-Life em Half-Life: Alyx, uma aventura de realidade virtual ambientada entre os acontecimentos de Half-Life e Half-Life 2. Na pele de Alyx Vance, lute pela sobrevivência da humanidade contra a ocupação alienígena Combine. Explore ambientes detalhados, resolva enigmas, enfrente inimigos e utilize ferramentas interativas em uma experiência imersiva que redefine a forma de jogar.'
        ],
        3 => [
            'id'          => 3,
            'name'        => 'The Witcher 3: Wild Hunt',
            'price'       => 32.00,
            'image'       => 'assets/images/TW3.webp',
            'category'    => 'RPG',
            'description' => 'Assuma o papel de Geralt de Rívia, um caçador de monstros profissional em busca de sua filha adotiva em um mundo devastado pela guerra e repleto de criaturas perigosas. Em The Witcher 3: Wild Hunt, explore vastas regiões, enfrente monstros, desenvolva suas habilidades e tome decisões que influenciam o rumo da história. Com personagens memoráveis, missões envolventes e um universo rico em detalhes, prepare-se para uma jornada épica de fantasia.'
        ]
    ];
}

function getProduct($id) {
    $products = getProducts();
    return $products[$id] ?? null;
}
?>