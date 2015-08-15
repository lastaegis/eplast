<?php
    session_start();
    include './DB-Connection.php';
    
    $sql = "SELECT otrts FROM otoritas WHERE usr='".$_REQUEST['usr']."' AND pass='".$_REQUEST['pass']."'";
    $result = mysql_query($sql) or die(mysql_error());
    $countResult = mysql_num_rows($result);
    if($countResult == 0){
        $array = array('status'=>'Error');
        echo json_encode($array);
    }
    else{
        $row = mysql_fetch_array($result);
        $_SESSION['otrts'] = $row[0];
        $array = array('status'=>'True', 'otrts'=>$row[0]);
        echo json_encode($array);
    }