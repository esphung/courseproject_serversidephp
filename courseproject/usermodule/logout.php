<?php
/**
 * 
 * @authors 		eric phung
 * @date    		2017-07-23 03:01:47
 * @purpose 		protocol for when a user is logged out
 */


session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: /courseproject"); // Redirecting To Home Page
}
?>