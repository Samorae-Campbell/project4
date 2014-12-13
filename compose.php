<?php

/*$db = mysql_connect("localhost", "traveler", "packmybags");
mysql_select_db("world");*/

check(mysql_connect("0.0.0.0","samorae101"), "connect");
check(mysql_select_db("cheap"), "selecting db");

function check($result, $message) {
  if (!$result) {
    die("SQL error during $message: " . mysql_error());
  }
}

/*mysql_connect(
"0.0.0.0",
"samorae101"
);
mysql_select_db("cheap");*/


session_start();
$user = $_SESSION{'username'};
$pass = $_SESSION{'password'};

session_start();
$_SESSION["username"] = $user;
$_SESSION["password"] = $pass;

//$user = "sally.li.14";

$results = mysql_query("SELECT * FROM users WHERE username='$user';");

$row = mysql_fetch_array($results);

$id = $row["id"];

$results2 = mysql_query("SELECT * FROM messages WHERE recipient_ids LIKE '%$id%';");
//$row2 = mysql_fetch_array($results2);

//$id2 = $row2["id"];
//$results3 = mysql_query("SELECT * FROM users WHERE id LIKE '%$id2%';");
//$row3 = mysql_fetch_array($results3);


?>

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
						 <li  onclick="returnHome()"><a href="javascript: void(0)"> Home </a></li>
						 <li onclick="add_user()"><a href="javascript: void(0)"> Add a User </a></li>
						 <li class="active" onclick="compose_message()"><a href="javascript: void(0)"> Compose </a></li>
						 <li  onclick="confirm_logout()" ><a href="javascript: void(0)"> Log Out </a></li>
					  
					  </ul></nav>
					  <?php }else{
					  ?>
					  <nav><ul>
						 <li  onclick="returnHome()"><a href="javascript: void(0)"> Home </a></li>
						 <li class="active" onclick="compose_message()"><a href="javascript: void(0)"> Compose </a></li>
						 <li  onclick="confirm_logout()" ><a href="javascript: void(0)"> Log Out </a></li>
					  
					  </ul></nav>
					  <?php
					  }
					  ?>
				  
			</header>
			
			<div class="subheader">
				  		<h1 id="bottomlogo"> Compose Message </h1>
			</div>
			
			<div class="maincontent">
					<div class="content">
						<article class="topcontent">
						  <content>
			
			
								<h1 class="subsubheader"> <strong>Message Details</strong></h1>
								<div id="message_details">
										
											<br/><br/><label>Recipient(s) <input type="text" id="message_username"></label><br/><br/><br/>
												<label>Subject <input type="text" id="message_subject"></label><br/><br/><br/>
												Message<br/><br/>
												<textarea rows="10" cols="50" id="message_body">
														
												</textarea><br/><br/><br/>
												<input type="button" id="send_button" value="Send Message" onclick="send_message()">
												<input type="button" id="send_button" value="Go Back" onclick="returnHome()">
											
								       
			        	</div>
							</content>
						</article>
							
							
					</div>
			</div>
				  
			<aside class="top-sidebar">
				  <article>
					   <h2 id="clickable"> Cheapo Mail </h2>
								<content>
								    <img class="cheapo_image" src="cheapo.png">
								    <p class="post_info">signed in as <?php echo $row["username"]; ?>.</p>
								    <!--<p> <?php /*echo mysql_num_rows($results); */?>*/ </p>-->
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


