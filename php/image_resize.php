<?php 
 
 	$image = addslashes($_GET['image']);
	$new_width  = addslashes($_GET['width']);
	$new_height  = addslashes($_GET['height']);
	
	$image_extension = explode('.',$image);
	$image_extension = $image_extension[sizeof($image_extension)-1];
	
	if($new_height != '' && is_numeric($new_height) && $new_height > 0){
		if($new_width != '' && is_numeric($new_width) && $new_width > 0){
			if(file_exists('../'.$image) && $image != ''){
				list($width,$height) = getimagesize('../'.$image);
				
				
				

				switch(strtolower($image_extension)){
					case 'jpg' : {
						$source = imagecreatefromjpeg('../'.$image);
						$thumb = imagecreatetruecolor($new_width, $new_height);
					};break;
					case 'jpeg' : {
						$source = imagecreatefromjpeg('../'.$image);
						$thumb = imagecreatetruecolor($new_width, $new_height);
					};break;
					case 'png' : {
						$source = imagecreatefrompng('../'.$image);
						$thumb = imagecreate($new_width, $new_height);
						$color_black = imagecolorallocate($thumb, 0, 0, 0);
    					imagecolortransparent($thumb, $color_black);
					};break;
					case 'gif' : {
						$source = imagecreatefromgif('../'.$image);
						$thumb = imagecreatetruecolor($new_width, $new_height);
					};break;
				}
				
				
				
				$new_height_size = ($new_width*$height)/$width;
			 
				if($new_height_size<$new_height){ 
			
					$new_thumb_width = ($new_width*$height)/$new_height;
					
					$x = ($width - $new_thumb_width)/2;
					$y = 0;
			
					imagecopyresampled($thumb, $source, 0, 0, $x, $y, $new_width, $new_height, $new_thumb_width, $height);
			
				}else{
						$new_thumb_height = ($new_height*$width)/$new_width;
					
					$x = 0;
					$y = ($height - $new_thumb_height)/2;
			
					imagecopyresampled($thumb, $source, 0, 0, $x, $y, $new_width, $new_height, $width, $new_thumb_height);
				}
				
				// Set the content type header - in this case image/jpeg
				
				
				switch(strtolower($image_extension)){
					case 'jpg' : {header('Content-Type: image/jpeg');imagejpeg($thumb);};break;
					case 'jpeg' : {header('Content-Type: image/jpeg');imagejpeg($thumb);};break;
					case 'png' : {header('Content-Type: image/png');imagepng($thumb);};break;
					case 'gif' : {header('Content-Type: image/gif');imagegif($thumb);}break;
				}
				
				
				
				// Output the image
				
				
				imagedestroy($thumb);
				
				
			}else{
				echo 'No image found.'; die();
			}
		}else{
			echo 'Please specify valid image width.'; die();
		}

	}else{
		echo 'Please specify valid image height.'; die();
	}

?>