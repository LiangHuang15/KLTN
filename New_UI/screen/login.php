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
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="../images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h1>Đăng nhập</h1>
              <p class="mb-4">Đăng nhập để khám phá thêm nhiều bộ phim hấp dẫn</p>
            </div>
            <form action="check_login.php" method="post">
              <div class="form-group first">
                <label for="username">Tài khoản</label>
                <input type="text" class="form-control" name="username" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="password">
                
              </div>

              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ tài khoảm</span>
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