<?php

class UserManager extends DBManager
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'users';
        $this->columns = ['id', 'name', 'password', 'user_type_id'];
    }

    public function login($email, $password)
    {

        $result = $this->db->query("
        SELECT *
        FROM users
        WHERE email = '$email'
        AND password = MD5('$password');
        ");

        if(count($result) > 0){
            $user = (object) $result[0];
            $user = (object) [
                'id' => $user->id,
                'email' => $user->email,
                'is_admin' => $user->user_type_id == 1
            ];
        
           $_SESSION['user'] = $user;
           
            return true;
        }
        return false;
    }

    public function passwordMatch($pass1, $pass2){
        return $pass1 == $pass2;
    }

    public function register($email, $password) {
        $controlEmail = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        if(count($controlEmail) > 0){
            return false;
        }
        $userID = $this->create([
            'email' => $email,
            'password' => md5($password),
            'user_type_id' => 2
        ]);
        return $userID;
    }
}
