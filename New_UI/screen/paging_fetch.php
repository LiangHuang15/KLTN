
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

$output = '
<label style=width:100%;height:20px;>Total Records - '.$total_data.'</label>


';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <div  style="width:20%;height:400px;margin-top:0px;position:relative;display:flex;">
    <div style ="height: 98%;width:96%;position:absolute;margin-left:2%;margin-top:1%;"class="image">
      <a href="#" style ="height: 100%;width:100%;">
        <img src="'.$row["url"].'" class="w-100" style="position: relative;height: 100%;width:100%;">
          <div style="width:100%;height:100%;position: absolute; bottom:0px;background-image:linear-gradient(rgba(255,255,255,0), rgba(0,0,0,0.2));border-radius:10px;">
            <div style="position: absolute; height: 20%; width:100%; bottom: 0px;left:5px; border-radius:10px;display:flex;">
              <div style="width:100%;height:100%;position:relative;display:block;">
                <p style="color:rgb(255, 255, 255);width:100%;margin-top:0px;margin: 0px 0;">'.$row["Title"].'</p>
                <p  style="color:rgb(255, 255, 255);width:100%;margin-top:0px;margin: 0px 0;">'.$row["Genres"].'</p>
                <p style="color:rgb(255, 255, 255);width:100%;margin-top:0px;margin: 0px 0;">'.$row["avg_ratings"].'/5</p>
              </div>
            </div>
          </div>
        </im>
        <div class="overlay">
          <div class="detail">View Details</div>
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
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
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
