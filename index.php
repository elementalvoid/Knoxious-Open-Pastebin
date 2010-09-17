<?php 

/*
 *	Knoxious Open Pastebin		 v 1.1.0-alpha
 * ============================================================================
 *	
 *	Copyright (c) 2009-2010 Xan Manning (http://xan-manning.co.uk/)
 *
 * 	Released under the terms of the MIT License.
 * 	See the MIT for details (http://opensource.org/licenses/mit-license.php).
 *
 *
 *	A quick to set up, rapid install, one-file pastebin! 
 *	(or at least can be)
 *
 *	Supports text and image hosting, url and video linking.
 *
 *	URL: 		http://knoxious.co.uk/
 *	EXAMPLE: 	http://pzt.me/
 *
 */

/* Config, please read very carefully. */
$CONFIG = array();


// First off, what database system do you want to use? Flatfile or MySQL.
// Uncomment or comment the required database type!
$CONFIG['db_type'] = "flatfile";
# $CONFIG['db_type'] = "mysql";

// Now, if you chose MySQL, alter these settings to match your Database
$CONFIG['mysql_connection_config'] = array(

	'db_host'	=> 	'localhost'	/* This is often localhost */,
	'db_uname'	=>	'root'		/* DB Username */,
	'db_pass'	=>	'password'	/* DB Password */,
	'db_name'	=>	'pastebin'	/* Nane of the Database */,
	'db_table'	=>	'paste'		/* Name for the table */,
	'db_existing'	=>	FALSE		/* Reconnect to an existing table? (TRUE or FALSE) */
);

// If you chose a flatfile connection, please alter these settings!
$CONFIG['txt_config'] = array(
	'db_folder'	=>	'data'		/* Name of the folder to store Data */,
	'db_index'	=>	'INDEX'		/* Name of the index file */,
	'db_images'	=>	'images'	/* Name of the Image folder (stored in Data) */
);


// Maximum depth of folder structure
// Example, 2 would be "./data/a/b" for the paste id "abcde"
// 3 would be "./data/a/b/c" for the paste id "abcde". Leave if you are unsure!
// Note this will always default to be AT LEAST 1.
// NEVER CHANGE THIS ONCE INSTALLED!!!
$CONFIG['max_folder_depth'] = 1;

// Excellent, we should be connected to a database system now. So what now?
// Let us define the name of our pastebin (the title)

// Pastebin Name (title), FALSE value uses the default "Pastebin on " . $_SERVER['SERVER_NAME']
$CONFIG['pb_name'] = FALSE;
# $CONFIG['pb_name'] = "My Pastebin!";

// Pastebin's Tagline (Message under the name/title), FALSE leaves this blank
$CONFIG['pb_tagline'] = FALSE;

// Pastebin Admin Password, strong one is mucho recommended!
$CONFIG['pb_pass'] = "password";

// Pastebin Salts, 4 sequences of random letters and numbers!
// Please make them at least 6 characters or more!
$CONFIG['pb_salts'] = array(	1 => "str001",
				2 => "str002",
				3 => "str003",
				4 => "str004");

// Hashing algorithm, NULL or FALSE for MD5 (Default)
// For a full list, consult the function hash_algos();
$CONFIG['pb_algo'] = NULL;
# $CONFIG['pb_algo'] = "sha256";

// Apache/IIS Rewrite enabled? Needs to be like 
// http://yourdomain.com/id forwards to http://yourdomain.com/index.php?i=id or
// http://yourdomain.com/dir/id forwards to http://yourdomain.com/dir/index.php?i=id
// TRUE or FALSE
$CONFIG['pb_rewrite'] = FALSE;
# $CONFIG['pb_rewrite'] = TRUE;

// Subdomain support? This will let people have their
// own subdomains for their pastebin.
// Wildcard Domains and DNS must be enabled else this will fail!
// TRUE or FALSE
$CONFIG['pb_subdomains'] = FALSE;
# $CONFIG['pb_subdomains'] = TRUE;

// Enable GZip compression
// WARNING: Requires more CPU
$CONFIG['pb_gzip'] = FALSE;
# $CONFIG['pb_gzip'] = TRUE;

// Enable API?
// Allows the use of an API so external programs can create pastes using the POST method.
// You need to point external programs to http://yourdomain.com/index.php?api or
// http://yourdomain.com/api (if you have rewrite enabled).
$CONFIG['pb_api'] = FALSE;
# $CONFIG['pb_api'] = TRUE;

// Starting ID length, when IDs have run out the script will automatically increment this
// Number. Default is 1;
$CONFIG['pb_id_length'] = 1;
# $CONFIG['pb_id_length'] = 5;

// Server side API Adaptor?
// This allows Javascript frameworks like jQuery to perform cross-domain AJAX.
// Example code: http://knoxious.co.uk/Sharpshooter
$CONFIG['pb_api_adaptor'] = FALSE;
# $CONFIG['pb_api_adaptor'] = "/path/to/adaptor.php";

// Use alternate Pastebin stylesheet, FALSE uses default
// Note that URLs are accepted!
$CONFIG['pb_style'] = FALSE;
# $CONFIG['pb_style'] = "/path/to/sheet.css";

// Use Syntax Highlighting
// This requires GeSHI
// http://qbnz.com/highlighter/index.php
$CONFIG['pb_syntax'] = FALSE;
# $CONFIG['pb_syntax'] = "/path/to/geshi.php";

// Enable Line Highlighting
// Looks for a 2-6 character long highlight string, FALSE for Disabled.
$CONFIG['pb_line_highlight'] = FALSE;
# $CONFIG['pb_line_highlight'] = "@@";
# $CONFIG['pb_line_highlight'] = "!!";

// Add a custom line highlight style?
// Lets you change the color of how a line is highlighted
$CONFIG['pb_line_highlight_style'] = FALSE;
# $CONFIG['pb_line_highlight_style'] = 'background-color: #FFFFAA; font-weight: bolder; color: #000000;';

// Path to jQuery (if you want to use it)
// jQuery adds tiger-stripes, effects, AJAX and resize textbox
// Note that URLs are accepted!
$CONFIG['pb_jQuery'] = FALSE;
# $CONFIG['pb_jQuery'] = "/path/to/jQuery.js";

// Path to _clipboard.swf (allows copying)
// http://knoxious.co.uk/Knoxious+Pastebin/index.html#_clipboard
// Note that swfobject.js is also required in the same Directory
$CONFIG['pb_clipboard'] = FALSE;
# $CONFIG['pb_clipboard'] = "/path/to/_clipboard.swf";

// Date Format (see PHP.net's entry on date();)
$CONFIG['pb_datetime'] = "Y-m-d H:i:s";

// Auto cleanup of posts that have expired?
$CONFIG['pb_autoclean'] = FALSE;

// Number of Recent posts to display, FALSE for none!
// This number also controls the Autoclean.
$CONFIG['pb_recent_posts'] = 10;
# $CONFIG['pb_recent_posts'] = FALSE;

// Allow editing of pastes? (TRUE or FALSE)
$CONFIG['pb_editing'] = FALSE;
# $CONFIG['pb_editing'] = TRUE;

// Maximum paste size in Bytes
// recommend 512Kb to be the Maximum however 1Mb is do-able.
$CONFIG['pb_max_bytes'] = 524288;

// Put a warning on User posted videos and images (TRUE or FALSE)
// This is default on outgoing links!!!
$CONFIG['pb_media_warn'] = FALSE;

// Allow Image hosting? (TRUE or FALSE)
$CONFIG['pb_images'] = FALSE;

// Allow Image download from URL? Requires Image Hosting to be enabled! (TRUE or FALSE)
$CONFIG['pb_download_images'] = FALSE;

// Allowed Extensions for images
$CONFIG['pb_image_extensions'] = array("jpg", "gif", "png");

// Maximum size of Images in bytes, FALSE for None.
$CONFIG['pb_image_maxsize'] = 2097152; 
# (2Mb, you will need to change your php.ini to accomodate higher!)

// Enable Video embedding? (TRUE or FALSE)
$CONFIG['pb_video'] = FALSE;

// Enable FlowPlayer for playing .flv files? (Path or FALSE) Can be a URL.
// http://flowplayer.org
$CONFIG['pb_flowplayer'] = FALSE;
# $CONFIG['pb_flowplayer'] = "/path/to/flowplayer.swf";

// Embedded Video Size (in Pixels)
$CONFIG['pb_video_size'] = array('width' => 600, 'height' => 338);

// Allow URL Shortening/Redirection Service? (TRUE or FALSE)
$CONFIG['pb_url'] = FALSE;

// Default Author Name (Anonymous usually a good start)
$CONFIG['pb_author'] = "Anonymous";

// Store a cookie for the authors name? (FALSE or time in seconds)
// eg. 3600 == 1 hour, 86400 == 1 day
$CONFIG['pb_author_cookie'] = FALSE;
# $CONFIG['pb_author_cookie'] = 3600;

// Paste Lifespan (age in days), array for multiple, FALSE for no expiry.
// commented out is 1 week, 10 minutes, 1 hour, 1 day, 1 month and 1 year.
// (Also no expiry) - Initial value is DEFAULT.
$CONFIG['pb_lifespan'] = FALSE;
# $CONFIG['pb_lifespan'] = array(7, 1/24/6, 1/24, 1, 30, 365);
# $CONFIG['pb_lifespan'] = array(7);

// Enables no expiry, if you set $CONFIG['pb_lifespan'] to FALSE
// you do not need to bother with this. (TRUE or FALSE)
$CONFIG['pb_infinity'] = FALSE;
# $CONFIG['pb_infinity'] = TRUE;

// Make Infinity default? (TRUE or FALSE) This makes sure the post doesn't expire
// by default. Requires $CONFIG['pb_infinity'] = TRUE;
$CONFIG['pb_infinity_default'] = FALSE;
# $CONFIG['pb_infinity_default'] = TRUE;


// Enables Private Posting (TRUE or FALSE)
$CONFIG['pb_private'] = FALSE;
# $CONFIG['pb_private'] = TRUE;

// Error reporting? Time Limit? Memory Usage? Why not!
@error_reporting(E_ALL ^ E_NOTICE);
@set_time_limit(180);
@ini_set('memory_limit', '128M');


/* END Config, Nothing more to edit! */





/* Start Pastebin */
if(substr(phpversion(), 0, 3) < 5.2)
	die('PHP 5.2 is required to run this pastebin! This version is ' . phpversion() . '. Please contact your host!');

if($CONFIG['pb_gzip'])
	ob_start("ob_gzhandler");

if($CONFIG['pb_infinity'])
	$infinity = array('0');


if($CONFIG['pb_infinity'] && $CONFIG['pb_infinity_default'])
	$CONFIG['pb_lifespan'] = array_merge((array)$infinity, (array)$CONFIG['pb_lifespan']);

elseif($CONFIG['pb_infinity'] && !$CONFIG['pb_infinity_default'])
	$CONFIG['pb_lifespan'] = array_merge((array)$CONFIG['pb_lifespan'], (array)$infinity);


if(get_magic_quotes_gpc())
	{
		function callback_stripslashes(&$val, $name) 
			{
				if(get_magic_quotes_gpc()) 
		 			$val = stripslashes($val);
			}

		if(count($_GET))
			array_walk($_GET, 'callback_stripslashes');
		if(count($_POST))
	 		array_walk($_POST, 'callback_stripslashes');
	 	if(count($_COOKIE))
	 		array_walk($_COOKIE, 'callback_stripslashes');
	}


class db
	{
		public function __construct($config)
			{
				$this->config = $config;
				$this->dbt = NULL;

				switch($this->config['db_type'])
					{
						case "flatfile":
							$this->dbt = "txt";
						break;
						case "mysql":
							$this->dbt = "mysql";
						break;
						default:
							$this->dbt = "txt";
						break;
					}
			}

		public function serializer($data)
			{
				$serialize = serialize($data);
				$output = $serialize;
				return $output;
			}
			
		public function deserializer($data)
			{
				$unserialize = unserialize($data);
				$output = $unserialize;
				return $output;
			}
			
		
		public function read($file)
			{
				$open = fopen($file, "r");
				$data = fread($open, filesize($file) + 1024);
				fclose($open);
				return $data;
			}
			
		public function append($data, $file)
			{
				$open = fopen($file, "a");
				$write = fwrite($open, $data);
				fclose($open);
				
				return $write;
			}
			
		public function write($data, $file)
			{
				$open = fopen($file, "w");
				$write = fwrite($open, $data);
				fclose($open);
				
				return $write;
			}

		public function array_remove(array &$a_Input, $m_SearchValue, $b_Strict = False)
			{
    				$a_Keys = array_keys($a_Input, $m_SearchValue, $b_Strict);
    				foreach($a_Keys as $s_Key)
					unset($a_Input[$s_Key]);

    				return $a_Input;
			}

		public function setDataPath($filename = FALSE, $justPath = FALSE, $forceImage = FALSE)
			{
				if(!$filename && !$forceImage)
					return $this->config['txt_config']['db_folder'];
				
				if(!$filename && $forceImage)
					return $this->config['txt_config']['db_folder'] . "/" . $this->config['txt_config']['db_images'];

				$filename = str_replace("!", "", $filename);

				$this->config['max_folder_depth'] = (int)$this->config['max_folder_depth'];

				if($this->config['max_folder_depth'] < 1 || !is_numeric($this->config['max_folder_depth']))
					$this->config['max_folder_depth'] = 1;

				$info = pathinfo($filename);
				if(!in_array(strtolower($info['extension']), $this->config['pb_image_extensions']))
					{
						
						$path = $this->config['txt_config']['db_folder'] . "/" . substr($filename, 0, 1);

						if(!file_exists($path) && is_writable($this->config['txt_config']['db_folder']))
							{
								mkdir($path);
								chmod($path, 0777);
								$this->write("FORBIDDEN", $path . "/index.html");
								chmod($path . "/index.html", 0666);
							}

						for ($i = 1; $i <= $this->config['max_folder_depth'] - 1; $i++) {

							$parent = $path;
						   
							if(strlen($filename) > $i)
								$path .= "/" . substr($filename, $i, 1);

							if(!file_exists($path) && is_writable($parent))
								{
									mkdir($path);
									chmod($path, 0777);
									$this->write("FORBIDDEN", $path . "/index.html");
									chmod($path . "/index.html", 0666);
								}

						}


					} else
						{
							$path = $this->config['txt_config']['db_folder'] . "/" . $this->config['txt_config']['db_images'] . "/" . substr($info['filename'], 0, 1);
							
							if(!file_exists($path) && is_writable($this->config['txt_config']['db_folder'] . "/" . $this->config['txt_config']['db_images']))
								{
									mkdir($path);
									chmod($path, 0777);
									$this->write("FORBIDDEN", $path . "/index.html");
									chmod($path . "/index.html", 0666);
								}


							for ($i = 1; $i <= $this->config['max_folder_depth'] - 1; $i++) {

								$parent = $path;
							   
								if(strlen($info['filename']) > $i)
									$path .= "/" . substr($info['filename'], $i, 1);

								if(!file_exists($path) && is_writable($parent))
									{
										mkdir($path);
										chmod($path, 0777);
										$this->write("FORBIDDEN", $path . "/index.html");
										chmod($path . "/index.html", 0666);
									}

							}

						}

				if($justPath)
					return $path;
				else
					return $path . "/" . $filename;
			}

		public function connect()
			{
				switch($this->dbt)
					{
						case "mysql":
							$this->link = mysql_connect($this->config['mysql_connection_config']['db_host'], $this->config['mysql_connection_config']['db_uname'], $this->config['mysql_connection_config']['db_pass']);
							$result = mysql_select_db($this->config['mysql_connection_config']['db_name'], $this->link);
								if($this->link == FALSE || $result == FALSE)
									$output = FALSE;
								else
									$output = TRUE;
						break;
						case "txt":
							if(!is_writeable($this->setDataPath() . "/" . $this->config['txt_config']['db_index']) || !is_writeable($this->setDataPath()))
								$output = FALSE;
							else
								$output = TRUE;
						break;
					}

				return $output;
			}

		public function disconnect()
			{
				switch($this->dbt)
					{
						case "mysql":
							mysql_close();
							$output = TRUE;
						break;
						case "txt":
							$output = TRUE;
						break;
					}

				return $output;
			}

		public function readPaste($id)
			{
				switch($this->dbt)
					{
						case "mysql":
							$this->connect();
							$query = "SELECT * FROM " . $this->config['mysql_connection_config']['db_table'] . " WHERE ID = '" . $id . "'";
							$result = array();
							$result_temp = mysql_query($query);
							if(!$result_temp || mysql_num_rows($result_temp) < 1)
								return false;

							while ($row = mysql_fetch_assoc($result_temp))
								$result[] = $row;

							mysql_free_result($result_temp);
						break;
						case "txt":
							$result = array();

							if(!file_exists($this->setDataPath($id)))
								{
									$index = $this->deserializer($this->read($this->setDataPath() . "/" . $this->config['txt_config']['db_index']));
									if(in_array($id, $index))
										$this->dropPaste($id, TRUE);

									return false;
								}


							$result = $this->deserializer($this->read($this->setDataPath($id)));

						break;
					}

				if(count($result) < 1)
					$result = FALSE;

				return $result;
			}

		public function dropPaste($id, $ignoreImage = FALSE)
			{

				$id = (string)$id;

				if(!$ignoreImage)
					{
						$imgTemp = $this->readPaste($id);

						if($this->dbt == "mysql")
							$imgTemp = $imgTemp[0];

						if($imgTemp['Image'] != NULL && file_exists($this->setDataPath($imgTemp['Image'])))
							unlink($this->setDataPath($imgTemp['Image']));
					}

				switch($this->dbt)
					{
						case "mysql":
							$this->connect();
							$query = "DELETE FROM " . $this->config['mysql_connection_config']['db_table'] . " WHERE ID = '" . $id . "'";
							$result = mysql_query($query);
						break;
						case "txt":
							if(file_exists($this->setDataPath($id)))
								$result = unlink($this->setDataPath($id));

							$index = $this->deserializer($this->read($this->setDataPath() . "/" . $this->config['txt_config']['db_index']));
							if(in_array($id, $index))
								{
									$key = array_keys($index, $id);	
								} elseif(in_array("!" . $id, $index))
									{
										$key = array_keys($index, "!" . $id);	
									}
							$key = $key[0];

							if(isset($index[$key]))	
								unset($index[$key]);

							$index = array_values($index);
							$result = $this->write($this->serializer($index), $this->setDataPath() . "/" . $this->config['txt_config']['db_index']);
						break;
					}

				return $result;
			}
		
		public function cleanHTML($input)
			{
				if($this->dbt == "mysql")
					$output = addslashes(str_replace('\\', '\\\\', $input));
				else
					$output = addslashes($input);

				return $output;
			}

		public function lessHTML($input)
			{
				$output = htmlspecialchars($input);
				return $output;
			}


		public function dirtyHTML($input)
			{
				$output = htmlspecialchars(stripslashes($input));
				return $output;
			}

		public function rawHTML($input)
			{
				if($this->dbt == "mysql")
					$output = stripslashes($input);
				else 
					$output = stripslashes(stripslashes($input));

				return $output;
			}

		public function uploadFile($file, $rename = FALSE)
			{
				$info = pathinfo($file['name']);

				if(!$this->config['pb_images'])
					return false;

				if($rename)
					$path = $this->setDataPath($rename . "." . strtolower($info['extension'])); 
				else
					$path = $path = $this->setDataPath($file['name']);

				if(!in_array(strtolower($info['extension']), $this->config['pb_image_extensions']))
					return false;

				if($file['size'] > $this->config['pb_image_maxsize'])
					return false;

				if(!move_uploaded_file($file['tmp_name'], $path))
					return false;
				
				chmod($path, 0777);

				if(!$rename)
					$filename = $file['name'];
				else
					$filename = $rename . "." . strtolower($info['extension']);

				return $filename;
			}

		function downTheImg($img, $rename)
			{
				$info = pathinfo($img);

				if(!in_array(strtolower($info['extension']), $this->config['pb_image_extensions']))
					return false;

				if(!$this->config['pb_images'] || !$this->config['pb_download_images'])
					return false;

				if(substr($img, 0, 4) == 'http') 
					{
						$x = array_change_key_case(get_headers($img, 1), CASE_LOWER);
						if ( strcasecmp($x[0], 'HTTP/1.1 200 OK') != 0 ) { $x = $x['content-length'][1]; }
						else { $x = $x['content-length']; }
					}
				else { $x = @filesize($img); } 
		
				$size = $x;
		
				if($size > $this->config['pb_image_maxsize'])
					return false;
			
				$data = file_get_contents($img);

				$path = $this->setDataPath($rename . "." . strtolower($info['extension']));
		
				$fopen = fopen($path, "w+");
				fwrite($fopen, $data);
				fclose($fopen);

				chmod($path, 0777);

				$filename = $rename . "." . strtolower($info['extension']);

				return $filename;
			}

		public function insertPaste($id, $data, $arbLifespan = FALSE)
			{

				if($arbLifespan && $data['Lifespan'] > 0)
					$data['Lifespan'] = time() + $data['Lifespan'];
				elseif($arbLifespan && $data['Lifespan'] == 0)
					$data['Lifespan'] = 0;
				else
					{
						if((($this->config['pb_lifespan'][$data['Lifespan']] == FALSE || $this->config['pb_lifespan'][$data['Lifespan']] == 0) && $this->config['pb_infinity']) || !$this->config['pb_lifespan'])
							$data['Lifespan'] = 0;
						else
							$data['Lifespan'] = time() + ($this->config['pb_lifespan'][$data['Lifespan']] * 60 * 60 * 24);
					}


				$paste = array(	'ID'		=>	$id,
						'Subdomain'	=>	$data['Subdomain'],
						'Datetime'	=>	time() + $data['Time_offset'],
						'Author'	=>	$data['Author'],
						'Protection'	=>	$data['Protect'],
						'Syntax' 	=>	$data['Syntax'],
						'Parent'	=>	$data['Parent'],
						'Image'		=>	$data['Image'],
						'ImageTxt'	=>	$this->cleanHTML($data['ImageTxt']),
						'URL'		=>	$data['URL'],
						'Video'		=>	$this->cleanHTML($data['Video']),
						'Lifespan'	=>	$data['Lifespan'],
						'IP'		=>	base64_encode($data['IP']),
						'Data'		=>	$this->cleanHTML($data['Content']),
						'GeSHI'		=>	$this->cleanHTML($data['GeSHI']),
						'Style'		=>	$this->cleanHTML($data['Style'])
					);

				if(($paste['Protection'] > 0  && $this->config['pb_private']) || ($paste['Protection'] > 0 && $arbLifespan))
					$id = "!" . $id;
				else
					$paste['Protection'] = 0;
			
				switch($this->dbt)
					{
						case "mysql":
							$this->connect();
							$query = "INSERT INTO " . $this->config['mysql_connection_config']['db_table'] . " (ID, Subdomain, Datetime, Author, Protection, Syntax, Parent, Image, ImageTxt, URL, Video, Lifespan, IP, Data, GeSHI, Style) VALUES ('" . $paste['ID'] . "', '" . $paste['Subdomain'] . "', '" . $paste['Datetime'] . "', '" . $paste['Author'] . "', " . (int)$paste['Protection'] . ", '" . $paste['Syntax'] . "', '" . $paste['Parent'] . "', '" . $paste['Image'] . "', '" . $paste['ImageTxt'] . "', '" . $paste['URL'] . "', '" . $paste['Video'] . "', '" . (int)$paste['Lifespan'] . "', '" . $paste['IP'] . "', '" . $paste['Data'] . "', '" . $paste['GeSHI'] . "', '" . $paste['Style'] . "')";
							$result = mysql_query($query);
						break;
						case "txt":
							$index = $this->deserializer($this->read($this->setDataPath() . "/" . $this->config['txt_config']['db_index']));
							$index[] = $id;
							$this->write($this->serializer($index), $this->setDataPath() . "/" . $this->config['txt_config']['db_index']);				
							$result = $this->write($this->serializer($paste), $this->setDataPath($paste['ID']));
							chmod($this->setDataPath($paste['ID']), 0666);
						break;
					}
				return $result;
			}

		public function checkID($id)
			{
				switch($this->dbt)
					{
						case "mysql":
							$this->connect();							
							$query = "SELECT * FROM " . $this->config['mysql_connection_config']['db_table'] . " WHERE ID = '" . $id . "'";
							$result = mysql_query($query);
							$result = mysql_num_rows($result);
								if($result > 0)
									$output = TRUE;
								else
									$output = FALSE;
						break;
						case "txt":
							$index = $this->deserializer($this->read($this->setDataPath() . "/" . $this->config['txt_config']['db_index']));
								if(in_array($id, $index) || in_array("!" . $id, $index))
									$output = TRUE;
								else
									$output = FALSE;
						break;
					}
				return $output;
			}

		public function getLastID()
			{
				if(!is_int($this->config['pb_id_length']))
					$this->config['pb_id_length'] = 1;
				if($this->config['pb_id_length'] > 32)
					$this->config['pb_id_length'] = 32;

				switch($this->dbt)
					{
						case "mysql":
							$this->connect();							
							$query = "SELECT * FROM " . $this->config['mysql_connection_config']['db_table'] . " WHERE ID <> 'subdomain' && ID <> 'forbidden' ORDER BY Datetime DESC LIMIT 1";
							$result = mysql_query($query);
							$output = $this->config['pb_id_length'];
							while($assoc = mysql_fetch_assoc($result))
								{
									if(strlen($assoc['ID']) >= 1)
										$output = strlen($assoc['ID']);
									else
										$output = $this->config['pb_id_length'];
								}

							if($output < 1)
								$output = $this->config['pb_id_length'];

							mysql_free_result($result);

						break;
						case "txt":
							$index = $this->deserializer($this->read($this->setDataPath() . "/" . $this->config['txt_config']['db_index']));
							$index = array_reverse($index);
							$output = strlen(str_replace("!", NULL, $index[0]));
							if($output < 1)
								$output = $this->config['pb_id_length'];
						break;
					}

				return $output;
			}


	}

