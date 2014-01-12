<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */


/**
 * Misc functions, output_message for delivery messages to enduser
 *
 * This is a description
 */


	function output_message($message=" "){
        echo "<font color=red>" . $message . "</font>";

	}

	function __autoload($class_name){
		$class_name = strtolower($class_name);
		$path = "../model/{$class_name}.php";
		if (file_exists($path)){
			require_once($path);
		} else {
			die("The file {$class_name}.php could not be found");
		}		
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
		include(VIEW_PATH . $template . '.php');
	}
	
	function log_action($action, $message=""){
		$logfile = DOC_ROOT . '/../logs/log.txt';
		$new = file_exists($logfile) ? false : true;
		if($handle = fopen($logfile, 'a')) { // 'a' for append

			$timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
			$content = "{$timestamp} : {$action} : {$message} \n";

			fwrite($handle, $content);
			fclose($handle);
		} else {
			echo "Could not open file for writing.";
		}

	}

    function tracedump_log(){
        // Dump x
        ob_start();
        var_dump(debug_backtrace());
        $contents = ob_get_contents();
        ob_end_clean();
        log_action('Trace Dump',$contents);
        echo "<font color='red'>SYSTEM CALLED tracedump_log(), check /logs/log.txt </font><br /><br />";
        // error_log($contents);
    }

    function guidv4()
    {
        $data = openssl_random_pseudo_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0010
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
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

