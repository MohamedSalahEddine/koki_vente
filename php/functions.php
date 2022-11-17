<?php 
    include('connection.php');
    

    function get_emails($connection){
        $i=0;
        $emails_list=[];
        $sql = "select email from users";
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
        $sql = "select first_name, last_name, email, password, sign_up_date, role from student where email = '$email' and password='$hached_password'";
        $result=mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    function getPosts($connection){
        $sql = "select * from users inner join posts on users.id=posts.user_id";
        $result=mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($result);
        foreach($data as $d){
             displayPost($d[1],$d[2], $d[10], $d[9], $d[11]);
            
        }
    }



    function displayPost($first_name, $last_name, $date, $text, $img){
        $str = "
            <div class='post'>
                <span id='user_name'>$first_name $last_name</span>
                <span id='post_date'>$date</span>
                <textarea readonly id='post_content'>$text</textarea>
                <img src='../images/$img' alt='$img'/>
            </div>
        ";
        echo $str;
    }

?>