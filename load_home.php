<?php

mysql_connect(
"0.0.0.0",
"samorae101"
);
mysql_select_db("cheap");
 session_start();

$user = $_SESSION{'username'};
$pass = $_SESSION{'password'};

 $i= [];
 $count=0;

//$user = "sally.li.14";

$results = mysql_query("SELECT * FROM users WHERE username='$user';");

$users = mysql_query("SELECT * FROM users;");

$row = mysql_fetch_array($results);

$id = $row["id"];

$results2 = mysql_query("SELECT * FROM messages WHERE recipient_ids='$id' ORDER BY message_id DESC;");
//$row2 = mysql_fetch_array($results2);
$results4 = mysql_query("SELECT * FROM messages_read WHERE reader_id='$id';");
//$id2 = $row2["id"];
//$results3 = mysql_query("SELECT * FROM users WHERE id LIKE '%$id2%';");
//$row3 = mysql_fetch_array($results3);
$num_new = (mysql_num_rows($results2) - mysql_num_rows($results4)) ;




?>

<script>
    var sad_life = ("<?php echo $num_new?>");
    
    if(sad_life == "0"){
    	
    }else{
    	alert ("You have "+sad_life+" new messages!");
    }
</script>

<!DOCTYPE html>
<html lang = "en">
	
  <head> 
   
    <title> Cheapo Mail - Home Page </title>
    <meta charset = "UTF-8"/>
    <link rel="stylesheet" href="cheapo.css" type="text/css" />
    <script src="prototype.js"></script>
    <script src="home.js" type="text/javascript"></script>
    <!--<script src="cheapo.js" type="text/javascript"></script>-->
	<meta name="viewport" content="width=device-width, initial scale=1.0">
  
  </head>
  
  <body class="body">
    
			<header class="mainheader" id="mainheader">
					  <!--<img class="cheapo_image" src="cheapo.png">   Banner Goeeesssss hereee!!!!! -->
					  <div class="logo" id="bottomlogo"> 
					  	CHEAPO MAIL
					  </div>
					  <?php if ($id == 1){
						?>
						<nav><ul>
						 <li class="active" onclick="returnHome()"><a href="javascript: void(0)"> Home </a></li>
						 <li onclick="add_user()"><a href="javascript: void(0)"> Add a User </a></li>
						 <li onclick="compose_message()"><a href="javascript: void(0)"> Compose </a></li>
						 <li  onclick="confirm_logout()" ><a href="javascript: void(0)"> Log Out </a></li>
					  
					  </ul></nav>
					  <?php }else{
					  ?>
					  <nav><ul>
						 <li class="active" onclick="returnHome()"><a href="javascript: void(0)"> Home </a></li>
						 <li onclick="compose_message()"><a href="javascript: void(0)"> Compose </a></li>
						 <li  onclick="confirm_logout()" ><a href="javascript: void(0)"> Log Out </a></li>
					  
					  </ul></nav>
					  <?php
					  }
					  ?>
				  
			</header>
			
			<div class="subheader">
				  		<h1 id="bottomlogo"> Welcome, <?php echo $row["fname"] ?> </h1>
			</div>
			
			<div class="maincontent">
					<div class="content">
						<article class="topcontent">
						  <content>
			
			
								<h1 class="subsubheader"> <strong>Messages</strong></h1>
								
								
								        <?php
								        while ($row2 = mysql_fetch_array($results2)) {
								          
								          $id2 = $row2["id"];
								          $results3 = mysql_query("SELECT * FROM users WHERE id='$id2';");
								          $row3 = mysql_fetch_array($results3);
								          
								          $m_id = $row2["message_id"];
								          
								          $results5 = mysql_query("SELECT * FROM messages_read WHERE message_id='$m_id';");
								          $row5 = mysql_fetch_array($results5);
								          //echo mysql_num_rows($results5);
								         
								        
								        if (mysql_num_rows($results5) == 0){
								        	
								        ?>
								          <div class="message"> 
								          						<?php echo $d;?>
								              <!--<h3><?php echo $row3["fname"]; ?></h3><br/>
								              <p><?php echo $row2["subject"] ?> </p>-->
								              
								              <div class="flip3D">
																 <div id="back" class="back" onmouseover="bleh()"> 
																    <h2 id="sender_name" value=""><?php echo $row3["fname"];?> says, </h2>
																 		<p class="backp"><?php echo $row2["body"];?> </p>
																 		<br/><br/><br/><br/>
																 		<input type="button" value="Reply" onclick="compose_message()">
																 </div>
																 
																  
																  <div class="front" id="unread"> 
																  		<h3 id="">From <?php echo $row3["fname"]; ?></h3> 
																 			<p id="" class="frontp"><?php echo $row2["subject"] ?></p>
																 			<!--<p><?php// echo mysql_num_rows($results5); ?></p>-->
																 </div>
																 
																 
																 <?php
																 
																 $m_id = $row2["message_id"];
																 for ($i = 0;$i<1;$i++){
																			$sql = "INSERT INTO messages_read (message_id,reader_id,date)
																			VALUES ('$m_id','$id',NOW())";
																	}
																			
																			if (mysql_query($sql) === TRUE) {
																			    //echo "Message Sent";
																			    ?><!--<br/> <input type="button"onclick="returnHome()" value="Return Home"> -->   <?php
																			} else {
																			    //echo "Error: " . $sql . "<br>" . $conn->error;
																			}
																 ?>
															</div>
								          
								          </div>
								          
								          <?php }else{
								          	?>
								          	<div class="message" onclick="output()"> 
								          						<?php echo $d;?>
								              <!--<h3><?php echo $row3["fname"]; ?></h3><br/>
								              <p><?php echo $row2["subject"] ?> </p>-->
								              
								              <div class="flip3D">
																 <div class="back" onmouseover="trials()"> 
																    <h2 id="sender_name" value=""><?php echo $row3["fname"];?> says, </h2>
																 		<p class="backp"><?php echo $row2["body"];?> </p>
																 		<br/><br/><br/><br/>
																 		<input type="button" value="Reply" onclick="compose_message()">
																 </div>
																 
																 
																  <div class="front"> 
																 			<h3>From <?php echo $row3["fname"]; ?></h3> 
																 			<p class="frontp"><?php echo $row2["subject"] ?> </p>
																 			
																 			<!--<p><?php// echo mysql_num_rows($results5); ?></p>-->
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
								        }
								        ?>
			        
							</content>
						</article>
							
							
					</div>
			</div>
				  
			<aside class="top-sidebar">
				  <article>
					   <h2 id="clickable"> Cheapo Mail </h2>
								<content>
									  <p> <?php echo $num_new ?> new messages!</p>
								    <img class="cheapo_image" src="cheapo.png">
								    <p class="post_info">signed in as <?php echo $row["username"]; ?>.</p>
								    <!--<p> <?php /*echo mysql_num_rows($results); */?> </p>-->
								</content>
								<content>
									<h2> Cheapo Users</h2>
									<?php while ($users_row = mysql_fetch_array($users)) {
										?>
										<li> <?php echo ($users_row["fname"]." ".$users_row["lname"]); }?> </li>
										
								</content>
					</article>
					
			</aside>
				  
				  
			
			<footer class="bottomlogo">
				  	<!--<img src="cheapo.png">-->
			</footer>
				  
			<footer class="mainfooter">
				  <p>Copyright &copy; <a href="www.Youtube.com"> Cheapo-Mail-2014 </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript: void(0)"> <img src="cheapo.png"> </a> </p> 
			</footer>
			  
  </body>
  
  


</html>


