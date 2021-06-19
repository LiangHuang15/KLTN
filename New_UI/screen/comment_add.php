<?php
include './conn.php';
$connect=conn();
$output='';
 if(isset($_POST['comment']))
 {
    $userid=$_POST["userid"];
    $movieid=$_POST["movieid"];
    $comment=$_POST["comment"];
    $sql="INSERT INTO comment(UserID, MovieID, Comment, Timestamp) VALUES ($userid,$movieid,'$comment',UNIX_TIMESTAMP(now()))";
    $result = mysqli_query($connect, $sql);
    if($result)
    {

        $query1= "select * from comment,users where MovieID=$movieid and users.UserID=comment.UserID order by Timestamp desc";
        $result1 = mysqli_query($connect, $query1);
        if(mysqli_num_rows($result1) > 0)
        {
            while($row = mysqli_fetch_array($result1))
            {
                $datetime=date('m/d/Y H:i:s',$row["Timestamp"]);
                echo '	<ul class="comments__list">
                <li class="comments__item">
                    <div class="comments__autor">
                        <img class="comments__avatar" src="../images/user.png" alt="">
                        <span class="comments__name">'.$row["Username"].'</span>
                        <span class="comments__time">'.$datetime.'</span>
                    </div>
                    <p class="comments__text">'.$row['Comment'].'</p>

                </li>
            </ul>';
            }
        }
        // echo $output;
    }
 }
?>