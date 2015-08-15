<div class="ui raised segment">
    <form class="ui form" id="form_pt">
        <div class="ui horizontal divider header">
            <h4 id="title_form_pt">Form Pegawai Tetap - Biodata (1/3)</h4>
        </div>
        <div class="field">
            <label>Nama Pegawai</label>
            <input type="text" name="nama" placeholder="Nama Lengkap Pegawai">
        </div>
        <div class="field">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir">
        </div>
        <div class="inline fields">
            <label for="jk">Jenis Kelamin :</label>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="jk" value="P" tabindex="0" class="hidden">
                    <label>Pria</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="jk" value="W" tabindex="0" class="hidden">
                    <label>Wanita</label>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Kota Kelahiran</label>
            <div class="sixteen wide fields">
                <div class="seven wide field">
                    <select class="ui dropdown" name="provinsi" id="provinsi" onchange="read_all_dropdown_kota(this.value)">
                        <option value="">-- Pilih Provinsi --</option>
                    </select>
                </div>
                <div class="one wide field">
                    <button type="button" class="ui blue button" onclick="show_modal_input_provinsi(this)">+</button>
                </div>
                <div class="seven wide field">
                    <select class="ui dropdown" name="kota" id="kota">
                        <option value="">-- Pilih Kota --</option>
                    </select>
                </div>
                <div class="one wide field">
                    <button type="button" class="ui blue button" onclick="show_modal_input_kota(this)">+</button>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Alamat Lengkap Pegawai">
        </div>
        <div class="field">
            <label>Nomer Handphone</label>
            <input type="text" name="hp_pt" placeholder="Nomer Handphone">
        </div>
        <div class="field">
            <label>Email</label>
            <input type="text" name="email" placeholder="Email Pegawai">
        </div>
        <div class="inline fields">
            <label for="jk">Status Pernikahan :</label>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="status_pernikahan" id="pernikahan_ya" value="Y" tabindex="0" class="hidden" onchange="enable_jumlah_anak(document.getElementById('pernikahan_ya'), document.getElementById('pernikahan_tidak'))">
                    <label>Iya</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox">
                    <input type="radio" name="status_pernikahan" id="pernikahan_tidak" value="T" tabindex="0" class="hidden" onchange="enable_jumlah_anak(document.getElementById('pernikahan_ya'), document.getElementById('pernikahan_tidak'))">
                    <label>Tidak</label>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Jumlah Anak</label>
            <input type="text" name="jumlah_anak" id="jumlah_anak" value="0" readonly>
        </div>
        <div class="field">
            <button class="ui blue submit button" onclick="simpan_pegawai_tetap(this, document.getElementById('form_pt_2').innerHTML)">Submit (1/3)</button>
        </div>
    </form>
    <form class="ui form" id="form_pt_2" hidden>
        <div class="ui horizontal divider header">
            <h4 id="title_form_pt">Form Pegawai Tetap - Jabatan Dan Shift (2/3)</h4>
        </div>
        <div class="field">
            <label>ID Pegawai Tetap</label>
            <input type="text" name="id_pt" id="id_pt_tunjangan" readonly>
        </div>
        <div class="field">
            <label>Nama Pegawai Tetap</label>
            <input type="text" name="nama_pt" id="nama_pt_tunjangan" readonly>
        </div>
        <div class="field">
            <label>Jabatan</label>
            <div class="sexteen wide fields">
                <div class="fifteen wide field">
                    <select class="ui dropdown" name="jabatan" id="jabatan" onchange="shift_jabatan(this.value)">
                        <option value="">-- Pilih Jabatan --</option>
                    </select>
                </div>
                <div class="one wide field">
                    <button type="button" class="ui blue button" onclick="show_modal_input_jabatan(this)">+</button>
                </div>
            </div>
        </div>
        <div class="field">
            <label>Shift</label>
            <span id="note_shift">Shift akan tersedia saat jabatan memiliki shift. Apabila tidak maka lanjutkan pada field selanjutnya.</span>
            <table class="ui celled bordered table" id="table_shift" hidden>
                <thead>
                    <tr>
                        <th rowspan="2">Hari</th>
                        <th colspan="3">Jadwal Shift</th>
                        <th rowspan="2">Reset</th>
                    </tr>
                    <tr>
                        <th>Shift 1 (06:00:00 - 14:00:00)</th>
                        <th>Shift 2 (14:00:00 - 22:00:00)</th>
                        <th>Shift 3 (22:00:00 - 05:00:00)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Senin</td>
                        <td id="radio1"><input type="radio" name="shift_senin" value="SF-1" id="mark_position"></td>
                        <td id="radio2"><input type="radio" name="shift_senin" value="SF-2" id="mark_position"></td>
                        <td id="radio3"><input type="radio" name="shift_senin" value="SF-3" id="mark_position"></td>
                        <td><button type="button" class="ui blue button" onclick="reset_shift(this)"><i class="ui repeat icon"></i> Reset</button></td>
                    </tr>
                        <td>Selasa</td>
                        <td id="radio1"><input type="radio" name="shift_selasa" value="SF-4" id="mark_position"></td>
                        <td id="radio2"><input type="radio" name="shift_selasa" value="SF-5" id="mark_position"></td>
                        <td id="radio3"><input type="radio" name="shift_selasa" value="SF-6" id="mark_position"></td>
                        <td><button type="button" class="ui blue button" onclick="reset_shift(this)"><i class="ui repeat icon"></i> Reset</button></td>
                    </tr>
                        <td>Rabu</td>
                        <td id="radio1"><input type="radio" name="shift_rabu" value="SF-7" id="mark_position"></td>
                        <td id="radio2"><input type="radio" name="shift_rabu" value="SF-8" id="mark_position"></td>
                        <td id="radio3"><input type="radio" name="shift_rabu" value="SF-9" id="mark_position"></td>
                        <td><button type="button" class="ui blue button" onclick="reset_shift(this)"><i class="ui repeat icon"></i> Reset</button></td>
                    </tr>
                        <td>Kamis</td>
                        <td id="radio1"><input type="radio" name="shift_kamis" value="SF-10" id="mark_position"></td>
                        <td id="radio2"><input type="radio" name="shift_kamis" value="SF-11" id="mark_position"></td>
                        <td id="radio3"><input type="radio" name="shift_kamis" value="SF-12" id="mark_position"></td>
                        <td><button type="button" class="ui blue button" onclick="reset_shift(this)"><i class="ui repeat icon"></i> Reset</button></td>
                    </tr>
                        <td>Jum'at</td>
                        <td id="radio1"><input type="radio" name="shift_jumat" value="SF-13" id="mark_position"></td>
                        <td id="radio2"><input type="radio" name="shift_jumat" value="SF-14" id="mark_position"></td>
                        <td id="radio3"><input type="radio" name="shift_jumat" value="SF-15" id="mark_position"></td>
                        <td><button type="button" class="ui blue button" onclick="reset_shift(this)"><i class="ui repeat icon"></i> Reset</button></td>
                    </tr>
                        <td>Sabtu</td>
                        <td id="radio1"><input type="radio" name="shift_sabtu" value="SF-16" id="mark_position"></td>
                        <td id="radio2"><input type="radio" name="shift_sabtu" value="SF-17" id="mark_position"></td>
                        <td id="radio3"><input type="radio" name="shift_sabtu" value="SF-18" id="mark_position"></td>
                        <td><button type="button" class="ui blue button" onclick="reset_shift(this)"><i class="ui repeat icon"></i> Reset</button></td>
                    </tr>
                        <td>Ahad</td>
                        <td id="radio1"><input type="radio" name="shift_ahad" value="SF-19" id="mark_position"></td>
                        <td id="radio2"><input type="radio" name="shift_ahad" value="SF-20" id="mark_position"></td>
                        <td id="radio3"><input type="radio" name="shift_ahad" value="SF-21" id="mark_position"></td>
                        <td><button type="button" class="ui blue button" onclick="reset_shift(this)"><i class="ui repeat icon"></i> Reset</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="field">
            <button type="button" class="ui blue button" onclick="simpan_jabatan_dan_shift(this)">Submit (2/3)</button>
        </div>
    </form>
    <form class="ui form" id="form_pt_3" hidden>
        <div class="ui horizontal divider header">
            <h4 id="title_form_pt">Form Pegawai Tetap - Otoritas Akses Yang Diberikan (3/3)</h4>
        </div>
        <div class="field">
            <label>ID Pegawai Tetap</label>
            <input type="text" name="id_pt" id="id_pt_otoritas" readonly>
        </div>
        <div class="field">
            <label>Nama Pegawai Tetap</label>
            <input type="text" name="nama_pt" id="nama_pt_otoritas" readonly>
        </div>
        <div class="field">
            <div class="ui segment">
                <div class="ui slider checkbox field" id="bendahara">
                    <input type="checkbox" name="otoritas[]" value="bendahara" onchange="show_username_password(document.getElementById('bendahara'))">
                    <label>Bendahara</label>
                </div>
                <div class="field">
                    <input type="text" name="username_bendahara" id="username_bendahara" placeholder="Username Bendahara" hidden>
                </div>
                <div class="field">
                    <input type="password" name="password_bendahara" id="password_bendahara" placeholder="Password Bendahara" hidden>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui slider checkbox field" id="koordinator_produksi">
                    <input type="checkbox" name="otoritas[]" value="koordinator_produksi" onchange="show_username_password(document.getElementById('koordinator_produksi'))">
                    <label>Koordinator Produksi</label>
                </div>
                <div class="field">
                    <input type="text" name="username_koordinator_produksi" id="username_koordinator_produksi" placeholder="Username Produksi" hidden>
                </div>
                <div class="field">
                    <input type="password" name="password_koordinator_produksi" id="password_koordinator_produksi" placeholder="Password Produksi" hidden>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui slider checkbox field" id="manager_keuangan">
                    <input type="checkbox" name="otoritas[]" value="manager_keuangan" onchange="show_username_password(document.getElementById('manager_keuangan'))">
                    <label>Manager Keuangan</label>
                </div>
                <div class="field">
                    <input type="text" name="username_manager_keuangan" id="username_manager_keuangan" placeholder="Username Manager Keuangan" hidden>
                </div>
                <div class="field">
                    <input type="password" name="password_manager_keuangan" id="password_manager_keuangan" placeholder="Password Manager Keuangan" hidden>
                </div>
            </div>
            <div class="ui segment">
                <div class="ui slider checkbox field" id="manager_produksi">
                    <input type="checkbox" name="otoritas[]" value="manager_produksi" onchange="show_username_password(document.getElementById('manager_produksi'))">
                    <label>Manager Produksi</label>
                </div>
                <div class="field">
                    <input type="text" name="username_manager_produksi" id="username_manager_produksi" placeholder="Username Manager Produksi" hidden>
                </div>
                <div class="field">
                    <input type="password" name="password_manager_produksi" id="password_manager_produksi" placeholder="Password Manager Produksi" hidden>
                </div>
            </div>
        </div>
        <div class="field">
            <button type="button" class="ui blue button" onclick="simpan_otoritas(this)">Submit(3/3)</button>
        </div>
    </form>
    <form class="ui form" id="pt_tersimpan" hidden>
        <div class="ui horizontal divider header">
            <h4>Data Pegawai Telah Tersimpan</h4>
        </div>
        <p>Data pegawai telah tersimpan. Untuk melihat data yang disimpan klik <a id="table_data_pt" href="bendahara/sub_content_pegawai_tetap/" onclick="load_sub_content(event, this.href, this.id)">Disni</a> dan untuk kembali ke form pendaftaran pegawai tetap klik <a id="create_pegawai_tetap" href="bendahara/sub_content_pegawai_tetap/" onclick="load_sub_content(event, this.href, this.id)">Disini</a></p>
    </form>
