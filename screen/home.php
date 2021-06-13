<?php include("header.php");  ?>
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
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="https://upload.wikimedia.org/wikipedia/en/1/13/Toy_Story.jpg" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Animation</a></span>
	    				</div>
	    				<h6><a href="#">Toys story</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
				<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="https://upload.wikimedia.org/wikipedia/en/5/5d/Sudden_Death_%281995_film_poster%29.jpg" alt="" width="auto" height="437"!important></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Animation</a></span>
	    				</div>
	    				<h6><a href="#">Toys story</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
				<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="https://upload.wikimedia.org/wikipedia/en/1/13/Toy_Story.jpg" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Animation</a></span>
	    				</div>
	    				<h6><a href="#">Toys story</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
				<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="https://upload.wikimedia.org/wikipedia/en/1/13/Toy_Story.jpg" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Animation</a></span>
	    				</div>
	    				<h6><a href="#">Toys story</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>

				<!-- End load rồi -->
	    	</div>
	    </div>
	</div>
</div>

<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
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
<?php include("footer.php");?>