 <?php
    session_start();
	
	include "connect.php";

	$sql = "SELECT * FROM student WHERE SID = '".$_SESSION["studentID"]."'";
	$r = mysql_query($sql);

	$row = mysql_fetch_assoc($r);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="../img/logo.png" >
	<title>Web-Based Generic Learning Schedule for Tertiary Student</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!--css-->
  <style>

.white{
	color: #FFFFFF;
}
body {
	background: #008CBA;
}
h4 {
	padding-left: 20%;
	font-size: 15px;
	color: #FFFFFF;
}
  
h2 {
    background-color: #00394f;
	padding-left: 80px;
	margin-top: 0px;
	border:5px solid #00394f;
	font-size: 20px;
	color: #FFFFFF;
}
b{
	font-size: 100%;
	padding-left:20px;
	color: #FFFFFF;
}
ul{
	margin-top: 1.7%;
	padding-right: 7%;
}

/* FORM CSS & VALIDATION */
::-webkit-input-placeholder{
	color: #61c2e2;
}
[placeholder]:focus::-webkit-input-placeholder {
  color: transparent;
}
.form-row {
  margin-bottom: 10px;
  padding: 4px 0;
  position: relative; }
.input-text {
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid #61c2e2;
  margin-bottom: 6px;
  padding: 8px 4px;
  width: 30%;
  height: 30px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
  background: #008CBA;
  color: #FFFFFF;
  font-size: 16px;
  }
