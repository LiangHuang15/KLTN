<?php
  
    include './conn.php';
    $connect=conn();
    if(isset($_POST['userid']))
    {
    $id = $_POST['userid'];
    $sql="select * from recommend,movies where UserID=$id and recommend.MovieID=movies.MovieID";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		// echo'
    		// <div class="col-6 col-sm-4 col-lg-6">
    		// 	<div class="card" style="background-color: #fff; border:0; border-radius:3px; box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    		// 		<div class="card__cover">
    		// 			<img src="'.$row["url"].'" alt="">
    		// 			<a href="#" class="card__play">
    		// 			<i class="fas fa-play"></i>
    		// 			</a>
    		// 		</div>
    		// 		<div class="card__content">
    		// 			<h3 class="card__title"><a href="#">'.$row["Title"].'</a></h3>
    		// 			<span class="card__category">
    		// 				<a href="#">Action</a>
    		// 				<a href="#">Triler</a>
    		// 			</span>
    		// 			<span class="card__rate"><i class="fas fa-star"></i>'.$row["avg_ratings"].'</span>
    		// 		</div>
    		// 	</div>
    		// </div>
    		// ';
            echo'
            <div class="col-6 col-sm-4 col-lg-6">
								<div class="card" style="background-color: #fff; border:0; border-radius:3px; box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
									<div class="card__cover">
										<img style="width:150px;height:250px;" src="'.$row["url"].'" alt="">
										<a href="detail.php?id='.$row["MovieID"].'" class="card__play">
											<i class="fas fa-play"></i></i>
										</a>
									</div>
									<div class="card__content">
										<h3 style="text-overflow: ellipsis;width:150px;" class="card__title"><a href="detail.php?id='.$row["MovieID"].'">'.$row["Title"].'</a></h3>
										<span class="card__category">
											<a style="text-overflow: ellipsis;width:150px;  overflow: hidden;  white-space: nowrap;  " href="">'.$row["Genres"].'</a>
										
										</span>
										<span class="card__rate"><i class="fas fa-star"></i>'.$row["avg_ratings"].'</span>
									</div>
								</div>
							</div>
            ';

  
    	}
    }
    mysqli_close($connect);	
    }
    
?>