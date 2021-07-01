<?php
    include './conn.php';
    $connect=conn();
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
         echo  $number_list[$i];  echo "\t";
         echo $thang_list[$i]; echo "\t";
        //  echo $nam_list[$i]; 
         echo '<br>';
         $i++ ;
     }
     }else {
         echo "0 results";
     }	
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>12345</p>
</body>
</html> -->