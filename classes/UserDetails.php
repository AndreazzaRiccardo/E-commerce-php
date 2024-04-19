<?php

class UserDetailsManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'user_details';
        $this->columns = array('id', 'name', 'address', 'phone', 'user_id');
    }

    public function getDetails($id)
    {
        $result = $this->db->query("SELECT user_details.*
        FROM user_details
        JOIN users ON user_details.user_id = users.id
        WHERE users.id = '$id';");
        return $result[0];
    }
}
