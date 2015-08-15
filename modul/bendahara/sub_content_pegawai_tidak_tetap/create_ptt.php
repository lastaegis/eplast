<div class="ui raised segment">
    <form class="ui form" id="form_ptt_1">
        <div class="ui horizontal divider header">
            Form Pegawai Tidak Tetap - Biodata (1/2)
        </div>
        <div class="field">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_ptt" placeholder="Nama Lengkap Pegawai">
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
            <label>Nomer Handphone</label>
            <input type="text" name="hp_ptt" placeholder="Nomer Handphone">
        </div>
        <div class="field">
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Alamat Pegawai">
        </div>
        <div class="field">
            <label>Tunjangan</label>
            <div class="sexteen wide fields">
                <div class="fifteen wide field">
                    <select class="ui dropdown" name="tunjangan" id="jabatan" onchange="shift_jabatan(this.value)">
                        <option value="">-- Pilih Tunjangan --</option>
                    </select>
                </div>
                <div class="one wide field">
                    <button type="button" class="ui blue button" onclick="show_modal_tunjangan_ptt(this)">+</button>
                </div>
            </div>
        </div>
        <div class="field">
            <button type="button" class="ui blue button" onclick="simpan_ptt(this)">Submit(1/2)</button>
        </div>
    </form>
    <form class="ui form" id="form_ptt_2" hidden>
        <div class="ui horizontal divider header">
            <h4>Form Pegawai Tidak Tetap - Jadwal Shift (2/2)</h4>
        </div>
        <div class="field">
            <label>ID Pegawai Tidak Tetap</label>
            <input type="text" name="id_ptt" id="id_ptt" readonly>
        </div>
        <div class="field">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_ptt" id="nama_ptt" readonly>
        </div>
        <table class="ui celled bordered table" id="table_shift">
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
        <div class="field">
            <button type="button" class="ui blue button" onclick="simpan_shift_ptt(this)">Submit (2/2)</button>
        </div>
    </form>
    <form class="ui form" id="ptt_tersimpan" hidden>
        <div class="ui horizontal divider header">
            <h4>Data Pegawai Telah Tersimpan</h4>
        </div>
        <p>Data pegawai telah tersimpan. Untuk melihat data yang disimpan klik <a id="table_data_ptt" href="bendahara/sub_content_pegawai_tidak_tetap/" onclick="load_sub_content(event, this.href, this.id)">Disni</a> dan untuk kembali ke form pendaftaran pegawai tetap klik <a id="create_ptt" href="bendahara/sub_content_pegawai_tidak_tetap/" onclick="load_sub_content(event, this.href, this.id)">Disini</a></p>
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
<div class="ui modal" id="modal_tunjangan_ptt">
    <i class="close icon"></i>
    <div class="header">
        Input Data Tunjangan PTT
    </div>
    <div class="content">
        <form class="ui form" id="form_tunjangan_ptt">
            <div class="field">
                <label>Tunjangan Makan</label>
                <input type="text" name="tnjngn_mkn" id="tunjangan_makan" placeholder="Tunjangan Makan">
            </div>
            <div class="field">
                <label>Tunjangan Trasportasi</label>
                <input type="text" name="tnjngn_trnsprt" id="tunjangan_transportasi" placeholder="Tunjangan Transportasi">
            </div>
            <div class="field">
                <button type="button" class="ui blue button" onclick="simpan_tunjangan_ptt(this)" id="simpantunjanganptt">Simpan</button>
                <button type="button" class="ui blue button" onclick="update_tunjangan_ptt()" id="updatetunjanganptt" disabled>Update</button>
                <button type="button" class="ui blue button" onclick="batal_update_tunjangan_ptt(this)" id="batalupdate_tunjanganptt" disabled>Batal Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    $('.ui.radio.checkbox').checkbox();
    read_all_dropdown_provinsi();
</script>