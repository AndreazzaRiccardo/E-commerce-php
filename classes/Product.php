<?php

class ProductManager extends DBManager {

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('id', 'name', 'description', 'price', 'category_id', "image_path");
        $this->tableName = 'products';
    }
}