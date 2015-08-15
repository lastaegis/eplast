<?php
    include('../utils/DB-Connection.php');
    switch ($_REQUEST['kode_unik']) {
    case "Create":
        $sql = "INSERT INTO provinsi VALUES('".$_REQUEST['id_provinsi']."','".$_REQUEST['nama_provinsi']."')";
        mysql_query($sql) or die(mysql_error());
    break;
    case "Update":
        $sql = "UPDATE provinsi SET prov='".$_REQUEST['nama_provinsi']."' WHERE id_prov='".$_REQUEST['id_provinsi']."'";
        mysql_query($sql) or die(mysql_error());
    break;
    case "Delete":
        $sql = "DELETE FROM provinsi WHERE id_prov='".$_REQUEST['id_provinsi']."'";
        mysql_query($sql) or die(mysql_error());
        
        $sql = "SELECT * FROM provinsi";
        $result = mysql_query($sql) or die(mysql_error());
    break;
    case "Read_All":
        $sql = "SELECT * FROM provinsi ORDER BY id_prov";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<tr>";
            echo "<td id='data_id_provinsi'>".$row[0]."</td>";
            echo "<td id='data_nama_provinsi'>".$row[1]."</td>";
            echo "<td><button type='button' class='ui green button' onclick='get_provinsi(this)'>Update</button> <button type='button' class='ui red button' onclick='hapus_provinsi(this)'>Hapus</button></td>";
            echo "</tr>";
        }
    break;
    case "Generate_ID":
        $sql = "SELECT id_prov FROM provinsi ORDER BY id_prov DESC LIMIT 1";
        $result = mysql_query($sql) or die(mysql_error());
        if(mysql_num_rows($result) == 0){
            $sql = "SELECT CONCAT('Prov','-','1')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            echo $row[0];
        }
        else{
            $row = mysql_fetch_array($result);
            $id_provinsi = $row[0];
            $kode_id_provinsi = substr($id_provinsi, 5);
            $kode_baru_id_provinsi = $kode_id_provinsi + 1;
            
            $sql = "SELECT CONCAT('Prov','-','".$kode_baru_id_provinsi."')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            echo $row[0];
        }
    break;
    case "Read_All_Dropdown":
        echo "<option value=''>-- Pilih Provinsi --</option>";
        $sql = "SELECT * FROM provinsi ORDER BY id_prov";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<option value='".$row[0]."'>".$row[1]."</td>";
        }   
    break;
    case "Read_All_Dropdown_Update":
        $sql = "(SELECT * FROM provinsi WHERE id_prov IN (SELECT id_prov FROM kota WHERE id_kot = '".$_REQUEST['id_kota']."'))"
            ."UNION"
            ."(SELECT * FROM provinsi WHERE id_prov NOT IN (SELECT id_prov FROM kota WHERE id_kot = '".$_REQUEST['id_kota']."'))";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }
    break;
    default:
    break;
}
?>