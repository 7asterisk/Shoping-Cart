<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'demo');
//database connection details
    $connect = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Could not connect to MySQL: ' . mysql_error());    
//your database name
    $cid = mysql_select_db(DB_DATABASE) or die('Could not connect to DATABASE: ' . mysql_error());    
?>