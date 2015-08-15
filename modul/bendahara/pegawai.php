<div class="three wide column">
    <div class="ui vertical menu" id="sub_menu">
        <div class='ui dropdown item' id='dropdown_pegawai_tetap'>
            Pegawai Tetap
            <i class='dropdown icon'></i>
            <div class='menu'>
                <a class='item' id='create_pegawai_tetap' href='bendahara/sub_content_pegawai_tetap/' onclick="load_sub_content(event, this.href, this.id)"><i class='edit icon'></i> Create</a>
                <a class='item' id='table_data_pt' href='bendahara/sub_content_pegawai_tetap/' onclick="load_sub_content(event, this.href, this.id)"><i class='globe icon'></i> Table Data</a>
            </div>
        </div>
        <div class='ui dropdown item' id='dropdown_pegawai_tidak_tetap'>
            Pegawai Tidak Tetap
            <i class='dropdown icon'></i>
            <div class='menu'>
                <a class='item' id='create_ptt' href="bendahara/sub_content_pegawai_tidak_tetap/" onclick="load_sub_content(event, this.href, this.id)"><i class='edit icon'></i> Create</a>
                <a class='item' id='table_data_ptt'href="bendahara/sub_content_pegawai_tidak_tetap/" onclick="load_sub_content(event, this.href, this.id)"><i class='globe icon'></i> Table Data</a>
            </div>
        </div>
    </div>
</div>
<div class="thirteen wide column" id="sub_content">
    <div class="ui raised segment">
        <h3>Tata Cara Penggunaan Modul Pegawai</h3>
        <div class="ui divider"></div>
        <h5>Pegawai Tetap</h5>
        <p>1. Terdapat dua buah sub-menu, yaitu <i>Create</i> dan <i>Table Data</i></p>
        <p>2. Gunakan <i>Create</i> untuk membuat data pegawai tetap baru</p>
        <p>3. Gunakan <i>Table Data</i> untuk melihat data terbaru dan semua data yang tersimpan</p>
        <p>4. Untuk melakukan edit data atau menghapus data gunakan sub-menu <i>Table Data</i></p>
        <p>5. Tahapan pengisian data pegawai tetap adalah biodata pegawai tetap -> Pemilihan shift apabila tersedia -> Pemelihan hak akses apabila diperbolehkan</p>
        <p>6. Tunjangan pegawai tetap akan diseleksi oleh sistem berdasarkan status pernikahan dan jumlah anak yang dimiliki</p>
        <h5>Pegawai Tidak Tetap</h5>
        <p>1. Terdapat dua buah sub-menu, yaitu <i>Create</i> dan <i>Table Data</i></p>
        <p>2. Gunakan <i>Create</i> untuk membuat data pegawai tetap baru</p>
        <p>3. Gunakan <i>Table Data</i> untuk melihat data terbaru dan semua data yang tersimpan</p>
        <p>4. Untuk melakukan edit data atau menghapus data gunakan sub-menu <i>Table Data</i></p>
        <p>5. Tahapan pengisian data pegawai tidak tetap adalah biodata pegawai tidak tetap -> Pemilihan jadwal shift</p>
        <p>6. Tunjangan pegawai tidak tetap bersifat tetap dan langsung ditentukan oleh sistem</p>
    </div>
</div>
<script>
    dropdown_slide_right();
</script>