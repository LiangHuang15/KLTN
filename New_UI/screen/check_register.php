<?php
    include './conn.php';
    $connect=conn();
    if(isset($_POST['Name'])&& isset($_POST['date']) && isset($_POST['jobtitle']) && isset($_POST['gender']) && isset($_POST['password']) &&  isset($_POST['passwordConfirmation'])) 
    {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; 
        }
        $username=$_POST['Name'];
        // $date=date("Y",$_POST['date']);
        $date=$_POST['date'];
        $curent_year=date('Y');
        $year = date('Y', strtotime($date));
        $age=$curent_year - $year;
        $jobtitle=$_POST['jobtitle'];
        $gender=$_POST['gender'];
        $password=$_POST['password'];
        $passwordConfirmation=$_POST['passwordConfirmation'];
        if (empty($username)){
            header("Location: register.php?error=Username is required");
            exit();
        }elseif(empty($date)){
            header("Location: register.php?error=Date is requured");
            exit();
        }elseif(empty($jobtitle)){
            header("Location: register.php?error=Job is requured");
            exit();
        }elseif(empty($gender)){
            header("Location: register.php?error=Genres is requured");
            exit();
        }
        elseif(empty($password)){
            header("Location: register.php?error=Password is requured");
            exit();
        }elseif($password !== $passwordConfirmation)
        {
            header("Location: register.php?error=The confirmation password does not match");
            exit();
        }else
        {
            $sql="select * from users where Username= '$username'";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                header("Location: register.php?error=The username is taken try by another");
                exit();
            }else
            {
                $sql1="call insert_user('$username','$gender','$age','$jobtitle','$password')";
                $result1 = mysqli_query($connect, $sql1);
                if($result1)
                {
                    header("Location: login.php?success=Your account has been created successfully");
                    exit();
                }
                else {
                    header("Location: register.php?error= not created account");
                    exit();
                }
            }
        }
    }
    else
    {
        header("Location: login.php");
        exit();
    }
?>