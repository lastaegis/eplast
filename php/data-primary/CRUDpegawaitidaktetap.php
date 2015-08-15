<?php
    include '../utils/DB-Connection.php';
    switch ($_REQUEST['kode_unik']) {
    case 'Create':
        $sql = "SELECT NOW()+0";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $tanggal_hari_ini = $row[0];
        
        $sql = "SELECT CONCAT('PTT-','".$tanggal_hari_ini."')";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $id_pegawai_tidak_tetap = $row[0];
        
        $sql = "INSERT INTO pegawai_tidak_tetap VALUES('".$id_pegawai_tidak_tetap."','".$_REQUEST['kota']."','TNJNGN-PTT','".$_REQUEST['nama_ptt']."','".$_REQUEST['jk']."','".$_REQUEST['hp_ptt']."','".$_REQUEST['alamat']."')";
        mysql_query($sql) or die(mysql_error());
        
        $array = array('id_pegawai_tidak_tetap' => $id_pegawai_tidak_tetap, 'nama_pegawai_tidak_tetap' => $_REQUEST['nama_ptt']);
        echo json_encode($array);
    break;
    case 'Update':

    break;
    case 'Delete':

    break;
    case 'Read_All':
        $sql = "SELECT * FROM pegawai_tidak_tetap";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[3]."</td>";
            echo "<td><button type='button' class='ui blue button'>View</button><button type='button' class='ui green button'>Update</button><button type='button' class='ui red button'>Delete</button></td>";
            echo "</tr>";
        }
    break;
    case 'Count':
        $sql = "SELECT NULL FROM pegawai_tidak_tetap";
        $result = mysql_query($sql) or die(mysql_error());
        $countResult = mysql_num_rows($result);
        echo $countResult;
    break;
    default:
        break;
}
?>