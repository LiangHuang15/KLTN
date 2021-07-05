<?php
        session_start();
        if(isset($_SESSION['UserID']) && isset($_SESSION['Username']))
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
<!-- <div style="margin-left:15%;width:60%;z-index:998;position:absolute;background:white;" id="result"></div>   -->

<script type="text/javascript" src="../js/carousel_new/JQuery3.3.1.js"></script>
<script type="text/javascript" src="../js/carousel_new/lightslider.js"></script>
<div style="margin-top:0px;padding:0px;">

	
      <div class="container_carousel">
		<!--slider------------------->
		<ul id="autoWidth" class="cs-hidden">
		
		<?php
		include './conn.php';
		$connect=conn();
		$sql=" select * from movies ORDER by avg_ratings DESC LIMIT 6";
		$result = mysqli_query($connect, $sql);
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result))
		{
			echo '<li class="item-a">
			<!--slider-box-->
				<div id="'.$row["MovieID"].'" ondblclick=detail(this.id) style="background-image: url('.$row["url"].'); " class="box_carousel">
         <div style="width:100%;height:100%;position:relative; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1)); ">
              <div style="position:absolute; bottom:0;padding:10px;">
                <p class="marvel" style="" >'.$row["Title"].'</p>
                <div class="details_carousel" style=" border-radius:5px; ;">
                  <span class="cat" style="color:white;background:rgb(0,122,204); padding:5px;border-radius:5px;">'.$row["Genres"].'</span>
                  <br>
                  <i class="fas fa-star" style="color:yellow"> <span>'.$row["avg_ratings"].'/5<span></i>
                  <br>
                </div>
              </div>
          </div>
				</div>
		</li>';
		}
		}else {
			echo "0 results";
		}	
		mysqli_close($connect);					  		
		?>
		</ul>

	</div>

</div>

<!-- Show list all movie -->
<div onclick="hide_search();" class="page-single">
	<div class="container">
		<div id="dynamic_content" class="row" style="display:flex;width:100%;height: 900px;">
			<!-- load  item -->
		</div>
	</div>
</div>
<!-- End Show list all movie -->
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




<!-- onclick detail  -->

<script>
function detail(clicked_id)
{
  $temp  = clicked_id;
  window.location.href = "detail.php?id="+$temp;
}
</script>	
<!-- end onclick detail  -->


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


<!-- event genres -->
<script>

</script> 
<!-- end event genres -->



<?php
}
?>