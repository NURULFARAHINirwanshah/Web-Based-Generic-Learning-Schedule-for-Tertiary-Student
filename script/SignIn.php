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
	padding-left: 11%;
	font-size: 16px;
	color: #FFFFFF;
	font-family: Calibri;
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
  width: 20%;
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
  left: 40%;
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
  width: 20%;
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
  left: 40%;
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
  
		<br><br><br>
		<center><h1> Sign In </h1></center>
		<br><br><br>
   
      <div align="center" class="page" >
    
        <main class="main-base" role="main">
      <form class="content" action="SignIn-func.php" method="POST">
	  
      <div class="form-row" ><span class="glyphicon glyphicon-user"></span>
        <input type="text" class="input-text" name="Username" placeholder="Username" />
        <label class="label-helper">. Username .</label>
      </div>
	  
	  <div class="form-row"><span class="glyphicon glyphicon-lock"></span>
        <input type="password" class="input-text1" name="Password" id="password" placeholder="Password" pattern=".{6,}" title="at least six characters"/>
        <label class="label-helper1">. Password .</label>
      </div>
	  
	 <div>
	<a href="newHome.php"><span class="glyphicon glyphicon-circle-arrow-left white"></span><b>Back</b></a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Sign In" class="button button2">						
	</div>
	
	<a href="Recovery1.php"><h4><u> Forgotten Password? </u></h4></a>
	
      </form>
    </main>
  </div>
    
	</body>
</html>
