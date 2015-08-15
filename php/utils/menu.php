<?php
    switch (urldecode($_REQUEST['otrts'])) {
    case '#!bendahara':
        echo "<a class='item' id='bendahara-home' href='#!bendahara-home' onclick='clicked_menu(event, this)'>"
            ."Home"
            ."</a>"
            ."<a class='item' id='bendahara-pegawai' href='#!bendahara-pegawai' onclick='clicked_menu(event, this)'>"
            ."Pegawai"
            ."</a>"
            ."<a class='item' id='bendahara-presensi' href='#!bendahara-presensi' onclick='clicked_menu(event, this)'>"
            ."Presensi"
            ."</a>"
            ."<a class='item' id='bendahara-penggajian' href='#!bendahara-penggajian' onclick='clicked_menu(event, this)'>"
            ."Penggajian"
            ."</a>"
            ."<a class='item' id='bendahara-cloud' href='#!bendahara-cloud' onclick='clicked_menu(event, this)'>"
            ."Cloud"
            ."</a>"
            ."<div class='right menu'>"
            ."<span class='item' id='waktu_sistem'>"
            ."</span>"
            ."<a class='ui item'>"
            ."Logout"
            ."</a>"
            ."</div>";
    break;
    default:
        break;
}

