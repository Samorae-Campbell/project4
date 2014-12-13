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

$rec_user = $_POST{'rec_username'};
$subject = $_POST{'subject'};
$body = $_POST{'body'};

/*echo ($rec_user);
echo ($subject);
echo ($body);
$user = "sally.li.14";*/

$results = mysql_query("SELECT * FROM users WHERE username='$user';");

$row = mysql_fetch_array($results);

$id = $row["id"];



$results3 = mysql_query("SELECT * FROM messages WHERE recipient_ids='$r_id';");

//echo ($row["fname"]."  ".$id." sending to ".$row2["fname"]."  ".$r_id);

$results2 = mysql_query("SELECT * FROM users WHERE username='$rec_user';");

$row2 = mysql_fetch_array($results2);
//echo $row["fname"];

$r_user_arry=explode(",",$rec_user);
    foreach($r_user_arry as $recipient){
        $results2 = mysql_query("SELECT * FROM users WHERE username='$recipient';");

        $row2 = mysql_fetch_array($results2);
        
        $r_id = $row2["id"];
        
        if ((mysql_num_rows($results2)) == 0){
            ?> <li> <?php echo ("$recipient not in database. Unable to send message to this user.");?> </li> <?php        
            
        } else{
            for ($i = 0;$i<1;$i++){
                $sql = "INSERT INTO messages (subject,body,id,recipient_ids)
                VALUES ('$subject','$body','$id','$r_id')";
                }
                
                if (mysql_query($sql) === TRUE) {
                    ?> <li> <?php echo "Message Sent to $recipient"; ?> </li> <?php
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    
        ?><!-- <li> <?php/* echo ($row2["fname"]); */?></li>--> <?php
    }
    ?><br/> <input type="button"onclick="compose_message()" value="Compose Another Message"> <input type="button"onclick="returnHome()" value="Return Home">   <?php




/*echo($row["fname"]);*/

/*if ($row){
    //echo $row["fname"];
    header("Location: compose.php");
}else{
    echo false;
}*/



?>