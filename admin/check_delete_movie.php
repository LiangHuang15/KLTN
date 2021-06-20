<?php
    // $message = "wrong answer";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    include './conn.php';
    $connect=conn();
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql="delete from movies where MovieID=$id";
        $result = mysqli_query($connect, $sql);
        if($result)
        {
             $message = "Xoá thành công.";
             echo "<script type='text/javascript'>alert('$message');</script>";
             header("Location: all_movies.php");
             exit();
        }
    }
    else {
        echo 'error';
    }
?>
