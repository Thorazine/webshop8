<?php
    include '../../boot.php'; // laadt alle benodigdheden in

    $query = 'SELECT * FROM products WHERE slug = :slug';

    $db = new DB;
    $product = $db->find($query, ['slug' => $_GET['slug']]);


    $title = $product['title'];
    include "../../partials/head.php";

    include "../../partials/menu.php"; ?>

    <div class="container">
        <img src="<?= Http::asset('img/'.$product['image']); ?>">
        <h1><?= $product['title']; ?></h1>
    </div>

<?php include "../../partials/footer.php"; ?>
