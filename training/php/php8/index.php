<!DOCTYPE html>
<html>
	<head>
		<title>PHP 8</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Get Data of a site using CURL</h2>
			<ul>
				<li>Save the data in a file using file handling </li>
				<li>Write a PHP program to find all the links within &lt;body&gt; tag of the saved file.
			</ul>

		<?php
             
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, 'http://75.101.158.137:8080/sankalp/sankalp_php_assignments/php_assignment_8_sankalp_narayan/ucertify.html');
	
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
			$content = curl_exec($ch);
			/*
			$myfile = fopen("ucertify.txt", "w") or die("Unable to open file!");
			fwrite($myfile, $content);
			fclose($myfile);
			*/
	
	
			$myfile = fopen("ucertify.html","r") or die("Unable to open file!");
			$content = fread($myfile,filesize("ucertify.html"));
			fclose($myfile);
	
			$dome = new DOMDocument();
			$dome->loadHTML($content);
	
			$body = getBody($dome);
			function getBody($dome)
			{	
				$body = "";
				$links = $dome->getElementsByTagName("body");
				for($i = 0; $i < $links->length; $i++)
				{	
					$val = $links->item($i);
					$body .= $dome->saveHTML($val);
				}
				return $body;	
			}
	
			preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $body, $match);
			foreach($match[0] as $value)
			{
				echo "<div>".$value."</div>";
			}
	
	
		?>	
		<pre>
			&lt;?php

			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, 'http://75.101.158.137:8080/sankalp/sankalp_php_assignments/php_assignment_8_sankalp_narayan/ucertify.html');
	
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
			$content = curl_exec($ch);
	
			$myfile = fopen("ucertify.txt", "w") or die("Unable to open file!");
			fwrite($myfile, $content);
			fclose($myfile);
	
	
	
			$myfile = fopen("ucertify.txt","r") or die("Unable to open file!");
			$content = fread($myfile,filesize("ucertify.txt"));
			fclose($myfile);
	
			$dome = new DOMDocument();
			$dome->loadHTML($content);
	
			$body = getBody($dome);
			function getBody($dome)
			{	
				$body = "";
				$links = $dome->getElementsByTagName("body");
				for($i = 0; $i < $links->length; $i++)
				{	
					$val = $links->item($i);
					$body .= $dome->saveHTML($val);
				}
				return $body;	
			}
	
			preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $body, $match);
			foreach($match[0] as $value)
			{
				echo "&lt;div&gt;".$value."&lt;/div&gt;";
			}
		?&gt;
		</pre>
		</div>
	</body>
</html>
