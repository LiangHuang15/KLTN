<?php
        session_start();
        if(isset($_SESSION['UserID']) && isset($_SESSION['Username']))
        {
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel=" icon" href="https://iconape.com/google-play-movies-tv-logo-icon-svg-png.html" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/lightslider.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/search_bar.css">
    
    <link rel="stylesheet" href="../css/css_grid/style_grid.css">
    <!-- search bar -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Demo Website</title>

  </head>
  <body>
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
            <div class="col-12">
            <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">17520844@gm.uit.edu.vn</span></a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">+84353817474</span></a>

              <div class="float-right">

                <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>

              </div>

            </div>

          </div>

        </div>
      </div>

      <header onclick="hide_search();" class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo col-1" >
              <a href="index.php" class="text-black"><span class="text-primary">movie</a>
            </div>

            <div class="col-11 ml-auto d-none d-lg-block">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li  class="div_search" >
          
                <form class="search-bar-form" action="search_item.php" method="post">
                      <input class="search-input" type="search" name="search">
                     <i class="fa fa-search icon-search-fa"></i>
                     <input style="display:none;" type= "submit"> 
                    </form>
                      
                </li> 
                <li><a href="home.php" class="nav-link">Trang chính</a></li>
                <li><a href="all_movie.php" class="nav-link">Danh sách phim</a></li>
                <li  class="has-children">
                    <a href="#about-section" class="nav-link">Thể loại</a>
                    
                      <ul class="dropdown arrow-top " style="height:400px;">
                        <li><a  id="Action"  onclick="newpage(this.id)">Phim hành động</a></li>
                        <li><a  id="Adventure"  onclick="newpage(this.id)">Phim phiêu lưu</a></li>
                        <li><a  id="Animation"  onclick="newpage(this.id)">Phim hoạt hình</a></li>
                        <li><a  id="Children" onclick="newpage(this.id)">Phim dành cho trẻ em </a></li>
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
      <div style="margin-left:15%;overflow-x:hidden;overflow-y:scroll;width:60%;z-index:100;position:fixed;background:white;" id="result"></div> 
  
      <script>

function newpage(clicked_id)
{
  $temp  = clicked_id;
  window.location.href = "genres.php?id="+$temp;

}

</script>	
<script type="text/javascript" src="../js/carousel_new/JQuery3.3.1.js"></script>
<script type="text/javascript" src="../js/carousel_new/lightslider.js"></script>
<div style="margin-top:0px;padding:0px;">



<div class="content" style="width:100%;height:3400px;background:white; ">
        
        <div id="dynamic_content" class="row" style="display:flex;width:98%;height:98%;margin:auto;background:white;">
        
        </div>
</div>

<script>
  $(document).ready(function(){

    
    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch_all_movie.php",
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
      document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
    });


  });
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


<?php include("footer.php") ?>



<?php
}
else{
    ?> 
            <?php include("header.php") ?>


            <div class="content" style="width:100%;height:3400px;background:white; ">
        
        <div id="dynamic_content" class="row" style="display:flex;width:98%;height:98%;margin:auto;background:white;">
        
        </div>
</div>

<script>
  $(document).ready(function(){

    
    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch_all_movie.php",
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
      document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
    });


  });
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

<?php include("footer.php") ?>


    <?php
}
?> 