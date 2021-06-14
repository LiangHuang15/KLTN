<?php
        session_start();
        if(isset($_SESSION['UserID']) && isset($_SESSION['password']))
        {
			header("Location: home.php");
			exit();
		}
		else{
?>


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
								echo '<div class="item " id="'.$row["MovieID"].'" onclick="detail(this.id)">
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
			<!-- load  item -->
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

<!-- onclick genres  -->

<script>
function newpage(clicked_id)
{
  $temp  = clicked_id;
  window.location.href = "fetch_genres.php?id="+$temp;
}
</script>	
<!-- end onclick genres  -->

<!-- onclick detail  -->

<script>
function detail(clicked_id)
{
  $temp  = clicked_id;
  window.location.href = "detail_page.php?id="+$temp;
}
</script>	
<!-- end onclick genres  -->

<?php
}
?>