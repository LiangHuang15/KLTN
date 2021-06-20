<?php
    include './conn.php';
    session_start();
    $connect=conn();

    if(isset($_POST['username'])&& isset($_POST['password'])) 
    {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data; 
        }

        $username=$_POST['username'];
        $password=$_POST['password'];
        echo $username;
        echo $password;
        if (empty($username)){
            header("Location: index.php?error=Username is required");
            exit();
        }elseif(empty($password)){
            header("Location: index.php?error=Password is requured");
            exit();
        }else
        {
       
            // $sql="call check_login($username,$password)";
            $sql="select * from  manager where Username = '$username' and password=md5('$password')";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) === 1){
           
                $row = mysqli_fetch_assoc($result);
                if($row['Username'] == $username )
                {
                   $_SESSION['UserID_admin'] = $row['UserID'];
                   $_SESSION['Username_admin'] = $row['Username'];
                   header("Location: dashboard.php");
                   exit();
                } 
            }
            else{
                header("Location: index.php?error=Incorect username or password");
                exit();
                
          
            }
    
        }
    }
    else
        {
            header("Location: index.php");
            echo"error";
            exit();
        }
    ?>
</body>
</html>
