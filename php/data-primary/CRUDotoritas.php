<?php
    include('../utils/DB-Connection.php');
    switch ($_REQUEST['kode_unik']){
    case "Create":
        $banyak_looping_otoritas = count($_REQUEST['otoritas']);
        if($banyak_looping_otoritas == 0){
            
        }
        else{
            for ($i = 0; $i < $banyak_looping_otoritas; $i++) {
                $sql = "INSERT INTO otoritas VALUES('".$_REQUEST['username_'.$_REQUEST['otoritas'][$i]]."','".$_REQUEST['id_pt']."','".$_REQUEST['password_'.$_REQUEST['otoritas'][$i]]."','".$_REQUEST['otoritas'][$i]."')";
                mysql_query($sql) or die(mysql_error());
            }
        }
    break;
    case "Update":

    break;
    case "Delete":

    break;
    case "Read_All":

    break;
    default:
    break;
}
?>