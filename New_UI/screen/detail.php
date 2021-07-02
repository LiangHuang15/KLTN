
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="../css/detailpage/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../css/detailpage/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../css/detailpage/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/detailpage/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="../css/detailpage/nouislider.min.css">
	<link rel="stylesheet" href="../css/detailpage/plyr.css">
	<link rel="stylesheet" href="../css/detailpage/photoswipe.css">
	<link rel="stylesheet" href="../css/detailpage/default-skin.css">
	<link rel="stylesheet" href="../css/detailpage/main.css">

	<link rel="stylesheet" href="../fonts/icomoon/style.css">

<link rel="stylesheet" href="../css/owl.carousel.min.css">
<link rel=" icon" href="https://iconape.com/google-play-movies-tv-logo-icon-svg-png.html" type="image/x-icon">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href="../css/style.css">

<link rel="stylesheet" href="../css/search_bar.css">

<!-- search bar -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>Demo Website</title>

</head>
<?php
        session_start();
        if(isset($_SESSION['UserID']) && isset($_SESSION['Username']))
        {
?>

<body class="body-detailpage">


<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-12" >
              <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">info@yourdomain.com</span></a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">1+ (234) 5678 9101</span></a>


              <div class="float-right">

                <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>

              </div>

            </div>

          </div>

        </div>
      </div>

      <header onclick="hide_search();" style="top:0;z-index:100;position: fixed; background:white; box-shadow: 0 5px 25px 0 rgba(0,0,0,0.1);" class="site-navbar js-sticky-header site-navbar-target" style="background-color:white;"role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo col-1" >
              <a href="index.php" class="text-black"><span class="text-primary">movie</a>
            </div>

            <div class="col-11 ml-auto d-none d-lg-block">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li  class="div_search" >
          
                    <form class="search-bar-form"action="">
                      <input class="search-input" type="search">
                      <i class="fa fa-search icon-search-fa"></i>
                    </form>
                      
                </li> 
                <li><a href="home.php" class="nav-link">Trang chính</a></li>
                  
                  <li class="has-children">
                    <a href="#about-section" class="nav-link">Thể loại</a>
                    <ul class="dropdown arrow-top" style="height:400px;">
					<li><a  id="Action"  onclick="newpage(this.id)">Phim hành động</a></li>
                      <li><a  id="Adventure"  onclick="newpage(this.id)">Phim phiêu lưu</a></li>
                      <li><a  id="Animation"  onclick="newpage(this.id)">Phim hoạt hình</a></li>
                      <li><a  id="Children's" onclick="newpage(this.id)">Phim dành cho trẻ em </a></li>
                      <li><a  id="Comedy" onclick="newpage(this.id)">Phim hài hước</a></li>
                      <li><a  id="Crime" onclick="newpage(this.id)">Phim hình sự </a></li>
                      <li><a  id="Documentary" onclick="newpage(this.id)">Phim tài liệu</a></li>
                      <li><a  id="Drama" onclick="newpage(this.id)">Phim hài</a></li>
                      <li><a  id="Fantasy" onclick="newpage(this.id)">Phim viễn tưởng</a></li>
                      <li><a  id="Film-Noir" onclick="newpage(this.id)">Phim tội phạm Hollywood</a></li>
                      <li><a  id="Horror" onclick="newpage(this.id)">Phim kinh dị (ma)</a></li>
                      <li><a  id="Musical" onclick="newpage(this.id)">Phim âm nhạc</a></li>
                      <li><a  id="Mystery" onclick="newpage(this.id)">Phim thần bí</a></li>
                      <li><a  id="Romance" onclick="newpage(this.id)">Phim tình cảm</a></li>
                      <li><a  id="Sci-Fi" onclick="newpage(this.id)">Phim khoa học viễn tưởng</a></li>
                      <li><a  id="Thriller" onclick="newpage(this.id)">Phim kinh dị</a></li>
                      <li><a  id="War" onclick="newpage(this.id)">Phim chiến tranh</a></li>
                      <li><a  id="Western" onclick="newpage(this.id)">Phim viễn tây</a></li>

                     
                    </ul>
                  </li>
                  <li><a href="#services-section" class="nav-link">Về chúng tôi</a></li>
                  <li class="has-children">
                    <a href="#about-section" class="nav-link">Xin chào <?php echo $_SESSION['Username'] ?></a>
                    <ul class="dropdown arrow-top">
                      <li><a href="logout.php" class="nav-link">Đăng xuất</a></li>
                    </ul>
                  </li>

                  
                </ul>
              </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>
	  <div style="margin-left:15%;margin-top:50px;overflow-x:hidden;overflow-y:scroll;width:60%;z-index:100;position:fixed;background:white;" id="result" ></div>  
	<!-- details -->
	<section onclick="hide_search();" class="section details mt-5 " >
		<!-- details background -->
		<div class="details__bg" data-bg="../images/bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<?php
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
				}
				include './conn.php';
				$connect=conn();
				$sql=" select * from movies where MovieID=$id";
				$result = mysqli_query($connect, $sql);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result))
					{
						echo'
						<div class="col-12">
							<h1 class="details__title">'.$row["Title"].'</h1>
						</div>
						<!-- end title -->

						<!-- content -->

					
								<div class="col-12 col-xl-6">
									<div class="card card--details">
										<div class="row" >
											<!-- card cover -->
											<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
												<div class="card__cover">
													<img src="'.$row["url"].'" alt="">
												</div>
											</div>
											<!-- end card cover -->

											<!-- card content -->
											<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
												<div class="card__content">
													<div class="card__wrap">
														<span class="card__rate"><i class="fas fa-star"></i>'.$row["avg_ratings"].'</span>

														<ul class="card__list pt-2">
															<li>HD</li>
															<li>16+</li>
														</ul>
													</div>

													<ul class="card__meta">
														<li><span>Thể loại:</span> <a href="#">'.$row["Genres"].'</a></li>
														<li><span>Năm phát hành:</span> 2017</li>
														<li><span>Running time:</span> 120 min</li>
														<li><span>Country:</span> <a href="#">USA</a> </li>
													</ul>

													<div class="card__description card__description--details">
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using `Content here, content here`, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for `lorem ipsum` will uncover many web sites still in their infancy.
													
													</div>
												</div>
											</div>
											<!-- end card content -->
										</div>
									</div>
								</div>
							
						<!-- end content -->

						<!-- player -->
						<div class="col-12 col-xl-6">
							<video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
								<!-- Video files -->
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4" type="video/mp4" size="1440">

								<!-- Caption files -->
								<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
									default>
								<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

								<!-- Fallback for browsers that don`t support the <video> element -->
								<a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
							</video>
						</div>
						<!-- end player -->';

			}
		}else {
			echo "0 results";
		  }	
		  mysqli_close($connect);	
		?>

			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section onclick="hide_search();" class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h1 class="content__title">Thông tin phim</h1>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item" >
								<a class="nav-link2 active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Bình luận</a>
							</li>

							<li class="nav-item">
								<a class="nav-link1" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Đánh giá</a>
								<!-- <a class="nav-link1 ">Reviews</a> -->
							</li>

							<li class="nav-item">
								<a class="nav-link1" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div  class="content__mobile-tabs" id="content__mobile-tabs">
							<div  class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments" >
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a  class="nav-link1 active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Bình luận</a></li>
		  							
									<li class="nav-item"><a class="nav-link1" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Đánh giá</a></li>

									<li class="nav-item"><a class="nav-link1" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-12">
									<div class="comments">
										<form  method="post" action="comment_add.php" class="ajax">
											<input style="display:none;" type="text" id="movieid" name="movieid" value="<?php echo $_GET['id'] ?>" ></input>
											<input style="display:none;" type="text" id="userid" name="userid" value="<?php echo $_SESSION['UserID'] ?>" ></input>
												<textarea id="comment" name="comment" class="form__textarea" placeholder="Add comment"></textarea>
												<button id="submitButton" type="submit" class="form__btn" style="color: white">Bình luận</button>
										</form>
										<br>
		  								<div id="result_comment" class="list_comments">
 
											<!-- <ul class="comments__list">
												<li class="comments__item">
													<div class="comments__autor">
														<img class="comments__avatar" src="../images/user.png" alt="">
														<span class="comments__name">John Doe</span>
														<span class="comments__time">30.08.2018, 17:53</span>
													</div>
													<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>

												</li>
											</ul> -->
										</div>

									</div>
								</div>
						
								
								
							
								<!-- end comments -->
							</div>
						</div>

						
						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							<div class="row">
								<!-- reviews -->
								<div class="col-12">
									<div class="reviews">
									<link rel="stylesheet" href="../css/slider.css">
								
										<form action="review_add.php" method="post" id="ajax1" class="ajax1">
										
											<input style="display:none;" type="text" id="movieid" name="movieid" value="<?php echo $_GET['id'] ?>" ></input>
											<input style="display:none;" type="text" id="userid" name="userid" value="<?php echo $_SESSION['UserID'] ?>" ></input>
											
											<div class="rating">
												<!-- <input style=" -webkit-transition: .2s;transition: opacity .2s; width:250px;opacity: 0.7;height:5px;margin-top:10px; border-radius:4px; cursor: pointer;outline:none;background:rgb(2,104,200);" type="range" name="rating" min="1" max="5" value="5" class="slider" id="myRange"  oninput="updateTextInput(this.value);" >
												<span style="margin-left:10px;" id="demo">5</span><i style="margin-top:2px;margin-left:3px;color:darkorange;"class="fas fa-star"></i> -->
										
												<span  onmouseover="starmark(this)" onclick="starmark(this)" id="1one" style="font-size:40px;cursor:pointer;"  class="fa fa-star checked"></span>
												<span onmouseover="starmark(this)" onclick="starmark(this)" id="2one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
												<span onmouseover="starmark(this)" onclick="starmark(this)" id="3one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
												<span onmouseover="starmark(this)" onclick="starmark(this)" id="4one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
												<span onmouseover="starmark(this)" onclick="starmark(this)" id="5one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
												<!-- script mouse over start get value -->
												<script>
													var count;
													function starmark(item)
													{
													count=item.id[0];
													sessionStorage.starRating = count;
													document.getElementById('rating').value = count;
													var subid= item.id.substring(1);
													for(var i=0;i<5;i++)
													{
														if(i<count)
														{
														document.getElementById((i+1)+subid).style.color="orange";
														}
														else
														{
														document.getElementById((i+1)+subid).style.color="black";
														}
													}
													}
												</script>
												<!-- end  script mouse over start get value -->
											</div>
											<input style="display:none;" class="mb-1" type="text" id="rating" name="rating" value="5"></input>
											<textarea class="form__textarea" id="review" name="review" placeholder="Review"></textarea>
											<button  type="submit" class="form__btn" style="color: white">Gửi đánh giá</button>
										</form>
										<script>
										$(':radio').change(function() {
										console.log('New star rating: ' + this.value);
										});
									</script>
										<br></br>
										<ul id="result_review" class="reviews__list">
											
											<!-- <li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="../images/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="fas fa-star"></i>8.4</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li> -->
										</ul>

									
									</div>
								</div>
								<!-- end reviews -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
							<!-- project gallery -->
							<div class="gallery" itemscope>
								<div class="row">
									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-1.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-1.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 1</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-2.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-2.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 2</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-3.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-3.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 3</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-4.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-4.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 4</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-5.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-5.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 5</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-6.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-6.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 6</figcaption>
									</figure>
									<!-- end gallery item -->
								</div>
							</div>
							<!-- end project gallery -->
						</div>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title section__title--sidebar">Dành cho bạn . . .</h2>
						</div>
						<!-- end section title -->
						<!-- card -->
						<div id="result_recommend" class="row">
							
							

						</div>
					
					</div>
				</div>
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->
	
	<!-- JS -->
	<script src="../js/detailpageJS/jquery-3.3.1.min.js"></script>
	<script src="../js/detailpageJS/bootstrap.bundle.min.js"></script>
	<script src="../js/detailpageJS/owl.carousel.min.js"></script>
	<script src="../js/detailpageJS/jquery.mousewheel.min.js"></script>
	<script src="../js/detailpageJS/jquery.mCustomScrollbar.min.js"></script>
	<script src="../js/detailpageJS/wNumb.js"></script>
	<script src="../js/detailpageJS/nouislider.min.js"></script>
	<script src="../js/detailpageJS/plyr.min.js"></script>
	<script src="../js/detailpageJS/jquery.morelines.min.js"></script>
	<script src="../js/detailpageJS/photoswipe.min.js"></script>
	<script src="../js/detailpageJS/photoswipe-ui-default.min.js"></script>
	<script src="../js/detailpageJS/main.js"></script>

	
</body>

<!-- event comment -->
<script>
$('form.ajax').on('submit',function(){
       var  that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};
        that.find('[name]').each(function(index,value){
           var that = $(this),
           name = that.attr('name'),
           value = that.val();
           data[name] = value;
        });
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response ){
                // console.log(response);
                $('#result_comment').html(response);
            }
        });
     
        return false;
   });

</script>
<!-- end event comment -->


<!-- event review -->
<script>

$('form.ajax1').on('submit',function(){
       var  that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};
        that.find('[name]').each(function(index,value){
           var that = $(this),
           name = that.attr('name'),
           value = that.val();
           data[name] = value;
        });
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response ){
                // console.log(response);
                $('#result_review').html(response);
            }
        });
     
        return false;
   });




</script>


<!-- end event review -->

<!-- onclick review -->
<script>
$(function () {
    $('.nav-link1').on('click', function () {
        var id = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: 'click_review.php',
			type: 'post',
            data: {
                
                id: id
            },
            success: function(response ){
                // console.log(response);
                $('#result_review').html(response);
            }
        });
    });
});
</script>
<!-- end onclick review -->

<!-- onclick commend -->
<script>
$(function () {
    $('.nav-link2').on('click', function () {
        var id = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: 'click_comment.php',
			type: 'post',
            data: {
                
                id: id
            },
            success: function(response ){
                // console.log(response);
                $('#result_comment').html(response);
            }
        });
    });
});
</script>
<!-- end onclick commend -->


<!-- onload comment -->
<script>
 $(document).ready(function() {
		var id = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: 'click_comment.php',
			type: 'post',
            data: {
                
                id: id
            },
            success: function(response ){
                // console.log(response);
                $('#result_comment').html(response);
            }
        });
		// load recommend
		// var userid = $_SESSION['UserID'];
		
		var userid =1;
		$.ajax({
			url: 'load_recommend.php',
			type: 'post',
            data: {
                
                userid: userid
            },
            success: function(response ){
                console.log(response);
                $('#result_recommend').html(response);
            }

		});

});
</script>
<!-- end  onload comment -->


<!-- ###### chưa login ###### -->








<?php
}
else{?>

<body class="body-detailpage">


<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-12" >
              <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">info@yourdomain.com</span></a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">1+ (234) 5678 9101</span></a>


              <div class="float-right">

                <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>

              </div>

            </div>

          </div>

        </div>
      </div>

      <header onclick="hide_search()" style="top:0;z-index:100;position: fixed; background:white; box-shadow: 0 5px 25px 0 rgba(0,0,0,0.1);" class="site-navbar js-sticky-header site-navbar-target" style="background-color:white;"role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo col-1" >
              <a href="index.php" class="text-black"><span class="text-primary">movie</a>
            </div>

            <div class="col-11 ml-auto d-none d-lg-block">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li  class="div_search" >
          
                    <form class="search-bar-form"action="">
                      <input class="search-input" type="search">
                      <i class="fa fa-search icon-search-fa"></i>
                    </form>
                      
                </li> 
                <li><a href="home.php" class="nav-link">Trang chính</a></li>
                
                  <li class="has-children">
                    <a href="#about-section" class="nav-link">Thể loại</a>
                    <ul class="dropdown arrow-top" style="height:400px;">
					<li><a  id="Action"  onclick="newpage(this.id)">Phim hành động</a></li>
                      <li><a  id="Adventure"  onclick="newpage(this.id)">Phim phiêu lưu</a></li>
                      <li><a  id="Animation"  onclick="newpage(this.id)">Phim hoạt hình</a></li>
                      <li><a  id="Children's" onclick="newpage(this.id)">Phim dành cho trẻ em </a></li>
                      <li><a  id="Comedy" onclick="newpage(this.id)">Phim hài hước</a></li>
                      <li><a  id="Crime" onclick="newpage(this.id)">Phim hình sự </a></li>
                      <li><a  id="Documentary" onclick="newpage(this.id)">Phim tài liệu</a></li>
                      <li><a  id="Drama" onclick="newpage(this.id)">Phim hài</a></li>
                      <li><a  id="Fantasy" onclick="newpage(this.id)">Phim viễn tưởng</a></li>
                      <li><a  id="Film-Noir" onclick="newpage(this.id)">Phim tội phạm Hollywood</a></li>
                      <li><a  id="Horror" onclick="newpage(this.id)">Phim kinh dị (ma)</a></li>
                      <li><a  id="Musical" onclick="newpage(this.id)">Phim âm nhạc</a></li>
                      <li><a  id="Mystery" onclick="newpage(this.id)">Phim thần bí</a></li>
                      <li><a  id="Romance" onclick="newpage(this.id)">Phim tình cảm</a></li>
                      <li><a  id="Sci-Fi" onclick="newpage(this.id)">Phim khoa học viễn tưởng</a></li>
                      <li><a  id="Thriller" onclick="newpage(this.id)">Phim kinh dị</a></li>
                      <li><a  id="War" onclick="newpage(this.id)">Phim chiến tranh</a></li>
                      <li><a  id="Western" onclick="newpage(this.id)">Phim viễn tây</a></li>

                     
                    </ul>
                  </li>
				 
                  <li><a href="#services-section" class="nav-link">Về chúng tôi</a></li>
				  <li class="btn-login" ><a <?php echo' href="login_detail.php?id='.$_GET["id"].'"'?> id="login" class="nav-link " >Đăng nhập</a></li>

                  
                </ul>
              </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>
	  <div style="margin-left:15%;margin-top:50px;overflow-x:hidden;overflow-y:scroll;width:60%;z-index:100;position:fixed;background:white;" id="result"></div>  
	<!-- details -->
	<section onclick="hide_search();" class="section details mt-5 " >
		<!-- details background -->
		<div class="details__bg" data-bg="../images/bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<?php
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
				}
				include './conn.php';
				$connect=conn();
				$sql=" select * from movies where MovieID=$id";
				$result = mysqli_query($connect, $sql);
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result))
					{
						echo'
						<div class="col-12">
							<h1 class="details__title">'.$row["Title"].'</h1>
						</div>
						<!-- end title -->

						<!-- content -->

					
								<div class="col-12 col-xl-6">
									<div class="card card--details">
										<div class="row" >
											<!-- card cover -->
											<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
												<div class="card__cover">
													<img src="'.$row["url"].'" alt="">
												</div>
											</div>
											<!-- end card cover -->

											<!-- card content -->
											<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
												<div class="card__content">
													<div class="card__wrap">
														<span class="card__rate"><i class="fas fa-star"></i>'.$row["avg_ratings"].'</span>

														<ul class="card__list pt-2">
															<li>HD</li>
															<li>16+</li>
														</ul>
													</div>

													<ul class="card__meta">
														<li><span>Thể loại:</span> <a href="#">'.$row["Genres"].'</a></li>
														<li><span>Năm phát hành:</span> 2017</li>
														<li><span>Running time:</span> 120 min</li>
														<li><span>Country:</span> <a href="#">USA</a> </li>
													</ul>

													<div class="card__description card__description--details">
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using `Content here, content here`, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for `lorem ipsum` will uncover many web sites still in their infancy.
													
													</div>
												</div>
											</div>
											<!-- end card content -->
										</div>
									</div>
								</div>
							
						<!-- end content -->

						<!-- player -->
						<div class="col-12 col-xl-6">
							<video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
								<!-- Video files -->
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
								<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4" type="video/mp4" size="1440">

								<!-- Caption files -->
								<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
									default>
								<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

								<!-- Fallback for browsers that don`t support the <video> element -->
								<a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
							</video>
						</div>
						<!-- end player -->';

			}
		}else {
			echo "0 results";
		  }	
		  mysqli_close($connect);	
		?>

			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section onclick="hide_search();" class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Thông tin phim</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item" >
								<a class="nav-link2 active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Bình luận</a>
							</li>

							<li class="nav-item">
								<a class="nav-link1" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Đánh giá</a>
							</li>

							<li class="nav-item">
								<a style="display:none;" class="nav-link1" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div  class="content__mobile-tabs" id="content__mobile-tabs">
							<div  class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments" >
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a  class="nav-link1 active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Bình luận</a></li>

									<li class="nav-item"><a class="nav-link1" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Đánh giá</a></li>

									<li class="nav-item"><a class="nav-link1" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-12">
									<div class="comments">
		  								<div id="result_comment" class="list_comments">
											<!-- <ul class="comments__list">
												<li class="comments__item">
													<div class="comments__autor">
														<img class="comments__avatar" src="../images/user.png" alt="">
														<span class="comments__name">John Doe</span>
														<span class="comments__time">30.08.2018, 17:53</span>
													</div>
													<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>

												</li>
											</ul> -->
										</div>
									</div>
								</div>
								<!-- end comments -->
							</div>
						</div>
						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							<div class="row">
								<!-- reviews -->
								<div class="col-12">
									<div class="reviews">
										<ul id="result_review" class="reviews__list">
											<!-- <li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="../images/user.png" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="fas fa-star"></i>7.5</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li> -->
										</ul>
									</div>
								</div>
								<!-- end reviews -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
							<!-- project gallery -->
							<div class="gallery" itemscope>
								<div class="row">
									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-1.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-1.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 1</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-2.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-2.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 2</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-3.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-3.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 3</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-4.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-4.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 4</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-5.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-5.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 5</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-6.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-6.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 6</figcaption>
									</figure>
									<!-- end gallery item -->
								</div>
							</div>
							<!-- end project gallery -->
						</div>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->
	
	<!-- JS -->
	<script src="../js/detailpageJS/jquery-3.3.1.min.js"></script>
	<script src="../js/detailpageJS/bootstrap.bundle.min.js"></script>
	<script src="../js/detailpageJS/owl.carousel.min.js"></script>
	<script src="../js/detailpageJS/jquery.mousewheel.min.js"></script>
	<script src="../js/detailpageJS/jquery.mCustomScrollbar.min.js"></script>
	<script src="../js/detailpageJS/wNumb.js"></script>
	<script src="../js/detailpageJS/nouislider.min.js"></script>
	<script src="../js/detailpageJS/plyr.min.js"></script>
	<script src="../js/detailpageJS/jquery.morelines.min.js"></script>
	<script src="../js/detailpageJS/photoswipe.min.js"></script>
	<script src="../js/detailpageJS/photoswipe-ui-default.min.js"></script>
	<script src="../js/detailpageJS/main.js"></script>


