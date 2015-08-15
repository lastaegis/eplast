<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "eplast";
    
    $firstConnection = mysql_connect($servername, $username, $password);
    mysql_selectdb($databasename, $firstConnection);