<?php
    include './conn.php';
    $connect=conn();
    if(empty($_POST["user_name"]))
    {
        $id =$_POST["fname"];
        header("Location: edit_user.php?id=$id&error=Chưa nhập tên ngừoi dùng.");
        exit();
    }
    if(empty($_POST["gender"]))
    {
        header("Location: edit_user.php?id=$id&error= Chưa chọn giới tính.");
        exit();
    }
    if(empty($_POST["date_value"]))
    {
        header("Location: edit_user.php?id=$id&error= Chưa chọn ngày sinh.");
        exit();
    }
    if(empty($_POST["job"]))
    {
        header("Location: edit_user.php?id=$id&error= Chưa chọn công việc.");
        exit();
    }
    if((isset($_POST["user_name"])) && (isset($_POST["gender"])) && (isset($_POST["date_value"])) &&(isset($_POST["job"])) )
    {

        $id = $_POST["fname"];
        $username = $_POST["user_name"]; 
        $gender =$_POST["gender"];
        $age = (int)date('Y') - (int) $_POST["date_value"] ;
        $occupation = $_POST["job"];
        $zipcode = $_POST["zipcode"];
        $sql="update users set Username='$username',Gender='$gender',Age=$age,Occupation=$occupation,`Zip-code`=$zipcode where UserID=$id";
        $result = mysqli_query($connect, $sql);
        if($result)
        {
            header("Location: all_users.php?success=Cập nhật thành công.");
            exit();
        }
        else
        {
            header("Location: edit_user.php?id=$id&error=Cập nhật không thành công.");
            exit();
        }
    }
    else
    echo "error";
?>