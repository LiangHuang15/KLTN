<?php
//     $value=$_GET['id'];
//     include './conn.php';
//     $connect=conn();
//     $output = '';
//     if(isset($_GET['id']))
//     {
        
//         $query = "
//         select * from movies where Genres like '%$value%'  LIMIT 10
//         ";
//     }
//     $result = mysqli_query($connect, $query);
//     if(mysqli_num_rows($result) > 0)
//     {
//         while($row = mysqli_fetch_array($result))
//         {
//             $output .= '<div class="item " id="'.$row["MovieID"].'" onclick="detail(this.id)">
//             <div class="work ">
//                 <div class="img d-flex align-items-end justify-content-center" style="background-image: url('.$row["url"].');">
//                     <div class="text w-100">
//                         <span class="cat">'.$row["Genres"].'</span>
//                         <h3><a href="#">'.$row["Title"].'</a></h3>
//                         <i class="fas fa-star" style="color:yellow"><h5>'.$row["avg_ratings"].'/5</h5></i>
//                     </div>
//                 </div>
//             </div>
//         </div>
//             ';
       
        
//         }
//         echo $output;
//     }
//     else
// {
//     echo 'Data Not Found';
// }
?>

<?php


include './conn.php';
$connect=conn();
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    select * from movies where Genres like '%$search%'  LIMIT 7
    ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<div class="item " id="'.$row["MovieID"].'" onclick="detail(this.id)">
        <div class="work ">
            <div class="img d-flex align-items-end justify-content-center" style="background-image: url('.$row["url"].');">
                <div class="text w-100">
                    <span class="cat">'.$row["Genres"].'</span>
                    <h3><a href="#">'.$row["Title"].'</a></h3>
                    <i class="fas fa-star" style="color:yellow"><h5>'.$row["avg_ratings"].'/5</h5></i>
                </div>
            </div>
        </div>
    </div>

    ';
    }
    echo $output;
}
else
{
echo 'Data Not Found';
}
?>
 <script src="../js/carouseljs/jquery.min.js"></script>
    <script src="../js/carouseljs/owl.carousel.min.js"></script>
    <script src="../js/carouseljs/main.js"></script>

