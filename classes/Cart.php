<?php

class Cart {

    public function __construct()
    {
        if(! array_key_exists('cart', $_SESSION)) {
            $_SESSION['cart'] = [
                'products' => [],
                'total' => 0.00,
            ];
        }
    }


    public static function addToCart($id, $amount = 1)
    {
        if(array_key_exists($id, $_SESSION['cart']['products'])) {
            // product is already in session. Add one
            $_SESSION['cart']['products'][$id]['quantity'] = $_SESSION['cart']['products'][$id]['quantity'] + $amount;
        }
        else {
            try {
                // get product by id
                $db = new DB;
                $query = 'SELECT * FROM products WHERE id = :id';
                $product = $db->find($query, ['id' => $id]);

                // put product in session
                $_SESSION['cart']['products'][$id] = [
                    'id' => $id,
                    'quantity' => $amount,
                    'title' => $product['title'],
                    'price' => $product['price'],
                ];
            }
            catch(Exception $e) {
                // silent fail. Product does not exist so do not add
            }
        }
        self::updateTotal();
    }

    public static function updateTotal()
    {
        $total = 0;
        foreach($_SESSION['cart']['products'] as $product) {
            $total = $total + ($product['price'] * $product['quantity']);
        }
        $_SESSION['cart']['total'] = $total; // 0.00
    }

}
