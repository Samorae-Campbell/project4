<?php

mysql_connect(
"0.0.0.0",
"samorae101"
);
mysql_select_db("cheap");


$user = $_POST{'username'};
$pass = $_POST{'password'};

//$user = "sally.li.14";

$results = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass';");

$row = mysql_fetch_array($results);

session_start();
$_SESSION["username"] = $user;
$_SESSION["password"] = $pass;



if ($row){
    //echo $row["fname"];
    header("Location: load_home.php");
}else{
    echo false;
}


?>

