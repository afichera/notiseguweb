<?php 
	session_start();
	session_destroy();
				
	echo '<html><head></head><body>';
	echo '<script language="javascript">';
	echo 'window.location="index.php"';
	echo '</script>';
	echo '</body></html>';

?>