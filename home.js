window.onload=function(){
    $("logout").onclick = confirm_logout;
    $("compose").onclick = compose_message;
    $("send_button").onclick = send_message;
    $("back").onmouseover = trials;
};

function trials(){
   // $("unread").style.font-weight= "none";
    //$("unread").style.border="none";
    /*$("unread").setStyle({
		border: "none"
		
		
	});*/
    //alert("Message Viewed");
    $("unread").style.fontWeight = "normal";
}

function bleh2(){
    alert("Yeah");
}

function confirm_logout(){
    var r = confirm("Are you sure you wish to log out?");
    if (r == true) {
        new Ajax.Request("logout.php",
        {
            method: "POST",
            parameters: {},
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
    } else {
        
    }
}

function compose_message(){
    new Ajax.Request("compose.php",
        {
            method: "POST",
            parameters: {},
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
    
}

function reply_message(name){
    alert("ok");
    alert(name);
    //var div = document.getElementById("sender_name");
    //var myData = div.textContent;
    //alert myData;
}

function add_user(){
    new Ajax.Request("add_user.php",
        {
            method: "POST",
            parameters: {},
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
    
}

function check_details(){
    var username = $("new_username").value;
    var password = $("new_password").value;
    var password2 = $("new_password2").value;
    var fname = $("new_fname").value;
    var lname = $("new_lname").value;
    
    if (username === ""){
        
        $("new_username").style.backgroundColor="#A80000";
        alert ("Please enter a username");
    }
    if (password === ""){
         $("new_password").style.backgroundColor="#A80000";
        alert("Please enter a password");
    }
    if (fname === ""){
         $("new_fname").style.backgroundColor="#A80000";
        alert("Please enter a First Name");
    }
    if (lname=== ""){
         $("new_lname").style.backgroundColor="#A80000";
        alert ("Please enter a Last Name");
    }
    if (password != password2){
         $("new_password2").style.backgroundColor="#A80000";
        alert("Both Passwords need to match.");
    }
    if (password.length <= 7){
         $("new_password").style.backgroundColor="#A80000";
        alert("Password must be atleast 8 digis long");
    }
    var letters = /^[0-9a-zA-Z]+$/;  
    //if(inputtxt.value.match(letters))
    if (!$("new_password").value.match(letters)) {
        $("new_password").style.backgroundColor="#A80000";
        alert("Password must have atleast one capital letter, common letter and a number!");
    }
    
    if((username!=="")&&(password!=="")&&(fname!=="")&&(lname!=="")&&(password!=="")&&(password === password2)&&(password.length >= 8)&&($("new_password").value.match(letters))){
        new Ajax.Updater(
    "message_details",
    "new_user.php",
    {
      parameters : {username: username, password: password, fname: fname, lname: lname},
      method: "POST"
      
    }
    );
    }
    
    //alert(username+" "+password+" "+fname+" "+lname);
}

function reset_details(){
    $("new_username").value = "";
    $("new_username").style.backgroundColor="white";
    $("new_password").value = "";
     $("new_password").style.backgroundColor="white";
    $("new_fname").value = "";
     $("new_fname").style.backgroundColor="white";
    $("new_lname").value = "";
     $("new_lname").style.backgroundColor="white";
    $("new_password2").value = "";
     $("new_password2").style.backgroundColor="white";
}

function send_message(){
    var username = $("message_username").value;
    var subject = $("message_subject").value;
    var body = $("message_body").value;
    
    new Ajax.Updater(
    "message_details",
    "send_message.php",
    {
      parameters : {rec_username: username, subject: subject, body: body},
      method: "POST"
    }
    );
    
    //alert(username+" "+subject+" "+body);
}

function returnHome(){
    new Ajax.Request("load_home.php",
        {
            method: "POST",
            parameters: {},
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
}
