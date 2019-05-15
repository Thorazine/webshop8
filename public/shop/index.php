<?php
    include '../../helpers/bootstrap.php'; // laadt alle benodigdheden in

    $query = 'SELECT * FROM products WHERE slug = :slug';

    $db = new DB;
    dd($db->find($query, ['slug' => $_GET['slug']]));

    // $product = $conn->prepare($query);

    // try {
    //     $product->execute([
    //         'slug' => $_GET['slug']
    //     ]);
    //     $product->setFetchMode(PDO::FETCH_ASSOC);
    //     $product = $product->fetch();

    //     // dd($product);
    // }
    // catch(PDOException $e) {
    //     echo 'Whoops, query mislukt';
    // }

    // database opstarten

    // query draaien


    $title = $product['title'];
    include "../../partials/head.php";

    include "../../partials/menu.php"; ?>

    <div class="container">
        <img src="../img/<?= $product['image']; ?>">
        <h1><?= $product['title']; ?></h1>
    </div>

<?php include "../../partials/footer.php"; ?>
