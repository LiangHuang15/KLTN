<?php
include './conn.php';
$connect=conn();
if(isset($_POST['id']))
{
    
	$movieid=$_POST['id'];
	$sql3="select * from comment,users where MovieID=$movieid and comment.UserID=users.UserID and Comment is not null order by Timestamp desc";
	$result3= mysqli_query($connect, $sql3);
	if(mysqli_num_rows($result3) > 0)
	{
		while($row = mysqli_fetch_array($result3))
		{
		$datetime=date('m/d/Y H:i:s',$row["Timestamp"]);
		echo'	<ul class="comments__list">
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
}
?>