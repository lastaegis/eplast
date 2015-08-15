<?php
    include('../utils/DB-Connection.php');
    switch ($_REQUEST['kode_unik']){
    case "Create":
        $sql = "SELECT * FROM jabatan WHERE id_jbtn='".$_REQUEST['jabatan']."'";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $jabatan = $row[1];
        
        $sql = "SELECT stts_pt, jml_ank FROM pegawai_tetap WHERE id_pt = '".$_REQUEST['id_pt']."'";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        
        if(($row[0]=="Y") && ($row[1]>=2)){
            $kode_tunjangan = 1;
        }
        else{
            if(($row[0]=="Y") && ($row[1]==1)){
                $kode_tunjangan = 2;
            }
            else{
                if(($row[0]=="Y") && ($row[1]==0)){
                    $kode_tunjangan = 3;
                }
                else{
                    if(($row[0]=="T") && ($row[1]==0)){
                        $kode_tunjangan = 4;
                    }
                }
            }  
        }
        
        $sql = "SELECT * FROM tunjangan WHERE id_tnjngn LIKE 'TNJNGN-".$jabatan."-".$kode_tunjangan."'";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);
        $id_tunjangan = $row[0];
        
        $sql = "INSERT INTO history_tunjangan VALUES('".$id_tunjangan."','".$_REQUEST['id_pt']."',NOW())";
        mysql_query($sql) or die(mysql_error());
    break;
    default:
    break;
    }
?>