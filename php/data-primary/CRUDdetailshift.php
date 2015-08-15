<?php
    include('../utils/DB-Connection.php');
    switch ($_REQUEST['kode_unik']) {
    case 'Create':
        $sql = "INSERT INTO detail_shift_pt VALUES('".$_REQUEST['shift_senin']."','".$_REQUEST['id_pt']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_pt VALUES('".$_REQUEST['shift_selasa']."','".$_REQUEST['id_pt']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_pt VALUES('".$_REQUEST['shift_rabu']."','".$_REQUEST['id_pt']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_pt VALUES('".$_REQUEST['shift_kamis']."','".$_REQUEST['id_pt']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_pt VALUES('".$_REQUEST['shift_jumat']."','".$_REQUEST['id_pt']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_pt VALUES('".$_REQUEST['shift_sabtu']."','".$_REQUEST['id_pt']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_pt VALUES('".$_REQUEST['shift_ahad']."','".$_REQUEST['id_pt']."')";
        mysql_query($sql);
        
        $sql = "INSERT INTO detail_shift_ptt VALUES('".$_REQUEST['id_ptt']."','".$_REQUEST['shift_senin']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_ptt VALUES('".$_REQUEST['id_ptt']."','".$_REQUEST['shift_selasa']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_ptt VALUES('".$_REQUEST['id_ptt']."','".$_REQUEST['shift_rabu']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_ptt VALUES('".$_REQUEST['id_ptt']."','".$_REQUEST['shift_kamis']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_ptt VALUES('".$_REQUEST['id_ptt']."','".$_REQUEST['shift_jumat']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_ptt VALUES('".$_REQUEST['id_ptt']."','".$_REQUEST['shift_sabtu']."')";
        mysql_query($sql);
        $sql = "INSERT INTO detail_shift_ptt VALUES('".$_REQUEST['id_ptt']."','".$_REQUEST['shift_ahad']."')";
        mysql_query($sql);
    break;
    default:
    break;
}
?>