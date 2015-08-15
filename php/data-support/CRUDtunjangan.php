<?php
    include '../utils/DB-Connection.php';
    switch ($_REQUEST['kode_unik']) {
    case 'Create':
        $sql = "SELECT CONCAT('TNJNGN-','".$_REQUEST['nama_jabatan']."-')";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $id_tunjangan = $row[0];
        
        $sql = "SELECT NULL FROM tunjangan WHERE id_tnjngn LIKE '%".$id_tunjangan."%'";
        $result = mysql_query($sql) or die(mysql_error());
        $countResult = mysql_num_rows($result);
        if($countResult == 0){
            $sql = "SELECT CONCAT('TNJNGN-','".$_REQUEST['nama_jabatan']."-','1')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $id_tunjangan = $row[0];
        }
        else{
            $new_id = $countResult + 1;
            $sql = "SELECT CONCAT('TNJNGN-','".$_REQUEST['nama_jabatan']."-','".$new_id."')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $id_tunjangan = $row[0];
        }
        
        $sql = "INSERT INTO tunjangan VALUES('".$id_tunjangan."','".$_REQUEST['tunjangan_makan']."','".$_REQUEST['tunjangan_transportasi']."','".$_REQUEST['tunjangan_rumah_tangga']."')";
        $result = mysql_query($sql) or die(mysql_error());
    break;
    case 'Create_Tnjngn_PTT':
        $sql = "INSERT INTO tunjangan VALUES('TNJNGN-PTT',".$_REQUEST['tnjngn_mkn'].",".$_REQUEST['tnjngn_trnsprt'].",0)";
        $result = mysql_query($sql) or die(mysql_error());
    break;
    case 'Update':


    break;
    case 'Delete':


    break;
    case 'Read':


    break;
    case 'Read_Tnjngn_PTT':
        $sql = "SELECT * FROM tunjangan WHERE id_tnjngn='TNJNGN-PTT'";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_assoc($result);
        echo json_encode($row);
    break;
    case 'Generate_ID':
        
    break;
    default:
        break;
}
?>