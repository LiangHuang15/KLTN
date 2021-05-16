<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <div class="background">
        <div class="header">
            <ul>
                <li><a href="#">home</a></li> 
                <li><a href="#">home</a></li>    
                <li><a href="#">home</a></li>    
                <li><a href="#">home</a></li>               
            </ul>
        </div>
        <div class="main">
            <p> main </p>
        <?php 
            $command = escapeshellcmd("../test1.py");
            $output = shell_exec($command); 
            echo $output; 
        ?> 
  
        </div>
        <div class="footer">
        </div>
    </div> 
</body>
</html>