<?php
    include('../utils/DB-Connection.php');
    switch ($_REQUEST['kode_unik']) {
    case "Create":
        $sql = "INSERT INTO kota VALUES('".$_REQUEST['id_kota']."','".$_REQUEST['kode_provinsi']."','".$_REQUEST['nama_kota']."')";
        mysql_query($sql) or die(mysql_error());
    break;
    case "Update":
        $sql = "UPDATE kota SET id_prov='".$_REQUEST['kode_provinsi']."', kot='".$_REQUEST['nama_kota']."' WHERE id_kot='".$_REQUEST['id_kota']."'";
        mysql_query($sql) or die(mysql_error());
    break;
    case "Delete":
        $sql = "DELETE FROM kota WHERE id_kot='".$_REQUEST['id_kota']."'";
        mysql_query($sql) or die(mysql_error());
    break;
    case "Read_All":
        $sql = "SELECT k.ID_KOT, p.PROV, k.KOT FROM kota k INNER JOIN provinsi p ON p.ID_PROV = k.ID_PROV";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<tr>";
            echo "<td id='data_id_kota'>".$row[0]."</td>";
            echo "<td id='data_kode_provinsi'>".$row[1]."</td>";
            echo "<td id='data_nama_kota'>".$row[2]."</td>";
            echo "<td><button type='button' class='ui green button' onclick='get_kota(this)'>Update</button> <button type='button' class='ui red button' onclick='hapus_kota(this)'>Hapus</button></td>";
            echo "</tr>";
        }
    break;
    case "Generate_ID":
        $sql = "SELECT id_kot FROM kota ORDER BY id_kot DESC LIMIT 1";
        $result = mysql_query($sql) or die(mysql_error());
        if(mysql_num_rows($result) == 0){
            $sql = "SELECT CONCAT('Kot','-','1')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            echo $row[0];
        }
        else{
            $row = mysql_fetch_array($result);
            $id_provinsi = $row[0];
            $kode_id_provinsi = substr($id_provinsi, 4);
            $kode_baru_id_provinsi = $kode_id_provinsi + 1;
            
            $sql = "SELECT CONCAT('Kot','-','".$kode_baru_id_provinsi."')";
            $result = mysql_query($sql) or die(mysql_error());
            $row = mysql_fetch_array($result);
            echo $row[0];
        }
    break;
    case "Read_All_Dropdown_By_Provinsi":
        echo "<option value=''>-- Pilih Kota --</option>";
        $sql = "SELECT * FROM kota WHERE id_prov = '".$_REQUEST['kode_provinsi']."'";
        $result = mysql_query($sql) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
            echo "<option value='".$row[0]."'>".$row[2]."</option>";
        }
    break;
    break;
    default:
    break;
}
?>