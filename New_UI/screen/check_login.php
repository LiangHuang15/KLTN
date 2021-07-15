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
        // $file = "../../data.json";
        // $arr = array(
        //     'username'     => $_POST['username'],
        //     'password'    => $_POST['password'],
        // );
    
        // $json_string = json_encode($arr);
        // file_put_contents($file, $json_string);
        if (empty($username)){
            header("Location: login.php?error=Username is required");
            exit();
        }elseif(empty($password)){
            header("Location: login.php?error=Password is requured");
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
                    $file = "../../data.json";
                    $arr = array(
                        'username'     => $row['UserID'],
                        'password'    => $_POST['password'],
                    );
                    $json_string = json_encode($arr);
                    file_put_contents($file, $json_string);
                   $_SESSION['UserID'] = $row['UserID'];
                   $_SESSION['Username'] = $row['Username'];
                   header("Location: home.php");
                   // run python file 
                
               
          
                   exit();
                } 
            }
   

            else{
                header("Location: login.php?error=Incorect username or password");
                exit();
                
                // header("Location: login.php");
                // echo 'alert("Incorect username or password")';
                // exit(); 

               
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

