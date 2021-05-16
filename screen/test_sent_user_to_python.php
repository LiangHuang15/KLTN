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
    $arr = array(
        'user_form'     => $_POST['user_form'],
        'password'    => $_POST['password'],
    );
    $json_string = json_encode($arr);
    file_put_contents($file, $json_string);
    // echo $json_string;
}
?>
<?php
    if(isset($_POST['submit']))
    {
        // $command = escapeshellcmd('/usr/bin/python3 /Applications/XAMPP/xamppfiles/htdocs/recommender_system/test_print.py');
        // // $command = escapeshellcmd('/usr/bin/python3 /Applications/XAMPP/xamppfiles/htdocs/recommender_system/matrix_1m.py');
        // $output = shell_exec($command);

        // echo "1";
        // $output = shell_exec("bash /Users/phannhan/Desktop/script");
        // print_r($output);
       



        // $output = shell_exec('/usr/bin/python3 /Applications/XAMPP/xamppfiles/htdocs/recommender_system/test_print.py');
            $output = shell_exec('bash /Users/phannhan/Desktop/script');
        echo '<pred>'.$output.'</pre>'; 
    }
?> 
</html>