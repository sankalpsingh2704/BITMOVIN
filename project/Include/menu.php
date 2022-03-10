
 <div id="sse2">
            
  <div id="sses2">
    <ul>
        
      <li><a href="./index.php">Home</a></li>
	  <?php
	 // session_start();
	  
	 try {
	  if(!empty($_SESSION['user']))
	  {
		//echo"sankalp";  
       echo"<li><a href=\"EditPage.php\"> Edit Profile</a></li>";
	  }
	 }
	 catch (Exception $e) {
   // echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
	 
	
	  ?>
      <li><a href="./Gallery.php">Gallery</a></li>
      <li><a href="./About.php">About</a></li>
      <li><a href="./Contact.php">Contact Us</a></li>
    </ul>
  </div>
</div>
