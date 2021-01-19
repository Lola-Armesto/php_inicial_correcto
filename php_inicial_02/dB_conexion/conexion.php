
<?php


$db_host = 'localhost';
$db_name = 'stdcore_practicas';
$db_user = 'practicas';
$db_pass = '@Jpu,#JNKDP<[VqmkvSS|&y8E';


$db_conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Create connection
if (mysqli_connect_errno()) { die('Failed to connect to MySQL: '.mysqli_connect_error()); exit(); } // Check connection
?>