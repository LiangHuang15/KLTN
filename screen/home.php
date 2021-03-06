<?php
        session_start();
        if(isset($_SESSION['UserID']) && isset($_SESSION['password']))
        {
?>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
</head>
<body>

    <p>user_<?php echo $_SESSION['UserID']?></p>
    <a href="logout.php">Logout</a>
</body>
</html> -->


<!-- load home with recommend --> 


<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<?php 
// include("header.php"); 
 ?>







 <!DOCTYPE html>

<html lang="en" class="no-js">

<head>
	<!-- Basic need -->
	<title>Khóa luận</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="../css/plugins.css">
	<link rel="stylesheet" href="../css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<!--preloading-->

<div id="preloader">
    <img class="logo" src="../images/logo1.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->

<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Đăng ký</h3>
        <form method="post" action="#">
            <div class="row">
                 <label for="username-2">
                    Tài khoản:
                    <input type="text" name="username" id="username-2" placeholder="Nhập tài khoản" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    Email:
                    <input type="email" name="email" id="email-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Mật khẩu:
                    <input type="password" name="password" id="password-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    Nhập lại mật khẩu:
                    <input type="password" name="password" id="repassword-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
           <div class="row">
             <button type="submit">Đăng ký ngay</button>
           </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="home.php"><img class="logo" src="../images/logo1.png" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a href="home.php" >Trang chính</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Thể loại<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Hành động<i class="ion-ios-arrow-forward"></i></a>
									<ul class="dropdown-menu level2">
										<li><a href="#">Hành động nhẹ</a></li>
										<li><a href="#">Hành động mạnh</a></li>
									</ul>
								</li>			
								<li><a href="#">Khoa học viễn tưởng</a></li>
								<li><a href="#">Tâm lý</a></li>
								<li class="it-last"><a href="#">Kinh dị</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">          
						<li><a href="#">Về chúng tôi</a></li>
						<li ><a href="logout.php">Đăng Xuất</a></li>
						<li> <p>Xin chào user_<?php echo $_SESSION['UserID']?></p></li>
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->
	    <!-- <div class="top-search">
	    	<select>
				<option value="united">Phim</option>
				<option value="saab">Thể loại</option>
			</select>
			<input type="text"  name="search_text" id="search_text" placeholder="Hãy nhập tên phim bạn muốn tìm . . ." class="form-control">
			<br />
    		<div style="background:white;" id="result"></div>  
	    </div> -->
		<div class="top-search">
			<input  type="text" name="search_text" id="search_text" placeholder="Search by name" class="form-control" />
			<div style="background:white;"id="result"></div>  
	    </div>
	</div>
</header>
<!-- END | Header -->








<div class="slider movie-items">
	<div class="container">
		<div class="row">
			<div class="social-link">
				<p>Theo dõi ngay: </p>
				<a href="detail_page.php"><i class="ion-social-facebook"></i></a>
				<a href="#"><i class="ion-social-twitter"></i></a>
				<a href="#"><i class="ion-social-googleplus"></i></a>
				<a href="#"><i class="ion-social-youtube"></i></a>
			</div>
	    	<div  class="slick-multiItemSlider">
			<!-- Load top movies nha :)) -->
					<?php
							include './conn.php';
							$connect=conn();
							$sql=" select * from movies ORDER by avg_ratings DESC LIMIT 10";
							$result = mysqli_query($connect, $sql);
							if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) 
							{
								echo '<div class="movie-item" id="'.$row["MovieID"].'" value ='.$row["MovieID"].' onclick="newpage(this.id)">
								<div class="mv-img"  >
									<a href="#"><img  id="img" src=" ' .$row["url"]. '" alt="" width="285" height="437"></a>
								</div>
								<div class="title-in">
									<div class="cate">
										<span class="blue"><a href="#">Animation </a></span>
									</div>
									<h6><a id="title" href="#">' .$row["Title"]. ' </a></h6>
									<p><i class="ion-android-star"></i><span>'.$row["avg_ratings"].'</span> /5</p>
								</div>
								</div>';
							}
						}else {
							echo "0 results";
						  }	
						  mysqli_close($connect);					  		
					?>
	    		
	    	</div>
	    </div>
	</div>
</div>

<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
		<div class="col-md-12 col-sm-12 col-xs-12">
				<h1>Gợi ý cho bạn </h1>
				<div class="flex-wrap-movielist">

				<!-- Load phim nha -->
						<!-- <div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>					
						

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	 -->

						<div class="movie-item-style-2 movie-item-style-1 ">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	


						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	


						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	
				</div>		
				
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p> <span>1,608</span> bộ phim</p>
					<label>Sắp xếp:</label>
					<select>
						<option value="popularity">Theo tên A->Z</option>
						<option value="popularity">Theo tên Z->A</option>
						<option value="popularity">Theo đánh giá cao đếp thấp</option>
						<option value="popularity">Theo đánh giá thấp đếp cao</option>

					</select>
				</div>
				<div class="flex-wrap-movielist">

				<!-- Load phim nha -->
						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>					
						

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	


						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	


						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	

						<div class="movie-item-style-2 movie-item-style-1">
							<img src="../images/uploads/mv1.jpg" alt="">
							<div class="hvr-inner">
	            				<a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="#">oblivion</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
							</div>
						</div>	
				</div>		
				<div class="topbar-filter">
					<label>Số phim trên trang:</label>
					<select>
						<option value="range">20 Phim/trang</option>
						<option value="saab">10 Phim/trang</option>
					</select>
					
					<div class="pagination2">
						<span>Trang 1/ 79:</span>
						<a class="active" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">...</a>
						<a href="#">78</a>
						<a href="#">79</a>
						<a href="#"><i class="ion-arrow-right-b"></i></a>
					</div>
				</div>
			</div>
			<?php include("sidebar.php");?>

		</div>
	</div>
</div>
<?php 
include("footer.php");
?>
<script>
	function newpage(clicked_id)
	{
	$temp  = clicked_id;
	// var values = document.getElementById($temp).value;
	values = $temp
	window.location.href = "detail_page.php?id="+values;
	}
</script>	
<script>window.scrollTo(0,0);</script>





<?php
}
else{
    header("Location: index.php");
    exit();
}
?> 