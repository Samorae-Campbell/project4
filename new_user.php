<?php
check(mysql_connect("0.0.0.0","samorae101"), "connect");
check(mysql_select_db("cheap"), "selecting db");

function check($result, $message) {
  if (!$result) {
    die("SQL error during $message: " . mysql_error());
  }
}

/*$user = $_POST{'username'};
$password = $_POST{'password'};*/

session_start();

$user = $_SESSION{'username'};
$pass = $_SESSION{'password'};

$user = $_POST{'username'};
$password = $_POST{'password'};
$fname = $_POST{'fname'};
$lname = $_POST{'lname'};

/*echo ($rec_user);
echo ($subject);
echo ($body);
$user = "sally.li.14";*/
for ($i = 0;$i<1;$i++){
$sql = "INSERT INTO users (fname,lname,username,password)
VALUES ('$fname','$lname','$user','$password')";
}

if (mysql_query($sql) === TRUE) {
    ?> <h1> Success</h1><?php
    echo "User Added";
    ?><br/><br/><br/><br/><br/> <input type="button"onclick="returnHome()" value="Return Home">    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>