</div>
<div class="ui modal" id="modal_input_provinsi">
    <i class="close icon"></i>
    <div class="header">
        Input Data Provinsi
    </div>
    <div class="content">
        <form class="ui form" id="form_provinsi">
            <div class="field">
                <label>ID Provinsi</label>
                <input type="text" name="id_provinsi" id="id_provinsi" readonly>
            </div>
            <div class="field">
                <label>Provinsi</label>
                <input type="text" name="nama_provinsi" id="nama_provinsi" placeholder="Nama Provinsi">
            </div>
            <div class="field">
                <button class="ui blue submit button" onclick="simpan_provinsi(this)" id="simpanprovinsi">Simpan</button>
                <button class="ui blue submit button" onclick="update_provinsi()" id="updateprovinsi" disabled>Update</button>
                <button type="button" class="ui blue button" onclick="batal_update_provinsi(this)" id="batalupdate_provinsi" disabled>Batal Update</button>
            </div>
        </form>
        <table class="ui table table-striped" id="table_provinsi">
            <thead>
                <tr>
                    <th>ID Provinsi</th>
                    <th>Provinsi</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody id="data_provinsi">
                <!--Render Data Provinsi-->
            </tbody>
        </table>
    </div>
</div>
<div class="ui modal" id="modal_input_kota">
    <i class="close icon"></i>
    <div class="header">
        Input Data Kota
    </div>
    <div class="content">
        <form class="ui form" id="form_kota">
            <div class="field">
                <label>ID Kota</label>
                <input type="text" name="id_kota" id="id_kota" readonly>
            </div>
            <div class="field">
                <label>Provinsi</label>
                <select name="kode_provinsi" id="kode_provinsi">
                    <!--Render Dropdown Provinsi-->
                </select>
            </div>
            <div class="field">
                <label>Kota</label>
                <input type="text" name="nama_kota" id="nama_kota" placeholder="Nama Kota">
            </div>
            <div class="field">
                <button class="ui blue submit button" onclick="simpan_kota()" id="simpankota">Simpan</button>
                <button class="ui blue submit button" onclick="update_kota()" id="updatekota" disabled>Update</button>
                <button type="button" class="ui blue button" onclick="batal_update_kota(this)" id="batalupdate_kota" disabled>Batal Update</button>
            </div>
        </form>
        <table class="ui table table-striped" id="table_kota">
            <thead>
                <tr>
                    <th>ID Kota</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody id="data_kota">
                <!-- Render Data Kota-->
            </tbody>
        </table>
    </div>
    <div class="actions">
        <button type="button" class="ui blue button" onclick="show_modal_input_pegawai_tetap()">Kembali</button>
    </div>
