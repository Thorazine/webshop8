<?php
    include '../../boot.php'; // laadt alle benodigdheden in

    $query = 'SELECT * FROM products WHERE slug = :slug';

    $db = new DB;
    $product = $db->find($query, ['slug' => $_GET['slug']]);


    $title = $product['title'];
    include "../../partials/head.php";

    include "../../partials/cart.php";

    include "../../partials/menu.php"; ?>

    <div class="container product">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= Http::asset('img/'.$product['image']); ?>">
            </div>
            <div class="col-sm-6">
                <h1><?= $product['title']; ?></h1>

                <a href="<?= Http::asset('api/cart.php?id='.$product['id'].'&action=add'); ?>" class="btn btn-success order">Toevoegen aan winkelmand</a>

                <?= $product['description']; ?>

                <a href="<?= Http::asset('api/cart.php?id='.$product['id'].'&action=add'); ?>" class="btn btn-success order">Toevoegen aan winkelmand</a>
            </div>
        </div>
    </div>

<?php include "../../partials/footer.php"; ?>
