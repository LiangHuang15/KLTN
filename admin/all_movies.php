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
                            <h3 class="col-10 ">Danh sách phim</h3>
                            <a  href="add_new_movie.php" class="btn btn-primary float-right">Thêm mới</a>
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
                                        <th>Tên phim</th>
                                        <th>Thể loại</th>
                                        <th>Đánh giá trung bình</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include './conn.php';
                                        $connect=conn();
                                        $sql=" select * from movies ORDER by MovieID DESC ";
                                        $result = mysqli_query($connect, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo '
                                                <tr>
                                                <td>'.$row["MovieID"].'</td>
                                                <td>'.$row["Title"].'</td>
                                                <td>'.$row["Genres"].'</td>
                                                <td><i class="fas fa-star" style="color: #F1AF00;"></i> 4.5/5</td>
                                                <td>
                                                <a name="edit" href="edit_movie.php?id='.$row['MovieID'].'"><i class="fas fa-edit"></i></a>
                                                <a onclick="return checkDelete()" name ="remove" href="check_delete_movie.php?id='.$row['MovieID'].'" ><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                                ';
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
                let table1 = document.querySelector('#table1');
                let dataTable = new simpleDatatables.DataTable(table1);
            </script>
            
            <script language="JavaScript" type="text/javascript">
            function checkDelete(){
                return confirm('Are you sure?');
            }
            </script>
<?php include("footer.php");?>