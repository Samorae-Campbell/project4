<?php

mysql_connect(
"0.0.0.0",
"samorae101"
);
mysql_select_db("cheap");
 session_start();

$user = ("jesusfreak");
$pass =("passworrd");

 $i= [];
 $count=0;

//$user = "sally.li.14";

$results = mysql_query("SELECT * FROM users WHERE username='$user';");

$row = mysql_fetch_array($results);

$id = $row["id"];

$results2 = mysql_query("SELECT * FROM messages WHERE recipient_ids='$id' ORDER BY message_id DESC;");
//$row2 = mysql_fetch_array($results2);
$results4 = mysql_query("SELECT * FROM messages_read WHERE reader_id='$id';");

//$id2 = $row2["id"];
//$results3 = mysql_query("SELECT * FROM users WHERE id LIKE '%$id2%';");
//$row3 = mysql_fetch_array($results3);
$num_new = (mysql_num_rows($results2) - mysql_num_rows($results4)) ;





								        while ($row2 = mysql_fetch_array($results2)) {
								          
								          $id2 = $row2["id"];
								          $m_id = $row2["message_id"];
								          
								          $results5 = mysql_query("SELECT * FROM messages_read WHERE message_id='$m_id';");
								          $row5 = mysql_fetch_array($results5);
								          echo mysql_num_rows($results5);
								          
								          
								          $results3 = mysql_query("SELECT * FROM users WHERE id='$id2';");
								          $row3 = mysql_fetch_array($results3);
								         
								        ?> 
								          <div class="message" onclick="output()"> 
								          						<?php echo $d;?>
								              <!--<h3><?php echo $row3["fname"]; ?></h3><br/>
								              <p><?php echo $row2["subject"] ?> </p>-->
								              
								              <div class="flip3D">
																 <div class="back" onmouseover="trials()"> 
																    <h2 id="sender_name" value=""> <?php echo $row3["fname"];?> says, </h2>
																 		<p class="backp"><?php echo $row2["body"];?> </p>
																 		<br/><br/><br/><br/>
																 		<input type="button" value="Reply" onclick="compose_message()">
																 </div>
																 
																 
																  <div class="front"> 
																 			<h3><?php echo $row3["fname"]; ?></h3> 
																 			<p class="frontp"><?php echo $row2["subject"] ?> </p>
																 </div>
																 
																 <?php
																 
																 //First need to CHECK to see if the file is in the read section.
																 
																 /*$m_id = $row2["message_id"];
																 for ($i = 0;$i<1;$i++){
																			$sql = "INSERT INTO messages_read (message_id,reader_id,date)
																			VALUES ('$m_id','$id',NOW())";
																	}
																			
																			if (mysql_query($sql) === TRUE) {
																			    echo "Message Sent";
																			    ?><br/> <input type="button"onclick="returnHome()" value="Return Home">    <?php
																			} else {
																			    echo "Error: " . $sql . "<br>" . $conn->error;
																			}
																 */?>
															</div>
								          
								          </div>
								          <?php
								        }
								        ?>