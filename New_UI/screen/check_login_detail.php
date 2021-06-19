<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check_login</title>
</head>
<body>
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
        if (empty($username)){
            header("Location: login_detail.php?error=Username is required");
            exit();
        }elseif(empty($password)){
            header("Location: login_detail.php?error=Password is requured");
            exit();
        }else
        {

            // $sql="call check_login($username,$password)";
            $sql="select * from  users where Username = '$username' and password=md5($password)";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) === 1){
           
                $row = mysqli_fetch_assoc($result);
                if($row['Username'] == $username )
                {
                   $_SESSION['UserID'] = $row['UserID'];
                   $_SESSION['Username'] = $row['Username'];
                    $id = $_GET["id"];
                   header("Location: detail.php?id=$id");
                   exit();
                } 
            }
   

            else{
                header("Location: login_detail.php?error=Incorect username or password");
                exit();
                
                // header("Location: login.php");
                // echo 'alert("Incorect username or password")';
                // exit(); 

               
            }
    
        }
    }
    else
        {
            header("Location: detail.php");
            exit();
        }
    ?>
</body>
</html>

