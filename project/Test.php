<?php
	//include_once "../../prepengine-header.php";
	/*
	$tempvar = "sankalp";
	$theme->assign('temp',$tempvar);
	//www.googleapis.com/youtube/v3/videos?id=YOUR_VIDEO_ID&key=YOUR_API_KEY
	AIzaSyCRXr7Jtjg5urLWTMf0vFFi5keoh9Wjfgk
	showpage($theme->fetch('utils/youtube_item/test.tpl'));
	*/
	
	$data = file_get_contents("https://www.youtube.com/get_video_info?video_id={$_GET['id']}");
	parse_str($data);
	
	$arr = explode(",",$url_encoded_fmt_stream_map);
	
	parse_str($arr[2]);
	exit($url);
	
	
	//file_put_contents("mgk.mp4",file_get_contents($url));
	
	//echo "<video src='$url' controls width='640' height='480'></video>";
	
	
	
	/*foreach($arr as $item)
	{	
	
	  parse_str($item);
	  echo "<a href='$url?title=$title'>$quality/$type</a><br/>";
	  http://localhost/pe-gold3/utils/youtube_item/test.php?id=rWf4xS-28nU
	
	
	} */
	
	
	
	
	 
?>

   