class bin
	{
		public function __construct($db)
			{
				$this->db = $db;
			}
		
		public function setTitle($config)
			{
				if(!$config)
					$title = "Pastebin on " . $_SERVER['SERVER_NAME'];
				else
					$title = htmlspecialchars($config, ENT_COMPAT, 'UTF-8', FALSE);

				return $title;
			}

		public function setTagline($config)
			{
				if(!$config)
					$output = "<!-- TAGLINE OMITTED -->";
				else
					$output = "<div id=\"tagline\">" . $config . "</div>";

				return $output;
			}

		public function titleID($requri = FALSE)
			{
				if(!$requri)
					$id = "Welcome!";
				else
					$id = $requri;

				return $id;
			}

		public function robotPrivacy($requri = FALSE)
			{
				if(!$requri)
					return "index,follow";

				$requri = str_replace("!", "", $requri);
				
				if($privacy = $this->db->readPaste($requri))
					{
						
		
						if($this->db->dbt == "mysql")
							$privacy = $privacy[0];

						switch((int)$privacy['Protection'])
							{
								case 0:
									if($privacy['URL'] != "")
										$robot = "index,nofollow";
									else
										$robot = "index,follow";
								break;
								case 1:
									if($privacy['URL'] != "")
										$robot = "noindex,nofollow";
									else
										$robot = "noindex,follow";
								break;
								default:
									$robot = "index,follow";
								break;
							}
					}

				return $robot;
			}
		
		public function thisDir()
			{
				$output = dirname($_SERVER['SCRIPT_FILENAME']);
				return $output;
			}
		
		public function generateID($id = FALSE, $iterations = 0)
			{
				$checkArray = array('install', 'api', 'defaults', 'recent', 'raw', 'moo', 'subdomain', 'forbidden');

				if($iterations > 0 && $iterations < 4 && $id != FALSE)
					$id = $this->generateRandomString($this->db->getLastID());
				elseif($iterations > 3 && $id != FALSE)
					$id = $this->generateRandomString($this->db->getLastID() + 1);
				else
					$id = $id;

				if(!$id)
					$id = $this->generateRandomString($this->db->getLastID());

				if($id == $this->db->config['txt_config']['db_index'] || in_array($id, $checkArray))
					$id = $this->generateRandomString($this->db->getLastID());

				if($this->db->config['pb_rewrite'] && (is_dir($id) || file_exists($id)))
					$id = $this->generateID($id, $iterations + 1);	

				if(!$this->db->checkID($id) && !in_array($id, $checkArray))
					return $id;
				else
					return $this->generateID($id, $iterations + 1);			
			}

		public function checkAuthor($author = FALSE)
			{
				if($author == FALSE)
					return $this->db->config['pb_author'];

				if(preg_match('/^\s/', $author) || preg_match('/\s$/', $author) || preg_match('/^\s$/', $author))
					return $this->db->config['pb_author'];
				else
					return addslashes($this->db->lessHTML($author));
			}

		public function checkSubdomain($subdomain)
			{
				if($subdomain == FALSE)
					return FALSE;

				if(preg_match('/^\s/', $subdomain) || preg_match('/\s$/', $subdomain) || preg_match('/^\s$/', $subdomain))
					return FALSE;
				elseif(ctype_alnum($subdomain))
					return $subdomain;
				else
					return preg_replace("/[^A-Za-z0-9]/i", "", $subdomain);
			}


		public function getLastPosts($amount)
			{
				switch($this->db->dbt)
					{
						case "mysql":
							$this->db->connect();
							$result = array();
							if($this->db->config['subdomain'])
								$query = "SELECT * FROM " . $this->db->config['mysql_connection_config']['db_table'] . " WHERE Protection < 1 AND Subdomain = '" . $this->db->config['subdomain'] . "' ORDER BY Datetime DESC LIMIT " . $amount;
							else
								$query = "SELECT * FROM " . $this->db->config['mysql_connection_config']['db_table'] . " WHERE Protection < 1 AND Subdomain = '' ORDER BY Datetime DESC LIMIT " . $amount;
							$result_temp = mysql_query($query);
							if(!$result_temp || mysql_num_rows($result_temp) < 1)
								return NULL;
							
							while ($row = mysql_fetch_assoc($result_temp))
								 $result[] = $row;

							mysql_free_result($result_temp);
						break;
						case "txt":
							$index = $this->db->deserializer($this->db->read($this->db->setDataPath() . "/" . $this->db->config['txt_config']['db_index']));
							$index = array_reverse($index);
							$int = 0;
							$result = array();
							if(count($index) > 0)
								{ foreach($index as $row)
									{ if($int < $amount && substr($row, 0, 1) != "!") { $result[$int] = $this->db->readPaste($row); $int++; } elseif($int <= $amount && substr($row, 0, 1) == "!") { $int = $int; } else { return $result; } } }
						break;
					}
				return $result;
			}

		public function styleSheet()
			{
				if($this->db->config['pb_style'] == FALSE)
					return false;

				if(preg_match("/^(http|https|ftp):\/\/(.*?)/", $this->db->config['pb_style']))
					{
						$headers = @get_headers($this->db->config['pb_style']);
						if (preg_match("|200|", $headers[0]))
							return true;
						else
							return false;
					} else
						{
							if(file_exists($this->db->config['pb_style']))
								return true;
							else
								return false;
						}
				

			}

		public function jQuery()
			{
				if($this->db->config['pb_jQuery'] == FALSE)
					return false;

				if(preg_match("/^(http|https|ftp):\/\/(.*?)/", $this->db->config['pb_jQuery']))
					{
						$headers = @get_headers($this->db->config['pb_jQuery']);
						if (preg_match("|200|", $headers[0]))
							return true;
						else
							return false;
					} else
						{
							if(file_exists($this->db->config['pb_jQuery']))
								return true;
							else
								return false;
						}
				

			}

		public function highlight()
			{
				if($this->db->config['pb_syntax'] == FALSE)
					return false;

				
				if(file_exists($this->db->config['pb_syntax']))
					return true;
				else
					return false;
				

			}

		public function adaptor()
			{
				if($this->db->config['pb_api_adaptor'] == FALSE)
					return false;

				
				if(file_exists($this->db->config['pb_api_adaptor']))
					return true;
				else
					return false;
				

			}

		public function highlightPath()
			{
				if($this->highlight())
					return dirname($this->db->config['pb_syntax']) . "/";
				else
					return false;
			}

		public function lineHighlight()
			{
				if($this->db->config['pb_line_highlight'] == FALSE || strlen($this->db->config['pb_line_highlight']) < 1)
					return false;

				if(strlen($this->db->config['pb_line_highlight']) > 6)
					return substr($this->db->config['pb_line_highlight'], 0, 6);

				if(strlen($this->db->config['pb_line_highlight']) == 1)
					return $this->db->config['pb_line_highlight'] . $this->db->config['pb_line_highlight'];

				return $this->db->config['pb_line_highlight'];

			}

		public function filterHighlight($line)
			{
				if($this->lineHighlight() == FALSE)
					return $line;

				$len = strlen($this->lineHighlight());
				
				if(substr($line, 0, $len) == $this->lineHighlight())
					$line = "<span class=\"lineHighlight\">" . substr($line, $len) . "</span>";

				return $line;
				
			}

		public function noHighlight($data)
			{

				if($this->lineHighlight() == FALSE)
					return $data;

				$output = array();

				$lines = explode("\n", $data);
					foreach($lines as $line)
						{
							$len = strlen($this->lineHighlight());
				
							if(substr($line, 0, $len) == $this->lineHighlight())
								$output[] = substr($line, $len);
							else
								$output[] = $line;
						}

				$output = implode("\n", $output);

				return $output;
				
			}

		public function highlightNumbers($data)
			{
				if($this->lineHighlight() == FALSE)
					return false;

				$output = array();

				$n = 0;

				$lines = explode("\n", $data);
					foreach($lines as $line)
						{
							$n++;

							$len = strlen($this->lineHighlight());
				
							if(substr($line, 0, $len) == $this->lineHighlight())
								$output[] = $n;
						}


				return $output;
				
			}

		public function _clipboard()
			{
				if($this->db->config['pb_clipboard'] == FALSE)
					return false;

				$this->db->config['cbdir'] = dirname($this->db->config['pb_clipboard']);
				$cbdir = $this->db->config['cbdir'];

				if(strlen($cbdir) < 2)
					$cbdir = ".";

				if(preg_match("/^(http|https|ftp):\/\/(.*?)/", $this->db->config['pb_clipboard']))
					{
						$headers = @get_headers($this->db->config['pb_clipboard']);
						if (preg_match("|200|", $headers[0])) {
							$jsHeaders = @get_headers($cbdir . "/swfobject.js");
							if(preg_match("|200|", $jsHeaders[0]))
								return true;
							else
								return false; }
						else
							return false;
					} else
						{
							if(file_exists($this->db->config['pb_clipboard']) && file_exists($cbdir) . "/swfobject.js")
								return true;
							else
								return false;
						}
				

			}

		public function flowplayer()
			{
				if($this->db->config['pb_flowplayer'] == FALSE)
					return false;

				if(preg_match("/^(http|https|ftp):\/\/(.*?)/", $this->db->config['pb_flowplayer']))
					{
						$headers = @get_headers($this->db->config['pb_flowplayer']);
						if (preg_match("|200|", $headers[0]))
							return $this->db->config['pb_flowplayer'];
						else
							return false;
					} else
						{
							if(file_exists($this->db->config['pb_flowplayer']))
								return $this->db->config['pb_flowplayer'];
							else
								return false;
						}
				

			}

		public function generateRandomString($length)
			{
				$checkArray = array('install', 'api', 'defaults', 'recent', 'raw', 'moo', 'subdomain', 'forbidden');

				$characters = "123456789abcdefghijklmnopqrstuvwxyz";  
				$output = "";
					for ($p = 0; $p < $length; $p++) {
						$output .= $characters[mt_rand(0, strlen($characters))];
					}
					
				if(is_bool($output) || $output == NULL || strlen($output) < $length || in_array($output, $checkArray))
					return $this->generateRandomString($length);
				else
    					return (string)$output;
			}

		public function cleanUp($amount)
			{
				if(!$this->db->config['pb_autoclean'])
					return false;
				
				switch($this->db->dbt)
					{
						case "mysql":
							$this->db->connect();
							$result = array();
							$query = "SELECT * FROM " . $this->db->config['mysql_connection_config']['db_table'] . " WHERE Lifespan <= " . time() . " AND Lifespan > 0 ORDER BY Datetime ASC LIMIT " . $amount;
							$result_temp = mysql_query($query);
								while ($row = mysql_fetch_assoc($result_temp))
									 $result[] = $row;

							mysql_free_result($result_temp);
						break;
						case "txt":
							$index = $this->db->deserializer($this->db->read($this->db->setDataPath() . "/" . $this->db->config['txt_config']['db_index']));

							if(is_array($index) && count($index) > $amount + 1)
								shuffle($index);

							$int = 0;
							$result = array();
							if(count($index) > 0)
								{ foreach($index as $row)
									{ if($int < $amount) { $result[] = $this->db->readPaste(str_replace("!", NULL, $row)); } else { break; } $int++;	} }
						break;
					}

				foreach($result as $paste)
					{
						if($paste['Lifespan'] == 0)
							$paste['Lifespan'] = time() + time();

						if(gmdate('U') > $paste['Lifespan'])
							$this->db->dropPaste($paste['ID']);
					}

				return $result;
			}

		public function linker($id = FALSE)
			{
				$dir = dirname($_SERVER['SCRIPT_NAME']);
				if(strlen($dir) > 1)
					$now = "http://" . $_SERVER['SERVER_NAME'] . $dir;
				else
					$now = "http://" . $_SERVER['SERVER_NAME'];

				$file = basename($_SERVER['SCRIPT_NAME']);
				
				switch($this->db->config['pb_rewrite'])
					{
						case TRUE:
							if($id == FALSE)
								$output = $now . "/";
							else
								$output = $now . "/" . $id;
						break;
						case FALSE:
							if($id == FALSE)
								$output = $now . "/";
							else
								$output = $now . "/" . $file . "?" . $id;
						break;
					}

				return $output;
			}

		public function setSubdomain($force = FALSE)
			{
				if(!$this->db->config['pb_subdomains'])
					return NULL;

				if($force)
					return $this->db->config['txt_config']['db_folder'] = $this->db->config['txt_config']['db_folder'] . "/subdomain/" . $force;

				if(!file_exists('INSTALL_LOCK'))
					return NULL;

				$domain = strtolower(str_replace("www.", "", $_SERVER['SERVER_NAME']));
				$explode = explode(".", $domain, 2);
				$sub = $explode[0];

				switch($this->db->dbt)
					{
						case "mysql":
							$this->db->connect();
							$subdomain_list = array();
							$query = "SELECT * FROM " . $this->db->config['mysql_connection_config']['db_table'] . " WHERE ID = 'forbidden' LIMIT 1";
							$result_temp = mysql_query($query);
								while($row = mysql_fetch_assoc($result_temp))
									 $subdomain_list['forbidden'] = unserialize($row['Data']);

							$query = "SELECT * FROM " . $this->db->config['mysql_connection_config']['db_table'] . " WHERE ID = 'subdomain' AND Subdomain = '" . $sub . "'";
							$result_temp = mysql_query($query);
							if(mysql_num_rows($result_temp) > 0)
								$in_list = TRUE;
							else
								$in_list = FALSE;

							mysql_free_result($result_temp);
						break;
						case "txt":
							$subdomainsFile = $this->db->config['txt_config']['db_folder'] . "/" . $this->db->config['txt_config']['db_index'] . "_SUBDOMAINS";
							$subdomain_list = $this->db->deserializer($this->db->read($subdomainsFile));
							$in_list = in_array($sub, $subdomain_list);
						break;
					}

				if(!in_array($sub, $subdomain_list['forbidden']) && $in_list)
					{
						$this->db->config['txt_config']['db_folder'] = $this->db->config['txt_config']['db_folder'] . "/subdomain/" . $sub;
						return $sub;
					}
				else
					return NULL;				
			}

		public function makeSubdomain($subdomain)
			{
				if(!file_exists('INSTALL_LOCK'))
					return NULL;

				if(!$this->db->config['pb_subdomains'])
					return FALSE;

				$subdomain = $this->checkSubdomain(strtolower($subdomain));

				switch($this->db->dbt)
					{
						case "mysql":
							$this->db->connect();
							$subdomain_list = array();
							$query = "SELECT * FROM " . $this->db->config['mysql_connection_config']['db_table'] . " WHERE ID = 'forbidden' LIMIT 1";
							$result_temp = mysql_query($query);
								while($row = mysql_fetch_assoc($result_temp))
									 $subdomain_list['forbidden'] = unserialize($row['Data']);

							$query = "SELECT * FROM " . $this->db->config['mysql_connection_config']['db_table'] . " WHERE ID = 'subdomain' AND Subdomain = '" . $subdomain . "'";
							$result_temp = mysql_query($query);
							if(mysql_num_rows($result_temp) > 0)
								$in_list = TRUE;
							else
								$in_list = FALSE;

							mysql_free_result($result_temp);
						break;
						case "txt":
							$subdomainsFile = $this->db->config['txt_config']['db_folder'] . "/" . $this->db->config['txt_config']['db_index'] . "_SUBDOMAINS";
							$subdomain_list = $this->db->deserializer($this->db->read($subdomainsFile));
							$in_list = in_array($subdomain, $subdomain_list);
						break;
					}

				if(!in_array($subdomain, $subdomain_list['forbidden']) && !$in_list)
					{
						switch($this->db->dbt)
							{
								case "mysql":
									$domain = array('ID' => "subdomain", 'Subdomain' => $subdomain, 'Image' => 1, 'Author' => "System", 'Protect' => 1, 'Lifespan' => 0, 'Content' => "Subdomain marker");
									$this->db->insertPaste($domain['ID'], $domain, TRUE);
									mkdir($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain);
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain, 0777);
									mkdir($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images']);
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images'], 0777);
									$this->db->write("FORBIDDEN", $this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/index.html");
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/index.html", 0777);
									$this->db->write("FORIDDEN", $this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images'] . "/index.html");
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images'] . "/index.html", 0666);
									return $subdomain;
								break;
								case "txt":
									$subdomain_list[] = $subdomain;
									$subdomain_list = $this->db->serializer($subdomain_list);
									$this->db->write($subdomain_list, $subdomainsFile);
									$subdomain = $subdomain;
									mkdir($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain);
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain, 0777);
									mkdir($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images']);
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images'], 0777);
									$this->db->write("FORBIDDEN", $this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/index.html");
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/index.html", 0777);
									$this->db->write($this->db->serializer(array()), $this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_index']);
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_index'], 0666);
									$this->db->write("FORIDDEN", $this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images'] . "/index.html");
									chmod($this->db->config['txt_config']['db_folder'] . "/subdomain/" . $subdomain . "/" . $this->db->config['txt_config']['db_images'] . "/index.html", 0666);
									return $subdomain;
								break;
							}
					}
				else
					return FALSE;				
			}

		public function generateForbiddenSubdomains($mysql = FALSE)
			{
				$domain = str_replace("www.", "", $_SERVER['SERVER_NAME']);
				$explode = explode(".", $domain, 2);
				$domain = $explode[0];
				$output = array(
					'forbidden' => array("www", $domain, "admin", "owner", "api")
				);

				if($mysql)
					$output = array("www", $domain, "admin", "owner", "api");

				return $output;
			}

		public function hasher($string, $salts = NULL)
			{
				if(!is_array($salts))
					$salts = NULL;

				if(count($salts) < 2)
					$salts = NULL;

				if(!$this->db->config['pb_algo'])
					$this->db->config['pb_algo'] = "md5";

				$hashedSalt = NULL;

				if($salts)
					{
						$hashedSalt = array(NULL, NULL);
						$longIP = ip2long($_SERVER['REMOTE_ADDR']);

						for($i = 0; $i < strlen(max($salts)) ; $i++)
							{
								$hashedSalt[0] .= $salts[1][$i] . $salts[3][$i] . ($longIP * $i);
								$hashedSalt[1] .= $salts[2][$i] . $salts[4][$i] . ($longIP + $i);
							}

						$hashedSalt[0] = hash($this->db->config['pb_algo'], $hashedSalt[0]);
						$hashedSalt[1] = hash($this->db->config['pb_algo'], $hashedSalt[1]);
					}

				if(is_array($hashedSalt))
					$output = hash($this->db->config['pb_algo'], $hashedSalt[0] . $string . $hashedSalt[1]);
				else
					$output = hash($this->db->config['pb_algo'], $string);

				return $output;

			}

		public function event($time, $single = FALSE)
			{
				$context = array(
        					array(60 * 60 * 24 * 365 , "years"),
        					array(60 * 60 * 24 * 7, "weeks"),
        					array(60 * 60 * 24 , "days"),
   		    				array(60 * 60 , "hours"),
        					array(60 , "minutes"),
						array(1 , "seconds"),
   			 		);
    
    					$now = gmdate('U');
   						$difference = $now - $time;
	
    
    					for ($i = 0, $n = count($context); $i < $n; $i++) {
        
        						$seconds = $context[$i][0];
        						$name = $context[$i][1];
        
        						if (($count = floor($difference / $seconds)) > 0) {
            				   			break;
        							}
    						}
    
    				$print = ($count == 1) ? '1 ' . substr($name, 0, -1) : $count . " " . $name;
				
				if($single)
					return $print;
    
   		 				if ($i + 1 < $n) {
  			      				$seconds2 = $context[$i + 1][0];
    		  					$name2 = $context[$i + 1][1];
        
    		   					if (($count2 = floor(($difference - ($seconds * $count)) / $seconds2)) > 0) {
										$print .= ($count2 == 1) ? ' 1 ' . substr($name2, 0, -1) : " " . $count2 . " " . $name2;
    		    			}
    				}
	
   				return $print;
			}

		public function checkIfRedir($reqURI)
			{
				if(strlen($reqURI) < 1)
					return false;

				$pasteData = $this->db->readPaste($reqURI);
				if($this->db->dbt == "mysql")
					$pasteData = $pasteData[0];

				if(strstr($pasteData['URL'], $this->linker()))
					$pasteData['URL'] = $pasteData['URL'] . "!";

				if($pasteData['Lifespan'] == 0)
					$pasteData['Lifespan'] = time() + time();

				if(gmdate('U') > $pasteData['Lifespan'])
					return false;

				if($pasteData['URL'] != NULL && $this->db->config['pb_url'] && !$this->generateVideoEmbedCode($pasteData['URL']))
					return $pasteData['URL'];
				else
					return false;
			}

		public function humanReadableFilesize($size) {
 			// Snippet from: http://www.jonasjohn.de/snippets/php/readable-filesize.htm
 			$mod = 1024;
 
    			$units = explode(' ', 'b Kb Mb Gb Tb Pb');
    			for ($i = 0; $size > $mod; $i++) {
        			$size /= $mod;
    			}
 
    			return round($size, 2) . ' ' . $units[$i];
		}

		public function stristr_array( $haystack, $needle ) {
			if ( !is_array( $needle ) ) {
				return false;
			}
			foreach ( $needle as $element ) {
				if ( stristr( $haystack, $element ) ) {
					return $element;
				}
			}
			return false;
		}

		public function token($generate = FALSE)
			{
				if($generate == TRUE)
					{
						$output = strtoupper(sha1(md5((int)date("G") . $_SERVER['REMOTE_ADDR'] . $this->db->config['pb_pass'] . $_SERVER['SERVER_ADDR']. $_SERVER['HTTP_USER_AGENT'] . $_SERVER['SCRIPT_FILENAME'])));
						return $output;
					}

				$time = array(
				((int)date("G") - 1), 
				((int)date("G")), 
				((int)date("G") + 1));

				if((int)date("G") == 23)
					$time[2] = 0;

				if((int)date("G") == 0)
					$time[0] = 23;

				$output = array(	strtoupper(sha1(md5($time[0] . $_SERVER['REMOTE_ADDR'] . $this->db->config['pb_pass'] . $_SERVER['SERVER_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['SCRIPT_FILENAME']))),
							strtoupper(sha1(md5($time[1] . $_SERVER['REMOTE_ADDR'] . $this->db->config['pb_pass'] . $_SERVER['SERVER_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['SCRIPT_FILENAME']))),
							strtoupper(sha1(md5($time[2] . $_SERVER['REMOTE_ADDR'] . $this->db->config['pb_pass'] . $_SERVER['SERVER_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['SCRIPT_FILENAME']))));

				return $output;
			}

		public function cookieName()
			{
				$output = strtoupper(sha1(str_rot13(md5($_SERVER['REMOTE_ADDR'] . $_SERVER['SERVER_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['SCRIPT_FILENAME']))));
				return $output;
			}

		public function generateVideoEmbedCode($url)
			{
				$type = array();
				$type['youtube'] = stristr($url, "youtube.com");
				$type['vimeo'] = stristr($url, "vimeo.com");
				$type['dailymotion'] = stristr($url, "dailymotion.com");
				$type['flv'] = $this->stristr_array($url, array('.flv', '.f4v', 'mp4', 'm4v', 'm4p'));
				$is = NULL;

				if(!$this->db->config['pb_video'])
					return false;

				if($type['youtube']) {
					$output = "<object width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\"><param name=\"movie\" value=\"http://youtube.com/v/{VIDEO}\"></param><embed src=\"http://youtube.com/v/{VIDEO}\" type=\"application/x-shockwave-flash\" width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\"></embed></object>";
					$is = "youtube";
				}
				if($type['vimeo']) {
					$output = "<object width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\"><param name=\"allowfullscreen\" value=\"true\" /><param name=\"allowscriptaccess\" value=\"always\" /><param name=\"movie\" value=\"http://vimeo.com/moogaloop.swf?clip_id={VIDEO}&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1\" /><embed src=\"http://vimeo.com/moogaloop.swf?clip_id={VIDEO}&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowscriptaccess=\"always\" width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\"></embed></object>";
					$is = "vimeo";
				}
				if($type['dailymotion']) {
					$output = "<object width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\"><param name=\"movie\" value=\"http://www.dailymotion.com/swf/{VIDEO}\" /><param name=\"allowFullScreen\" value=\"true\" /><param name=\"allowScriptAccess\" value=\"always\" /><embed src=\"http://www.dailymotion.com/swf/{VIDEO}\" type=\"application/x-shockwave-flash\" width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\" allowFullScreen=\"true\" allowScriptAccess=\"always\"></embed></object>";
					$is = "dailymotion";
				}
				if($this->flowplayer())
					{

						if($type['flv']){
							$output = "<object id=\"flowplayer\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\">
									<param name=\"movie\" value=\"" . $this->flowplayer() . "\" /> 
									<param name=\"flashvars\" 
										value='config={\"clip\":{\"autoPlay\":false,\"autoBuffering\":true,\"url\":\"{VIDEO}\"}}' />
	

									<!-- EMBED tag for Netscape Navigator 2.0+ and Mozilla compatible browsers -->
									<embed type=\"application/x-shockwave-flash\" width=\"" . $this->db->config['pb_video_size']['width'] . "\" height=\"" . $this->db->config['pb_video_size']['height'] . "\" 
										src=\"http://releases.flowplayer.org/swf/flowplayer-3.2.0.swf\"
										flashvars='config={\"clip\":{\"autoPlay\":false,\"autoBuffering\":true,\"url\":\"{VIDEO}\"}}'/>
	
								</object>";
							$is = "flv";
						}
					}

				if($is == NULL)
					return false;
					
						switch ($is)
							{
								case "youtube":
									$vidID = str_replace("http://www.youtube.com/watch?v=", "", $url);
									$vidID = str_replace("http://youtube.com/watch?v=", "", $vidID);
									if(stristr($vidID, "&")) {
										$explode = explode("&", $vidID);
										$vidID = $explode[0];
									}
								break;
								case "vimeo":
									$vidID = str_replace("http://vimeo.com/", "", $url);
									$vidID = str_replace("http://www.vimeo.com/", "", $vidID);
									if(stristr($vidID, "#")) {
										$explode = explode("#", $vidID, 2);
										$vidID = $explode[1];
									}
								break;
								case "dailymotion":
									$vidID = str_replace("http://dailymotion.com/", "", $url);
									$vidID = str_replace("http://www.dailymotion.com/", "", $vidID);
									if(stristr($vidID, "_")) {
										$explode = explode("_", $vidID);
										$vidID = $explode[0];
									}
									
								break;
								case "flv":
									$vidID = $url;
								break;
							}
		
				$output = str_replace("{VIDEO}", $vidID, $output);
				return $output;
			}
	}

$requri = $_SERVER['REQUEST_URI'];
$scrnam = $_SERVER['SCRIPT_NAME'];
$reqhash = NULL;

$info = explode("/", str_replace($scrnam, "", $requri));

$requri = str_replace("?", "", $info[0]);

if(!file_exists('./INSTALL_LOCK') && $requri != "install")
	header("Location: " . $_SERVER['PHP_SELF'] . "?install");

if(file_exists('./INSTALL_LOCK') && $CONFIG['pb_rewrite'])
	$requri = $_GET['i'];

$CONFIG['requri'] = $requri;

if(strstr($requri, "@"))
	{
		$tempRequri = explode('@', $requri, 2);
		$requri = $tempRequri[0];
		$reqhash = $tempRequri[1];
	}

$db = new db($CONFIG);
$bin = new bin($db);

$CONFIG['pb_pass'] = $bin->hasher($CONFIG['pb_pass'], $CONFIG['pb_salts']);
$db->config['pb_pass'] = $CONFIG['pb_pass'];
$bin->db->config['pb_pass'] = $CONFIG['pb_pass'];

if(file_exists('./INSTALL_LOCK') && @$_POST['subdomain'] && $CONFIG['pb_subdomains'])
	{
		$seed = $bin->makeSubdomain(@$_POST['subdomain']);
		if($seed)
			header("Location: " . str_replace("http://", "http://" . $seed . ".", $bin->linker()));
		else
			header("Location: " . $bin->linker());
	}

$CONFIG['subdomain'] = $bin->setSubdomain();
$db->config['subdomain'] = $CONFIG['subdomain'];
$bin->db->config['subdomain'] = $CONFIG['subdomain'];

$ckey = $bin->cookieName();

if(@$_POST['author'] && is_numeric($CONFIG['pb_author_cookie']))
	setcookie($ckey, $bin->checkAuthor(@$_POST['author']), time() + $CONFIG['pb_author_cookie']);

$CONFIG['_temp_pb_author'] = $_COOKIE[$ckey];

switch($_COOKIE[$ckey])
	{
		case NULL:
			$CONFIG['_temp_pb_author'] = $CONFIG['pb_author'];
		break;
		case $CONFIG['pb_author']:
			$CONFIG['_temp_pb_author'] = $CONFIG['pb_author'];
		break;
		default:
			$CONFIG['_temp_pb_author'] = $_COOKIE[$ckey];
		break;
	}

if($bin->highlight())
	{
		include_once($CONFIG['pb_syntax']);
		$geshi = new GeSHi('//"Paste does not exist!', 'php');
		$geshi->enable_classes();
		$geshi->set_header_type(GESHI_HEADER_PRE_VALID);
		$geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
		if($CONFIG['pb_line_highlight_style'])
			$geshi->set_highlight_lines_extra_style($CONFIG['pb_line_highlight_style']);
	}

if($requri == "defaults")
	{

		if($reqhash == "moo")
			die(phpinfo());

		if(strstr($reqhash, "callback"))
			$callback = array(str_replace("callback=", null, $reqhash) . '(', ')');

		if($CONFIG['pb_editing'])
			$defaults['editing'] = 1;
		else
			$defaults['editing'] = 0;

		if($CONFIG['pb_api'])
			$defaults['api'] = '"' . $bin->linker('api') . '"';
		else
			$defaults['api'] = 0;

		if($bin->adaptor() && $CONFIG['pb_api'])
			$defaults['api_adaptor'] = '"' . $bin->linker() . $CONFIG['pb_api_adaptor'] . '"';
		else
			$defaults['api_adaptor'] = 0;

		if($bin->_clipboard())
			$defaults['clipboard'] = '"' . $CONFIG['pb_clipboard'] . '"';
		else
			$defaults['clipboard'] = 0;

		if($CONFIG['pb_images'])
			$defaults['images'] = $CONFIG['pb_image_maxsize'];
		else
			$defaults['images'] = 0;

		if($CONFIG['pb_download_images'] && $CONFIG['pb_images']) 
			$defaults['image_download'] = 1;
		else
			$defaults['image_download'] = 0;

		if($CONFIG['pb_url'])
			$defaults['url'] = 1;
		else
			$defaults['url'] = 0;

		if($bin->jQuery())
			$defaults['ajax'] = 1;
		else
			$defaults['ajax'] = 0;

		if($bin->highlight())
			$defaults['syntax'] = 1;
		else
			$defaults['syntax'] = 0;

		if($bin->lineHighlight())
			$defaults['highlight'] = '"' . $bin->lineHighlight() . '"';
		else
			$defaults['highlight'] = 0; 

		if($CONFIG['pb_video'])
			$defaults['video'] = 1;
		else
			$defaults['video'] = 0;

		if($bin->flowplayer())
			$defaults['flv_video'] = 1;
		else
			$defaults['flv_video'] = 0;

		if($CONFIG['pb_private'])
			$defaults['privacy'] = 1;
		else
			$defaults['privacy'] = 0;

		if($CONFIG['pb_lifespan'])
			{
				$defaults['lifespan'] = "{\n";

				foreach($CONFIG['pb_lifespan'] as $span)
					{
						$key = array_keys($CONFIG['pb_lifespan'], $span);
						$key = $key[0];
						$defaults['lifespan'] .= '									"' . $key . '":		"' . $bin->event(time() - ($span * 24 * 60 * 60), TRUE) . '"' . ",\n";
					}

				$selecter = '/"0 seconds"/';
				$replacer = '"Never"';
				$defaults['lifespan'] = preg_replace($selecter, $replacer, $defaults['lifespan'], 1);

				$defaults['lifespan'] = substr($defaults['lifespan'], 0, -2) . "\n";

				$defaults['lifespan'] .= "								}";
			} else
				$defaults['lifespan'] = '{ "0": "Never" }';

		$defaults['ex_ext'] = '"' . implode(", ", $CONFIG['pb_image_extensions']) . '"';

		$defaults['ex_url'] = '"' . $bin->linker('[id]') . '"';

		$defaults['title'] = '"' . $bin->setTitle($CONFIG['pb_name']) . '"';

		$defaults['max_paste_size'] = $CONFIG['pb_max_bytes'];

		$defaults['author'] = '"' . $db->dirtyHTML($CONFIG['pb_author']) . '"';


		$JSON = $callback[0] . '
				{
					"name":			' . $defaults['title'] . ',
					"url":			"' . $bin->linker() . '",
					"author":		' . $defaults['author'] . ',
					"text": 		1,
					"max_paste_size":	' . $defaults['max_paste_size'] . ',
					"editing": 		' . $defaults['editing'] . ',
					"api":			' . $defaults['api'] . ',
					"api_adaptor":		' . $defaults['api_adaptor'] . ',
					"clipboard":		' . $defaults['clipboard'] . ',
					"images":		' . $defaults['images'] . ',
					"image_extensions":	' . $defaults['ex_ext'] . ',
					"image_download":	' . $defaults['image_download'] . ',
					"url_redirection":	' . $defaults['url']. ',
					"jQuery":		' . $defaults['ajax'] . ',
					"syntax":		' . $defaults['syntax'] . ',
					"line_highlight":	' . $defaults['highlight'] . ',
					"video":		' . $defaults['video'] . ',
					"flv_video":		' . $defaults['flv_video'] . ',
					"url_format":		' . $defaults['ex_url'] . ',
					"lifespan":		' . $defaults['lifespan'] . ',
					"privacy":		' . $defaults['privacy'] . '
				
			';

		print_r($JSON);
		die('	}' . $callback[1]);
	}

if($requri == "api")
	{
		$acceptTokens = $bin->token();

		if(!$CONFIG['pb_api'] && !in_array($_POST['ajax_token'], $acceptTokens))
			die('	{
				"id":			0,
				"url":			"' . $bin->linker() . '",
				"error":		"E0x",
				"message":		"API Disabled!"
				}');


		$bin->cleanUp($CONFIG['pb_recent_posts']);

		if(!isset($reqhash))
			{

				if(@$_POST['email'] != "")
					$result = array('error' => '"E01c"', 'message' => "Spam protection activated.");

				$pasteID = $bin->generateID();

				if(@$_POST['urlField'])
					$postedURL = $_POST['urlField'];
				elseif(preg_match('/^(ht|f)tp/', @$_POST['pasteEnter']) && count(explode("\n", $_POST['pasteEnter'])) < 2)
					$postedURL = $_POST['pasteEnter'];
				else
					$postedURL = NULL;

				$requri = @$_POST['parent'];

				$imgHost = @$_POST['imageUrl'];

				$_POST['pasteEnter'] = @$_POST['pasteEnter'];

				$exclam = NULL;

				if(!$_POST['lifespan'])
					$_POST['lifespan'] = 0;

				if($postedURL != NULL)
					{
						$_POST['pasteEnter'] = $postedURL;
						$exclam = "!";
						$postedURLInfo = pathinfo($postedURL);

						if($CONFIG['pb_url'])
							$_FILES['pasteImage'] = NULL;
					}

				$imageUpload = FALSE;
				$uploadAttempt = FALSE;

				if(strlen(@$_FILES['pasteImage']['name']) > 4 && $CONFIG['pb_images']) {
					$imageUpload = $db->uploadFile($_FILES['pasteImage'], $pasteID);
					if($imageUpload != FALSE) {
						$postedURL = NULL;
					}
					$uploadAttempt = TRUE;
				}
		
				if(in_array(strtolower($postedURLInfo['extension']), $CONFIG['pb_image_extensions']) && $CONFIG['pb_images'] && $CONFIG['pb_download_images'] && !$imageUpload) {
					$imageUpload = $db->downTheImg($postedURL, $pasteID);
					if($imageUpload != FALSE) {
						$postedURL = NULL;
						$exclam = NULL;
					}
					$uploadAttempt = TRUE;
				}

				if($imgHost)
					{
						$imgHostInfo = pathinfo($imgHost);
						$_POST['pasteEnter'] = $imgHost;

						if(in_array(strtolower($imgHostInfo['extension']), $CONFIG['pb_image_extensions']) && $CONFIG['pb_images'] && $CONFIG['pb_download_images']) {
							$imageUpload = $db->downTheImg($imgHost, $pasteID);
							if($imageUpload != FALSE) {
								$postedURL = NULL;
								$exclam = NULL;
							}
							$uploadAttempt = TRUE;
						}
					}

				if(!$imageUpload && !$uploadAttempt)
					$imageUpload = TRUE;


				if(@$_POST['pasteEnter'] == NULL && strlen(@$_FILES['pasteImage']['name']) > 4 && $CONFIG['pb_images'])
					$_POST['pasteEnter'] = "Image file (" . $_FILES['pasteImage']['name'] . ") uploaded...";

				$videoSRC = $bin->generateVideoEmbedCode($postedURL);

				if($videoSRC || !$CONFIG['pb_url'])
					$exclam = NULL;

				if(!$CONFIG['pb_url'])
					$postedURL = NULL;

				if($bin->highlight() && $_POST['highlighter'] != "plaintext" && $_POST['highlighter'] != NULL)
					{
						$geshi->set_language($_POST['highlighter']);
						$geshi->set_source($bin->noHighlight(@$_POST['pasteEnter']));
						$geshi->highlight_lines_extra($bin->highlightNumbers(@$_POST['pasteEnter']));
						$geshiCode = $geshi->parse_code();
						$geshiStyle = $geshi->get_stylesheet();
					} else
						{
							$geshiCode = NULL;
							$geshiStyle = NULL;
						}
		
				$paste = array(
					'ID' => $pasteID,
					'Subdomain' => $bin->db->config['subdomain'],
					'Author' => $bin->checkAuthor(@$_POST['author']),
					'IP' => $_SERVER['REMOTE_ADDR'],
					'Image' => $imageUpload,
					'ImageTxt' => "Image file (" . @$_FILES['pasteImage']['name'] . ") uploaded...",
					'URL' => $postedURL,
					'Video' => $videoSRC,
					'Lifespan' => $_POST['lifespan'],
					'Protect' => $_POST['privacy'],
					'Syntax' => $_POST['highlighter'],
					'Parent' => $requri,
					'Content' => @$_POST['pasteEnter'],
					'GeSHI' => $geshiCode,
					'Style' => $geshiStyle
				);

				if(@$_POST['pasteEnter'] == @$_POST['originalPaste'] && strlen($_POST['pasteEnter']) > 10)
					{
						$result = array('ID' => 0, 'error' => '"E01c"', 'message' => "Please don't just repost what has already been said!");
						$JSON = '
								{
									"id":			' . $result['ID'] . ',
									"url":			"' . $bin->linker($paste['ID']) . $exclam . '",
									"error":		' . $result['error'] . ',
									"message":		"' . $result['message'] . '"
				
							';

						print_r($JSON);
						die('	}');
					}

				if(strlen(@$_POST['pasteEnter']) > 10 && $imageUpload && mb_strlen($paste['Content']) <= $CONFIG['pb_max_bytes'] && $db->insertPaste($paste['ID'], $paste))
					{ 
						$result = array('ID' => '"' . $paste['ID'] . '"', 'error' => '0', 'message' => "Success!");
					} else
						{
							if(strlen(@$_FILES['pasteImage']['name']) > 4 && $_SERVER['CONTENT_LENGTH'] > $CONFIG['pb_image_maxsize'] && $CONFIG['pb_images'])
								$result = array('ID' => 0, 'error' => '"E02b"', 'message' => "File is too big.");
							elseif(strlen(@$_FILES['pasteImage']['name']) > 4 && $CONFIG['pb_images'])
								$result = array('ID' => 0, 'error' => '"E02a"', 'message' => "Invalid file format.");
							elseif(strlen(@$_FILES['pasteImage']['name']) > 4 && !$CONFIG['pb_images'])
								$result = array('ID' => 0, 'error' => '"E02d"', 'message' => "Image hosting disabled.");
							else
								$result = array('ID' => 0, 'error' => '"E01a"', 'message' => "Invalid POST request or 'pasteEnter' is Too Big / Empty.");
						}


				$JSON = '
							{
								"id":			' . $result['ID'] . ',
								"url":			"' . $bin->linker($paste['ID']) . $exclam . '",
								"error":		' . $result['error'] . ',
								"message":		"' . $result['message'] . '"
				
							';

				print_r($JSON);
				die('	}');

			} else {

				if($reqhash == "recent")
					{
						$recentPosts = $bin->getLastPosts($CONFIG['pb_recent_posts']);
						$JSON = '{ "recent": [';

						if(count($recentPosts) > 0)
							{
								foreach($recentPosts as $paste)
									$JSON .= '{ "id": "' . $paste['ID'] . '", "author": "' . $paste['Author'] . '", "datetime": ' . $paste['Datetime'] . ' }';

							}

						print_r($JSON);
						die('] }');
					}

				if($pasted = $db->readPaste($reqhash))
					{

						if($db->dbt == "mysql")
							$pasted = $pasted[0];

						if(strlen($pasted['Image']) > 3)
							$pasted['Image_path'] = $bin->linker() . $CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images'] . "/" . $pasted['Image'];

						$JSON = '
								{
									"id":			"' . $pasted['ID'] . '",
									"url":			"' . $bin->linker($pasted['ID']) . '",
									"author":		"' . $pasted['Author'] . '",
									"datetime": 		' . $pasted['Datetime'] . ',
									"protection":		' . $pasted['Protection'] . ',
									"syntax": 		"' . $pasted['Syntax'] . '",
									"parent":		"' . $pasted['Parent'] . '",
									"image":		"' . $pasted['Image_path'] . '",
									"image_text":		"' . $pasted['ImageTxt'] . '",
									"link":			"' . $pasted['URL'] . '",
									"video":		"' . $pasted['Video'] . '",
									"lifespan":		' . $pasted['Lifespan']. ',
									"data":			"' . urlencode($db->dirtyHTML($pasted['Data'])) . '",
									"geshi":		"' . urlencode($pasted['GeSHI']) . '",
									"style":		"' . urlencode($pasted['Style']) . '"
				
							';

						print_r($JSON);
						die('	}');
					} else
						{
							$JSON = '
								{
									"id":			0,
									"url":			"' . $bin->linker($reqhash) . '",
									"author":		0,
									"datetime": 		0,
									"protection":		0,
									"syntax": 		0,
									"parent":		0,
									"image":		0,
									"image_text":		0,
									"link":			0,
									"video":		0,
									"lifespan":		0,
									"data":			"This paste has either expired or doesn\'t exist!",
									"data_html":		"' . $db->dirtyHTML("<!-- This paste has either expired or doesn't exist!  -->") . '",
									"geshi":		0,
									"style":		0
				
							';

							print_r($JSON);
							die('	}');
						}


			}


	}

if($requri != "install" && $requri != NULL && $bin->checkIfRedir($requri) != false && substr($requri, -1) != "!" && !$_POST['adminProceed'])
	header("Location: " . $bin->checkIfRedir($requri));

if($requri != "install" && $requri != NULL && substr($requri, -1) != "!" && !$_POST['adminProceed'] && $reqhash == "raw")
	{
		if($pasted = $db->readPaste($requri))
			{
				if($db->dbt == "mysql")
					$pasted = $pasted[0];

				header("Content-Type: text/plain");
				die($db->rawHTML($bin->noHighlight($pasted['Data'])));
			}
		else
			die('There was an error!');
	}

$pasteinfo = array();
if($requri != "install")
	$bin->cleanUp($CONFIG['pb_recent_posts']);

?>
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo $bin->setTitle($CONFIG['pb_name']); ?> &raquo; <?php echo $bin->titleID($requri); ?></title>
		<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
		<link rel="icon" type="image/png" href="favicon.png" />
		<meta name="generator" content="Knoxious Pastebin">
		<meta name="Description" content="A quick, simple, multi-purpose pastebin." />	
		<meta name="Keywords" content="simple quick pastebin image hosting video linking embedding url shortening syntax highlighting" />
		<meta name="Robots" content="<?php echo $bin->robotPrivacy($requri); ?>" /> 
		<meta name="Author" content="Xan Manning, Knoxious.co.uk" />


		<?php
			if($bin->styleSheet())
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $CONFIG['pb_style'] . "\" media=\"screen, print\" />";
			else {
		?>
		<style type="text/css">
			@media only screen {
				body { background: #fff; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
				h2 { font-size: 15px; }
				a { color: #336699; }
				img { border: none; }
				pre { display: inline; font-family: inherit; } 
				.success { background-color: #AAFFAA; border: 1px solid #00CC00; font-weight: bolder; text-align: center; padding: 2px; color: #000000; margin-top: 3px; margin-bottom: 3px; }
				.warn { background-color: #FFFFAA; border: 1px solid #CCCC00; font-weight: bolder; text-align: center; padding: 2px; color: #000000; margin-top: 3px; margin-bottom: 3px; }
				.error { background-color: #FFAAAA; border: 1px solid #CC0000; font-weight: bolder; text-align: center; padding: 2px; color: #000000; margin-top: 3px; margin-bottom: 3px; }
				.confirmURL { border-bottom: 1px solid #CCCCCC;  text-align: center; font-size: medium; }
				.alternate { background-color: #F3F3F3; }
				.copyText { color: #336699; text-decoration: underline; cursor: pointer; cursor: hand; }
				._clipboardBar { text-align: right; }
				.plainText { font-family: Arial, Helvetica, sans-serif; border: none; list-style-type: none; margin-bottom: 25px; }
				.monoText { font-family:"Courier New",Courier,mono; list-style-type: decimal; }
				.pastedImage { max-width: 500px; height : auto; }
				.pastedImage { width: auto; max-height : 500px; }
				.infoMessage { padding: 25px; font-size: medium; max-width: 800px; }
				.lineHighlight { background-color: #FFFFAA; font-weight: bolder; color: #000000; }
				.resizehandle {	background: #F0F0F0 scroll 45%; cursor: s-resize; text-align: center; color: #AAAAAA; height: 16px; width: 100%; } 
				#newPaste { text-align: center; border-bottom: 1px dotted #CCCCCC; padding-bottom: 10px; }
				#lineNumbers { width: 100%; max-height: 500px; background-color: #FFFFFF; overflow: auto; padding: 0; margin: 0; }
				div#siteWrapper { width: 100%; margin: 0 auto; }
				div#siteWrapper > #showAdminFunctions { max-width: 800px; margin: 25px; }
				div#siteWrapper > #hiddenAdmin { max-width: 800px; margin: 25px; }
				div#recentPosts { width: 15%; font-size: xx-small; float: left; position: relative; margin-left: 1%; }
				div#pastebin { width: 82%; float: left; position: relative; padding-left: 1%; border-left: 1px dotted #CCCCCC; }
				#pasteEnter { width: 100%; height: 250px; border: 1px solid #CCCCCC; background-color: #FFFFFF; }
				#authorEnter { background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; width: 68%;  }
				#subdomain { background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; }
				#subdomain_form { margin-top: 5px; }
				#adminPass { background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; width: 100%;  }
				#copyrightInfo { color: #999999; font-size: xx-small; position: fixed; bottom: 0px; right: 10px; padding-bottom: 10px; text-align: left; }
				ul#postList { padding: 0; margin-left: 0; list-style-type: none; margin-bottom: 50px; }
				#adminAction { width: 100%; }
				#urlField { background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; height: 20px; width: 100%; }
				#emphasizedURL	{ font-size: x-large; width: 100%; overflow: auto; font-style: italic; padding: 5px; }
				#showAdminFunctions { font-size: xx-small; font-weight: bold; text-align: center; }
				#hiddenAdmin { display: none; padding-right: 10px; }
				#instructions { display: none; }
				#serviceList li { margin-top: 7px; margin-bottom: 7px; list-style: square; }
				#authorContainer { width: 48%; float: left; margin-bottom: 10px;  }
				#authorContainerReply { padding-right: 52%; margin-bottom: 10px;  }
				#submitContainer { width: 100%; display: block; }
				#highlightContainer { margin-bottom: 5px; }
				#lifespanContainer { margin-bottom: 5px; }
				#privacyContainer { margin-bottom: 5px; }
				#highlightContainer > select { width: 33%; background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; }
				#lifespanContainer > select { width: 33%; background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; }
				#privacyContainer > select { width: 33%; background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; }
				#pasteImage { background-color: #FFFFFF; border-top: 1px solid #CCCCCC; border-bottom: 1px solid #CCCCCC; border-left: none; border-right: none; padding: 2px; }
				#highlightContainer > label { width: 200px; display: block; }
				#lifespanContainer > label { width: 200px; display: block; }
				#privacyContainer > label { width: 200px; display: block; }
				#fileUploadContainer { width: 48%; float: left; margin-bottom: 10px; }
				#imageContainer { text-align: center; padding: 10px; }
				#styleBar { text-align: left; position: relative; float: left; width: 48%; }
				#retrievedPaste { width: 100%; position: relative; padding: 0; margin: 0; margin-top: 10px; margin-bottom: 10px; border: 1px solid #CCCCCC; }
				#_clipboard_replace { visibility: hidden; }
				#_clipboardURI_replace { visibility: hidden; }
				#_copyText { visibility: hidden; }
				#_copyURL { visibility: hidden; }
				#video { text-align: center; }
			}

			@media print {
				body { background: #fff; font-family: Arial, Helvetica, sans-serif; font-size: 10pt; }
				pre { white-space: pre-wrap; display: inline; }
				li { padding: 0px; margin: 0px; }
				a { color: #336699; }
				img { width: auto; max-width: 100%; }
				#siteWrapper { width: auto; }
				#recentPosts { display: none; }
				#copyrightInfo { position: relative; top: 0px; right: 0px; width: auto; padding: 1%; text-align: right; }
				#retrievedPaste { border: none; }
				#lineNumbers { max-height: none; width: auto; }
				#pasteBin { width: auto; border: none; }
				#formContainer { display: none; }
				#styleBar { display: none; } 
				#_clipboard_replace { display: none; }
				#_clipboardURI_replace { display: none; }
				#_clipboard { display: none; }
				#_clipboardURI {  display: none; }
				#_copyText { display: none; }
				#_copyURL { display: none; }
				._clipboardBar { display: none; width: auto; }
				.copyText { display: none; }
				.spacer { display: none; }
				.alternate { background-color: #F3F3F3; }
				.lineHighlight { background-color: #FFFFAA; font-weight: bolder; color: #000000; }
			}
		</style>
		<?php
			}

		/* begin JS */
			if($bin->jQuery())
				{ echo "<script type=\"text/javascript\" src=\"" . $CONFIG['pb_jQuery'] . "\"></script>";

		?>
			<script type="text/javascript">
				var pasteEnterH;

				$.fn.resizehandle = function() {
 					return this.each(function() {
    						var me = $(this);
    							me.after(
      							$('<div class="resizehandle"><?php if(!$bin->stylesheet()) echo "==="; ?></div>').bind('mousedown', function(e) {
        							var h = me.height();
        							var y = e.clientY;
        							var moveHandler = function(e) {
          								me.height(Math.max(20, e.clientY + h - y));
       							 	};
        							var upHandler = function(e) {
          								$('html')
          								.unbind('mousemove',moveHandler)
          								.unbind('mouseup',upHandler);
        							};
        							$('html')
        							.bind('mousemove', moveHandler)
        							.bind('mouseup', upHandler);
      								})
    							);
  						});
				}
				$(document).ready(function(){
  					$('#lineNumbers li:nth-child(even)').addClass('alternate');
					$('a[href][rel*=external]').each(function(i){this.target = "_blank";});
					<?php if(!$bin->styleSheet()){ ?>
					$("#foundURL").show().attr('class', 'success').css( { opacity: 0 } );
					<?php } else { ?>
					$("#foundURL").show().css( { opacity: 0 } );
					<?php } ?>

					pasteEnterH = $('#pasteEnter').height();
					if(!$.browser.webkit)
						$("textarea").resizehandle();

				});
				
				<?php if($CONFIG['pb_url']) { ?>
				function checkIfURL(checkMe){
					var checking = checkMe.value;
					var regExpression = new RegExp();
					regExpression.compile('^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/\!.=]+$');
					if(regExpression.test(checking)){
						$("#pasteEnter").animate({ height: "20px"  }, 500, function() { $("#pasteEnter").attr("id", "urlField"); $("#pasteEnter").attr("name", "urlField"); $("#foundURL").animate({ opacity: 1 }, 250); $("#fileUploadContainer").animate({ opacity: 0 }, 250); $("#highlightContainer").animate({ opacity: 0 }, 250); });
						return false;
					}
					else {
						if(checkMe.id != "pasteEnter")
							$("#urlField").animate({ height: pasteEnterH + "px"  }, 500, function() { $("#urlField").attr("id", "pasteEnter"); $("#urlField").attr("name", "pasteEnter"); $("#foundURL").animate({ opacity: 0 }, 250); $("#fileUploadContainer").animate({ opacity: 1 }, 250); $("#highlightContainer").animate({ opacity: 1 }, 250); });
						return false;
					}
				}
				<?php } else { ?>
				function checkIfURL(checkMe){
					return false;
				}
				<?php } ?>


				function showAdminTools(hideMe){
					$('#showAdminFunctions').hide(500);
					$('#hiddenAdmin').show(500);
					return false;
				}

				function showInstructions(){
					$('#showInstructions').hide(500);
					$('#instructions').show(500);
					return false;
				}

				function toggleWrap(){
					if($('pre').css('white-space') == "pre")
						$('pre').css({ whiteSpace: "pre-wrap"});
					else 
						$('pre').removeAttr('style').css({ whiteSpace: "pre" });

					return false;
				}

				function toggleExpand(){
					if($('#lineNumbers').css('maxHeight') != "none")
						$('#lineNumbers').css({ maxHeight: "none", width: "auto" });
					else
						$('#lineNumbers').removeAttr('style');

					return false;
				}

				function toggleStyle(){
					if($('#orderedList').attr('class') == "monoText" || $('#orderedList').attr('class') == "") {
						$('#orderedList').attr('class', 'plainText');
						$('.alternate').attr('class', 'line');
					}
					else {
						$('#orderedList').attr('class', 'monoText');
						$('#orderedList li:nth-child(even)').addClass('alternate');
					}
					return false;
				}

				/* AJAXIAN */

				var tab = "	";
       
				function catchTab(evt) {
				    var t = evt.target;
				    var ss = t.selectionStart;
				    var se = t.selectionEnd;
				 
				    if (evt.keyCode == 9) {
					evt.preventDefault();
					       
					if (ss != se && t.value.slice(ss,se).indexOf("\n") != -1) {
					    var pre = t.value.slice(0,ss);
					    var sel = t.value.slice(ss,se).replace(/\n/g,"\n"+tab);
					    var post = t.value.slice(se,t.value.length);
					    t.value = pre.concat(tab).concat(sel).concat(post);
						   
					    t.selectionStart = ss + tab.length;
					    t.selectionEnd = se + tab.length;
					}
					       
					else {
					    t.value = t.value.slice(0,ss).concat(tab).concat(t.value.slice(ss,t.value.length));
					    if (ss == se) {
						t.selectionStart = t.selectionEnd = ss + tab.length;
					    }
					    else {
						t.selectionStart = ss + tab.length;
						t.selectionEnd = se + tab.length;
					    }
					}
				    }
					   
				   else if (evt.keyCode==8 && t.value.slice(ss - 4,ss) == tab) {
					evt.preventDefault();
					       
					t.value = t.value.slice(0,ss - 4).concat(t.value.slice(ss,t.value.length));
					t.selectionStart = t.selectionEnd = ss - tab.length;
				    }
					   
				    else if (evt.keyCode==46 && t.value.slice(se,se + 4) == tab) {
					evt.preventDefault();
					     
					t.value = t.value.slice(0,ss).concat(t.value.slice(ss + 4,t.value.length));
					t.selectionStart = t.selectionEnd = ss;
				    }

				    else if (evt.keyCode == 37 && t.value.slice(ss - 4,ss) == tab) {
					evt.preventDefault();
					t.selectionStart = t.selectionEnd = ss - 4;
				    }
				    else if (evt.keyCode == 39 && t.value.slice(ss,ss + 4) == tab) {
					evt.preventDefault();
					t.selectionStart = t.selectionEnd = ss + 4;
				    }
				}

				function submitPaste(targetButton){
					var buttonElement = $(targetButton);
					var parentForm = $('#pasteForm');
					<?php if($requri) { ?>
					var originalPaste = $('#originalPaste').attr('value');
					var parentThread = $('#parentThread').attr('value');
					<?php } else { ?>
					var originalPaste = "";
					var parentThread = "";
					<?php } 
					if(!$CONFIG['pb_images'] || $requri){
						?>
						var pasteImage = "";
						<?php }
					else {
						?>
						var pasteImage = $('#pasteImage').attr('value');
						<?php 
					}
					?>

					var dataString = $('#pasteForm').serialize();

					if(pasteImage == ""){
						buttonElement.attr('value', 'Posting...').attr('disabled', 'disabled');
						$.ajax({  
      							type: "POST",  
      							url: "<?php echo $bin->linker('api'); ?>",  
      							data: dataString,
							dataType: "json", 
      							success: function(msg) {
								$('#result').attr('class', 'result');
								if(msg.error != 0)
									{
										buttonElement.removeAttr('disabled');
										buttonElement.attr('value', 'Submit your Paste');
										$('#result').prepend('<div class="error" id="' + msg.error + '">' + msg.message + '</div>');
									} else
										{
								buttonElement.attr('value', 'Submit your Paste');
        							$('#result').prepend('<div class="success">Your paste has been successfully recorded!</div><div class="confirmURL">URL to your paste is <a href="' + msg.url + '">' + msg.url + '</a></div>');
										}

								window.scrollTo(0,0); 
     							 },
							error: function(msg) {
								buttonElement.removeAttr('disabled');
								buttonElement.attr('value', 'Submit your Paste');
								$('#result').prepend('<div class="error">Something went wrong</div><div class="confirmURL">' + msg + '</div>');
								window.scrollTo(0,0);
							} 
    						});
					return false;
					} else
						{
							buttonElement.css({ display: "none" });
							buttonElement.parent().append('<input type="button" name="blank" id="dummyButton" value="Posting..." disabled="disabled" />');
							/* http://www.bennadel.com/blog/1244-ColdFusion-jQuery-And-AJAX-File-Upload-Demo.htm */
							var strName = ("image" + (new Date()).getTime());
							var iFrame = $("<iframe name=\"" + strName + "\" src=\"about:blank\" />");
							iFrame.css("display", "none");
							$("body").append(iFrame);
							parentForm.attr("action", "<?php echo $bin->linker('api'); ?>")
							.attr("method", "post")
							.attr("enctype", "multipart/form-data")
							.attr("encoding", "multipart/form-data")
							.attr("target", strName);
							iFrame.load(
								function(objEvent){
									$('#result').attr('class', 'result');
									var objUploadBody = window.frames[ strName ].document.getElementsByTagName( "body" )[ 0 ];
									var iBody = $( objUploadBody );
									var objData = eval( "(" + iBody.html() + ")" );
									if(objData.error != 0)
										{
											buttonElement.css({ display: "block" });
											$('#dummyButton').remove();
											$('#result').prepend('<div class="error" id="' + objData.error + '">' + objData.message + '</div><div class="spacer">&nbsp;</div>');
										} else
											{
												buttonElement.attr('value', 'Submit your Paste');
        											$('#result').prepend('<div class="success">Your paste has been successfully recorded!</div><div class="confirmURL">URL to your paste is <a href="' + objData.url + '">' + objData.url + '</a></div>');
											}
									setTimeout(function(){ iFrame.remove(); }, 100);
									window.scrollTo(0,0);
							});
						}
				}

			</script>
		<?php }

			if($bin->_clipboard())
				{
					?>
<script type="text/javascript" src="<?php echo $db->config['cbdir'] . "/swfobject.js"; ?>"></script>
<script type="text/javascript">
function findPosX(obj) {
	var curleft = 0;
	if(obj.offsetParent)
		while(1) {
          		curleft += obj.offsetLeft;
			if(!obj.offsetParent)
            			break;
          		obj = obj.offsetParent;
        	}
    	else if(obj.x)
        	curleft += obj.x;
    	return curleft;
}

function findPosY(obj) {
	var curtop = 0;
    	if(obj.offsetParent)
        	while(1) {
          		curtop += obj.offsetTop;
          		if(!obj.offsetParent)
            			break;
          		obj = obj.offsetParent;
        	}
    	else if(obj.y)
        	curtop += obj.y;
    	return curtop;
}

function findWidth(obj) {
	var w = obj.width;
	if(!w)
		w = obj.offsetWidth;
	return w;
}
function findHeight(obj) {
	var h = obj.height;
	if(!h)
		h = obj.offsetHeight;
	return h;
}
function formSend(id, target) {   
	var originalText = eval(target).value;
	document.getElementById(id).textToCopy(originalText);    
}

function setCopyVars(){
	document.pasteForm.originalPaste.value = document.pasteForm.pasteEnter.value;
}

function flashReady(id, target) {
		setCopyVars();
		formSend(id, target);
	<?php
		if(!@$_POST['submit']) { ?>
		document.getElementById("_copyText").style.visibility = "visible";
		setTimeout("document.getElementById('_copyText').style.display = 'inline'", 500);
	<?php	} ?>
		document.getElementById("_copyURL").style.visibility = "visible";
		setTimeout("document.getElementById('_copyURL').style.display = 'inline'", 500);
}

function sizeFlash() {

	var divWidth = findWidth(document.getElementById("_copyText"));
	var divHeight = findHeight(document.getElementById("_copyText"));
	var divWidthURL = findWidth(document.getElementById("_copyURL"));
	var divHeightURL = findHeight(document.getElementById("_copyURL"));

	var flashvars = {
	  id: "_clipboard",
	  theTarget: "document.pasteForm.originalPaste",
	  width: divWidth,
	  height: divHeight
	};
	var params = {
	  menu: "false",
	  wmode: "transparent",
	  allowScriptAccess: "always"
	};
	var attributes = {
	  id: "_clipboard",
	  name: "_clipboard"
	};

	var flashvarsURI = {
	  id: "_clipboardURI",
	  theTarget: "document.pasteForm.thisURI",
	  width: divWidthURL,
	  height: divHeightURL
	};
	var paramsURI = {
	  menu: "false",
	  wmode: "transparent",
	  allowScriptAccess: "always"
	};
	var attributesURI = {
	  id: "_clipboardURI",
	  name: "_clipboardURI"
	};

	swfobject.embedSWF("_clipboard.swf", "_clipboard_replace", divWidth, divHeightURL, "10.0.0", "expressInstall.swf", flashvars, params, attributes);
	swfobject.embedSWF("_clipboard.swf", "_clipboardURI_replace", divWidthURL, divHeightURL, "10.0.0", "expressInstall.swf", flashvarsURI, paramsURI, attributesURI);

	repositionFlash("_clipboard", "_copyText");
	repositionFlash("_clipboardURI", "_copyURL");
}

<?php if(!$bin->jQuery()){ ?>
<?php if($CONFIG['pb_url']) { ?>
function checkIfURL(checkMe){
	var checking = checkMe.value;
	var regExpression = new RegExp();
	regExpression.compile('^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/\!.=]+$');
	if(regExpression.test(checking)){
		checkMe.setAttribute("id", "urlField");
		document.getElementById('foundURL').style.display = "block";
		document.getElementById('fileUploadContainer').style.visibility = "hidden";
		document.getElementById('highlightContainer').style.visibility = "hidden";
		return false;
	}
	else {
		if(checkMe.id != "pasteEnter")
			checkMe.setAttribute("id", "pasteEnter");

		document.getElementById('foundURL').style.display = "none";
		document.getElementById('fileUploadContainer').style.visibility = "visible";
		document.getElementById('highlightContainer').style.visibility = "visible";
		return false;
	}
}
<?php } else {?>
function checkIfURL(checkMe){
	return false;
}
<?php } ?>

/* AJAXIAN */
var tab = "	";
       
function catchTab(evt) {
    var t = evt.target;
    var ss = t.selectionStart;
    var se = t.selectionEnd;
 
    if (evt.keyCode == 9) {
        evt.preventDefault();
               
        if (ss != se && t.value.slice(ss,se).indexOf("\n") != -1) {
            var pre = t.value.slice(0,ss);
            var sel = t.value.slice(ss,se).replace(/\n/g,"\n"+tab);
            var post = t.value.slice(se,t.value.length);
            t.value = pre.concat(tab).concat(sel).concat(post);
                   
            t.selectionStart = ss + tab.length;
            t.selectionEnd = se + tab.length;
        }
               
        else {
            t.value = t.value.slice(0,ss).concat(tab).concat(t.value.slice(ss,t.value.length));
            if (ss == se) {
                t.selectionStart = t.selectionEnd = ss + tab.length;
            }
            else {
                t.selectionStart = ss + tab.length;
                t.selectionEnd = se + tab.length;
            }
        }
    }
           
   else if (evt.keyCode==8 && t.value.slice(ss - 4,ss) == tab) {
        evt.preventDefault();
               
        t.value = t.value.slice(0,ss - 4).concat(t.value.slice(ss,t.value.length));
        t.selectionStart = t.selectionEnd = ss - tab.length;
    }
           
    else if (evt.keyCode==46 && t.value.slice(se,se + 4) == tab) {
        evt.preventDefault();
             
        t.value = t.value.slice(0,ss).concat(t.value.slice(ss + 4,t.value.length));
        t.selectionStart = t.selectionEnd = ss;
    }

    else if (evt.keyCode == 37 && t.value.slice(ss - 4,ss) == tab) {
        evt.preventDefault();
        t.selectionStart = t.selectionEnd = ss - 4;
    }
    else if (evt.keyCode == 39 && t.value.slice(ss,ss + 4) == tab) {
        evt.preventDefault();
        t.selectionStart = t.selectionEnd = ss + 4;
    }
}

function toggleWrap() {
	var n = 0;
	var pres = document.getElementsByTagName('pre');

	for(n in pres)
		{
			if(pres[n].style != null && (pres[n].style.whiteSpace == "pre" || pres[n].style.whiteSpace == "")) {
					pres[n].style.whiteSpace = "pre-wrap";
			}
			else if(pres[n].style != null) {
				pres[n].style.whiteSpace = "pre";
			}
		}

	return false;
}

function toggleExpand() {
	if(document.getElementById('lineNumbers').style.maxHeight != "none") {
			document.getElementById('lineNumbers').style.maxHeight = "none";
			document.getElementById('lineNumbers').style.width = "auto";
	}
	else {
		document.getElementById('lineNumbers').setAttribute('style', '');
	}
	return false;
}

function toggleStyle(){
	if(document.getElementById('orderedList').getAttribute('class') == "monoText" || document.getElementById('orderedList').getAttribute('class') == "")
		document.getElementById('orderedList').setAttribute("class", "plainText");
	else
		document.getElementById('orderedList').setAttribute("class", "monoText");
	return false;
}

function showAdminTools(hideMe){
	document.getElementById('showAdminFunctions').style.display = "none";
	document.getElementById('hiddenAdmin').style.display = "block";
	return false;
}
function showInstructions(){
	document.getElementById('showInstructions').style.display = "none";
	document.getElementById('instructions').style.display = "block";
	return false;
}

function submitPaste(targetButton) {
	var disabledButton = document.createElement('input');
	var parentContainer = document.getElementById('submitContainer');
	disabledButton.setAttribute('value', 'Posting...');
	disabledButton.setAttribute('type', 'button');
	disabledButton.setAttribute('disabled', 'disabled');
	disabledButton.setAttribute('id', 'dummyButton');
	targetButton.style.display = "none";
	parentContainer.appendChild(disabledButton);
	return true;
}


<?php } ?>

function repositionFlash(id, zeTarget) {
	var restyle = document.getElementById(id).style;
	restyle.position = 'absolute';
	restyle.zIndex = 99;
	restyle.left = findPosX(document.getElementById(zeTarget)) + "px";
	restyle.top = findPosY(document.getElementById(zeTarget)) + "px";
	restyle.cursor = "pointer";
	restyle.cursor = "hand";
}
function confirmCopy(id){
	alert("Data has been copied to your clipboard!");
}
</script>
<?php

				} else
					{ if(!$bin->jQuery()) { ?>
<script type="text/javascript">
<?php if($CONFIG['pb_url']) { ?>
function checkIfURL(checkMe){
	var checking = checkMe.value;
	var regExpression = new RegExp();
	regExpression.compile('^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/\!.=]+$');
	if(regExpression.test(checking)){
		checkMe.setAttribute("id", "urlField");
		document.getElementById('foundURL').style.display = "block";
		document.getElementById('fileUploadContainer').style.visibility = "hidden";
		return true;
	}
	else {
		if(checkMe.id != "pasteEnter")
			checkMe.setAttribute("id", "pasteEnter");

		document.getElementById('foundURL').style.display = "none";
		document.getElementById('fileUploadContainer').style.visibility = "visible";
		return false;
	}
}
<?php } else { ?>
function checkIfURL(checkMe){
	return true;
}
<?php } ?>

/* AJAXIAN */
var tab = "    ";
       
function catchTab(evt) {
    var t = evt.target;
    var ss = t.selectionStart;
    var se = t.selectionEnd;
 
    if (evt.keyCode == 9) {
        evt.preventDefault();
               
        if (ss != se && t.value.slice(ss,se).indexOf("\n") != -1) {
            var pre = t.value.slice(0,ss);
            var sel = t.value.slice(ss,se).replace(/\n/g,"\n"+tab);
            var post = t.value.slice(se,t.value.length);
            t.value = pre.concat(tab).concat(sel).concat(post);
                   
            t.selectionStart = ss + tab.length;
            t.selectionEnd = se + tab.length;
        }
               
        else {
            t.value = t.value.slice(0,ss).concat(tab).concat(t.value.slice(ss,t.value.length));
            if (ss == se) {
                t.selectionStart = t.selectionEnd = ss + tab.length;
            }
            else {
                t.selectionStart = ss + tab.length;
                t.selectionEnd = se + tab.length;
            }
        }
    }
           
   else if (evt.keyCode==8 && t.value.slice(ss - 4,ss) == tab) {
        evt.preventDefault();
               
        t.value = t.value.slice(0,ss - 4).concat(t.value.slice(ss,t.value.length));
        t.selectionStart = t.selectionEnd = ss - tab.length;
    }
           
    else if (evt.keyCode==46 && t.value.slice(se,se + 4) == tab) {
        evt.preventDefault();
             
        t.value = t.value.slice(0,ss).concat(t.value.slice(ss + 4,t.value.length));
        t.selectionStart = t.selectionEnd = ss;
    }

    else if (evt.keyCode == 37 && t.value.slice(ss - 4,ss) == tab) {
        evt.preventDefault();
        t.selectionStart = t.selectionEnd = ss - 4;
    }
    else if (evt.keyCode == 39 && t.value.slice(ss,ss + 4) == tab) {
        evt.preventDefault();
        t.selectionStart = t.selectionEnd = ss + 4;
    }
}

function showAdminTools(hideMe){
	document.getElementById('showAdminFunctions').style.display = "none";
	document.getElementById('hiddenAdmin').style.display = "block";
	return false;
}
function showInstructions(){
	document.getElementById('showInstructions').style.display = "none";
	document.getElementById('instructions').style.display = "block";
	return false;
}

function toggleWrap() {
	var n = 0;
	var pres = document.getElementsByTagName('pre');

	for(n in pres)
		{
			if(pres[n].style != null && (pres[n].style.whiteSpace == "pre" || pres[n].style.whiteSpace == "")) {
					pres[n].style.whiteSpace = "pre-wrap";
			}
			else if(pres[n].style != null) {
				pres[n].style.whiteSpace = "pre";
			}
		}

	return false;
}

function toggleExpand() {
	if(document.getElementById('lineNumbers').style.maxHeight != "none") {
			document.getElementById('lineNumbers').style.maxHeight = "none";
			document.getElementById('lineNumbers').style.width = "auto";
	}
	else {
		document.getElementById('lineNumbers').setAttribute('style', '');
	}
	return false;
}

function toggleStyle(){
	if(document.getElementById('orderedList').getAttribute('class') == "monoText" || document.getElementById('orderedList').getAttribute('class') == "")
		document.getElementById('orderedList').setAttribute("class", "plainText");
	else
		document.getElementById('orderedList').setAttribute("class", "monoText");
	return false;
}

function submitPaste(targetButton) {
	var disabledButton = document.createElement('input');
	var parentContainer = document.getElementById('submitContainer');
	disabledButton.setAttribute('value', 'Posting...');
	disabledButton.setAttribute('type', 'button');
	disabledButton.setAttribute('disabled', 'disabled');
	disabledButton.setAttribute('id', 'dummyButton');
	targetButton.style.display = "none";
	parentContainer.appendChild(disabledButton);
	return true;
}

</script>
<?php
/* end JS */
						}
					}

?>
	</head>
	<body<?php if($bin->_clipboard() && ($requri || @$_POST['submit']) && $requri != "install" && substr($requri, -1) != "!") { echo " onload=\"sizeFlash();\""; } ?>><div id="siteWrapper">
<?php

if($requri != "install" && !$db->connect())
	echo "<div class=\"error\">No database connection could be established - check your config.</div>";
elseif($requri != "install" && $db->connect())
	$db->disconnect();
else
	echo "<!-- No Check is required... -->";

if(@$_POST['adminAction'] == "delete" && $bin->hasher(@$_POST['adminPass'], $CONFIG['pb_salts']) === $CONFIG['pb_pass'])
	{ $db->dropPaste($requri); echo "<div class=\"success\">Paste, " . $requri . ", has been deleted!</div>"; $requri = NULL; }

if($requri != "install" && @$_POST['submit'])
	{
		$acceptTokens = $bin->token();

		if(@$_POST['email'] != "" || !in_array($_POST['ajax_token'], $acceptTokens))
			die("<div class=\"result\"><div class=\"error\">Spambot detected, I don't like that!</div></div></div></body></html>");

		$pasteID = $bin->generateID();

		if(@$_POST['urlField'])
			$postedURL = $_POST['urlField'];
		elseif(preg_match('/^(ht|f)tp/', @$_POST['pasteEnter']) && count(explode("\n", $_POST['pasteEnter'])) < 2)
			$postedURL = $_POST['pasteEnter'];
		else
			$postedURL = NULL;

		$exclam = NULL;

		if($postedURL != NULL)
			{
				$_POST['pasteEnter'] = $postedURL;
				$exclam = "!";
				$postedURLInfo = pathinfo($postedURL);

				if($CONFIG['pb_url'])
					$_FILES['pasteImage'] = NULL;
			}

		$imageUpload = FALSE;
		$uploadAttempt = FALSE;

		if(strlen(@$_FILES['pasteImage']['name']) > 4 && $CONFIG['pb_images']) {
			$imageUpload = $db->uploadFile($_FILES['pasteImage'], $pasteID);
			if($imageUpload != FALSE) {
				$postedURL = NULL;
			}
			$uploadAttempt = TRUE;
		}
		
		if(in_array(strtolower($postedURLInfo['extension']), $CONFIG['pb_image_extensions']) && $CONFIG['pb_images'] && $CONFIG['pb_download_images'] && !$imageUpload) {
			$imageUpload = $db->downTheImg($postedURL, $pasteID);
			if($imageUpload != FALSE) {
				$postedURL = NULL;
				$exclam = NULL;
			}
			$uploadAttempt = TRUE;
		}

		if(!$imageUpload && !$uploadAttempt)
			$imageUpload = TRUE;
		
		if(@$_POST['pasteEnter'] == NULL && strlen(@$_FILES['pasteImage']['name']) > 4 && $CONFIG['pb_images'] && $imageUpload)
			$_POST['pasteEnter'] = "Image file (" . $_FILES['pasteImage']['name'] . ") uploaded...";

		$videoSRC = $bin->generateVideoEmbedCode($postedURL);

		if($videoSRC || !$CONFIG['pb_url'])
			$exclam = NULL;

		if(!$CONFIG['pb_url'])
			$postedURL = NULL;

		if($bin->highlight() && $_POST['highlighter'] != "plaintext")
			{
				$geshi->set_language($_POST['highlighter']);
				$geshi->set_source($bin->noHighlight(@$_POST['pasteEnter']));
				$geshi->highlight_lines_extra($bin->highlightNumbers(@$_POST['pasteEnter']));
				$geshiCode = $geshi->parse_code();
				$geshiStyle = $geshi->get_stylesheet();
			} else
				{
					$geshiCode = NULL;
					$geshiStyle = NULL;
				}

		
		$paste = array(
			'ID' => $pasteID,
			'Author' => $bin->checkAuthor(@$_POST['author']),
			'Subdomain' => $bin->db->config['subdomain'],
			'IP' => $_SERVER['REMOTE_ADDR'],
			'Image' => $imageUpload,
			'ImageTxt' => "Image file (" . @$_FILES['pasteImage']['name'] . ") uploaded...",
			'URL' => $postedURL,
			'Video' => $videoSRC,
			'Syntax' => $_POST['highlighter'],
			'Lifespan' => $_POST['lifespan'],
			'Protect' => $_POST['privacy'],
			'Parent' => $requri,
			'Content' => @$_POST['pasteEnter'],
			'GeSHI' => $geshiCode,
			'Style' => $geshiStyle
		);

		if(@$_POST['pasteEnter'] == @$_POST['originalPaste'] && strlen($_POST['pasteEnter']) > 10)
			die("<div class=\"error\">Please don't just repost what has already been said!</div></div></body></html>");
		
		if(strlen(@$_POST['pasteEnter']) > 10 && $imageUpload && mb_strlen($paste['Content']) <= $CONFIG['pb_max_bytes'] && $db->insertPaste($paste['ID'], $paste))
			{ 
				if($bin->_clipboard())
					die("<div class=\"result\"><div class=\"success\">Your paste has been successfully recorded!</div><div class=\"confirmURL\">URL to your paste is <a href=\"" . $bin->linker($paste['ID']) . $exclam . "\">" . $bin->linker($paste['ID']) . "</a> &nbsp; <span class=\"copyText\" id=\"_copyURL\">Copy URL</span><span id=\"_copyText\" style=\"visibility: hidden;\">&nbsp;</span></div></div><form id=\"pasteForm\" name=\"pasteForm\" action=\"" . $bin->linker($pasted['ID']) . "\" method=\"post\"><input type=\"hidden\" name=\"originalPaste\" id=\"originalPaste\" value=\"" . $bin->linker($paste['ID']) . "\" /><input type=\"hidden\" name=\"thisURI\" id=\"thisURI\" value=\"" . $bin->linker($paste['ID']) . "\" /></form><div class=\"spacer\">&nbsp;</div><div class=\"spacer\"><span id=\"_clipboard_replace\">YOU NEED FLASH!</span> &nbsp; <span id=\"_clipboardURI_replace\">YOU NEED FLASH!</span></div></div></body></html>");
				else
					die("<div class=\"result\"><div class=\"success\">Your paste has been successfully recorded!</div><div class=\"confirmURL\">URL to your paste is <a href=\"" . $bin->linker($paste['ID']) . $exclam . "\">" . $bin->linker($paste['ID']) . "</a></div></div></div></body></html>"); }
		else {
			echo "<div class=\"error\">Hmm, something went wrong.</div>";
			if(strlen(@$_FILES['pasteImage']['name']) > 4 && $_SERVER['CONTENT_LENGTH'] > $CONFIG['pb_image_maxsize'] && $CONFIG['pb_images'])
				echo "<div class=\"warn\">Is the file too big?</div>";
			elseif(strlen(@$_FILES['pasteImage']['name']) > 4 && $CONFIG['pb_images'])
				echo "<div class=\"warn\">File is the wrong extension?</div>";
			elseif(!$CONFIG['pb_images'] && strlen(@$_FILES['pasteImage']['name']) > 4)
				echo "<div class=\"warn\">Nope, we don't host images!</div>";
			else
				echo "<!-- Don't think it was the file upload... -->";
		}
	}

if($requri != "install" && $CONFIG['pb_recent_posts'] && substr($requri, -1) != "!")
	{
		echo "<div id=\"recentPosts\" class=\"recentPosts\">";
		$recentPosts = $bin->getLastPosts($CONFIG['pb_recent_posts']);
		if($requri || count($recentPosts) > 0)
			echo "<h2 id=\"newPaste\"><a href=\"" . $bin->linker() . "\">New Paste</a></h2><div class=\"spacer\">&nbsp;</div>";

			if(count($recentPosts) > 0)
				{					
					echo "<h2>Recent Pastes</h2>";	
					echo "<ul id=\"postList\" class=\"recentPosts\">";					
					foreach($recentPosts as $paste_) {
						$rel = NULL;
						$exclam = NULL;
						if($paste_['URL'] != NULL && $CONFIG['pb_url'] && !$bin->generateVideoEmbedCode($paste_['URL'])) {
							$exclam = "!";
							$rel = " rel=\"link\"";
						}

						if(!is_bool($paste_['Image']) && !is_numeric($paste_['Image']) && $paste_['Image'] != NULL && $CONFIG['pb_images']) {
							if($CONFIG['pb_media_warn'])
								$exclam = "!";
							else
								$exclam = NULL;

							$rel = " rel=\"image\"";
						}

						if($paste_['Video'] != NULL && $CONFIG['pb_video'] && $bin->generateVideoEmbedCode($paste_['URL'])) {
							if($CONFIG['pb_media_warn'])
								$exclam = "!";
							else
								$exclam = NULL;

							$rel = " rel=\"video\"";
						}

						echo "<li id=\"" . $paste_['ID'] . "\" class=\"postItem\"><a href=\"" . $bin->linker($paste_['ID']) . $exclam . "\"" . $rel . ">" . stripslashes($paste_['Author']) . "</a><br />" . $bin->event($paste_['Datetime']) . " ago.</li>";
					}
					echo "</ul>";
				} else
					echo "&nbsp;";
			if($requri)
				{
					echo "<div id=\"showAdminFunctions\"><a href=\"#\" onclick=\"return showAdminTools();\">Show Admin tools</a></div><div id=\"hiddenAdmin\"><h2>Administrate</h2>";
					echo "<div id=\"adminFunctions\">
							<form id=\"adminForm\" action=\"" . $bin->linker($requri) . "\" method=\"post\">
								<label for=\"adminPass\">Password</label><br />
								<input id=\"adminPass\" type=\"password\" name=\"adminPass\" value=\"" . @$_POST['adminPass'] . "\" />
								<br /><br />
								<select id=\"adminAction\" name=\"adminAction\">
									<option value=\"ip\">Show Author's IP</option>
									<option value=\"delete\">Delete Paste</option>
								</select>
								<input type=\"submit\" name=\"adminProceed\" value=\"Proceed\" />
							</form>
						</div></div>";
				}
		echo "</div>";
	} else
		{
			if($requri && $requri != "install" && substr($requri, -1) != "!")
				{
					echo "<div id=\"recentPosts\" class=\"recentPosts\">";
					echo "<h2><a href=\"" . $bin->linker() . "\">New Paste</a></h2><div class=\"spacer\">&nbsp;</div>";
					echo "<div id=\"showAdminFunctions\"><a href=\"#\" onclick=\"return showAdminTools();\">Show Admin tools</a></div><div id=\"hiddenAdmin\"><h2>Administrate</h2>";
					echo "<div id=\"adminFunctions\">
							<form id=\"adminForm\" action=\"" . $bin->linker($requri) . "\" method=\"post\">
								<label for=\"adminPass\">Password</label><br />
								<input id=\"adminPass\" type=\"password\" name=\"adminPass\" value=\"" . @$_POST['adminPass'] . "\" />
								<br /><br />
								<select id=\"adminAction\" name=\"adminAction\">
									<option value=\"ip\">Show Author's IP</option>
									<option value=\"delete\">Delete Paste</option>
								</select>
								<input type=\"submit\" name=\"adminProceed\" value=\"Proceed\" />
							</form>
						</div></div>";
					echo "</div>";
				}
		}

if($requri && $requri != "install" && substr($requri, -1) != "!")
	{
		$pasteinfo['Parent'] = $requri;
		echo "<div id=\"pastebin\" class=\"pastebin\">"
			. "<h1>" .  $bin->setTitle($CONFIG['pb_name'])  . "</h1>" .
			$bin->setTagline($CONFIG['pb_tagline'])
			. "<div id=\"result\">&nbsp;</div>";

		if($pasted = $db->readPaste($requri))
			{

				if($db->dbt == "mysql")
					$pasted = $pasted[0];

				$pasted['Data'] = array('Orig' => $pasted['Data'], 'noHighlight' => array());

				$pasted['Data']['Dirty'] = $db->dirtyHTML($pasted['Data']['Orig']);
				$pasted['Data']['noHighlight']['Dirty'] = $bin->noHighlight($pasted['Data']['Dirty']);

				if($pasted['Syntax'] == NULL || is_bool($pasted['Syntax']) || is_numeric($pasted['Syntax']))
					$pasted['Syntax'] = "plaintext";

				if($pasted['Subdomain'] != NULL && !$CONFIG['subdomain'])
					$bin->setSubdomain($pasted['Subdomain']);					
				
				if($bin->highlight() && $pasted['Syntax'] != "plaintext")
					{
						echo "<style type=\"text/css\">";
						echo stripslashes($pasted['Style']);
			 			echo "</style>";
					}

				if(!is_bool($pasted['Image']) && !is_numeric($pasted['Image']))
					$pasteSize = $bin->humanReadableFilesize(filesize($db->setDataPath($pasted['Image'])));
				elseif($pasted['Video'] && $CONFIG['pb_video'])
					$pasteSize = $bin->humanReadableFilesize(mb_strlen($pasted['Video']));
				else
					$pasteSize = $bin->humanReadableFilesize(mb_strlen($pasted['Data']['Orig']));

				if($pasted['Lifespan'] == 0)
					{
						$pasted['Lifespan'] = time() + time();
						$lifeString = "Never";
					} else
						$lifeString = "in " . $bin->event(time() - ($pasted['Lifespan'] - time()));

				if(gmdate('U') > $pasted['Lifespan'])
					{ $db->dropPaste($requri); die("<div class=\"result\"><div class=\"warn\">This paste has either expired or doesn't exist!</div></div></div></body></html>"); }

				echo "<div id=\"aboutPaste\"><div id=\"pasteID\"><strong>PasteID</strong>: " . $requri . "</div><strong>Pasted by</strong> " . stripslashes($pasted['Author']) . ", <em title=\"" . $bin->event($pasted['Datetime']) . " ago\">" . gmdate($CONFIG['pb_datetime'], $pasted['Datetime']) . " GMT</em><br />
					<strong>Expires</strong> " . $lifeString . "<br />
					<strong>Paste size</strong> " . $pasteSize . "</div>";

				if(@$_POST['adminAction'] == "ip" && $bin->hasher(@$_POST['adminPass'], $CONFIG['pb_salts']) === $CONFIG['pb_pass'])
					echo "<div class=\"success\"><strong>Author IP Address</strong> <a href=\"http://whois.domaintools.com/" . base64_decode($pasted['IP']) . "\">" . base64_decode($pasted['IP']) . "</a></div>";

				if(!is_bool($pasted['Image']) && !is_numeric($pasted['Image']))
					echo "<div id=\"imageContainer\"><a href=\"" . $bin->linker() . $db->setDataPath($pasted['Image']) . "\" rel=\"external\"><img src=\"" . $bin->linker() . $db->setDataPath($pasted['Image']) . "\" alt=\"" . $pasted['ImageTxt'] . "\" class=\"pastedImage\" /></a></div>";

				if($pasted['Video'] && $CONFIG['pb_video'])
					echo "<div class=\"spacer\">&nbsp;</div><div id=\"video\">" . stripslashes($pasted['Video']) . "</div><div class=\"spacer\">&nbsp;</div>";
			
				if(strlen($pasted['Parent']) > 0)
					echo "<div class=\"warn\"><strong>This is an edit of</strong> <a href=\"" . $bin->linker($pasted['Parent']) . "\">" . $bin->linker($pasted['Parent']) . "</a></div>";

				if(!$bin->highlight() || (!is_bool($pasted['Image']) && !is_numeric($pasted['Image'])) || ($pasted['Video'] && $CONFIG['pb_video']) || $pasted['Syntax'] == "plaintext")
					echo "<div id=\"styleBar\"><strong>Toggle</strong> <a href=\"#\" onclick=\"return toggleExpand();\">Expand</a> &nbsp;  <a href=\"#\" onclick=\"return toggleWrap();\">Wrap</a> &nbsp; <a href=\"#\" onclick=\"return toggleStyle();\">Style</a> &nbsp; <a href=\"" . $bin->linker($pasted['ID'] . '@raw') . "\">Raw</a></div>";
				else
					echo "<div id=\"styleBar\"><strong>Toggle</strong> <a href=\"#\" onclick=\"return toggleExpand();\">Expand</a> &nbsp;  <a href=\"#\" onclick=\"return toggleWrap();\">Wrap</a> &nbsp; <a href=\"" . $bin->linker($pasted['ID'] . '@raw') . "\">Raw</a></div>";

				if($bin->_clipboard())
					echo "<div class=\"_clipboardBar\"><span class=\"copyText\" id=\"_copyText\">Copy Contents</span> &nbsp; <span class=\"copyText\" id=\"_copyURL\">Copy URL</span></div>";
				else 
					echo "<div class=\"spacer\">&nbsp;</div>";

				
				if(!$bin->highlight() || (!is_bool($pasted['Image']) && !is_numeric($pasted['Image'])) || ($pasted['Video'] && $CONFIG['pb_video']) || $pasted['Syntax'] == "plaintext")
					{
						echo "<div id=\"retrievedPaste\"><div id=\"lineNumbers\"><ol id=\"orderedList\" class=\"monoText\">";
							$lines = explode("\n", $pasted['Data']['Dirty']);
							foreach($lines as $line)
								echo "<li class=\"line\"><pre>" . str_replace(array("\n", "\r"), "&nbsp;", $bin->filterHighlight($line)) . "&nbsp;</pre></li>";
						echo "</ol></div></div>";
					} else
						{
							echo "<div class=\"spacer\">&nbsp;</div><div id=\"retrievedPaste\"><div id=\"lineNumbers\">";
							echo stripslashes($pasted['GeSHI']);
							echo "</div></div><div class=\"spacer\">&nbsp;</div>";
						}

				if($bin->lineHighlight())
					$lineHighlight = "To highlight lines, prefix them with <em>" . $bin->lineHighlight() . "</em>";
				else
					$lineHighlight = NULL;

				if($bin->jQuery())
					$event = "onblur";
				else
					$event = "onblur=\"return checkIfURL(this);\" onkeyup";

				if(!is_bool($pasted['Image']) && !is_numeric($pasted['Image']))
						$pasted['Data']['noHighlight']['Dirty'] = $bin->linker() . $db->setDataPath($pasted['Image']);	
				
				if($CONFIG['pb_editing']) {
				echo "<div id=\"formContainer\">
					<form id=\"pasteForm\" name=\"pasteForm\" action=\"" . $bin->linker($pasted['ID']) . "\" method=\"post\">
						<div><label for=\"pasteEnter\">Edit this post! " . $lineHighlight . "</label><br />
						<textarea id=\"pasteEnter\" name=\"pasteEnter\" onkeydown=\"return catchTab(event)\" " . $event . "=\"return checkIfURL(this);\">" . $pasted['Data']['noHighlight']['Dirty'] . "</textarea></div>
						<div id=\"foundURL\" style=\"display: none;\">URL has been detected...</div>
						<div class=\"spacer\">&nbsp;</div>";

						$highlighterContainer = "<div id=\"highlightContainer\"><label for=\"highlighter\">Syntax Highlighting</label> <select name=\"highlighter\" id=\"highlighter\"> <option value=\"plaintext\">None</option> <option value=\"plaintext\">-------------</option> <option value=\"bash\">Bash</option> <option value=\"c\">C</option> <option value=\"cpp\">C++</option> <option value=\"css\">CSS</option> <option value=\"html4strict\">HTML</option> <option value=\"java\">Java</option> <option value=\"javascript\">Javascript</option> <option value=\"jquery\">jQuery</option> <option value=\"latex\">LaTeX</option> <option value=\"mirc\">mIRC Scripting</option> <option value=\"perl\">Perl</option> <option value=\"php\">PHP</option> <option value=\"python\">Python</option> <option value=\"rails\">Rails</option> <option value=\"ruby\">Ruby</option> <option value=\"sql\">SQL</option> <option value=\"xml\">XML</option> <option value=\"plaintext\">-------------</option> <option value=\"4cs\">GADV 4CS</option> <option value=\"abap\">ABAP</option> <option value=\"actionscript\">ActionScript</option> <option value=\"actionscript3\">ActionScript 3</option> <option value=\"ada\">Ada</option> <option value=\"apache\">Apache configuration</option> <option value=\"applescript\">AppleScript</option> <option value=\"apt_sources\">Apt sources</option> <option value=\"asm\">ASM</option> <option value=\"asp\">ASP</option> <option value=\"autoconf\">Autoconf</option> <option value=\"autohotkey\">Autohotkey</option> <option value=\"autoit\">AutoIt</option> <option value=\"avisynth\">AviSynth</option> <option value=\"awk\">awk</option> <option value=\"bash\">Bash</option> <option value=\"basic4gl\">Basic4GL</option> <option value=\"bf\">Brainfuck</option> <option value=\"bibtex\">BibTeX</option> <option value=\"blitzbasic\">BlitzBasic</option> <option value=\"bnf\">bnf</option> <option value=\"boo\">Boo</option> <option value=\"c\">C</option> <option value=\"c_mac\">C (Mac)</option> <option value=\"caddcl\">CAD DCL</option> <option value=\"cadlisp\">CAD Lisp</option> <option value=\"cfdg\">CFDG</option> <option value=\"cfm\">ColdFusion</option> <option value=\"chaiscript\">ChaiScript</option> <option value=\"cil\">CIL</option> <option value=\"clojure\">Clojure</option> <option value=\"cmake\">CMake</option> <option value=\"cobol\">COBOL</option> <option value=\"cpp\">C++</option> <option value=\"cpp-qt\" class=\"sublang\">&nbsp;&nbsp;C++ (QT)</option> <option value=\"csharp\">C#</option> <option value=\"css\">CSS</option> <option value=\"cuesheet\">Cuesheet</option> <option value=\"d\">D</option> <option value=\"dcs\">DCS</option> <option value=\"delphi\">Delphi</option> <option value=\"diff\">Diff</option> <option value=\"div\">DIV</option> <option value=\"dos\">DOS</option> <option value=\"dot\">dot</option> <option value=\"ecmascript\">ECMAScript</option> <option value=\"eiffel\">Eiffel</option> <option value=\"email\">eMail (mbox)</option> <option value=\"erlang\">Erlang</option> <option value=\"fo\">FO (abas-ERP)</option> <option value=\"fortran\">Fortran</option> <option value=\"freebasic\">FreeBasic</option> <option value=\"fsharp\">F#</option> <option value=\"gambas\">GAMBAS</option> <option value=\"gdb\">GDB</option> <option value=\"genero\">genero</option> <option value=\"genie\">Genie</option> <option value=\"gettext\">GNU Gettext</option> <option value=\"glsl\">glSlang</option> <option value=\"gml\">GML</option> <option value=\"gnuplot\">Gnuplot</option> <option value=\"groovy\">Groovy</option> <option value=\"gwbasic\">GwBasic</option> <option value=\"haskell\">Haskell</option> <option value=\"hicest\">HicEst</option> <option value=\"hq9plus\">HQ9+</option> <option value=\"html4strict\">HTML</option> <option value=\"icon\">Icon</option> <option value=\"idl\">Uno Idl</option> <option value=\"ini\">INI</option> <option value=\"inno\">Inno</option> <option value=\"intercal\">INTERCAL</option> <option value=\"io\">Io</option> <option value=\"j\">J</option> <option value=\"java\">Java</option> <option value=\"java5\">Java(TM) 2 Platform Standard Edition 5.0</option> <option value=\"javascript\">Javascript</option> <option value=\"jquery\">jQuery</option> <option value=\"kixtart\">KiXtart</option> <option value=\"klonec\">KLone C</option> <option value=\"klonecpp\">KLone C++</option> <option value=\"latex\">LaTeX</option> <option value=\"lisp\">Lisp</option> <option value=\"locobasic\">Locomotive Basic</option> <option value=\"logtalk\">Logtalk</option> <option value=\"lolcode\">LOLcode</option> <option value=\"lotusformulas\">Lotus Notes @Formulas</option> <option value=\"lotusscript\">LotusScript</option> <option value=\"lscript\">LScript</option> <option value=\"lsl2\">LSL2</option> <option value=\"lua\">Lua</option> <option value=\"m68k\">Motorola 68000 Assembler</option> <option value=\"magiksf\">MagikSF</option> <option value=\"make\">GNU make</option> <option value=\"mapbasic\">MapBasic</option> <option value=\"matlab\">Matlab M</option> <option value=\"mirc\">mIRC Scripting</option> <option value=\"mmix\">MMIX</option> <option value=\"modula2\">Modula-2</option> <option value=\"modula3\">Modula-3</option> <option value=\"mpasm\">Microchip Assembler</option> <option value=\"mxml\">MXML</option> <option value=\"mysql\">MySQL</option> <option value=\"newlisp\">newlisp</option> <option value=\"nsis\">NSIS</option> <option value=\"oberon2\">Oberon-2</option> <option value=\"objc\">Objective-C</option> <option value=\"ocaml\">OCaml</option> <option value=\"ocaml-brief\" class=\"sublang\">&nbsp;&nbsp;OCaml (brief)</option> <option value=\"oobas\">OpenOffice.org Basic</option> <option value=\"oracle11\">Oracle 11 SQL</option> <option value=\"oracle8\">Oracle 8 SQL</option> <option value=\"oxygene\">Oxygene (Delphi Prism)</option> <option value=\"oz\">OZ</option> <option value=\"pascal\">Pascal</option> <option value=\"pcre\">PCRE</option> <option value=\"per\">per</option> <option value=\"perl\">Perl</option> <option value=\"perl6\">Perl 6</option> <option value=\"pf\">OpenBSD Packet Filter</option> <option value=\"php\">PHP</option> <option value=\"php-brief\" class=\"sublang\">&nbsp;&nbsp;PHP (brief)</option> <option value=\"pic16\">PIC16</option> <option value=\"pike\">Pike</option> <option value=\"pixelbender\">Pixel Bender 1.0</option> <option value=\"plsql\">PL/SQL</option> <option value=\"postgresql\">PostgreSQL</option> <option value=\"povray\">POVRAY</option> <option value=\"powerbuilder\">PowerBuilder</option> <option value=\"powershell\">PowerShell</option> <option value=\"progress\">Progress</option> <option value=\"prolog\">Prolog</option> <option value=\"properties\">PROPERTIES</option> <option value=\"providex\">ProvideX</option> <option value=\"purebasic\">PureBasic</option> <option value=\"python\">Python</option> <option value=\"q\">q/kdb+</option> <option value=\"qbasic\">QBasic/QuickBASIC</option> <option value=\"rails\">Rails</option> <option value=\"rebol\">REBOL</option> <option value=\"reg\">Microsoft Registry</option> <option value=\"robots\">robots.txt</option> <option value=\"rpmspec\">RPM Specification File</option> <option value=\"rsplus\">R / S+</option> <option value=\"ruby\">Ruby</option> <option value=\"sas\">SAS</option> <option value=\"scala\">Scala</option> <option value=\"scheme\">Scheme</option> <option value=\"scilab\">SciLab</option> <option value=\"sdlbasic\">sdlBasic</option> <option value=\"smalltalk\">Smalltalk</option> <option value=\"smarty\">Smarty</option> <option value=\"sql\">SQL</option> <option value=\"systemverilog\">SystemVerilog</option> <option value=\"tcl\">TCL</option> <option value=\"teraterm\">Tera Term Macro</option> <option value=\"text\">Text</option> <option value=\"thinbasic\">thinBasic</option> <option value=\"tsql\">T-SQL</option> <option value=\"typoscript\">TypoScript</option> <option value=\"unicon\">Unicon (Unified Extended Dialect of Icon)</option> <option value=\"vala\">Vala</option> <option value=\"vb\">Visual Basic</option> <option value=\"vbnet\">vb.net</option> <option value=\"verilog\">Verilog</option> <option value=\"vhdl\">VHDL</option> <option value=\"vim\">Vim Script</option> <option value=\"visualfoxpro\">Visual Fox Pro</option> <option value=\"visualprolog\">Visual Prolog</option> <option value=\"whitespace\">Whitespace</option> <option value=\"whois\">Whois (RPSL format)</option> <option value=\"winbatch\">Winbatch</option> <option value=\"xbasic\">XBasic</option> <option value=\"xml\">XML</option> <option value=\"xorg_conf\">Xorg configuration</option> <option value=\"xpp\">X++</option> <option value=\"z80\">ZiLOG Z80 Assembler</option> </select> </div>";

						$selecter = '/value="' . $pasted['Syntax'] . '"/';
						$replacer = 'value="' . $pasted['Syntax'] . '" selected="selected"';
						$highlighterContainer = preg_replace($selecter, $replacer, $highlighterContainer, 1);

						if($bin->highlight())
							echo $highlighterContainer;

						if(is_array($CONFIG['pb_lifespan']) && count($CONFIG['pb_lifespan']) > 1)
							{
								echo "<div id=\"lifespanContainer\"><label for=\"lifespan\">Paste Expiration</label> <select name=\"lifespan\" id=\"lifespan\">";

								foreach($CONFIG['pb_lifespan'] as $span)
									{
										$key = array_keys($CONFIG['pb_lifespan'], $span);
										$key = $key[0];
										$options .= "<option value=\"" . $key . "\">" . $bin->event(time() - ($span * 24 * 60 * 60), TRUE) . "</option>";
									}

								$selecter = '/\>0 seconds/';
								$replacer = '>Never';
								$options = preg_replace($selecter, $replacer, $options, 1);

								echo $options;

								echo "</select></div>";
							} elseif(is_array($CONFIG['pb_lifespan']) && count($CONFIG['pb_lifespan']) == 1)
								{
									echo "<div id=\"lifespanContainer\"><label for=\"lifespan\">Paste Expiration</label>";

									echo " <div id=\"expireTime\"><input type=\"hidden\" name=\"lifespan\" value=\"0\" />" . $bin->event(time() - ($CONFIG['pb_lifespan'][0] * 24 * 60 * 60), TRUE) . "</div>";

									echo "</div>";
								} else
									echo "<input type=\"hidden\" name=\"lifespan\" value=\"0\" />";

						$enabled = NULL;

						if($pasted['Protection'])
							$enabled = "disabled";
						
						$privacyContainer = "<div id=\"privacyContainer\"><label for=\"privacy\">Paste Visibility</label> <select name=\"privacy\" id=\"privacy\" " . $enabled . "><option value=\"0\">Public</option> <option value=\"1\">Private</option></select></div>";

						$selecter = '/value="' . $pasted['Protection'] . '"/';
						$replacer = 'value="' . $pasted['Protection'] . '" selected="selected"';
						$privacyContainer = preg_replace($selecter, $replacer, $privacyContainer, 1);

						if($pasted['Protection'])
							{
								$selecter = '/\<\/select\>/';
								$replacer = '</select><input type="hidden" name="privacy" value="' . $pasted['Protection'] . '" />';
								$privacyContainer = preg_replace($selecter, $replacer, $privacyContainer, 1);
							}

						if($CONFIG['pb_private'])
							echo $privacyContainer;

						echo "<div class=\"spacer\">&nbsp;</div>";

						echo "<div id=\"authorContainerReply\"><label for=\"authorEnter\">Your Name</label><br />
						<input type=\"text\" name=\"author\" id=\"authorEnter\" value=\"" . $CONFIG['_temp_pb_author'] . "\" onfocus=\"if(this.value=='" . $CONFIG['_temp_pb_author'] . "')this.value='';\" onblur=\"if(this.value=='')this.value='" . $CONFIG['_temp_pb_author'] . "';\" maxlength=\"32\" /></div>
						<div class=\"spacer\">&nbsp;</div>
						<input type=\"text\" name=\"email\" id=\"poison\" style=\"display: none;\" />
						<input type=\"hidden\" name=\"ajax_token\" value=\"" . $bin->token(TRUE) . "\" />
						<input type=\"hidden\" name=\"originalPaste\" id=\"originalPaste\" value=\"" . $pasted['Data']['noHighlight']['Dirty'] . "\" />
						<input type=\"hidden\" name=\"parent\" id=\"parentThread\" value=\"" . $requri . "\" />
						<input type=\"hidden\" name=\"thisURI\" id=\"thisURI\" value=\"" . $bin->linker($pasted['ID']) . "\" />
						<div id=\"fileUploadContainer\" style=\"display: none;\">&nbsp;</div>
						<div id=\"submitContainer\" class=\"submitContainer\">
							<input type=\"submit\" name=\"submit\" value=\"Submit your paste\" onclick=\"return submitPaste(this);\" id=\"submitButton\" />
						</div>
					</form>
				</div>
				<div class=\"spacer\">&nbsp;</div><div class=\"spacer\">&nbsp;</div>";
				} else
					{
						echo "<form id=\"pasteForm\" name=\"pasteForm\" action=\"" . $bin->linker($pasted['ID']) . "\" method=\"post\">
							<input type=\"hidden\" name=\"originalPaste\" id=\"originalPaste\" value=\"" . $pasted['Data']['Dirty'] . "\" />
							<input type=\"hidden\" name=\"parent\" id=\"parentThread\" value=\"" . $requri . "\" />
							<input type=\"hidden\" name=\"thisURI\" id=\"thisURI\" value=\"" . $bin->linker($pasted['ID']) . "\" />
						</form><div class=\"spacer\">&nbsp;</div><div class=\"spacer\">&nbsp;</div>";
					}

			}
			else
				{
					echo "<div class=\"result\"><div class=\"warn\">This paste has either expired or doesn't exist!</div></div>";
					$requri = NULL;
				}
		echo "</div>";
	} elseif($requri && $requri != "install" && substr($requri, -1) == "!")
		{
			if(!$bin->checkIfRedir(substr($requri, 0, -1)))
				echo "<div class=\"result\"><h1>Just a sec!</h1><div class=\"warn\">You are about to visit a post that the author has marked as requiring confirmation to view.</div>
				<div class=\"infoMessage\">If you wish to view the content <strong><a href=\"" . $bin->linker(substr($requri, 0, -1)) . "\">click here</a></strong>. Please note that the owner of this pastebin will not be held responsible for the content of this paste.<br /><br /><a href=\"" . $bin->linker() . "\">Take me back...</a></div></div>";
			else
				echo "<div class=\"result\"><h1>Warning!</h1><div class=\"error\">You are about to leave the site!</div>
				<div class=\"infoMessage\">This paste redirects you to<br /><br /><div id=\"emphasizedURL\">" . $bin->checkIfRedir(substr($requri, 0, -1)) . "</div><br /><br />Danger lurks on the world wide web, if you want to visit the site <strong><a href=\"" . $bin->checkIfRedir(substr($requri, 0, -1)) . "\">click here</a></strong>. Please note that the owner of this pastebin will not be held responsible for the content of the site.<br /><br /><a href=\"" . $bin->linker() . "\">Take me back...</a></div></div>";

			echo "<div id=\"showAdminFunctions\"><a href=\"#\" onclick=\"return showAdminTools();\">Show Admin tools</a></div><div id=\"hiddenAdmin\"><div class=\"spacer\">&nbsp;</div><h2>Administrate</h2>";
					echo "<div id=\"adminFunctions\">
							<form id=\"adminForm\" action=\"" . $bin->linker(substr($requri, 0, -1)) . "\" method=\"post\">
								<label for=\"adminPass\">Password</label><br />
								<input id=\"adminPass\" type=\"password\" name=\"adminPass\" value=\"" . @$_POST['adminPass'] . "\" />
								<br /><br />
								<select id=\"adminAction\" name=\"adminAction\">
									<option value=\"ip\">Show Author's IP</option>
									<option value=\"delete\">Delete Paste</option>
								</select>
								<input type=\"submit\" name=\"adminProceed\" value=\"Proceed\" />
							</form>
						</div></div>";

			die("</div></body></html>");
	} elseif(isset($requri) && $requri == "install" && substr($requri, -1) != "!")
		{
			$stage = array();
			echo "<div id=\"installer\" class=\"installer\">"
				 . "<h1>Installing Pastebin</h1>";

			if(file_exists('./INSTALL_LOCK'))
				die("<div class=\"warn\"><strong>Already Installed!</strong></div></div></body></html>");

			echo "<ul id=\"installList\">";
				echo "<li>Checking Directory is writable. ";
					if(!is_writable($bin->thisDir()))
						echo "<span class=\"error\">Directory is not writable!</span> - CHMOD to 0777";
					else
						{ echo "<span class=\"success\">Directory is writable!</span>"; $stage[] = 1; }
				echo "</li>";

				if(count($stage) > 0)
				{ echo "<li>Quick password check. ";
					$passLen = array(8, 9, 10, 11, 12);
					shuffle($passLen);
					if(strtolower($CONFIG['pb_pass']) === $bin->hasher("password", $CONFIG['pb_salts']) || !isset($CONFIG['pb_pass']))
						echo "<span class=\"error\">Password is still default!</span> &nbsp; &raquo; &nbsp; Suggested password: <em>" . $bin->generateRandomString($passLen[0]) . "</em>";
					else
						{ echo "<span class=\"success\">Password is not default!</span>"; $stage[] = 1; }
				echo "</li>"; }

				if(count($stage) > 1)
				{ echo "<li>Quick Salt Check. ";
					$no_salts = count($CONFIG['pb_salts']);
					$saltLen = array(8, 9, 10, 11, 12, 14, 16, 25, 32);
					shuffle($saltLen);
					if($no_salts < 4 || ($CONFIG['pb_salts'][1] == "str001" || $CONFIG['pb_salts'][2] == "str002" || $CONFIG['pb_salts'][3] == "str003" || $CONFIG['pb_salts'][4] == "str004"))
						echo "<span class=\"error\">Salt strings are inadequate!</span> &nbsp; &raquo; &nbsp; Suggested salts: <ol><li>" . $bin->generateRandomString($saltLen[0]) . "</li><li>" . $bin->generateRandomString($saltLen[1]) . "</li><li>" . $bin->generateRandomString($saltLen[2]) . "</li><li>" . $bin->generateRandomString($saltLen[3]) . "</li></ol>";
					else
						{ echo "<span class=\"success\">Salt strings are adequate!</span>"; $stage[] = 1; }
				echo "</li>"; }

				if(count($stage) > 2)
				{ echo "<li>Checking Database Connection. ";
					if($db->dbt == "txt")
						{ if(!is_dir($CONFIG['txt_config']['db_folder'])) { mkdir($CONFIG['txt_config']['db_folder']); mkdir($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images']); mkdir($CONFIG['txt_config']['db_folder'] . "/subdomain"); chmod($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images'], 0777); chmod($CONFIG['txt_config']['db_folder'], 0777); chmod($CONFIG['txt_config']['db_folder'] . "/subdomain", 0777); } $db->write($db->serializer(array()), $CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_index']); $db->write($db->serializer($bin->generateForbiddenSubdomains()), $CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_index'] . "_SUBDOMAINS"); $db->write("FORBIDDEN", $CONFIG['txt_config']['db_folder'] . "/index.html"); $db->write("FORBIDDEN", $CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images'] . "/index.html"); chmod($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_index'], 0666); chmod($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_index'] . "_SUBDOMAINS", 0666); chmod($CONFIG['txt_config']['db_folder'] . "/index.html", 0666); chmod($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images'] . "/index.html", 0666);	}
					if(!$db->connect())
						echo "<span class=\"error\">Cannot connect to database!</span> - Check Config in index.php";
					else
						{ echo "<span class=\"success\">Connected to database!</span>"; $stage[] = 1; }
				echo "</li>"; }

				if(count($stage) > 3)
				{ echo "<li>Creating Database Tables. ";
					$structure = "CREATE TABLE IF NOT EXISTS " . $CONFIG['mysql_connection_config']['db_table'] . " (ID varchar(255), Subdomain varchar(100), Datetime bigint, Author varchar(255), Protection int, Syntax varchar(255) DEFAULT 'plaintext', Parent longtext, Image longtext, ImageTxt longtext, URL longtext, Video longtext, Lifespan int, IP varchar(225), Data longtext, GeSHI longtext, Style longtext, INDEX (id)) ENGINE = INNODB";
				if($db->dbt == "mysql")
					{				
						if(!mysql_query($structure, $db->link) && !$CONFIG['mysql_connection_config']['db_existing'])
							{ echo "<span class=\"error\">Structure failed</span> - Check Config in index.php (Does the table already exist?)"; }
						else
							{ echo "<span class=\"success\">Table created!</span>"; 
							  $stage[] = 1;
							  if($CONFIG['mysql_connection_config']['db_existing'])
								echo "<span class=\"warn\">Attempting to use an existing table!</span> If this is not a Pastebin table a fault will occur."; 

								mkdir($CONFIG['txt_config']['db_folder']);
								chmod($CONFIG['txt_config']['db_folder'], 0777);
								mkdir($CONFIG['txt_config']['db_folder'] . "/subdomain");
								chmod($CONFIG['txt_config']['db_folder'] . "/subdomain", 0777);
								mkdir($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images']); 
								chmod($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images'], 0777);
								$db->write("FORBIDDEN", $CONFIG['txt_config']['db_folder'] . "/index.html"); 
								chmod($CONFIG['txt_config']['db_folder'] . "/index.html", 0666);
								$db->write("FORBIDDEN", $CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images'] . "/index.html"); 
								chmod($CONFIG['txt_config']['db_folder'] . "/" . $CONFIG['txt_config']['db_images'] . "/index.html", 0666);

								$forbidden_array = array('ID' => 'forbidden', 'Time_offset' => 10, 'Author' => 'System', 'IP' => $_SERVER['REMOTE_ADDR'], 'Lifespan' => 0, 'Image' => TRUE, 'Protect' => 1, 'Content' => serialize($bin->generateForbiddenSubdomains(TRUE)));

								$db->insertPaste($forbidden_array['ID'], $forbidden_array, TRUE);
							}
					} else
						{
							echo "<span class=\"success\">Table created!</span>"; $stage[] = 1;
						}
				echo "</li>"; }
				if(count($stage) > 4)
				{ echo "<li>Locking Installation. ";					
					if(!$db->write(time(), './INSTALL_LOCK'))
						echo "<span class=\"error\">Writing Error</span>";
					else
						{ echo "<span class=\"success\">Complete</span>"; $stage[] = 1; chmod('./INSTALL_LOCK', 0666); }
				echo "</li>"; }
			echo "</ul>";
				if(count($stage) > 5)
				{ $paste_new = array('ID' => $bin->generateRandomString(1), 'Author' => 'System', 'IP' => $_SERVER['REMOTE_ADDR'], 'Lifespan' => 1800, 'Image' => TRUE, 'Protect' => 0, 'Content' => $CONFIG['pb_line_highlight'] . "Congratulations, your pastebin has now been installed!\nThis message will expire in 30 minutes!");
				$db->insertPaste($paste_new['ID'], $paste_new, TRUE);
				echo "<div id=\"confirmInstalled\"><a href=\"" . $bin->linker() . "\">Continue</a> to your new installation!<br /></div>";
				echo "<div id=\"confirmInstalled\" class=\"warn\">It is recommended that you now CHMOD this directory to 0755.</div>"; }
			echo "</div>";

		} else
			{
				if($CONFIG['pb_subdomains'])
					$subdomainClicker = " [ <a href=\"#\" onclick=\"return showInstructions();\">make a subdomain</a> ]";
				else
					$subdomainClicker = NULL;

				if($CONFIG['subdomain'])
					{
						$domain_name = str_replace(array("http://", $CONFIG['subdomain'] . ".", "www."), "", $bin->linker());
						$subdomain_action = str_replace($CONFIG['subdomain'] . ".", "", $bin->linker());
					}
				else
					{
						$domain_name = str_replace(array("http://", "www."), "", $bin->linker());
						$subdomain_action = $bin->linker();
					}
					
				$subdomainForm = "<form id=\"subdomain_form\" action=\"" . $subdomain_action . "\" method=\"POST\">http://<input type=\"text\" name=\"subdomain\" id=\"subdomain\" maxlength=\"32\" />." . $domain_name . " <input type=\"submit\" id=\"new_subdomain\" name=\"new_subdomain\" value=\"Create Subdomain\" /></form>";

				if(strlen($bin->linker()) < 16)
					$isShortURL = " If your text is a URL, the pastebin will recognize it and will create a Short URL forwarding page! (Like bit.ly, is.gd, etc)";
				else
					$isShortURL = " If your text is a URL, the pastebin will recognize it and will create a URL forwarding page!";


				if($CONFIG['pb_editing'])
					$service['editing'] = array('style' => 'success', 'status' => 'Enabled');
				else
					$service['editing'] = array('style' => 'error', 'status' => 'Disabled');

				if($CONFIG['pb_api'])
					$service['api'] = array('style' => 'success', 'status' => 'Enabled', 'tip' => '<div class="spacer">&nbsp;</div><div><strong>Developer API</strong></div><div>To create a new paste submit using <strong>POST</strong> to <a href="' . $bin->linker('api') . '">' . $bin->linker('api') . '</a> - The response is in JSON format. For server settings visit <a href="' . $bin->linker('defaults') . '">' . $bin->linker('defaults') . '</a>.</div>');
				else
					$service['api'] = array('style' => 'error', 'status' => 'Disabled', 'tip' => NULL);

				if($bin->_clipboard())
					$service['clipboard'] = array('style' => 'success', 'status' => 'Enabled');
				else
					$service['clipboard'] = array('style' => 'error', 'status' => 'Disabled');

				if($CONFIG['pb_images'])
					$service['images'] = array('style' => 'success', 'status' => 'Enabled', 'tip' => ', you can even upload a ' . $bin->humanReadableFilesize($CONFIG['pb_image_maxsize']) . ' image,');
				else
					$service['images'] = array('style' => 'error', 'status' => 'Disabled', 'tip' => NULL);

				if($CONFIG['pb_download_images'] && $CONFIG['pb_images']) {
					$service['image_download'] = array('style' => 'success', 'status' => 'Enabled');
					$service['images']['tip'] = ', you can even upload or copy from another site a ' . $bin->humanReadableFilesize($CONFIG['pb_image_maxsize']) . ' image,';
				}
				else
					$service['image_download'] = array('style' => 'error', 'status' => 'Disabled', 'tip' => NULL);
					

				if($CONFIG['pb_url'])
					$service['url'] = array('style' => 'success', 'status' => 'Enabled', 'tip' => $isShortURL, 'str' => '/url');
				else
					$service['url'] = array('style' => 'error', 'status' => 'Disabled', 'tip' => NULL, 'str' => NULL);

				if($CONFIG['pb_subdomains'])
					$service['subdomains'] = array('style' => 'success', 'status' => 'Enabled', 'tip' => $subdomainForm);
				else
					$service['subdomains'] = array('style' => 'error', 'status' => 'Disabled', 'tip' => NULL);

				if($bin->jQuery())
					$service['jQuery'] = array('style' => 'success', 'status' => 'Enabled');
				else
					$service['jQuery'] = array('style' => 'error', 'status' => 'Disabled');

				if($bin->highlight())
					$service['syntax'] = array('style' => 'success', 'status' => 'Enabled');
				else
					$service['syntax'] = array('style' => 'error', 'status' => 'Disabled');

				if($bin->lineHighlight())
					$service['highlight'] = array('style' => 'success', 'status' => 'Enabled', 'tip' => ' To highlight lines, prefix them with <em>' . $bin->lineHighlight() . '</em>');
				else
					$service['highlight'] = array('style' => 'error', 'status' => 'Disabled', 'tip' => NULL); 

				if($CONFIG['pb_video'])
					$service['video'] = array('style' => 'success', 'status' => 'Enabled', 'tip' => " If you post a URL that links to a video on YouTube, Vimeo or DailyMotion the pastebin will embed the video into the page for easy viewing!");
				else
					$service['video'] = array('style' => 'error', 'status' => 'Disabled', 'tip' => NULL);

				if($bin->flowplayer())
					$service['flowplayer'] = array('style' => 'success', 'status' => 'Enabled');
				else
					$service['flowplayer'] = array('style' => 'error', 'status' => 'Disabled');

				$uploadForm = NULL;

				if($bin->jQuery())
					$event = "onblur";
				else
					$event = "onblur=\"return checkIfURL(this);\" onkeyup";				


				if($CONFIG['pb_images'])
					$uploadForm = "<div id=\"fileUploadContainer\"><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"" . $CONFIG['pb_image_maxsize'] . "\" /><label>Attach an Image (" . implode(", ", $CONFIG['pb_image_extensions']) . " &raquo; Max size " . $bin->humanReadableFilesize($CONFIG['pb_image_maxsize']) . ")</label><br /><input type=\"file\" name=\"pasteImage\" id=\"pasteImage\" /><br />(Optional)</div>";
				else
					$uploadForm = "<div id=\"fileUploadContainer\">&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;</div>";
				
				echo "<div id=\"pastebin\" class=\"pastebin\">"
				. "<h1>" .  $bin->setTitle($CONFIG['pb_name'])  . "</h1>" .
				$bin->setTagline($CONFIG['pb_tagline'])
				. "<div id=\"result\">&nbsp;</div>
				<div id=\"formContainer\">
				<div id=\"instructions\" class=\"instructions\"><h2>How to use</h2><div>Fill out the form with data you wish to store online. You will be given an unique address to access your content that can be sent over IM/Chat/(Micro)Blog for online collaboration (eg, " . $bin->linker('z3n') . "). The following services have been made available by the administrator of this server:</div><ul id=\"serviceList\"><li><span class=\"success\">Enabled</span> Text</li><li><span class=\"" . $service['syntax']['style'] . "\">" . $service['syntax']['status'] . "</span> Syntax Highlighting</li><li><span class=\"" . $service['highlight']['style'] . "\">" . $service['highlight']['status'] . "</span> Line Highlighting</li><li><span class=\"" . $service['editing']['style'] . "\">" . $service['editing']['status'] . "</span> Editing</li><li><span class=\"" . $service['clipboard']['style'] . "\">" . $service['clipboard']['status'] . "</span> Copy to Clipboard</li><li><span class=\"" . $service['images']['style'] . "\">" . $service['images']['status'] . "</span> Image hosting</li><li><span class=\"" . $service['image_download']['style'] . "\">" . $service['image_download']['status'] . "</span> Copy image from URL</li><li><span class=\"" . $service['video']['style'] . "\">" . $service['video']['status'] . "</span> Video Embedding (YouTube, Vimeo &amp; DailyMotion)</li><li><span class=\"" . $service['flowplayer']['style'] . "\">" . $service['flowplayer']['status'] . "</span> Flash player for flv/mp4 files.</li><li><span class=\"" . $service['url']['style'] . "\">" . $service['url']['status'] . "</span> URL Shortening/Redirection</li><li><span class=\"" . $service['jQuery']['style'] . "\">" . $service['jQuery']['status'] . "</span> Visual Effects</li><li><span class=\"" . $service['jQuery']['style'] . "\">" . $service['jQuery']['status'] . "</span> AJAX Posting</li><li><span class=\"" . $service['api']['style'] . "\">" . $service['api']['status'] . "</span> API</li><li><span class=\"" . $service['subdomains']['style'] . "\">" . $service['subdomains']['status'] . "</span> Custom Subdomains " . $service['subdomains']['tip'] . "</li></ul><div class=\"spacer\">&nbsp;</div><div><strong>What to do</strong></div><div>Just paste your text, sourcecode or conversation into the textbox below, add a name if you wish" . $service['images']['tip'] . " then hit submit!" . $service['url']['tip'] . "" . $service['video']['tip'] . "" . $service['highlight']['tip'] . "</div><div class=\"spacer\">&nbsp;</div><div><strong>Some tips about usage;</strong> If you want to put a message up asking if the user wants to continue, add an &quot;!&quot; suffix to your URL (eg, " . $bin->linker('z3n') . "!).</div>" . $service['api']['tip'] . "<div class=\"spacer\">&nbsp;</div></div>
					<form id=\"pasteForm\" action=\"" . $bin->linker() . "\" method=\"post\" name=\"pasteForm\" enctype=\"multipart/form-data\">
						<div><label for=\"pasteEnter\">Paste your text" . $service['url']['str'] . " here!" . $service['highlight']['tip'] . " <span id=\"showInstructions\">[ <a href=\"#\" onclick=\"return showInstructions();\">more info</a> ]" . $subdomainClicker . "</span></label><br />
						<textarea id=\"pasteEnter\" name=\"pasteEnter\" onkeydown=\"return catchTab(event)\" " . $event . "=\"return checkIfURL(this);\"></textarea></div>
						<div id=\"foundURL\" style=\"display: none;\">URL has been detected...</div>
						<div class=\"spacer\">&nbsp;</div>
						<div id=\"secondaryFormContainer\"><input type=\"hidden\" name=\"ajax_token\" value=\"" . $bin->token(TRUE) . "\" />";

						if($bin->highlight())
							echo "<div id=\"highlightContainer\"><label for=\"highlighter\">Syntax Highlighting</label> <select name=\"highlighter\" id=\"highlighter\"> <option value=\"plaintext\">None</option> <option value=\"plaintext\">-------------</option> <option value=\"bash\">Bash</option> <option value=\"c\">C</option> <option value=\"cpp\">C++</option> <option value=\"css\">CSS</option> <option value=\"html4strict\">HTML</option> <option value=\"java\">Java</option> <option value=\"javascript\">Javascript</option> <option value=\"jquery\">jQuery</option> <option value=\"latex\">LaTeX</option> <option value=\"mirc\">mIRC Scripting</option> <option value=\"perl\">Perl</option> <option value=\"php\">PHP</option> <option value=\"python\">Python</option> <option value=\"rails\">Rails</option> <option value=\"ruby\">Ruby</option> <option value=\"sql\">SQL</option> <option value=\"xml\">XML</option> <option value=\"plaintext\">-------------</option> <option value=\"4cs\">GADV 4CS</option> <option value=\"abap\">ABAP</option> <option value=\"actionscript\">ActionScript</option> <option value=\"actionscript3\">ActionScript 3</option> <option value=\"ada\">Ada</option> <option value=\"apache\">Apache configuration</option> <option value=\"applescript\">AppleScript</option> <option value=\"apt_sources\">Apt sources</option> <option value=\"asm\">ASM</option> <option value=\"asp\">ASP</option> <option value=\"autoconf\">Autoconf</option> <option value=\"autohotkey\">Autohotkey</option> <option value=\"autoit\">AutoIt</option> <option value=\"avisynth\">AviSynth</option> <option value=\"awk\">awk</option> <option value=\"bash\">Bash</option> <option value=\"basic4gl\">Basic4GL</option> <option value=\"bf\">Brainfuck</option> <option value=\"bibtex\">BibTeX</option> <option value=\"blitzbasic\">BlitzBasic</option> <option value=\"bnf\">bnf</option> <option value=\"boo\">Boo</option> <option value=\"c\">C</option> <option value=\"c_mac\">C (Mac)</option> <option value=\"caddcl\">CAD DCL</option> <option value=\"cadlisp\">CAD Lisp</option> <option value=\"cfdg\">CFDG</option> <option value=\"cfm\">ColdFusion</option> <option value=\"chaiscript\">ChaiScript</option> <option value=\"cil\">CIL</option> <option value=\"clojure\">Clojure</option> <option value=\"cmake\">CMake</option> <option value=\"cobol\">COBOL</option> <option value=\"cpp\">C++</option> <option value=\"cpp-qt\" class=\"sublang\">&nbsp;&nbsp;C++ (QT)</option> <option value=\"csharp\">C#</option> <option value=\"css\">CSS</option> <option value=\"cuesheet\">Cuesheet</option> <option value=\"d\">D</option> <option value=\"dcs\">DCS</option> <option value=\"delphi\">Delphi</option> <option value=\"diff\">Diff</option> <option value=\"div\">DIV</option> <option value=\"dos\">DOS</option> <option value=\"dot\">dot</option> <option value=\"ecmascript\">ECMAScript</option> <option value=\"eiffel\">Eiffel</option> <option value=\"email\">eMail (mbox)</option> <option value=\"erlang\">Erlang</option> <option value=\"fo\">FO (abas-ERP)</option> <option value=\"fortran\">Fortran</option> <option value=\"freebasic\">FreeBasic</option> <option value=\"fsharp\">F#</option> <option value=\"gambas\">GAMBAS</option> <option value=\"gdb\">GDB</option> <option value=\"genero\">genero</option> <option value=\"genie\">Genie</option> <option value=\"gettext\">GNU Gettext</option> <option value=\"glsl\">glSlang</option> <option value=\"gml\">GML</option> <option value=\"gnuplot\">Gnuplot</option> <option value=\"groovy\">Groovy</option> <option value=\"gwbasic\">GwBasic</option> <option value=\"haskell\">Haskell</option> <option value=\"hicest\">HicEst</option> <option value=\"hq9plus\">HQ9+</option> <option value=\"html4strict\">HTML</option> <option value=\"icon\">Icon</option> <option value=\"idl\">Uno Idl</option> <option value=\"ini\">INI</option> <option value=\"inno\">Inno</option> <option value=\"intercal\">INTERCAL</option> <option value=\"io\">Io</option> <option value=\"j\">J</option> <option value=\"java\">Java</option> <option value=\"java5\">Java(TM) 2 Platform Standard Edition 5.0</option> <option value=\"javascript\">Javascript</option> <option value=\"jquery\">jQuery</option> <option value=\"kixtart\">KiXtart</option> <option value=\"klonec\">KLone C</option> <option value=\"klonecpp\">KLone C++</option> <option value=\"latex\">LaTeX</option> <option value=\"lisp\">Lisp</option> <option value=\"locobasic\">Locomotive Basic</option> <option value=\"logtalk\">Logtalk</option> <option value=\"lolcode\">LOLcode</option> <option value=\"lotusformulas\">Lotus Notes @Formulas</option> <option value=\"lotusscript\">LotusScript</option> <option value=\"lscript\">LScript</option> <option value=\"lsl2\">LSL2</option> <option value=\"lua\">Lua</option> <option value=\"m68k\">Motorola 68000 Assembler</option> <option value=\"magiksf\">MagikSF</option> <option value=\"make\">GNU make</option> <option value=\"mapbasic\">MapBasic</option> <option value=\"matlab\">Matlab M</option> <option value=\"mirc\">mIRC Scripting</option> <option value=\"mmix\">MMIX</option> <option value=\"modula2\">Modula-2</option> <option value=\"modula3\">Modula-3</option> <option value=\"mpasm\">Microchip Assembler</option> <option value=\"mxml\">MXML</option> <option value=\"mysql\">MySQL</option> <option value=\"newlisp\">newlisp</option> <option value=\"nsis\">NSIS</option> <option value=\"oberon2\">Oberon-2</option> <option value=\"objc\">Objective-C</option> <option value=\"ocaml\">OCaml</option> <option value=\"ocaml-brief\" class=\"sublang\">&nbsp;&nbsp;OCaml (brief)</option> <option value=\"oobas\">OpenOffice.org Basic</option> <option value=\"oracle11\">Oracle 11 SQL</option> <option value=\"oracle8\">Oracle 8 SQL</option> <option value=\"oxygene\">Oxygene (Delphi Prism)</option> <option value=\"oz\">OZ</option> <option value=\"pascal\">Pascal</option> <option value=\"pcre\">PCRE</option> <option value=\"per\">per</option> <option value=\"perl\">Perl</option> <option value=\"perl6\">Perl 6</option> <option value=\"pf\">OpenBSD Packet Filter</option> <option value=\"php\">PHP</option> <option value=\"php-brief\" class=\"sublang\">&nbsp;&nbsp;PHP (brief)</option> <option value=\"pic16\">PIC16</option> <option value=\"pike\">Pike</option> <option value=\"pixelbender\">Pixel Bender 1.0</option> <option value=\"plsql\">PL/SQL</option> <option value=\"postgresql\">PostgreSQL</option> <option value=\"povray\">POVRAY</option> <option value=\"powerbuilder\">PowerBuilder</option> <option value=\"powershell\">PowerShell</option> <option value=\"progress\">Progress</option> <option value=\"prolog\">Prolog</option> <option value=\"properties\">PROPERTIES</option> <option value=\"providex\">ProvideX</option> <option value=\"purebasic\">PureBasic</option> <option value=\"python\">Python</option> <option value=\"q\">q/kdb+</option> <option value=\"qbasic\">QBasic/QuickBASIC</option> <option value=\"rails\">Rails</option> <option value=\"rebol\">REBOL</option> <option value=\"reg\">Microsoft Registry</option> <option value=\"robots\">robots.txt</option> <option value=\"rpmspec\">RPM Specification File</option> <option value=\"rsplus\">R / S+</option> <option value=\"ruby\">Ruby</option> <option value=\"sas\">SAS</option> <option value=\"scala\">Scala</option> <option value=\"scheme\">Scheme</option> <option value=\"scilab\">SciLab</option> <option value=\"sdlbasic\">sdlBasic</option> <option value=\"smalltalk\">Smalltalk</option> <option value=\"smarty\">Smarty</option> <option value=\"sql\">SQL</option> <option value=\"systemverilog\">SystemVerilog</option> <option value=\"tcl\">TCL</option> <option value=\"teraterm\">Tera Term Macro</option> <option value=\"text\">Text</option> <option value=\"thinbasic\">thinBasic</option> <option value=\"tsql\">T-SQL</option> <option value=\"typoscript\">TypoScript</option> <option value=\"unicon\">Unicon (Unified Extended Dialect of Icon)</option> <option value=\"vala\">Vala</option> <option value=\"vb\">Visual Basic</option> <option value=\"vbnet\">vb.net</option> <option value=\"verilog\">Verilog</option> <option value=\"vhdl\">VHDL</option> <option value=\"vim\">Vim Script</option> <option value=\"visualfoxpro\">Visual Fox Pro</option> <option value=\"visualprolog\">Visual Prolog</option> <option value=\"whitespace\">Whitespace</option> <option value=\"whois\">Whois (RPSL format)</option> <option value=\"winbatch\">Winbatch</option> <option value=\"xbasic\">XBasic</option> <option value=\"xml\">XML</option> <option value=\"xorg_conf\">Xorg configuration</option> <option value=\"xpp\">X++</option> <option value=\"z80\">ZiLOG Z80 Assembler</option> </select></div>";

						if(is_array($CONFIG['pb_lifespan']) && count($CONFIG['pb_lifespan']) > 1)
							{
								echo "<div id=\"lifespanContainer\"><label for=\"lifespan\">Paste Expiration</label> <select name=\"lifespan\" id=\"lifespan\">";

								foreach($CONFIG['pb_lifespan'] as $span)
									{
										$key = array_keys($CONFIG['pb_lifespan'], $span);
										$key = $key[0];
										$options .= "<option value=\"" . $key . "\">" . $bin->event(time() - ($span * 24 * 60 * 60), TRUE) . "</option>";
									}

								$selecter = '/\>0 seconds/';
								$replacer = '>Never';
								$options = preg_replace($selecter, $replacer, $options, 1);

								echo $options;

								echo "</select></div>";
							}  elseif(is_array($CONFIG['pb_lifespan']) && count($CONFIG['pb_lifespan']) == 1)
								{
									echo "<div id=\"lifespanContainer\"><label for=\"lifespan\">Paste Expiration</label>";

									echo " <div id=\"expireTime\"><input type=\"hidden\" name=\"lifespan\" value=\"0\" />" . $bin->event(time() - ($CONFIG['pb_lifespan'][0] * 24 * 60 * 60), TRUE) . "</div>";

									echo "</div>";
								} else
									echo "<input type=\"hidden\" name=\"lifespan\" value=\"0\" />";

						if($CONFIG['pb_private'])
							echo "<div id=\"privacyContainer\"><label for=\"privacy\">Paste Visibility</label> <select name=\"privacy\" id=\"privacy\"><option value=\"0\">Public</option> <option value=\"1\">Private</option></select></div>";

						echo "<div class=\"spacer\">&nbsp;</div>";

						echo "<div id=\"authorContainer\"><label for=\"authorEnter\">Your Name</label><br />
						<input type=\"text\" name=\"author\" id=\"authorEnter\" value=\"" . $CONFIG['_temp_pb_author'] . "\" onfocus=\"if(this.value=='" . $CONFIG['_temp_pb_author'] . "')this.value='';\" onblur=\"if(this.value=='')this.value='" . $CONFIG['_temp_pb_author'] . "';\" maxlength=\"32\" /></div>
						" . $uploadForm . "
						<div class=\"spacer\">&nbsp;</div>
						<input type=\"text\" name=\"email\" id=\"poison\" style=\"display: none;\" />
						<div id=\"submitContainer\" class=\"submitContainer\">
							<input type=\"submit\" name=\"submit\" value=\"Submit your paste\" onclick=\"return submitPaste(this);\" id=\"submitButton\" />
						</div>
						</div>
					</form>
				</div>";
				echo "</div>";
			}



?>
	<div class="spacer">&nbsp;</div>
	<div class="spacer">&nbsp;</div>
	<div id="copyrightInfo">Written by <a href="http://knoxious.co.uk/">Knoxious.co.uk</a>, 2010.</div>
	</div>
<?php if($bin->_clipboard() && $requri && $requri != "install")
	echo "<div><span id=\"_clipboard_replace\">YOU NEED FLASH!</span> &nbsp; <span id=\"_clipboardURI_replace\">&nbsp;</span></div>";

if(($requri && $requri != "install") && (!is_bool($pasted['Image']) && !is_numeric($pasted['Image'])) || ($pasted['Video'] && $CONFIG['pb_video']) && !$bin->jQuery())
	echo "<script type=\"text/javascript\">setTimeout(\"toggleWrap()\", 1000); setTimeout(\"toggleStyle()\", 1000);</script>";
elseif(($requri && $requri != "install") && (!is_bool($pasted['Image']) && !is_numeric($pasted['Image'])) || ($pasted['Video'] && $CONFIG['pb_video']) && $bin->jQuery())
	echo "<script type=\"text/javascript\">$(document).ready(function() { setTimeout(\"toggleWrap()\", 1000); setTimeout(\"toggleStyle()\", 1000); });</script>";
else
	echo "<!-- End of Document -->";
?>
</body>
</html>
