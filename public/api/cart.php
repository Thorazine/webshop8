<?php

include '../../boot.php'; // laadt alle benodigdheden in

// Check if an action is needed
if(@$_GET['id']) {
    if(@$_GET['action'] == 'add') {
        Cart::addToCart($_GET['id']);
    }
    if(@$_GET['action'] == 'remove') {
        Cart::removeFromCart($_GET['id']);
    }
}

// Get the contents of the cart
$cart = Cart::get();

// Loop through the contents of the cart to print all the products
foreach($cart['products'] as $product) { ?>
    <tr>
        <td class=""><?= $product['title']; ?></td>
        <td><?= $product['quantity']; ?></td>
        <td class="price">&euro; <?= number_format((float)$product['price'], 2, ',', '.'); ?></td>
    </tr>
<?php } ?>
<tr>
    <td colspan="2">Totaal</td>
    <td class="price"><b>&euro; <?= $cart['total']; ?></b></td>
</tr>
