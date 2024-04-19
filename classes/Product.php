<?php

class ProductManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'products';
        $this->columns = array('id', 'name', 'description', 'price', 'category_id', "image_path");
    }

    public function getWithCategory()
    {
        $result = $this->db->query("
        SELECT products.*, categories.name AS category_name
        FROM products
        INNER JOIN categories
        ON products.category_id = categories.id
        ");
        return $result;
    }
}
