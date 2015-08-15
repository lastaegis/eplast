<?php
    include('../utils/DB-Connection.php');
    switch ($_REQUEST['kode_unik']) {
    case "Create":
        $sql = "SELECT DATE(NOW())+0";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $tanggal_hari_ini = $row[0];
        
        $sql = "SELECT CONCAT('PEG-','".$tanggal_hari_ini."','".  preg_replace('/[-]/','',$_REQUEST['tanggal_lahir'])."')";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $id_pegawai_tetap = $row[0];
        
        $sql = "INSERT INTO pegawai_tetap VALUES('".$id_pegawai_tetap."','".$_REQUEST['kota']."','".$_REQUEST['nama']."','".$_REQUEST['jk']."','".$_REQUEST['tanggal_lahir']."','".$_REQUEST['jumlah_anak']."','".$_REQUEST['alamat']."','".$_REQUEST['hp_pt']."','".$_REQUEST['email']."','".$_REQUEST['status_pernikahan']."')";
        mysql_query($sql);
        
        $array = array('id_pegawai_tetap' => $id_pegawai_tetap, 'nama_pegawai_tetap' => $_REQUEST['nama']);
        echo json_encode($array);
    break;
    case "Update":
        
    break;
    case "Delete":
        
    break;
    case "Read_All":
        $sql = "SELECT pt.id_pt, pt.nm_pt, j.jbtn FROM pegawai_tetap pt INNER JOIN history_jabatan hj ON hj.id_pt = pt.id_pt INNER JOIN jabatan j ON j.id_jbtn = hj.id_jbtn";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "<td><button type='button' class='ui blue button'>View</button><button type='button' class='ui green button'>Update</button><button type='button' class='ui red button'>Delete</button></td>";
            echo "</tr>";
        }
    break;
    case "Read_All_JSON":
        $sql = "SELECT pt.id_pt, pt.nm_pt, j.jbtn FROM pegawai_tetap pt INNER JOIN history_jabatan hj ON hj.id_pt = pt.id_pt INNER JOIN jabatan j ON j.id_jbtn = hj.id_jbtn";
        $result = mysql_query($sql) or die(mysql_error());
        $json = array();
        while($row = mysql_fetch_assoc($result)){
            $json['id_pt'] = $row['id_pt'];
            $json['nm_pt'] = $row['nm_pt'];
            $json['jbtn'] = $row['jbtn'];
            $data[] = $json;
        }
        echo json_encode($data);
    break;
    case "Count":
        $sql = "SELECT NULL FROM pegawai_tetap";
        $result = mysql_query($sql) or die(mysql_error());
        $count = mysql_num_rows($result);
        echo $count;
    break;
    default:
    break;
}
?>