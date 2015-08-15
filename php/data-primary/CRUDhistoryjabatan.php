<?php
    include '../utils/DB-Connection.php';
    switch ($_REQUEST['kode_unik']) {
    case "Create":
        $sql = "INSERT INTO history_jabatan VALUES('".$_REQUEST['jabatan']."','".$_REQUEST['id_pt']."',NOW())";
        $reuslt = mysql_query($sql) or die(mysql_error());
    break;
    case "Update":

    break;
    case "Delete":

    break;
    case "Read":

    break;
    default:
        break;
}
?>