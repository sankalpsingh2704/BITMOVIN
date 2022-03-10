<?php
	
	$video_info = array();
	$data = file_get_contents("https://www.youtube.com/get_video_info?video_id={$_GET['id']}&key=AIzaSyBuTpSrhoBtmSVjr3kurXSlPjrALZJnqhU");
	parse_str($data);
	
	$arr = explode(",",$url_encoded_fmt_stream_map);
	foreach($arr as $a)
	{
		parse_str($a);
		
		$type_array = explode(";",$type);
		$video_type = explode("/",$type_array[0]);
		
		$codec_array = explode("=",$type_array[1]);
		$video_codec = $codec_array[1];
		$video_format = $video_type[1];
		
		$one_video["codec"] = $video_codec;
		$one_video["type"] = $video_format;
		$one_video["url"] = $url;
		array_push($video_info,$one_video);
		
		
	}
	
	 $json_obj = json_encode($video_info,JSON_UNESCAPED_SLASHES);
	 
	 exit($json_obj);
	
?>