.input-text:focus {
	border: none;
	border-bottom: 2px solid #FFFFFF;}
.label-helper {
  position: absolute;
  opacity: 0;
  transition: .2s bottom, .2s opacity;
  bottom: 0;
  left: 35%;
  }
.input-text:focus + .label-helper, .input-text:invalid + .label-helper {
  bottom: 65%;
  opacity: 1;
  padding: 4px;
  color: #FFFFFF;  
  }
.input-text:invalid {
  border-left: 10px solid #000000; 
  }
.input-text:invalid + .label-helper::after {
    color: #000000;
    content: "do not match";
    line-height: 1;
    padding-left: 12px; 
	}
/* END OF FORM CSS & VALIDATION */

/* PASSWORD validation css */
.form-row1 {
  margin-bottom: 12px;
  padding: 4px 0;
  position: relative; }
.input-text1 {
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid #61c2e2;
  margin-bottom: 6px;
  padding: 8px 4px;
  width: 30%;
  height: 30px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
  background: #008CBA;
  color: #FFFFFF;
  font-size: 16px;
  }
.input-text1:focus {
	border: none;
	border-bottom: 2px solid #FFFFFF;}
.label-helper1 {
  position: absolute;
  opacity: 0;
  transition: .2s bottom, .2s opacity;
  bottom: 0;
  left: 35%;
  }
.input-text1:focus + .label-helper1, .input-text1:invalid + .label-helper1 {
  bottom: 65%;
  opacity: 1;
  padding: 4px;
  color: #FFFFFF;  
  }
.input-text1:invalid {
  border-left: 10px solid #000000; 
  }
.input-text1:invalid + .label-helper1::after {
    color: #000000;
    content: "at least 6 characters";
    line-height: 1;
    padding-left: 12px; 
	}
/* END OF PASSWORD VALIDATION */

/* NAME VALIDATION css */
.form-row2 {
  margin-bottom: 12px;
  padding: 4px 0;
  position: relative; }
.input-text2 {
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid #61c2e2;
  margin-bottom: 6px;
  padding: 8px 4px;
  width: 30%;
  height: 30px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
   background: #008CBA;
  color: #FFFFFF;
  font-size: 16px;
  }
.input-text2:focus {
	border: none;
	border-bottom: 2px solid #FFFFFF;}
.label-helper2 {
  position: absolute;
  opacity: 0;
  transition: .2s bottom, .2s opacity;
  bottom: 0;
  left: 35%;
  }
.input-text2:focus + .label-helper2, .input-text2:invalid + .label-helper2 {
  bottom: 65%;
  opacity: 1;
  padding: 4px;
  color: #FFFFFF;  
  }
.input-text2:invalid {
  border-left: 10px solid #000000; 
  }
.input-text2:invalid + .label-helper2::after {
    color: #000000;
    content: "no numbers / symbols";
    line-height: 1;
    padding-left: 12px; 
	}
/* END OF NAME VALIDATION css */

/* SecretQtn VALIDATION css */
.form-row3 {
  margin-bottom: 12px;
  padding: 4px 0;
  position: relative; }
.input-text3 {
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid #61c2e2;
  margin-bottom: 6px;
  padding: 8px 4px;
  width: 30%;
  height: 40px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
   background: #008CBA;
  color: #FFFFFF;
  font-size: 16px;
  }
.input-text3:focus {
	border: none;
	border-bottom: 2px solid #FFFFFF;}
.label-helper3 {
  position: absolute;
  opacity: 0;
  transition: .2s bottom, .2s opacity;
  bottom: 0;
  left: 35%;
  }
.input-text3:focus + .label-helper3, .input-text3:invalid + .label-helper3 {
  bottom: 65%;
  opacity: 1;
  padding: 4px;
  color: #FFFFFF;  
  }
.input-text3:invalid {
  border-left: 10px solid #000000; 
  }
.input-text3:invalid + .label-helper3::after {
    color: #000000;
    content: "no numbers / symbols";
    line-height: 1;
    padding-left: 12px; 
	}
/* END OF SecretQtn VALIDATION css */
	
/* BUTTON CSS */
.button {
    background-color: #4CAF50; 
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    cursor: pointer;
	border-radius: 12px;
}
.button2{
    background-color: #00394f;
    color: white;
	border: 2px solid #00394f;
	border-radius: 12px;
}
.button2:hover {
    background-color: white; 
    color: black; 
    border: 2px solid #00394f;
	border-radius: 12px;
}
/* END OF BUTTON CSS */

option:hover{
background:#C6C4BD;
}




  </style>
  

</head>
<body>

  <h2><img src="../img/logo.png" width="85" height="85">&nbsp; &nbsp; &nbsp; Web-Based Generic Learning Schedule for Tertiary Student
</h2>
  
		
		<br><br>
		<center><img src="../img/profile.png" width="90" height="90"><br><br><b>Hello, <u><?php echo $row["Username"]; ?></u> !</b></center>
		
      <div align="center" class="page" >
    
        <main class="main-base" role="main">
      <form class="content" action="ProfileUpdate-func.php" method="POST">
	
		<br><br>
	  <div class="form-row">
        <input type="text" class="input-text2" name="Name" value="<?php echo $row["Name"]; ?>" pattern="[A-Za-z\s.@]{0,}" title="letters only"/>
        <label class="label-helper2">Name</label>
      </div>

      <div class="form-row" >
        <input type="text" class="input-text" name="Username" value="<?php echo $row["Username"]; ?>" placeholder="Username" />
        <label class="label-helper">Username</label>
      </div>

      <div class="form-row" >
        <input type="email" class="input-text" name="Email" value="<?php echo $row["Email"]; ?>" placeholder="Email" />
        <label class="label-helper">Email</label>
      </div>
	  
	  <div class="form-row">
	  <select id="SecretQtn" name="SecretQtn" class="input-text3">
									<option value=""></option>
									<option value="What was your childhood nickname?">What was your childhood nickname?</option>
									<option value="What is your favorite colour?">What is your favorite colour?</option>
									<option value="What is your pet’s name?">What is your pet’s name?</option>
									</select>
       <label class="label-helper3">Secret Question</label>
	  </div>
	  
	  <div class="form-row">
        <input type="password" class="input-text" name="SecretAns" placeholder="Secret Answer" />
        <label class="label-helper">Secret Answer</label>
      </div>
	  
	 <div>
	<a href="Calendar.php"><span class="glyphicon glyphicon-circle-arrow-left white"></span><b>Cancel</b></a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Save Changes" class="button button2">						
	</div>
	
      </form>
    </main>
  </div>
    
  <script>
    
 //validation form for CONFIRM PASSWORD
 var password = document.getElementById ("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
  </script>
	</body>
</html>
