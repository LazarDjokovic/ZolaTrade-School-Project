<?php
    $connection=mysql_connect('localhost:3306','','');
    
    $base=mysql_select_db("") or die ("Database is not available");
    
    if(!$connection){
        die("Database connection has expired".mysql_error());
    }
    
    mysql_set_charset("utf-8");
?>
