<?php

class ProductManager extends DBManager {

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'products';
        $this->columns = array('id', 'name', 'description', 'price', 'category_id', "image_path");
    }
}