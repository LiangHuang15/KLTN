<?php
    include './conn.php';
    $connect=conn();
    if((isset($_POST['result_select'])) && (isset($_POST['fname'])) && (isset($_POST['result_image'])) && (isset($_POST['result_video'])) &&( $_POST['result_select']!=="") &&($_POST['result_image']!=="") && ($_POST['result_video']!=="") &&($_POST['fname']!==""))
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
        $name =$_POST['fname'];
        $genres = $_POST['result_select'];
        $url_image =  'http://localhost/kltn/images/new_movie/'.$_POST["result_image"].'';
        $url_video= 'http://localhost/kltn/video/'.$_POST["result_video"].'';
  
        $sql1="select * from movies where Title='$name'";
        $result1=mysqli_query($connect, $sql1);
        if(mysqli_num_rows($result1) > 0)
        {
            header("Location: add_new_movie.php?error= phim đã tồn tại.");
            exit();
        }
        else
        {
            $sql="insert into movies (Title,Genres,url,url_video) values ('$name','$genres','$url_image','$url_video')";
            $result = mysqli_query($connect, $sql);
            if($result)
            {
        
                header("Location: dashboard.php?success= thêm phim thành công.");
                exit();
            }
        }
    }

    elseif($_POST['result_select']!="")
    {
        header("Location: add_new_movie.php?error= chưa chọn thể loại.");
        exit();
    }
    elseif($_POST['result_image']!="")
    {
        header("Location: add_new_movie.php?error= chưa chọn ảnh cho phim.");
        exit();
    }
    elseif($_POST['result_video']!="")
    {
        header("Location: add_new_movie.php?error= chưa chọn video cho phim.");
        exit();
    }
    elseif($_POST['fname']!="")
    {
        header("Location: add_new_movie.php?error= chưa chọn tên cho phim.");
        exit();
    }
    
?> 