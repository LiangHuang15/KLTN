<?php
     include './conn.php';
     session_start();
     $connect=conn();
     if(isset($_POST['username_2'])&& isset($_POST['password_2']) && isset($_POST['password_3'])) 
     {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; 
        }
     
        $username=$_POST['username_2'];
        $password=$_POST['password_2'];
        $re_password=$_POST['password_3'];
        if (empty($username)){
            header("Location: index.php?error=Username is required");
            exit();
        }elseif(empty($password)){
            header("Location: index.php?error=Password is requured");
            exit();
        }elseif(empty($re_password)){
            header("Location: index.php?error=RePassword is requured");
            exit();
        }elseif($password !== $re_password)
        {
            header("Location: index.php?error=The confirmation password does not match");
            exit();
        }else
        {
            $sql="select * from users where UserID=$username";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                header("Location: index.php?error=The username is taken try by another");
                exit();
            }else
            {
                $sql1="insert into users (UserID,password) values ($username,md5($password))";
                $result1 = mysqli_query($connect, $sql1);
                if($result1)
                {
                    header("Location: index.php?success=Your account has been created successfully");
                    exit();
                }
                else {
                    header("Location: index.php?error= not created account");
                    exit();
                }
            }
        }
    }
    else
        {
            header("Location: index.php");
            exit();
        }
?>