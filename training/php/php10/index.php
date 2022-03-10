<!DOCTYPE html>
<html>
	<head>
		<title>PHP 10</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Created a Zip File & perform download on click of button using PHP</h2>
		
		<pre>
		&lt;?php
			$file_names = array('test1.txt','test2.txt','test3.docx');
			$archive_file_name = 'products.zip';
			$dir = getcwd();
			$archive_file_name = $dir."\\".$archive_file_name; 
			$file_path=$dir .'\\';
			zipFilesAndDownload($file_names,$archive_file_name,$file_path);   
			function zipFilesAndDownload($file_names,$archive_file_name,$file_path)
			{
				$zip = new ZipArchive();
				if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE)
				{
					exit("cannot open <$archive_file_name>\n");
				}
				foreach($file_names as $files)
				{
					$zip->addFile($file_path.$files,$files);
				}
				$zip->close();
			}
			header("Content-type: application/zip"); 
			header("Content-Disposition: attachment; filename=products.zip");
			header("Content-length: " .filesize($archive_file_name));
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($archive_file_name)) . ' GMT');
			header("Pragma: no-cache"); 
			header("Expires: 0");
			ob_clean();
			flush();
			readfile("$archive_file_name");
		?&gt;
		</pre>
		</div>
	</body>
</html>
