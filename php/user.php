<?php
    class User{
        public $first_name;
        public $last_name;
        public $email;
        public $password;
        public $sign_up_date;
        public $role;

        function __construct($arr){
            $this->first_name=$arr[0];
            $this->last_name=$arr[1];
            $this->email=$arr[2];
            $this->password=$arr[3];
            $this->sign_up_date=$arr[4];
            $this->role=$arr[5];
        }

        function get_first_name(){
            return $this->first_name;
        }
        function get_last_name(){
            return $this->last_name;
        }
        function get_email(){
            return $this->email;
        }
        function get_password(){
            return $this->password;
        }
        function get_sign_up_date(){
            return $this->sign_up_date;
        }
        function get_role(){
            return $this->role;
        }


    }
?>