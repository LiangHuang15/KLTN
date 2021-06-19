<?php
include './conn.php';
$connect=conn();
 if(isset($_POST['review']))
 {
   $userid=$_POST["userid"];
   $movieid=$_POST["movieid"];
   $rating=$_POST["rating"];
   $review=$_POST["review"];
   // echo  $rating ;
   // echo  $review;

   //  echo'review is'.$_POST['review'];
   //  echo'rating is'.$_POST['rating'];
   $sql="select * from ratings where MovieID=$movieid and UserID=$userid";
   $result = mysqli_query($connect, $sql);
   if(mysqli_num_rows($result) > 0)
   {
      $sql1="update ratings set Rating=$rating,Review='$review' where MovieID=$movieid and UserID=$userid";
      $result1= mysqli_query($connect, $sql1);
      if($result1)
      {
         $sql3="select * from ratings,users where MovieID=$movieid and ratings.UserID=users.UserID and Review is not null order by Timestamp desc";
         $result3= mysqli_query($connect, $sql3);
         if(mysqli_num_rows($result3) > 0)
         {
            while($row = mysqli_fetch_array($result3))
            {
               $datetime=date('m/d/Y H:i:s',$row["Timestamp"]);
               echo'<li class="reviews__item">
               <div class="reviews__autor">
                  <img class="reviews__avatar" src="../images/user.png" alt="">
                  <span class="reviews__name">'.$row["Username"].'</span>
                  <span class="reviews__time">'.$datetime.'</span>

                  <span class="reviews__rating"><i class="fas fa-star"></i>'.$row["Rating"].'</span>
               </div>
               <p class="reviews__text">'.$row["Review"].'.</p>
            </li>';
            }
         }
      }
      else
      {
         echo 'dont inserted';
      }
   }
   else
   {
      $sql2="insert into ratings values ($userid,$movieid,$rating,UNIX_TIMESTAMP(now()),'$review')";
      $result2= mysqli_query($connect, $sql2);
      if($result2)
      {
         $sql4="select * from ratings,users where MovieID=$movieid and ratings.UserID=users.UserID and Review is not null order by Timestamp desc";
         $result4= mysqli_query($connect, $sql4);
         if(mysqli_num_rows($result4) > 0)
         {
            while($row = mysqli_fetch_array($result4))
            {
               $datetime=date('m/d/Y H:i:s',$row["Timestamp"]);
               echo'<li class="reviews__item">
               <div class="reviews__autor">
                  <img class="reviews__avatar" src="../images/user.png" alt="">
                  <span class="reviews__name">'.$row["Username"].'</span>
                  <span class="reviews__time">'.$datetime.'</span>

                  <span class="reviews__rating"><i class="fas fa-star"></i>'.$row['Rating'].'</span>
               </div>
               <p class="reviews__text">'.$row["Review"].'</p>
            </li>';
            }
         }
      }
   }
 }
?>