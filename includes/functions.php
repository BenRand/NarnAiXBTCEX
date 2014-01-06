<?php

/**
 * Misc functions, output_message for delivery messages to enduser
 *
 * This is a description
 */

	function output_message($message=" "){


	}

	function __autoload($class_name){
		
		
	}

	function redirect_to($location)
		{
    		if (!headers_sent($file, $line))
    	{
    	    header("Location: " . $location);
    	} else {
    	    printf("<script>location.href='%s';</script>", urlencode($location));
    	    # or deal with the problem
    	}
    	printf('<a href="%s">Moved</a>', urlencode($location));
    	exit;
	}

	function include_page_template($template=""){
		include(DOC_ROOT . '/../includes/' . $template . '.php');
	}
	
	function log_action($action, $message=""){
		$logfile = DOC_ROOT . '/../logs/log.txt';
		$new = file_exists($logfile) ? false : true;
		if($handle = fopen($logfile, 'a')) { // 'a' for append

			$timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
			$content = "{$timestamp} : {$message} : {$action} \n";

			fwrite($handle, $content);
			fclose($handle);
		} else {
			echo "Could not open file for writing.";
		}

	}
	//
	//	SNIPITS
	//
	//
	//	echo 'DocRoot: ' . $_SERVER["DOCUMENT_ROOT"] . '<br><br>';
	//	echo dirname(__FILE__) . ' <br><br>';
	//	
	//	
	//	
	//	

?>