</div>
<div class="ui modal" id="modal_input_jabatan">
    <i class="close icon"></i>
    <div class="header">
        Input Data Jabatan
    </div>
    <div class="content">
        <form class="ui form" id="form_jabatan">
            <div class="field">
                <label>ID Jabatan</label>
                <input type="text" name="id_jabatan" id="id_jabatan" readonly>
            </div>
            <div class="field">
                <label>Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan" placeholder="Nama Jabatan">
            </div>
            <div class="field">
                <label>Gaji Jabatan</label>
                <input type="text" name="gaji_jabatan" id="gaji_jabatan" placeholder="Gaji Jabatan">
            </div>
            <div class="field">
                <label>Apakah Jabatan Ini Memiliki Shift ?</label>
                <div class="two fields">
                    <div class="field">
                        <div class="ui slider checkbox" id="shift_ya">
                            <input type="radio" name="status_shift" value="Y">
                            <label>Ya</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui slider checkbox" id="pernikahan_tidak">
                            <input type="radio" name="status_shift" value="T">
                            <label>Tidak</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <button class="ui blue submit button" onclick="simpan_jabatan(this)" id="simpanjabatan">Simpan</button>
                <button class="ui blue submit button" onclick="update_jabatan()" id="updatejabatan" disabled>Update</button>
                <button type="button" class="ui blue button" onclick="batal_update_jabatan(this)" id="batalupdate_jabatan" disabled>Batal Update</button>
            </div>
        </form>
        <table class="ui table table-striped" id="table_jabatan">
            <thead>
                <tr>
                    <th>ID Jabatan</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Kontrol</th>
                </tr>
            </thead>
            <tbody id="data_jabatan">

            </tbody>
        </table>
    </div>
    <div class="actions">
        <button type="button" class="ui blue button" onclick="show_modal_input_pegawai_tetap()">Kembali</button>
    </div>
