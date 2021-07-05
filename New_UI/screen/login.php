<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/Loginstyle.css">

    <title>Login #7</title>
  </head>
  <body>
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

  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img style="opacity:0.6;" src="https://previews.123rf.com/images/alexandertrou/alexandertrou1801/alexandertrou180100028/94296423-movie-time-vector-illustration-cinema-poster-concept-on-red-round-background-composition-with-popcor.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h1>Đăng nhập</h1>
              <p class="mb-4">Đăng nhập để khám phá thêm nhiều bộ phim hấp dẫn</p>
            </div>
            <form action="check_login.php" method="post">
              <div class="form-group first mb-2">
                <label class="pl-2" for="username">Tài khoản</label>
                <input type="text" class="form-control" name="username" id="username">

              </div>
              <div class="form-group last mb-4">
                <label  class="pl-2" for="password">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="password">
                
              </div>

              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ tài khoản</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Quên mật khẩu</a></span> 
               
              </div>

              <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary">
<span class="ml-auto"><a href="register.php" class="forgot-pass">Đăng ký</a></span> 
<span class="ml-auto float-right"><a href="index.php" class="forgot-pass">Bỏ qua</a></span>

              </div>
            </form>
            
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/login.js"></script>
  </body>
</html>