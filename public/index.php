<?php
    include '../boot.php'; // laadt alle benodigdheden in

    $query = 'SELECT * FROM products ORDER By id DESC LIMIT 3';

    $db = new DB;
    $products = $db->get($query);


    $title = 'Home';
    include "../partials/head.php";
?>

<?php include "../partials/menu.php"; ?>

<div class="container">
    Home

    <div class="row">
        <?php foreach($products as $product) { ?>
            <div class="col-sm-4">
                <a href="<?= Http::asset('shop/'.$product['slug']); ?>">
                    <?= $product['title']; ?>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "../partials/footer.php"; ?>

