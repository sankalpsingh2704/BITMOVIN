<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <title>Gallery</title>
    <link rel="stylesheet" href="./StyleSheets/Main.css" />
    <link rel="stylesheet" href="./StyleSheets/Menu.css" />
    <link rel="stylesheet" href="./StyleSheets/Spinner.css" />
    <script type="text/javascript" language="javascript" src="./Scripts/Menu.js" ></script>
    
      

 
    <link href="http://sankalpsoftwares.blogspot.in/favicon.ico" rel='icon' type='image/x-icon'/>
    
    <script>
        function loadingDivHide() {
            document.getElementById("startup").style.display = "none";
            document.getElementById("pagebody").style.display = "";
        }
    </script>
    
</head>
   
<body id="pagebody" onload="loadingDivHide()">
    <?php include("include/Auth.php"); ?>
    <div class="header-image">
        <img id="logo" src="./Assets/mylogo.png" />
        <img id="title" src="./Assets/title.png" />
        <img src="./Assets/admission-open-animated.gif" style="float:right;" />
    </div>
    
    <div class="body-content">
  
    <header>
        
       <?php include("include/menu.php"); ?>
        <div class="title">
            <h1>Admisson</h1>
        </div>
        <div id="startup">
    <svg class="spinner-container" width="65px" height="65px" viewBox="0 0 52 52">
      <circle class="path" cx="26px" cy="26px" r="20px" fill="none" stroke-width="4px"></circle>
    </svg>
  </div>
    </header>
    <div class="body-text">
    <form id="form1" runat="server">
    
        
    
    </form>
        </div>
        </div>
		<?php include("include/footer.php"); ?>
   
    
</body>
    
</html>