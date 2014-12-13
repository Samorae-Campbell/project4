window.onload=function(){
    //$('term').value = " Enter Country Here";
    //$$("input.login").onclick = check;
    $("login").onclick = check;
   // $("reset").onclick = reset;
   //alert ($("clickable").identify());
    $("ok").onclick = bleh;
     $("compose").onclick = load_compose_mail;
    //$("lookup").onmouseover = show;
   //$("send_button").onclick = compose;
    
    
    var list = $$('content#content div');
 	for (var i = 0; i < list.length; i++) {
		list[i].onmouseover = hover;
	}
}

function hover(){
	var list = $$('content#content div');
	for (var i = 0; i < list.length; i++) {
	    list[i].setStyle({
		    border: "3px solid red",
		    
    	});
	}


}

function bleh(){
    //alert ("Now reading message.");
    
    $("unread").style.fontWeight = "normal";
}

function check(){
     //$("clickable").onclick = bleh;
    
    var user =$('username').value;
    var pass = $('password').value;
    //alert(user+"   "+pass);
    
    /*new Ajax.Updater(
    "content",
    "login.php",
    {
      parameters : {username: user, password: pass},
      method: "POST"
    }
    );
    
    $("login").onclick = check;*/
    
    /*new Ajax.Request("login.php",
        {
            method: "POST",
            parameters: {username: user, password: pass},
            onSuccess: function testor(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );*/
    
    
    new Ajax.Request("login.php", {
      parameters : {username: user, password:pass},
      onSuccess : successFunction,
      method : "POST"
    });
     
    }
     
    function successFunction(dataPackage){
        var result = false;
    	//alert("meh...");
       //alert(dataPackage.responseText);
       result = dataPackage.responseText;
       //alert(result);
       if (result == false){
           alert("Wrong username and password. Please re enter a valid username and password to move on.");
           //alert("please");
           //load_name();
           //load_messages();
           //load_header();
           //load_side();
           //$("clickable").onclick = bleh;
    
       }else{
           document.open();
           document.write(result);
           document.close();
       }
       
       //$('result').innerHTML=dataPackage.responseText
    }


function load_name(){
    var user =$('username').value;
    var pass = $('password').value;
    
    //document.body.div.h1.write("hiiiiii");
   // $("subheader").write("hiiiiii");
    
    new Ajax.Updater(
    "subheader",
    "load_name.php",
    {
      parameters : {username: user, password: pass},
      method: "POST"
    }
    );
    
}

function load_messages(){
    var user =$('username').value;
    var pass = $('password').value;
    
    
    
    
    new Ajax.Updater(
    "content",
    "load_messages.php",
    {
      parameters : {username: user, password: pass},
      method: "POST"
    }
    );
    
}

function load_header(){
    var user =$('username').value;
    var pass = $('password').value;
    
    new Ajax.Updater(
    "mainheader",
    "load_header.php",
    {
      parameters : {username: user, password: pass},
      method: "POST"
    }
    );
    
}

function load_side(){
    var user =$('username').value;
    var pass = $('password').value;
    
   
    
    
    new Ajax.Updater(
    "sidecontent",
    "load_side.php",
    {
      parameters : {username: user, password: pass},
      method: "POST"
      
    }
    );
    //$("clickable").onclick = bleh;
    
}

function load_compose_mail(){
    alert("hi");
    alert ($("clickable").identify());
    
    load_header_compose();
    load_body_compose();
    
}

function load_header_compose(){
    var user =$('username').value;
    var pass = $('password').value;
    
   
    
    
    new Ajax.Updater(
    "mainheader",
    "load_header_compose.php",
    {
      parameters : {username: user, password: pass},
      method: "POST"
      
    }
    );
}

function load_body_compose(){
    var user =$('username').value;
    var pass = $('password').value;
    
    
    
    
    new Ajax.Updater(
    "content",
    "load_body_compose.php",
    {
      parameters : {username: user, password: pass},
      method: "POST"
    }
    );
    
    $("send_button").onclick = compose;
    
}

function compose(){
    var user =$('username').value;
    var pass = $('password').value;
    var fname = $('fname').value;
    var lname = $('lname').value;
    var subject = $('subject').value;
    var body = $('body').value;
    
    alert("Hi");
    
    new Ajax.Updater(
    "content",
    "compose.php",
    {
      parameters : {username: user, password: pass, fname: fname, lname: lname, subject: subject, body: body},
      method: "POST"
    }
    );
    
    $("send_button").onclick = compose;
    
}