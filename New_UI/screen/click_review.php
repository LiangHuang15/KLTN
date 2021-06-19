<?php
include './conn.php';
$connect=conn();
if(isset($_POST['id']))
{
    
	$movieid=$_POST['id'];
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
?>