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
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Đăng nhập</h3>
        <form method="post" action="login.php">
        	<div class="row">
        		 <label for="username">
                    Tên đăng nhập:
                    <input type="text" name="username" id="username" placeholder="Nhập ID"  required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Mật khẩu:
                    <input type="password" name="password" id="password" placeholder="******"  required="required" />
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
						<input type="checkbox" name="remember" value="Remember me"><span>Ghi nhớ đăng nhập</span>
					</div>
            		<a href="#">Quên mật khẩu</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="submit">Đăng nhập</button>
           </div>
        </form>
        <div class="row">
        	<p>Đăng nhập bằng:</p>
            <div class="social-btn-2">
            	<a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
            	<a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Đăng ký</h3>
        <form method="post" action="signup_check.php">
            <div class="row">
                 <label for="username_2">
                    Tài khoản:
                    <input type="text" name="username_2" id="username_2" placeholder="Nhập tài khoản" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="genres" >
                    Giới tính:
					<input style="width:50%;height:100%;"type="radio" id="male" name="gender" value="M">
					<label style="width:50%;"  for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="F">
					<label for="female">Female</label><br>
					
                </label>
            </div>
			<div class="row">
                <label for="password_2">
                    Mật khẩu:
                    <input type="password" name="password_2" id="password_2" placeholder=""  required="required" />
                </label>
            </div>
			<div class="row">
                <label for="password_2">
                    Mật khẩu:
                    <input type="password" name="password_2" id="password_2" placeholder=""  required="required" />
                </label>
            </div>
			<div class="row">
                <label for="password_2">
                    Mật khẩu:
                    <input type="password" name="password_2" id="password_2" placeholder=""  required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password_3">
                    Nhập lại mật khẩu:
                    <input type="password" name="password_3" id="password_3" placeholder=""  required="required" />
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
						<li class="loginLink"><a href="#">Đăng nhập</a></li>
						<li class="btn signupLink"><a href="#">Đăng ký</a></li>
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



<script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
            url:"fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
            });

        }
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
            });
    });



</script> 
<script>   

            function newpage(clicked_id){
           $temp  = clicked_id;
		   values = $temp
			window.location.href = "detail_page.php?id="+values;
            }
</script>   