</div>
<div class="ui modal" id="modal_input_tunjangan">
    <div class="header">
        Input Data Tunjangan
    </div>
    <div class="content">
        <form class="ui form" id="form_tunjangan_1">
            <div class="ui four steps">
                <div class="active step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 1</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 2 atau lebih anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 2</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 1 anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 3</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Tidak memiliki anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 4</div>
                            <div class="ui divider"></div>
                            <span>Tidak Menikah dan Tidak Memiliki Anak</span>
                        </center>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan_1" readonly>
            </div>
            <div class="field">
                <label>Tunjangan Makan</label>
                <input type="text" name="tunjangan_makan">
            </div>
            <div class="field">
                <label>Tunjangan Transportasi</label>
                <input type="text" name="tunjangan_transportasi">
            </div>
            <div class="field">
                <label>Tunjangan Keluarga</label>
                <input type="text" name="tunjangan_rumah_tangga">
            </div>
            <div class="field">
                <button type="button" class="ui blue button" onclick="simpan_tunjangan_1()">Submit (1/4)</button>
            </div>
        </form>
        <form class="ui form" id="form_tunjangan_2" hidden>
            <div class="ui four steps">
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 1</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 2 atau lebih anak</span>
                        </center>
                    </div>
                </div>
                <div class="active step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 2</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 1 anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 3</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Tidak memiliki anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 4</div>
                            <div class="ui divider"></div>
                            <span>Tidak Menikah dan Tidak Memiliki Anak</span>
                        </center>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan_2" readonly>
            </div>
            <div class="field">
                <label>Tunjangan Makan</label>
                <input type="text" name="tunjangan_makan">
            </div>
            <div class="field">
                <label>Tunjangan Transportasi</label>
                <input type="text" name="tunjangan_transportasi">
            </div>
            <div class="field">
                <label>Tunjangan Keluarga</label>
                <input type="text" name="tunjangan_rumah_tangga">
            </div>
            <div class="field">
                <button type="button" class="ui blue button" onclick="simpan_tunjangan_2()">Submit (2/4)</button>
            </div>
        </form>
        <form class="ui form" id="form_tunjangan_3" hidden>
            <div class="ui four steps">
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 1</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 2 atau lebih anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 2</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 1 anak</span>
                        </center>
                    </div>
                </div>
                <div class="active step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 3</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Tidak memiliki anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 4</div>
                            <div class="ui divider"></div>
                            <span>Tidak Menikah dan Tidak Memiliki Anak</span>
                        </center>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan_3" readonly>
            </div>
            <div class="field">
                <label>Tunjangan Makan</label>
                <input type="text" name="tunjangan_makan">
            </div>
            <div class="field">
                <label>Tunjangan Transportasi</label>
                <input type="text" name="tunjangan_transportasi">
            </div>
            <div class="field">
                <label>Tunjangan Keluarga</label>
                <input type="text" name="tunjangan_rumah_tangga">
            </div>
            <div class="field">
                <button type="button" class="ui blue button" onclick="simpan_tunjangan_3()">Submit (3/4)</button>
            </div>
        </form>
        <form class="ui form" id="form_tunjangan_4" hidden>
            <div class="ui four steps">
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 1</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 2 atau lebih anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 2</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Memiliki 1 anak</span>
                        </center>
                    </div>
                </div>
                <div class="disabled step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 3</div>
                            <div class="ui divider"></div>
                            <span>Menikah dan Tidak memiliki anak</span>
                        </center>
                    </div>
                </div>
                <div class="active step">
                    <div class="content">
                        <center>
                            <div class="title">Tunjangan Jenis 4</div>
                            <div class="ui divider"></div>
                            <span>Tidak Menikah dan Tidak Memiliki Anak</span>
                        </center>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan_4" readonly>
            </div>
            <div class="field">
                <label>Tunjangan Makan</label>
                <input type="text" name="tunjangan_makan">
            </div>
            <div class="field">
                <label>Tunjangan Transportasi</label>
                <input type="text" name="tunjangan_transportasi">
            </div>
            <div class="field">
                <label>Tunjangan Keluarga</label>
                <input type="text" name="tunjangan_rumah_tangga" value="0" readonly>
            </div>
            <div class="field">
                <button type="button" class="ui blue button" onclick="simpan_tunjangan_4()">Submit (4/4)</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('.ui.radio.checkbox').checkbox();
    $('.ui.checkbox').checkbox();
    read_all_dropdown_provinsi();
    read_all_dropdown_jabatan();
</script>