<!-- onclick review -->
<script>
$(function () {
    $('.nav-link1').on('click', function () {
        var id = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: 'click_review.php',
			type: 'post',
            data: {
                
                id: id
            },
            success: function(response ){
                console.log(response);
                $('#result_review').html(response);
            }
        });
    });
});
</script>
<!-- end onclick review -->

<!-- onclick commend -->
<script>
$(function () {
    $('.nav-link2').on('click', function () {
        var id = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: 'click_comment.php',
			type: 'post',
            data: {
                
                id: id
            },
            success: function(response ){
                console.log(response);
                $('#result_comment').html(response);
            }
        });
    });
});
</script>
<!-- end onclick commend -->


<!-- onload comment -->
<script>
 $(document).ready(function() {
		var id = <?php echo json_encode($_GET['id']); ?>;
        $.ajax({
            url: 'click_comment.php',
			type: 'post',
            data: {
                
                id: id
            },
            success: function(response ){
                console.log(response);
                $('#result_comment').html(response);
            }
        });
});
</script>
<!-- end  onload comment -->
	
</body>



   <?php
	} 
?> 







<script>
// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 50) {
    document.getElementById("result").style.top = "45px";
    document.getElementById("result").style.overflow = scroll;
  } else {
    document.getElementById("result").style.top = "45px";
    document.getElementById("result").style.overflow = scroll;
  }
}
</script>



<!-- event search -->
  
<script>
$(document).ready(function(){

  load_data();

  function load_data(query)
  {
      $.ajax({
      url:"fetch_search.php",
      method:"POST",
      data:{query:query},
      success:function(data)
      {
          var x = document.getElementById("result");
          x.style.display = "block";
          $('#result').html(data);
      }
      });

  }
  $('.search-input').keyup(function(){
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
<!-- end event search -->

<!-- click hide search  -->
<script>
function hide_search() {
  var x = document.getElementById("result");
    x.style.display = "none";
}
</script>
<!--  end click hide search  -->
<!-- onclick detail  -->

<script>
function detail(clicked_id)
{
  $temp  = clicked_id;
  window.location.href = "detail.php?id="+$temp;
}
</script>	
<!-- end onclick detail  -->
</html>

