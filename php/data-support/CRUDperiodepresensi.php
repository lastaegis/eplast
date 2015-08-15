<?php
    include '../utils/DB-Connection.php';
    switch ($_REQUEST['kode_unik']) {
    case "Create":
        
    break;
    case "Check" :
        $sql = "SELECT DATE(NOW())";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $tanggal_hari_ini = $row[0];
        
        $sql = "SELECT * FROM periode_presensi WHERE (NOW() BETWEEN AWL_PRDE_PRSNS AND AKHR_PRDE_PRSNS)";
    break;
    default:
        break;
}
?>