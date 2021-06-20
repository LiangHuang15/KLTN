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
    

<section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Cập nhật thông tin người dùng</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="check_edit_user.php" method="post">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>ID</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="userid" class="form-control"
                                                            name="fname" value="<?php echo $_GET['id']?>" placeholder="<?php echo $_GET['id']?>" readonly="readonly">
                                                            <?php  
                                                                include './conn.php';
                                                                $connect=conn();
                                                                $id =$_GET['id']; 
                                                                $sql=" select * from users  where UserID = $id ";
                                                                $result = mysqli_query($connect, $sql);
                                                                if(mysqli_num_rows($result) === 1) 
                                                                {
                                                                    while($row = mysqli_fetch_assoc($result))
                                                                    {
                                                                        $username = $row['Username'];
                                                                        $occupation = $row['Occupation'];
                                                                        $gender = $row['Gender'];
                                                                        $age = $row['Age'];
                                                                        $zipcode = $row['Zip-code'];
                                                                    }
                                                                }
                                                            ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tên người dùng</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="user_name" class="form-control"
                                                            name="user_name" value="<?php echo $username?>" >
                                                    </div>


                                                    <div class="col-md-4">
                                                        <label>Giới tính</label>
                                                    </div>
                                                   
                                                    <fieldset class="col-md-8 form-group">
                                                        <select class="form-select" id="gender" name="gender">
                                                        <?php
                                                            if($gender==="F")
                                                            {
                                                                echo ' <option selected="selected" value="F">Nữ</option>';
                                                                echo ' <option value="N">Nam</option>';
                                                            }
                                                            else
                                                            {
                                                                echo ' <option selected="selected" value="N">Nam</option>';
                                                                echo ' <option  value="F">Nữ</option>';
                                                            }
                                                        ?>
                                                        </select>
                                                    </fieldset>
                                                    <div class="col-md-4">
                                                        <label>Năm sinh</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">

                                                    <select class="form-select" name="date_value">
                                                        <?php
                                                        for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                                            <?php 
                                                                $namsinh= (int)date('Y') - (int)$age;
                                                                if($year==$namsinh)
                                                                {
                                                                    echo '<option selected="selected" value="'.$year.'"> '.$year.'</option>';
                                                                }
                                                                else
                                                                {
                                                                    echo '<option  value="'.$year.'"> '.$year.'</option>';
                                                                }
                                                            ?>
                                                           
                                                        <?php endfor; ?>
                                                    </select>
                                                        <!-- <input type="date" id="date_value" class="form-control"
                                                            name="date_value" placeholder="Nguyễn ô nội"> -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nghề nghiệp</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <select class="form-select" id="jobTitle" name="job">
                                                    <?php
                                                        //    include './conn.php';
                                                        //    $connect=conn();
                                                            $sql1="select * from occupation";
                                                            $result1 = mysqli_query($connect, $sql1);
                                                            if(mysqli_num_rows($result1) > 0) 
                                                            {
                                                                while($row = mysqli_fetch_assoc($result1))
                                                                {
                                                                    if($occupation==$row['JobID'])
                                                                    {
                                                                        echo '
                                                                        <option selected="selected" value="'.$row["JobID"].'" >'.$row["JobTitle"].'</option>
                                                                    ';
                                                                    }else{
                                                                    echo '
                                                                        <option value="'.$row["JobID"].'" >'.$row["JobTitle"].'</option>
                                                                    ';
                                                                    }
                                                                   
                                                                }
                                                            }else {
                                                                echo "0 results";
                                                            }	
                                                            mysqli_close($connect);
                                                    ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Zip-code</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="zipcode" class="form-control"
                                                            name="zipcode" value="<?php echo $zipcode?>" >
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Cập nhật</button>
                                                        <button
                                                            class="btn btn-light-secondary me-1 mb-1"><a href="all_users.php">Bỏ qua</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                <?php include("footer.php");?>