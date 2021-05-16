<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdNRTRZfRaN1HMNrsif3lrz9Gynwzc70XYO37or_rubBOP-_aI-ZrDXwgCHKL6yYTLDcE&usqp=CAU"> -->
    <?php
        $command = escapeshellcmd('/usr/bin/python3 /Applications/XAMPP/xamppfiles/htdocs/recommender_system/test_get_url_image.py'); 
        $output = shell_exec($command);
        echo 'success';
    ?>
</body>
</html>