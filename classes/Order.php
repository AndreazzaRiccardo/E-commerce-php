<?php

class OrderManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'orders';
        $this->columns = array('id', 'name', 'address','phone', 'total_amount', 'cart_id');
    }
}
