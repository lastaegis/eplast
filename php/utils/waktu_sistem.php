<?php
    include './DB-Connection.php';
    $sql = "SELECT NOW()";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
    echo $row[0];