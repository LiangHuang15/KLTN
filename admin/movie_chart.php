<?php include("slider.php");?>

<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Thống kê theo Phim</h3>
                            <p class="text-subtitle text-muted">Biều đồ thống kê theo phim </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thống kê báo cáo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Phim có số lượng đánh giá nhiều nhất</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="bar"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tỉ lệ đánh giá</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="line"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            <canvas id="myChart" width="400" height="100"></canvas>
                            </div>
                        </div>
                        
                    </div>
                </section>
            </div>

            <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <!-- <script src="assets/js/pages/ui-chartjs.js"></script> -->

<script>



<?php
include './conn.php';
$connect=conn();
$sql="select  count(*) as count ,Title from ratings,movies  where ratings.MovieID=movies.MovieID group by ratings.MovieID ORDER by count desc limit 5";
$ratings_list=[];
$name_list=[];
$i = 0;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result))
{
    $ratings_list[$i]=$row['count'];
    $name_list[$i]=$row['Title'];
    $i++ ;
}
}else {
    echo "0 results";
}	 
?>

let ratings_list =  <?php echo json_encode($ratings_list); ?>;
let name_list =  <?php echo json_encode($name_list); ?>;
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: name_list,
        datasets: [{
            label: 'Phim được xem nhiều nhất',
            data: ratings_list,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


<?php
    //  include './conn.php';
    //  $connect=conn();
    //  $sql="select  count(*) as count ,Title from ratings,movies  where ratings.MovieID=movies.MovieID group by ratings.MovieID ORDER by count desc limit 5";
    //  $ratings_list=[];
    //  $name_list=[];
    //  $i = 0;
    //  $result = mysqli_query($connect, $sql);
    //  if (mysqli_num_rows($result) > 0) {
    //  while($row = mysqli_fetch_assoc($result))
    // {
    //     $ratings_list[$i]=$row['count'];
    //     $name_list[$i]=$row['Title'];
    //     $i++ ;
    // }
    // }else {
    //     echo "0 results";
    // }	
?>
var chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    info: '#41B1F9',
    blue: '#3245D1',
    purple: 'rgb(153, 102, 255)',
    grey: '#EBEFF6'
};


var ctxBar = document.getElementById("bar").getContext("2d");
var myBar = new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ["Jannnnnnnn", "Febnnnnnnn", "Marnnnnnnn", "Aprnnnnnnn", "Maynnnnnnn"],
        // labels: name_list,
 
        datasets: [{
            label: 'Students',
            backgroundColor: [chartColors.yellow, chartColors.red, chartColors.green, chartColors.grey, chartColors.info, chartColors.blue, chartColors.grey],
            // data: [
            //     5,
            //     10,
            //     30,
            //     40,
            //     35,
            //     55,
            //     15,
            // ]
            data: ratings_list
        }]
    },
    options: {
        responsive: true,
        barRoundness: 1,
        title: {
            display: true,
            text: "Students in 2020"
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    suggestedMax: 40 + 20,
                    padding: 10,
                },
                gridLines: {
                    drawBorder: false,
                }
            }],
            xAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false
                }
            }]
        }
    }
});

<?php
    $sql="SELECT count(*) as number, Date(from_unixtime(Timestamp)) as date FROM ratings where Rating >=3
    GROUP by day(from_unixtime(Timestamp)), month(from_unixtime(Timestamp)), year(from_unixtime(Timestamp))
    ORDER by year(from_unixtime(Timestamp)) desc,month(from_unixtime(Timestamp))desc,(from_unixtime(Timestamp))desc limit 12";
   $ratings_list1=[];
   $date_list1=[];
   $i = 0;
   $result = mysqli_query($connect, $sql);
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result))
  {
      $ratings_list1[$i]=$row['number'];
      $date_list1[$i]=$row['date'];
      $i++ ;
  }
  }else {
      echo "0 results";
  }	
  ?>
<?php
  $sql1="SELECT count(*) as number, Date(from_unixtime(Timestamp)) as date FROM ratings where Rating < 3
  GROUP by day(from_unixtime(Timestamp)), month(from_unixtime(Timestamp)), year(from_unixtime(Timestamp))
  ORDER by year(from_unixtime(Timestamp)) desc,month(from_unixtime(Timestamp))desc,(from_unixtime(Timestamp))desc limit 12";
  $ratings_list2=[];
  $date_list2=[];
  $i = 0;
  $result1 = mysqli_query($connect, $sql1);
  if (mysqli_num_rows($result1) > 0) {
  while($row1 = mysqli_fetch_assoc($result1))
 {
     $ratings_list2[$i]=$row1['number'];
     $date_list2[$i]=$row1['date'];
     $i++ ;
 }
 }else {
     echo "0 results";
 }	
?>

let ratings_list1 =  <?php echo json_encode($ratings_list1); ?>;
let date_list1 =  <?php echo json_encode($date_list1); ?>;
let ratings_list2 =  <?php echo json_encode($ratings_list2); ?>;
let date_list2 =  <?php echo json_encode($date_list2); ?>;
var line = document.getElementById("line").getContext("2d");
var gradient = line.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, 'rgba(50, 69, 209,1)');
gradient.addColorStop(1, 'rgba(265, 177, 249,0)');

var gradient2 = line.createLinearGradient(0, 0, 0, 400);
gradient2.addColorStop(0, 'rgba(255, 91, 92,1)');
gradient2.addColorStop(1, 'rgba(265, 177, 249,0)');

var myline = new Chart(line, {
    type: 'line',
    data: {
        // labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018'],
        labels: date_list1.reverse(),
        datasets: [{
            label: 'Tốt',
            // data: [50, 25, 61, 50, 72, 52, 60, 41, 30, 45],
            data: ratings_list1.reverse(),
            backgroundColor: "rgba(50, 69, 209,.6)",
            borderWidth: 3,
            borderColor: 'rgba(63,82,227,1)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,1)',
        }, {
            label: 'Chưa tốt',
            // data: [20, 35, 45, 75, 37, 86, 45, 65, 25, 53],
            data: ratings_list2.reverse(),
            backgroundColor: "rgba(253, 183, 90,.6)",
            borderWidth: 3,
                borderColor: 'rgba(253, 183, 90,.6)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,1)',
        }]
    },
    options: {
        responsive: true,
        layout: {
            padding: {
                top: 10,
            },
        },
        tooltips: {
            intersect: false,
            titleFontFamily: 'Helvetica',
            titleMarginBottom: 10,
            xPadding: 10,
            yPadding: 10,
            cornerRadius: 3,
        },
        legend: {
            display: true,
        },
        scales: {
            yAxes: [
                {
                    gridLines: {
                        display: true,
                        drawBorder: true,
                    },
                    ticks: {
                        display: true,
                    },
                },
            ],
            xAxes: [
                {
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false,
                    },
                },
            ],
        },
    }
});

let ctx1 = document.getElementById("canvas1").getContext("2d");
let ctx2 = document.getElementById("canvas2").getContext("2d");
let ctx3 = document.getElementById("canvas3").getContext("2d");
let ctx4 = document.getElementById("canvas4").getContext("2d");
var lineChart1 = new Chart(ctx1, config1);
var lineChart2 = new Chart(ctx2, config2);
var lineChart3 = new Chart(ctx3, config3);
var lineChart4 = new Chart(ctx4, config4);







</script>

<?php include("footer.php");?>