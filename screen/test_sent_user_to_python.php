<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sentusertopython</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form class ="login" action="#" method="POST">
        <input type="text" placeholder="user_id" name="user_form"></input>
        <br>
        <input type="password" name='password'></input>
        <br>
        <input type="submit" name="submit" id="submit" value="submit"></button>
    </form>

  

<?php

if(isset($_POST['submit'])) {
    $file = "../data.json";
    // $file = fopen('//data.json', 'w');
    // $file="/Applications/XAMPP/xamppfiles/htdocs/KLTN/data.json";
    $arr = array(
        'user_form'     => $_POST['user_form'],
        'password'    => $_POST['password'],
    );

    $json_string = json_encode($arr);
    file_put_contents($file, $json_string);
    // echo $json_string;

   shell_exec('/usr/bin/python3 /Applications/XAMPP/xamppfiles/htdocs/KLTN/matrix_1m.py');
   
}
?>
</body>
</html> 