<?php

include '../../boot.php'; // laadt alle benodigdheden in

if(@$_GET['id']) {
    if(@$_GET['action'] == 'add') {
        Cart::addToCart($_GET['id']);
    }
    if(@$_GET['action'] == 'remove') {
        Cart::removeFromCart($_GET['id']);
    }
}

$cart = Cart::get();

foreach($cart['products'] as $product) { ?>
    <tr>
        <td class=""><?= $product['title']; ?></td>
        <td><?= $product['quantity']; ?></td>
        <td class="price">&euro; <?= $product['price']; ?></td>
    </tr>
<?php } ?>
<tr>
    <td colspan="2">Totaal</td>
    <td class="price"><b>&euro; <?= $cart['total']; ?></b></td>
</tr>
