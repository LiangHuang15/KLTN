<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            header("Location: index.php?error=Username is required");
            exit();
        }elseif(empty($password)){
            header("Location: index.php?error=Password is requured");
            exit();
        }else
        {
            $sql="call check_login('$username','$password')";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['UserID'] === $username && $row['password']=== md5($password))
                {
                   $_SESSION['UserID'] = $row['UserID'];
                   $_SESSION['password'] = $row['password'];
                   header("Location: home.php");
                   exit();
                } 
            }
            else{
                // header("Location: index.php?error=Incorect username or password");
                // exit();
                header("Location: index.php");
                echo 'alert("Incorect username or password")';
                exit(); 

               
            }
        }
    }
    else
        {
            header("Location: index.php");
            exit();
        }
    ?>
</body>
</html>

