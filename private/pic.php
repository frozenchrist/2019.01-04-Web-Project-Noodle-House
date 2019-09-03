<?php

//get request from url and retrieve the filename from globals.php for each image.



// $IMAGE_DIR_PREFIX refers to the provided images subdirectory...
$IMAGE_DIR_PREFIX = '../extra/images/';

// images/globals.php defines two arrays representative of the images
// that can be loaded...
require_once($IMAGE_DIR_PREFIX.'globals.php');

// By default assume no image was selected so:
//   a) the image file ($IMAGE) is set to null
//   b) the image file's MIME type is set to null...
$IMAGE = null;
$IMAGE_MIME = null;

// pic.php will be accessed using URL parameters, e.g., pic.php?i=2.
// Per what was demonstrated in class obtain the GET parameter's
// key-value pages using the global array $_GET. The parameters are
// as follows:
//   a) 'i' is an image number (e.g., 0, 1, 2, 3, etc.)
//   b) 'purpose' is either 'g' or 'a'
//
// So:
//   * if purpose=g then look up the image file to use in the $rice
//     array where i=<INTEGER> is the index into $rice
//   * if purpose=a then look up the image file to use in the $noodles
//     array where i=<INTEGER> is the index into $noodles
//
// Sample (partial) URLs:
//   * pic.php?i=3&purpose=g
//   * pic.php?purpose=a&i=2
//
// Because an invalid index can be passed, before accessing the array
// do the following:
//   1) Obtain the $_GET for 'i', e.g., $_GET['i'].
//   2) Pass (1) into PHP's intval(). This will ensure it is an int.
//      NOTE: http://php.net/manual/en/function.intval.php
//   3) Obtain the $_GET for 'purpose'.
//   4) Use a switch statement or a suitable equivalent on (3).
//      4a) If (4) matches 'a' then call array_key_exists() on $noodles
//          with the value obtained in (2) as the index. If the key exists
//          set $IMAGE to the concatenation of $IMAGE_DIR_PREFIX, '/', and 
//          the string at index in $noodles.


	if (array_key_exists('i', $_GET) && array_key_exists('purpose', $_GET) && count($_GET) == 2){
	
		$iValue = intval(trim($_GET['i']));
	
		$pValue = trim($_GET['purpose']);
	
		if (is_numeric($iValue) && in_array($pValue, array("g", "a"))){
	
	
				if($pValue == 'a' && array_key_exists($iValue, $noodles)){
					
					$IMAGE = $IMAGE_DIR_PREFIX.'/'.$noodles[$iValue];
					
				}else if($pValue == 'g' && array_key_exists($iValue, $rice)){
						
					$IMAGE = $IMAGE_DIR_PREFIX.'/'.$rice[$iValue];
					
					
				}
	
		}
	

	}
	
	
	
//      4b) If (4) matches 'g' then call array_key_exists() on $rice
//          with the value obtained in (2) as the index. If the key exists
//          set $IMAGE to the concatenation of $IMAGE_DIR_PREFIX, '/', and 
//          the string at index in $rice.
//      NOTE: In PHP the '.' operator is string concatenation.

//   5) Now that a possible $IMAGE has been set (NOTE: it still might be null),
//      determine the image's MIME type. Instead of hard-coding it, you will
//      use PHP's finfo object to determine the MIME type of the file.
//      Internally the finfo object determines the MIME type using magic strings
//      (i.e., in the way the 'file' command does this from the command line).
//      Determine the MIME type as follows:
//      5a) If $IMAGE is NOT null:

				if($IMAGE != null){
					$fi = new finfo(FILEINFO_MIME);     
					$result = $fi->file($IMAGE);
					
					if($result){
						
						$IMAGE_MIME = $result;
						
					}
				}


//        5b) $fi = new finfo(FILEINFO_MIME);
//            $result = $fi->file($IMAGE); // Returns MIME type unless an error occurred
//        5c) If $result is not an error, set $IMAGE_MIME to $result.
//    6) If $IMAGE and $IMAGE_MIME are both NOT null, then output the image with:

				if($IMAGE != null && $IMAGE_MIME != null){
					
					header('Content-Type: '.$IMAGE_MIME);
					@readfile($IMAGE);
					exit;
				}
				
					
//			header('Content-Type: '.$IMAGE_MIME);
//         @readfile($IMAGE);
//         exit;
//    7) Otherwise, generate an HTTP 404 File Not Found response and page with:
       http_response_code(404);
        
		echo "
			<!DOCTYPE html>
			<html>
           <head><title>2019W COMP3340 Assignment 2: 404 File Not Found</title></head>
           <body><h1>404 File Not Found</h1><p>The requested resource could not be found.</p></body>
			</html>
			";
			exit(0);
		
		
		
?>
