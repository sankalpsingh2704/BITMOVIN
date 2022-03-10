<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <title> Register</title>
    <link rel="stylesheet" href="./StyleSheets/Main.css" />
    <link rel="stylesheet" href="./StyleSheets/Menu.css" />
    <link rel="stylesheet" href="./StyleSheets/Spinner.css" />
    <script type="text/javascript" language="javascript" src="./Scripts/Menu.js" ></script>
    
      

 
    <link href='http://sankalpsoftwares.blogspot.in/favicon.ico' rel='icon' type='image/x-icon'/>
    
    <script>
        function loadingDivHide() {
            document.getElementById("startup").style.display = "none";
            document.getElementById("pagebody").style.display = "";
        }
    </script>
    
</head>
   
<body id="pagebody" onload="loadingDivHide()">
    
    <div class="header-image">
        <img id="logo" src="./Assets/mylogo.png" />
        <img id="title" src="./Assets/title.png" />
        <img src="./Assets/admission-open-animated.gif" style="float:right;" />
    </div>
    
    <div class="body-content">
    <!-- <body onload="alert('Website Hosted Succesfully')"> -->
    <header>
        
       
        <div class="title">
            <h1>Login Page</h1>
        </div>
        <div id="startup">
    <svg class="spinner-container" width="65px" height="65px" viewBox="0 u0 52 52">
      <circle class="path" cx="26px" cy="26px" r="20px" fill="none" stroke-width="4px"></circle>
    </svg>
  </div>
    </header>
    <div class="body-content">
    <form id="form1" action="LoginFormA.php" method="post">  
	  <label>User Name:</label><input type="text" name="user"></br></br>
	  <label>Password:</label><input type="password" name="password"></br></br></br></br>
	  <input type="submit" value="Login">
    
        
    
    </form>
        </div>
        </div>
    
    
</body>
    
</html>