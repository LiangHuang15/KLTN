<?php
//load data from search
include './conn.php';
$connect=conn();
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    select * from movies where Title like '%$search%' or Genres like '%$search%'
    ";
}
// else
// {
//     $query = "
//     SELECT * FROM movies ORDER BY MovieID limit 10
//     ";
// }
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
    <div class="table-responsive">
        <table class="table table bordered">
        <tr>
            <th>Name</th>
            <th>Genres</th>
        </tr>
    ';

    while($row = mysqli_fetch_array($result))
    {
        $num = $row[0];
        $output .= '
        <tr >
                <td id="'.$num.'" onclick=newpage(this.id)>'.$row["Title"].'</td>
                <td>'.$row["Genres"].'</td>
                
                
        </tr>
        ';
    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}

?>