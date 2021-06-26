<?php
      if(isset($_GET['success'])) {?>
          <p class="success" style="background: #F2DEDE;color: #A94442;border-radius:5px;"><?php echo $_GET["success"]; ?> </p>
      <?php
      }
      ?>
     
<?php include("slider.php");?>
<?php
      if(isset($_GET['success'])) {?>
          <p class="success" style="background: white;color:rgb(115,201,145) ;border-radius:5px;"><?php echo $_GET["success"]; ?> </p>
      <?php
      }
      ?>
<?php
      if(isset($_GET['error'])) {?>
          <p class="success" style="background: #F2DEDE;color:#A94442;border-radius:5px;"><?php echo $_GET["error"]; ?> </p>
      <?php
      }
      ?>


            <div class="page-heading d-flex">
                <h3>Tổng quan</h3>

            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                <i class="fas fa-film"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tổng số lượng phim</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tổng số người dùng</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Người dùng mới tháng này</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon" style="background-color: #ffc107">
                                                <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Đánh giá tích cực tháng này</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Tổng số lượng đánh giá 12 tháng qua</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="page-title">
                    <div class="row">
                        <div class="col-12 d-flex mb-2">
                            <h3 class="col-10 ">Danh người dùng trên hệ thống</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên người dùng</th>
                                        <th>Giới tính</th>
                                        <th>Tuổi</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        include './conn.php';
                                        $connect=conn();
                                        $sql=" select * from users ORDER by UserID desc ";
                                        $result = mysqli_query($connect, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                if($row["Gender"]=="F")
                                                {
                                                    echo '
                                                <tr>
                                                    <td>'.$row["UserID"].'</td>
                                                    <td>'.$row["Username"].'</td>
                                                    <td>Nữ</td>
                                                    <td>'.$row["Age"].'</td>
                                                    <td>
                                                    <a name="edit" href="edit_user.php?id='.$row["UserID"].'"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                                ';
                                                }
                                                else
                                                {
                                                    echo '
                                                    <tr>
                                                        <td>'.$row["UserID"].'</td>
                                                        <td>'.$row["Username"].'</td>
                                                        <td>Nam</td>
                                                        <td>'.$row["Age"].'</td>
                                                        <td>
                                                        <a name="edit" href="edit_user.php?id='.$row["UserID"].'"><i class="fas fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                    ';
                                                }
                                                
                                            }
                                        }else {
                                            echo "0 results";
                                        }	
                                        mysqli_close($connect);	
                                    ?>
                                   
                                    
  
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            
            <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
            <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">Admin</h5>
                                        <h6 class="text-muted mb-0">Administrator</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Chào mừng người dùng mới</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Tỉ lệ giới tính</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </section>
           
<?php include("footer.php");?>