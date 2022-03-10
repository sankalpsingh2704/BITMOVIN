<!DOCTYPE html>
<html>
	<head>
		<title>PHP 6</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
		<h3>File Search of Non Zero Size</h3>
		<?php

			$dir = getcwd();
			$savepath = $dir ."/testfolder/";
			$filenames = array("test1.txt","test2.txt","test3.txt","virtualtest.txt");
			directorysearch($savepath,$filenames);
			function directorysearch($savepath,$filenames)
			{
				searchfile($savepath,$filenames);	
				$dirs = array_filter(glob($savepath.'*'), 'is_dir');
				if(count($dirs)!= 0)
				{
					foreach($dirs as $d)
					{
						$d .= "/";
						directorysearch($d,$filenames);
					}
				}	
			}
			function searchfile($directory,$filearray)
			{	
				foreach(glob($directory.'*.*') as $filename)
				{
					foreach($filearray as $file )
					{
						if($directory.$file == $filename)
						{	
							if(filesize($filename)!=0)
							{
								echo "<div>FileName:".$file." exist of Size:".filesize($filename)." bytes \n </div>";
								$link = explode("web",$filename);
								echo "<div>Path:<a href='http://75.101.158.137:8080/sankalp".$link[1]."'>".$filename."</a></div>";
							}
			
						}
					}
				}
			}
		?>
		<pre>
			&lt;?php

			$dir = getcwd();
			$savepath = $dir ."/testfolder/";
			$filenames = array("test1.txt","test2.txt","test3.txt","virtualtest.txt");
			directorysearch($savepath,$filenames);
			function directorysearch($savepath,$filenames)
			{
				searchfile($savepath,$filenames);	
				$dirs = array_filter(glob($savepath.'*'), 'is_dir');
				if(count($dirs)!= 0)
				{
					foreach($dirs as $d)
					{
						$d .= "/";
						directorysearch($d,$filenames);
					}
				}	
			}
			function searchfile($directory,$filearray)
			{	
				foreach(glob($directory.'*.*') as $filename)
				{
					foreach($filearray as $file )
					{
						if($directory.$file == $filename)
						{	
							if(filesize($filename)!=0)
							{
								echo "&lt;div&gt;FileName:".$file." exist of Size:".filesize($filename)." bytes \n &lt;/div&gt;";
								$link = explode("web",$filename);
								echo "&lt;div&gt;Path:&lt;a href='http://75.101.158.137:8080/sankalp".$link[1]."'&gt;".$filename."&lt;/a&gt;&lt;/div&gt;";
							}
			
						}
					}
				}
			}
		?&gt;
		</pre>
		</div>
	</body>
</html>