<?php
    include './conn.php';
    $connect=conn();
    // if($_POST['result_select']!="")
    // {
    //     header("Location: edit_movie.php?error= chưa chọn thể loại.");
    //     exit();
    // }
    // if($_POST['result_image']!="")
    // {
    //     header("Location: edit_movie.php?error= chưa chọn ảnh cho phim.");
    //     exit();
    // }
    // if($_POST['result_video']!="")
    // {
    //     header("Location: edit_movie.php?error= chưa chọn video cho phim.");
    //     exit();
    // }
    // if($_POST['fname']!="")
    // {
    //     header("Location: edit_movie.php?error= chưa chọn tên cho phim.");
    //     exit();
    // }
    if((isset($_POST['result_select'])) && (isset($_POST['fname']))  &&( $_POST['result_select']!=="")   &&($_POST['fname']!==""))
    {
    // echo $_POST['result_select'];
    // echo"<br>";
    // echo"<br>";
    // echo $_POST['fname'];
    // echo"<br>";
    // echo"<br>";
    // echo $_POST['result_image'];
    // echo"<br>";
    // echo"<br>";
    // echo $_POST['result_video'];
 


        $id=$_GET['id'];
        $name =$_POST['fname'];
        $genres = str_replace(',','|',$_POST['result_select']);
      
        $url_image1 =$_POST["result_image"];
        $sql1="select * from movies where url='$url_image1'";
        $result1=mysqli_query($connect, $sql1);
        if(mysqli_num_rows($result1) === 1){
            $url_image= $_POST["result_image"];
        }
        else {
            $url_image = 'http://localhost/kltn/images/new_movie/'.$_POST["result_image"].'';
        }

        $url_video1=$_POST["result_video"];
        $sql2="select * from movies where url_video='$url_image1'";
        $result2=mysqli_query($connect, $sql2);
        if(mysqli_num_rows($result2) === 1){
            $url_video= $_POST['result_video'];
        }
        else {
            $url_video = 'http://localhost/kltn/video/'.$_POST["result_video"].'';
        }
        // echo $name;
        // echo"<br>";
        // echo"<br>";
        // echo $genres;
        // echo"<br>";
        // echo"<br>";
        // echo $url_image;
        // echo"<br>";
        // echo"<br>";
        // echo $url_video;

        $sql="update movies set Title='$name',Genres='$genres',url='$url_image',url_video='$url_video' where MovieID=$id";
        $result=mysqli_query($connect, $sql);
        if($result)
        {
            header("Location: all_movies.php?success=Cập nhật thành công.");
            exit();
        }
        else
        {
            header("Location: edit_movie.php?error=Cập nhật chưa thành công.");
            exit();
        }
    } 
?> 