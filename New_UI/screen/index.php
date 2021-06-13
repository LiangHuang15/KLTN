<?php
    if(isset($_GET['error'])) {?>
        <p class="error" style="background: #F2DEDE;color: #A94442;border-radius:5px;"><?php echo $_GET["error"]; ?> </p>
    <?php
    }
    ?>
	<?php
    if(isset($_GET['success'])) {?>
        <p class="success" style="background: #F2DEDE;color: #A94442;border-radius:5px;"><?php echo $_GET["success"]; ?> </p>
    <?php
    }
    ?>

<?php include("header.php") ?>

<!-- Start Carousel  -->
<section class="ftco-section full-width">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="featured-carousel owl-carousel ">

						<?php
							include './conn.php';
							$connect=conn();
							$sql=" select * from movies ORDER by avg_ratings DESC LIMIT 10";
							$result = mysqli_query($connect, $sql);
							if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result))
							{
								echo '<div class="item ">
								<div class="work ">
									<div class="img d-flex align-items-end justify-content-center" style="background-image: url('.$row["url"].');">
										<div class="text w-100">
											<span class="cat">'.$row["Genres"].'</span>
                                            <h3><a href="#">'.$row["Title"].'</a></h3>
                                            <i class="fas fa-star" style="color:yellow"><h5>'.$row["avg_ratings"].'/5</h5></i>
										</div>
									</div>
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
		</section>
    <script src="../js/carouseljs/jquery.min.js"></script>
    <script src="../js/carouseljs/owl.carousel.min.js"></script>
    <script src="../js/carouseljs/main.js"></script>

<!-- End Carousel -->
<!-- Show list movie -->
<div class="page-single">
	<div class="container">
	<div id="dynamic_content" class="row" style="display:flex;width:100%;height: 900px;">




			<!-- Product  -->
			<!-- <div  style="width:20%;height:400px;margin-top:0px;position:relative;display:flex;">
				<div style ="height: 98%;width:96%;position:absolute;margin-left:2%;margin-top:1%;"class="image">
					<a href="#" style ="height: 100%;width:100%;">
						<img src="images/apple-watch.jpg" class="w-100" style="position: relative;height: 100%;width:100%;">
							<div style="width:100%;height:100%;position: absolute; bottom:0px;background-image:linear-gradient(rgba(255,255,255,0), rgba(0,0,0,0.2));border-radius:10px;">
								<div style="position: absolute; height: 20%; width:100%; bottom: 0px;left:5px; border-radius:10px;display:flex;">
									<div style="width:100%;height:100%;position:relative; display:block;">
										<p style="color:rgb(255, 255, 255);width:100%;height:50%;">Apple Watch Series 3 Aluminium </p>
										<p  style="color:rgb(255, 255, 255);width:100%;height:50%;">Price: $550.00</p>
									</div>
								</div>
							</div>
						</img>
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
			</div> -->
			<!-- ./Product -->
			
			
		
			
			

		</div>

	</div>
</div>
<!-- End -->
<?php include("footer.php") ?>


<!-- load pagination -->
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"paging_fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

  });
</script>
<!-- end load pagination -->