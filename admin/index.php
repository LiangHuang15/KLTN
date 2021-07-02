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
                            <?php 
                                include './conn.php';
                                $connect=conn();
                                $sql ="select count(*) as count from movies";
                                $result = mysqli_query($connect, $sql);
                                    $row= mysqli_fetch_assoc($result);
                                    echo '   <div class="col-6 col-lg-3 col-md-6">
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
                                                    <h6 class="font-extrabold mb-0">'.$row["count"].'</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            ?>
                            <!-- <div class="col-6 col-lg-3 col-md-6">
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
                            </div> -->
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <?php
                                         $sql ="select count(*) as count from users";
                                         $result = mysqli_query($connect, $sql);
                                             $row= mysqli_fetch_assoc($result);
                                             echo '
                                             <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Tổng số người dùng</h6>
                                                <h6 class="font-extrabold mb-0">'.$row["count"].'</h6>
                                            </div>
                                        </div>
                                    </div>
                                             ';
                                    ?>
                                    <!-- <div class="card-body px-3 py-4-5">
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
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <?php
                                          $sql ="select count(*) as count from users";
                                          $result = mysqli_query($connect, $sql);
                                              $row= mysqli_fetch_assoc($result);
                                              echo '
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
                                              ';
                                    ?>
                                    <!-- <div class="card-body px-3 py-4-5">
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
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                <?php

                                    $sql="select count(*) as count from ratings where MONTH(from_unixtime(Timestamp))= MONTH(CURRENT_DATE())and YEAR(from_unixtime(Timestamp))=YEAR(CURRENT_DATE()) and Rating>3";
                                    $result = mysqli_query($connect, $sql);
                                    $row= mysqli_fetch_assoc($result);
                                    echo '
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon" style="background-color: #ffc107">
                                                <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Đánh giá tích cực tháng này</h6>
                                                <h6 class="font-extrabold mb-0">'.$row["count"].'</h6>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                ?>
                                    <!-- <div class="card-body px-3 py-4-5">
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
                                    </div> -->
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
                            <h3 class="col-10 ">Danh sách người dùng trên hệ thống</h3>
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
                                        // include './conn.php';
                                        // $connect=conn();
                                        $sql=" select * from users ORDER by UserID desc limit 100 ";
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
                                        // mysqli_close($connect);	
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
                        <!-- <div class="card">
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
                        </div>-->
                        <div class="card">
                            <div class="card-header">
                                <h4>Chào mừng người dùng mới</h4>
                            </div>
                            <div id="loaduser" class="card-content pb-4">
                                
                                
                               <!-- <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div> -->
                                 <!-- <div class="recent-message d-flex px-4 py-3">
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
                                </div> -->
                                
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


<script>
     $(document).ready(function() {
         id= 1; 
        $.ajax({
            url: 'load_top5_user.php',
			type: 'post',
            data: {
                
                id: id
            },
            success: function(response ){
                console.log(response);
                $('.card-content').html(response);
            }
        });
     });
</script>
<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<!-- <script src="assets/js/pages/dashboard.js"></script> -->

<?php
    //  include './conn.php';
    //  $connect=conn();
     $sql="SELECT count(*) as number ,month(from_unixtime(Timestamp)) as thang, year(from_unixtime(Timestamp)) as nam FROM ratings
     GROUP by month(from_unixtime(Timestamp)), year(from_unixtime(Timestamp))
     ORDER by year(from_unixtime(Timestamp)) desc,month(from_unixtime(Timestamp))desc limit 12";
     $number_list=[];
     $thang_list=[];
     $nam_list=[];
     $i = 0;
     $result = mysqli_query($connect, $sql);
     if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result))
     {
         $number_list[$i]=$row['number'];
         $thang_list[$i]=$row["thang"]."/".$row["nam"];
        //  $nam_list[$i]=$row['nam'];
        //  echo  $number_list[$i];  echo "\t";
        //  echo $thang_list[$i]; echo "\t";
        //  echo $nam_list[$i]; 
        //  echo '<br>';
         $i++ ;
     }
     }else {
         echo "0 results";
     }	
?>
<script>
let passedArray =  <?php echo json_encode($number_list); ?>;
let passedArray1 =  <?php echo json_encode($thang_list); ?>;
// let passedArray = [9,20,300,20,10,20,30,20,10,20,30,20];
var optionsProfileVisit = {
    
annotations: {
    position: 'back'
},
dataLabels: {
    enabled:false
},
chart: {
    type: 'bar',
    height: 300
},
fill: {
    opacity:1
},
plotOptions: {
},
series: [{
    name: 'đánh giá',
    // data: [9,20,300,20,10,20,30,20,10,20,30,20]
    data: passedArray.reverse()
}],
colors: '#435ebe',
xaxis: {
    // categories: ["test","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
    categories:passedArray1.reverse(),
},
}
</script>
<script>
<?php
    $sql="select count(*) as female from users where Gender='F'";
    $result = mysqli_query($connect, $sql);
    $row= mysqli_fetch_assoc($result);
    $female = $row['female'];
    $sql1="select count(*) as total from users ";
    $result1 = mysqli_query($connect, $sql1);
    $row1= mysqli_fetch_assoc($result1);
    $total = $row1['total'];
?>
const number_female =  <?php echo json_encode($female); ?>;
const total =  <?php echo json_encode($total); ?>;
let optionsVisitorsProfile  = {
series: [parseInt(total)-parseInt(number_female), parseInt(number_female)],
// series: [50,70],
labels: ['Nam', 'Nữ'],
colors: ['#435ebe','#55c6e8'],
chart: {
    type: 'donut',
    width: '100%',
    height:'350px'
},
legend: {
    position: 'bottom'
},
plotOptions: {
    pie: {
        donut: {
            size: '30%'
        }
    }
}
}

var optionsEurope = {
series: [{
    name: 'series1',
    data: [310, 800, 600, 430, 540, 340, 605, 805,430, 540, 340, 605]
}],
chart: {
    height: 80,
    type: 'area',
    toolbar: {
        show:false,
    },
},
colors: ['#5350e9'],
stroke: {
    width: 2,
},
grid: {
    show:false,
},
dataLabels: {
    enabled: false
},
xaxis: {
    type: 'datetime',
    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z","2018-09-19T07:30:00.000Z","2018-09-19T08:30:00.000Z","2018-09-19T09:30:00.000Z","2018-09-19T10:30:00.000Z","2018-09-19T11:30:00.000Z"],
    axisBorder: {
        show:false
    },
    axisTicks: {
        show:false
    },
    labels: {
        show:false,
    }
},
show:false,
yaxis: {
    labels: {
        show:false,
    },
},
tooltip: {
    x: {
        format: 'dd/MM/yy HH:mm'
    },
},
};

let optionsAmerica = {
...optionsEurope,
colors: ['#008b75'],
}
let optionsIndonesia = {
...optionsEurope,
colors: ['#dc3545'],
}

var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
var chartEurope = new ApexCharts(document.querySelector("#chart-europe"), optionsEurope);
var chartAmerica = new ApexCharts(document.querySelector("#chart-america"), optionsAmerica);
var chartIndonesia = new ApexCharts(document.querySelector("#chart-indonesia"), optionsIndonesia);

chartIndonesia.render();
chartAmerica.render();
chartEurope.render();
chartProfileVisit.render();
chartVisitorsProfile.render()
    
</script>

           
<?php include("footer.php");?>
