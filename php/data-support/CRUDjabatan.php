<?php
    include('../utils/DB-Connection.php');
    switch ($_REQUEST['kode_unik']) {
    case "Create":
        $sql = "INSERT INTO jabatan VALUES(".$_REQUEST['id_jabatan'].",'".$_REQUEST['nama_jabatan']."','".$_REQUEST['gaji_jabatan']."','".$_REQUEST['status_shift']."')";
        mysql_query($sql);
        echo $_REQUEST['nama_jabatan'];
    break;
    case "Update":
        $sql = "UPDATE jabatan SET jbtn = '".$_REQUEST['nama_jabatan']."', gj_jbtn = '".$_REQUEST['gaji_jabatan']."' WHERE id_jbtn='".$_REQUEST['id_jabatan']."'";
        mysql_query($sql) or die(mysql_error());
    break;
    case "Delete":
        $sql = "DELETE FROM jabatan WHERE id_jbtn='".$_REQUEST['id_jabatan']."'";
        mysql_query($sql) or die(mysql_error());
    break;
    case "Read_All":
        $sql = "SELECT * FROM jabatan";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<tr>";
            echo "<td id='data_id_jabatan'>".$row[0]."</td>";
            echo "<td id='data_nama_jabatan'>".$row[1]."</td>";
            echo "<td id='data_gaji_jabatan'>".$row[2]."</td>";
            echo "<td><button type='button' class='ui green button' onclick='get_jabatan(this)'>Update</button> <button type='button' class='ui red button' onclick='hapus_jabatan(this)'>Hapus</button></td>";
            echo "</tr>";
        }
    break;
    case "Generate_ID":
        $sql = "SELECT id_jbtn FROM jabatan ORDER BY id_jbtn DESC LIMIT 1";
        $result = mysql_query($sql) or die(mysql_error());
        if(mysql_num_rows($result) == 0){
            $sql = "SELECT CONCAT('1')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            echo $row[0];
        }
        else{
            $row = mysql_fetch_array($result);
            $id_jabatan = $row[0];
            $kode_baru_id_jabatan = $id_jabatan + 1;
            
            $sql = "SELECT CONCAT('".$kode_baru_id_jabatan."')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            echo $row[0];
        }
    break;
    case "Read_All_Dropdown":
        echo "<option value=''>-- Pilih Jabatan --</option>";
        $sql = "SELECT * FROM jabatan";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }
    break;
    case "Read_Shift_Dalam_Jabatan" :
        $sql = "SELECT stts_shft FROM jabatan WHERE id_jbtn = '".$_REQUEST['kode_jabatan']."'";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        echo $row[0];
    break;
    default:
    break;
}
?>