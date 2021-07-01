<?php 
    include './conn.php';
    $connect=conn();
  if(isset($_POST["id"]))
  {
    
    $sql=" select * from users ORDER by UserID desc limit 5 ";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))
    {
      echo '<div class="recent-message d-flex px-4 py-3">
      <div class="avatar avatar-lg">
          <img src="assets/images/faces/4.jpg">
      </div>
      <div class="name ms-4">
          <h5 class="mb-1">'.$row["UserID"].'</h5>
          <h6 class="text-muted mb-0">'.$row["Username"].'</h6>
      </div>
  </div>';
    }
}else {
    echo "0 results";
}	
}   
?>