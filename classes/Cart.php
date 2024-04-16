<?php

class CartManager extends DBManager
{

    private $clientID;

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'client_id');
        $this->tableName = 'cart';

        $this->initClientIDSession();
    }

    public function getCartTotal($cartID) {
        $result = $this->db->query("
        SELECT SUM(quantity) as num_products, SUM(quantity* price) as total
        FROM cart_product
        INNER JOIN products
        ON cart_product.product_id = products.id
        WHERE cart_id = $cartID
        ");
        return $result[0];
    }

    public function getCartItems($cartID) {
        return $result = $this->db->query("
        SELECT products.name as name,
            products.price as single_price,
            cart_product.quantity as quantity,
            products.price * cart_product.quantity as total_price,
            products.id as id
        FROM cart_product
        INNER JOIN products
        ON cart_product.product_id = products.id
        WHERE cart_product.cart_id = $cartID
        ");
    }

    public function addToCart($productID, $cartID)
    {

        $quantity = 0;
        $result = $this->db->query("SELECT quantity FROM cart_product WHERE cart_id = $cartID AND product_id = $productID");
        if (count($result) > 0) {
            $quantity = $result[0]['quantity'];
        }
        $quantity++;

        if (count($result) > 0) {
            $this->db->execute("UPDATE cart_product SET quantity = $quantity WHERE cart_id = $cartID AND product_id = $productID");
        } else {
            $cart_item_mg = new CartProductManager();

            $cart_item_mg->create([
                'cart_id' => $cartID,
                'product_id' => $productID,
                'quantity' => 1
            ]);
        }
    }

    public function removeFromCart($productID, $cartID)
    {

        $quantity = 0;
        $result = $this->db->query("SELECT quantity, id FROM cart_product WHERE cart_id = $cartID AND product_id = $productID");
        $cartItemId = $result[0]['id'];
        if (count($result) > 0) {
            $quantity = $result[0]['quantity'];
        }
        $quantity--;

        if ($quantity > 0) {
            $this->db->execute("UPDATE cart_product SET quantity = $quantity WHERE cart_id = $cartID AND product_id = $productID");
        } else {
            $cart_item_mg = new CartProductManager();

            $cart_item_mg->delete($cartItemId);
        }
    }

    public function getCartID()
    {
        $cart_id = 0;

        $result = $this->db->query("SELECT * FROM cart WHERE client_id = '$this->clientID'");
        if (count($result) > 0) {
            $cart_id = $result[0]['id'];
        } else {
            $cart_id = $this->create([
                'client_id' => $this->clientID
            ]);
        }
        return $cart_id;
    }

    private function initClientIDSession()
    {
        if (isset($_SESSION['client_id'])) {
            $this->clientID = $_SESSION['client_id'];
        } else {
            $str = substr(md5(mt_rand()), 0, 20);
            $_SESSION['client_id'] = $str;
            $this->clientID = $str;
        }
    }
}


class CartProductManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'cart_id', 'product_id', 'quantity');
        $this->tableName = 'cart_product';
    }
}
