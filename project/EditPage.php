<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
     
    <title> Register</title>
    <link rel="stylesheet" href="./StyleSheets/Main.css" />
    <link rel="stylesheet" href="./StyleSheets/Menu.css" />
    <link rel="stylesheet" href="./StyleSheets/Spinner.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script type="text/javascript" language="javascript" src="./Scripts/Menu.js" ></script>
    
      

 
    <link href="http://sankalpsoftwares.blogspot.in/favicon.ico" rel='icon' type='image/x-icon'/>
    
    <script>
        function loadingDivHide() {
            document.getElementById("startup").style.display = "none";
            document.getElementById("pagebody").style.display = "";
        }
        $(function() {
    $("#dp").datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
  
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
            <h1>Edit Details</h1>
			<?php
			
		$conn = mysqli_connect("localhost","root","","sankalp");
					$query = "select * from student where user='".$_SESSION['user']."'";
					$result = mysqli_query($conn,$query);

					
					if(mysqli_num_rows($result)){
	                 $data = mysqli_fetch_assoc($result);
	                // header("location:index.php");
					 }
					 else{
	                 echo mysqli_error($conn);
	                  header("location:LoginPage.php");
                     }
					
		?>
        </div>
        <div id="startup">
		
    <svg class="spinner-container" width="65px" height="65px" viewBox="0 u0 52 52">
      <circle class="path" cx="26px" cy="26px" r="20px" fill="none" stroke-width="4px"></circle>
    </svg>
  </div>
    </header>
    <div class="body-content">
    <form id="form1" action="updatedata.php" method="post">
	  <label>Name:</label><input type="text" name="name" value="<?php echo $data['name'];?>"></br></br>
	  <label>Email:</label><input type="text" name="email" value="<?php echo $data['email'];?>" ></br></br>
	  <label>Mobile:</label><input type="text" name="mob" value="<?php echo $data['mobile'];?>" ></br></br>
	  <label>High School:</label><input type="text" name="high" value="<?php echo $data['high'];?>" ></br></br>
	  <label>Inter:</label><input type="text" name="inter" value="<?php echo $data['inter'];?>"></br></br>
	  <label>Date of Birth:</label><input type="text" id="dp" name="dob" value="<?php echo $data['dob'];?>" ></br></br>
	  <label>User Name:</label><input type="text" name="user" value="<?php echo $data['user'];?>" ></br></br>
	  <label>Password:</label><input type="password" name="pass"></br></br></br></br>
	  <input type="submit" value="Update">
         
    
    </form>
        </div>
        </div>
    
    <?php include("include/footer.php"); ?>
	
</body>
    
</html>