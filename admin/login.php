<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
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
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Đăng nhập</h1>
                    <p class="auth-subtitle mb-5">Vui lòng nhập tài khoản và mật khẩu để đăng nhập</p>

                    <form method="post" action="check_login.php">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username" placeholder="Tài khoản">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" placeholder="Mật khẩu">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng nhập</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Nếu bạn chưa có tài quản vui lòng liên hệ Admin để được cấp</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>