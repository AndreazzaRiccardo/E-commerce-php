<?php

class CategoryManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'categories';
        $this->columns = array('id', 'name');
    }
}
