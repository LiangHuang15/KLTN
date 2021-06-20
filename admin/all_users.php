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
<div class="page-heading">
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
            </div>
            
            <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
            <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
<?php include("footer.php");?>