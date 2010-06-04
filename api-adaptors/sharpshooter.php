<?php

/* PHP API-Adaptor for Knoxious Open Pastebin.
 * ===================================================================================
 * "THE BEER-&-COFFEE-WARE LICENSE" [ Revision 0 ]:
 * - Variation of the "BEER-WARE LICENSE" Rev 42.
 * <xan.manning@gmail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer or coffee in return. Xan Manning
 * ===================================================================================
 */

$api = "http://pzt.me/api";

/*Source: http://netevil.org/blog/2006/nov/http-post-from-php-without-curl*/
function do_post_request($url, $postdata, $files = NULL) 
	{ 
		$data = ""; 
		$boundary = "---------------------" . substr(md5(rand(0, 32000)), 0, 10); 
		
		if(is_array($postdata))
			{ 
				foreach($postdata as $key => $val) 
					{ 
						$data .= "--" . $boundary . "\n"; 
						$data .= "Content-Disposition: form-data; name=" . $key . "\n\n" . $val . "\n"; 
					} 
			}
		     
		$data .= "--" . $boundary . "\n";

		if(is_array($files))
			{
		    
				foreach($files as $key => $file) 
					{ 
						$fileContents = file_get_contents($file['tmp_name']);

						$fileInfo = pathinfo($file['name']);

						switch(strtolower($fileInfo['extension']))
							{
								case "jpg":
									$contentType = "image/jpeg";
								break;
								case "jpeg":
									$contentType = "image/jpeg";
								break;
								case "png":
									$contentType = "image/png";
								break;
								case "gif":
									$contentType = "image/gif";
								break;
								default:
									$contentType = "image/jpeg";
								break;
							}
		
						$data .= "Content-Disposition: form-data; name=" . $key . "; filename=" . $file['name'] . "\n"; 
						$data .= "Content-Type: " . $contentType . "\n"; 
						$data .= "Content-Transfer-Encoding: binary\n\n"; 
						$data .= $fileContents . "\n"; 
						$data .= "--" . $boundary . "--\n"; 
					}
			}
		  
		$params = array('http' => array( 
				'method' => 'POST', 
				'header' => 'Content-Type: multipart/form-data; boundary=' . $boundary, 
				'content' => $data 
		)); 

		$ctx = stream_context_create($params); 
		$fp = @fopen($url, 'rb', false, $ctx); 
		   
		if (!$fp)
			throw new Exception("Problem with " . $url . ", " . $php_errormsg); 
		  
		$response = @stream_get_contents($fp); 

		if ($response === false)
			throw new Exception("Problem reading data from " . $url . ", " . $php_errormsg); 

		return $response; 
	} 

foreach($_GET as $key => $value)
	$_GET[$key] = stripslashes($value);

foreach($_POST as $key => $value)
	$_POST[$key] = stripslashes($value);

if(count($_POST))
	$_GET = $_POST;

if(@$_GET['callback'] || @$_POST['callback'])
	$callback = array('left' => $_GET['callback'] . "(", 'right' => ")");

if(@$_GET['jsoncallback'] || @$_POST['jsoncallback'])
	$callback = array('left' => $_GET['jsoncallback'] . "(", 'right' => ")");

if(@$_GET['hashtag'] || @$_POST['hashtag'])
	$api = $api . "@" . $_GET['hashtag'];

if(count($_GET) > 0)
	{
		foreach($_GET as $key => $val)
			$get[$key] = $val;
	}


if(count($_FILES) > 0)
	{
		foreach($_FILES as $key => $val)
			$files[$key] = $val;
	}

print_r($callback['left'] . do_post_request($api, $get, $files) . $callback['right']);
?>
