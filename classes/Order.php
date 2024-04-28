<?php

class OrderManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'orders';
        $this->columns = array('id', 'name', 'address', 'phone', 'total_amount', 'note', 'cart_id', 'user_id');
    }

    public function getOrderDetails($cartID)
    {
        $details = $this->db->query("
        SELECT cp.id, cp.cart_id, p.name AS product_name, cp.quantity
        FROM cart_product AS cp
        JOIN products AS p ON cp.product_id = p.id
        WHERE cp.cart_id = '$cartID'
        ");
        return $details;
    }

    public function getUserOrders($userID)
    {
        $orders = $this->db->query("
        SELECT *
        FROM orders
        WHERE user_id = '$userID'
        ");
        return $orders;
    }
}
