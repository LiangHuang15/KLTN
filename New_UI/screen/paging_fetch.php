
<?php

$connect = new PDO("mysql:host=localhost; dbname=movielens", "root", "");

$limit = '10';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT * FROM movies 
";

$query .= 'ORDER BY MovieID ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

// $output = '
// <label style=width:100%;height:20px;>Total Records - '.$total_data.'</label>
// ';
$output = '
<div style=width:100%;height:40px ;>
  <p style=width:20%;height:100%;padding-left:20px;margin-left:10px;background:rgb(112,186,245);border-top-right-radius:5px;border-bottom-right-radius:10px;font-weight:bold;font-size:25px;color:white;>Danh sách phim</p>
</div>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
  
    $output .= '
    <div id="'.$row["MovieID"].'" onclick="detail(this.id)" style="width:19%;height:300px;margin-top:1%;margin-left:1%;position:relative;display:flex;border-radius:5px;">
    <div  style ="  height: 98%;width:96%;position:absolute;margin-top:1%;border-radius:5px;"class="image">
         
                <a href="#" style ="height: 100%;width:100%;border-radius:5px;z-index:-1;">
                <img src="'.$row["url"].'" class="w-100" style="position: relative;height: 100%;width:100%;border-radius:5px;">
                <div style="width:100%;height:100%;position: absolute; bottom:0px;border-radius:5px;">
                    <div style="position: absolute;background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));height: 100%; width:100%; bottom: 0px; border-radius:5px;display:flex;">
                        <div style="width:100%;height:30%;position:absolute;padding:5px;display:block;bottom:0;">
                        <p style="color:rgb(255, 255, 255);text-overflow: ellipsis; overflow: hidden;  white-space: nowrap;width:100%;font-family: bebas kai;font-weight:bold;margin-top:0px;margin: 0px 0;">'.$row["Title"].'</p>
                        <p  style="color:rgb(255, 255, 255);text-overflow: ellipsis; overflow: hidden;  white-space: nowrap; width:100%;font-family: bebas kai;margin-top:0px;margin: 0px 0;">'.$row["Genres"].'</p>
                        <span style="color:rgb(255, 255, 255);font-family: bebas kai;margin-top:0px;margin: 0px 0;">'.$row["avg_ratings"].'/5</span> <i class="fas fa-star" style="color:yellow"> </i>
                        </div>
                    </div>
                </div>
            </img>
                <div class="overlay">
                    <div style="text-align:center;"class="detail">Xem phim</div>
                </div>
                </a>
         
    </div>
  </div>
  ';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
<div style="width:100%; height:20px;" align="center">
  <ul style="width:100%; height:100%;" class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Về trước</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Về trước</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Tiếp theo</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Tiếp theo</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>
