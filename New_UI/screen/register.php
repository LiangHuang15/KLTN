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
    <link rel="stylesheet" href="../css/register.css">

    <title>Đăng ký</title>
  </head>
  <body>
<!-- Navbar-->
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



<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            
            <h1>Tạo tài khoản</h1>
<img src="../images/undraw_remotely_2j6y.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="check_register.php" method="post">
                <div class="row">

                    <!-- First Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="Name" type="text" name="Name" placeholder="Tên đăng nhập" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Data of birth -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="date" type="date" name="date" placeholder="Năm sinh" class="form-control bg-white border-left-0 border-md">
                    </div>

                  


                    <!-- Job -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md">
                        <option value="">Nghề nghiệp</option>
                            <option value="1">academic/educator</option>
                            <option value="2">artist</option>
                            <option value="3">clerical/admin</option>
                            <option value="4">college/grad student</option>
                            <option value="5">customer service</option>

                            <option value="6">doctor/health care</option>
                            <option value="7">executive/managerial</option>
                            <option value="8">farmer</option>
                            <option value="9">homemaker</option>

                            <option value="10">K-12 student</option>
                            <option value="11">lawyer</option>
                            <option value="12">programmer</option>
                            <option value="13">retired</option>
                            <option value="14">sales/marketing</option>
                            <option value="15">scientist</option>
                            <option value="16">self-employed</option>
                            <option value="17">technician/engineer</option>
                            <option value="18">tradesman/craftsman</option>
                            <option value="19">unemployed</option>
                            <option value="20">writer</option>
                            <option value="0">orther</option>
                        </select>
                    </div>

                    <!-- Gender -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="genres" name="gender" class="form-control custom-select bg-white border-left-0 border-md">
                        <option value="">Giới tính</option>
                            <option value="M">Nam</option>
                            <option value="F">Nữ</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Mật khẩu" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder=" Nhập lại" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-4">
                       <input style="width:100%;color:white;font-weight:bold;height:150%;border-radius:5px;background:rgb(0,108,210);" type="submit" value="Tạo tài khoản"></input>
                        <!-- <a   class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Tạo tài khoản</span>
                        </a> -->
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Đã có tài khoản <a href="login.php" class="text-primary ml-2">Đăng nhập</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>