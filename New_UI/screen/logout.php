<?php
Session_start();
session_destroy();
header("Location: home.php");
exit();

?>