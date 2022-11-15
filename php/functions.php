<?php 
    include('connection.php');
    

    function get_emails($connection){
        $i=0;
        $emails_list=[];
        $sql = "select email from student";
        $email_result = mysqli_query($connection, $sql);
        $emails = mysqli_fetch_all($email_result);
        foreach($emails as $key => $value){
            $emails_list[$i++]=$value[0];
        }
        return array_values($emails_list);
    }

    function validate_password($password){
        if(strlen($password) < 8 || strlen($password) > 100){
            return false;
        }else{
            return true;
        }
    }
    function authentify($email, $password, $connection){
        $hached_password = sha1($password);
        $sql = "select first_name, last_name, email, password, sign_up_date, wallet from student where email = '$email' and password='$hached_password'";
        $result=mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

?>