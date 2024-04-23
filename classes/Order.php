<?php

class OrderManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'orders';
        $this->columns = array('id', 'name', 'address', 'phone', 'total_amount', 'cart_id');
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
}
