//Start Util Function
function waktu_sistem(){
    var interval = setInterval(function(){
        $.ajax({
            url: '../php/utils/waktu_sistem.php',
            method: 'POST',
            success: function(data){
                $('#waktu_sistem').html(data);
            }
        });
    },1000);
}

function login(a, b){
    $('#form_login').form({
        fields: {
            username: {
                identifier: 'username',
                rules: [{
                    type: 'empty',
                    prompt: 'Username tidak boleh kosong'
                }]
            },
            password: {
                identifier: 'password',
                rules: [{
                    type: 'empty',
                    prompt: 'Password tidak boleh kosong'
                }]
            }
        },
        inline: true,
        on: 'blur',
        onSuccess:function(event){
            event.preventDefault();
            $.ajax({
                url: 'php/utils/login.php',
                method: 'POST',
                data:{
                    usr: a,
                    pass: b
                },
                success: function (data) {
                    var $json_parse = JSON.parse(data);
                    if($json_parse.status === "Error"){
                        $('#warning_login').removeAttr('hidden');
                    }
                    if($json_parse.status === "True"){
                        location.href='modul/#!'+$json_parse.otrts+'-home';
                    }
                }
            });
        }
    });
}

function hashbang(){
    var $url = window.location.href;
    var $hashbang = $url.substring($url.indexOf('#!'),$url.indexOf('-'));
    var $position = $url.substring($url.indexOf('-'));
    var $position = $position.replace('-','');
    var $content_code = JSON.stringify({otrts: $hashbang, position: $position});
    return $content_code;
}

function load_menu(a){
    var $json_parse = JSON.parse(a);
    $.ajax({
        url: '../php/utils/menu.php',
        method: 'POST',
        data:{
            otrts: $json_parse.otrts
        },
        success: function(data){
            $('#main_menu').html(data);
            active_menu();
        }
    });
}
function load_content(a){
    var $json_parse = JSON.parse(a);
    var $otoritas = $json_parse.otrts;
    var $otoritas = $otoritas.replace('#!','');
    var $position = $json_parse.position;
    var $position = $position.replace('-','');
    $('#main_content').load($otoritas + '/' + $position + '.php');
    if(($otoritas === "bendahara") && ($position === "home")){
        hitung_pegawai_tetap();
        hitung_pegawai_tidak_tetap();
    }
}

function clicked_menu(event, a){
    event.preventDefault();
    var $otoritas = $(a).attr('href').substring($(a).attr('href').indexOf('#!'),$(a).attr('href').indexOf('-'));
    var $otoritas = $otoritas.replace('#!','');
    var $position = $(a).attr('href').substring($(a).attr('href').indexOf('-'));
    var $position = $position.replace('-','');
    $('#main_content').load($otoritas + '/' + $position + '.php');
    history.pushState($(a).attr('href'),$(a).attr('href'),$(a).attr('href'));
    var $test = history.pushState({},'',$(a).attr('href'));
    if(($otoritas === "bendahara") && ($position === "home")){
        hitung_pegawai_tetap();
        hitung_pegawai_tidak_tetap();
    }
    $('#main_menu').children().removeClass('active');
    $(a).addClass('active');
}

function active_menu(){
    var $url = window.location.href;
    var $hashbang = $url.substring($url.indexOf('#!'),$url.indexOf('-'));
    var $hashbang = $hashbang.replace('#!','');
    var $position = $url.substring($url.indexOf('-'));
    $('#main_menu').find('#' + $hashbang + $position).addClass('active');
}

function dropdown_slide_right(){
    $('#dropdown_pegawai_tetap').dropdown({
        transition: 'slide right',
        on: 'click'
    });
    $('#dropdown_pegawai_tidak_tetap').dropdown({
        transition: 'slide right',
        on: 'click'
    });
}

function load_sub_content(event, a, b){
    var $json_parse = JSON.parse(hashbang());
    var $otoritas = $json_parse.otrts;
    var $otoritas = $otoritas.replace('#!','');
    event.preventDefault();
    $('#sub_content').load(a + b + '.php');
}

function enable_jumlah_anak(a, b){
    if($(a).parent().hasClass("checked")===true){
        $('#jumlah_anak').removeAttr("readonly");
    }
    else{
        $('#jumlah_anak').val("0").attr("readonly",true);
    }
}

function show_username_password(a){
    console.log(a);
    var $username = "#username_"+$(a).attr("id");
    var $password = "#password_"+$(a).attr("id");
    if($(a).hasClass("checked") == true){
        $($username).removeAttr('hidden');
        $($password).removeAttr('hidden');
    }
    else{
        $($username).attr('hidden', true).val("");
        $($password).attr('hidden', true).val("");
    }
}

function go_to_data_table_pt(a, b){
    $('#sub_content').load('');
}

function go_to_form_pt(){
    
}
//End Util Function

//Start CRUD Pegawai Tetap Function
function simpan_pegawai_tetap(a, b){
    $('#form_pt').form({
        fields:{
            nama:{
                identifier: 'nama',
                rules:[{
                    type: 'empty',
                    prompt: 'Nama Tidak Boleh Kosong'
                },
                {
                    type: 'regExp[/^[a-zA-Z ]+$/]',
                    prompt: 'Nama hanya boleh berisikan huruf'
                }]
            },
            tanggal_lahir:{
                identifier: 'tanggal_lahir',
                rules:[{
                    type: 'empty',
                    prompt: 'Tanggal lahir tidak boleh kosong'
                }]
            },
            jk:{
                identifier: 'jk',
                rules:[{
                    type: 'checked',
                    prompt: 'Jenis kelamin tidak boleh kosong'
                }]
            },
            provinsi:{
                identifier: 'provinsi',
                rules:[{
                    type: 'empty',
                    prompt: 'Provinsi tidak boleh kosong'
                }]
            },
            kota:{
                identifier: 'kota',
                rules:[{
                    type: 'empty',
                    prompt: 'Kota tidak boleh kosong'
                }]
            },
            alamat:{
                identifier: 'alamat',
                rules:[{
                    type: 'empty',
                    prompt: 'Alamat tidak boleh kosong'
                }]
            },
            no_hp:{
                identifier: 'no_hp',
                rules:[{
                    type: 'empty',
                    prompt: 'Nomer tidak boleh kosong'
                },
                {
                    type: 'regExp[/^[0-9]+$/]',
                    prompt: 'Nama hanya boleh berisikan angka'
                }]
            },
            email:{
                identifier: 'email',
                rules:[{
                    type: 'email',
                    prompt: 'Format email tidak valid'
                }]
            },
            status_pernikahan:{
                identifier: 'status_pernikahan',
                rules: [{
                    type: 'checked',
                    prompt: 'Status tidak boleh kosong'
                }]
            },
            jumlah_anak:{
                identifier: 'jumlah_anak',
                rules:[{
                    type: 'regExp[/^[0-9]+$/]',
                    prompt: 'Jumlah anak hanya boleh berisikan angka'
                }]
            }
        },
        inline: true,
        on: 'blur',
        onSuccess:function(event){
            event.preventDefault();
            $.ajax({
                url : '../php/data-primary/CRUDpegawaitetap.php',
                method : 'POST',
                data: $('#form_pt').serialize() + "&kode_unik=Create",
                success: function (data) {
                    $('#form_pt').attr('hidden',true);
                    $('#form_pt_2').removeAttr('hidden');
                    var $json_parse = JSON.parse(data);
                    $('#id_pt_tunjangan').val($json_parse.id_pegawai_tetap);
                    $('#nama_pt_tunjangan').val($json_parse.nama_pegawai_tetap); 
                    $('#id_pt_otoritas').val($json_parse.id_pegawai_tetap);
                    $('#nama_pt_otoritas').val($json_parse.nama_pegawai_tetap); 
                }
            });
        }
    });
}

function read_all_pegawai_tetap(){
    $.ajax({
        url : '../php/data-primary/CRUDpegawaitetap.php',
        method : 'POST',
        data: {
            kode_unik : "Read_All"
        },
        success: function(data){
            $('#data_pegawai_tetap').html(data);
        }
    });
}


function hitung_pegawai_tetap(){
    $.ajax({
        url: '../php/data-primary/CRUDpegawaitetap.php',
        method: 'POST',
        data: {
            kode_unik: "Count"
        },
        success:function(data){
            $('#jumlah_pt').html(data);
        }
    });
}
//End CRUD Pegawai Tetap Function

//Start CRUD Pegawai Tidak Tetap Function
function simpan_ptt(a){
    $.ajax({
        url: '../php/data-primary/CRUDpegawaitidaktetap.php',
        method: 'POST',
        data:$('#form_ptt_1').serialize() + '&kode_unik=Create',
        success:function(data){
            console.log(data);
            var $json_parse = JSON.parse(data);
            $('#id_ptt').val($json_parse.id_pegawai_tidak_tetap);
            $('#nama_ptt').val($json_parse.nama_pegawai_tidak_tetap);
            $('#form_ptt_1').attr('hidden',true);
            $('#form_ptt_2').removeAttr('hidden');
        }
    });    
}

function read_all_ptt(){
    $.ajax({
        url : '../php/data-primary/CRUDpegawaitidaktetap.php',
        method : 'POST',
        data: {
            kode_unik : "Read_All"
        },
        success: function(data){
            $('#data_pegawai_tidak_tetap').html(data);
        }
    });
}

function hitung_pegawai_tidak_tetap(){
    $.ajax({
        url: '../php/data-primary/CRUDpegawaitidaktetap.php',
        method: 'POST',
        data: {
            kode_unik: "Count"
        },
        success:function(data){
            $('#jumlah_ptt').html(data);
        }
    });
}
//End CRUD Pegawai Tidak Tetap Function

//Start CRUD Provinsi Function
function show_modal_input_provinsi(position){
    $('#modal_input_provinsi').modal('setting','closable',false).modal('show');
    generate_id_provinsi();
    read_all_provinsi();
}

function simpan_provinsi(position){
    $('#form_provinsi').form({
        fields:{
            name:{
                identifier:'nama_provinsi',
                rules:[{
                    type : 'empty',
                    prompt : 'Nama Provinsi Tidak Boleh Kosong'
                }]
            }
        },
        inline: true,
        on : 'blur',
        onSuccess: function(event){
            event.preventDefault();
            $.ajax({
                url : '../php/data-support/CRUDprovinsi.php',
                method : 'POST',
                data : {
                    kode_unik : 'Create',
                    id_provinsi: $('#id_provinsi').val(),
                    nama_provinsi: $('#nama_provinsi').val()
                },
                success : function(data){
                    $('#id_provinsi').val("");
                    $('#nama_provinsi').val("");
                    generate_id_provinsi();
                    read_all_provinsi();
                    read_all_dropdown_provinsi();
                }
            });
        }
    });
}

function get_provinsi(position){
    var $id_provinsi = $(position).closest('tr').find('#data_id_provinsi').html();
    var $nama_provinsi = $(position).closest('tr').find('#data_nama_provinsi').html();
    
    $('#id_provinsi').val($id_provinsi);
    $('#nama_provinsi').val($nama_provinsi);
    $('#simpanprovinsi').attr('disabled',true);
    $('#updateprovinsi').removeAttr('disabled');
    $('#batalupdate_provinsi').removeAttr('disabled');
}

function batal_update_provinsi(position){
    $('#id_provinsi').val("");
    $('#nama_provinsi').val("");
    $('#simpanprovinsi').removeAttr('disabled');
    $('#updateprovinsi').attr('disabled',true);
    $('#batalupdate_provinsi').attr('disabled',true);
    generate_id_provinsi();
}

function update_provinsi(){
    $('#form_provinsi').form({
        fields:{
            name:{
                identifier:'nama_provinsi',
                rules:[{
                    type : 'empty',
                    prompt : 'Nama Provinsi Tidak Boleh Kosong'
                }]
            }
        },
        inline: true,
        on : 'blur',
        onSuccess: function(event){
            event.preventDefault();
            $.ajax({
                url : '../php/data-support/CRUDprovinsi.php',
                method : 'POST',
                data : {
                    kode_unik : 'Update',
                    id_provinsi: $('#id_provinsi').val(),
                    nama_provinsi: $('#nama_provinsi').val()
                },
                success : function(data){
                    $('#nama_provinsi').val("");
                    $('#simpanprovinsi').removeAttr('disabled');
                    $('#updateprovinsi').attr('disabled',true);
                    $('#batalupdate_provinsi').attr('disabled',true);
                    read_all_provinsi();
                    generate_id_provinsi();
                }
            });
        }
    });
}

function hapus_provinsi(position){
    $.ajax({
        url : '../php/data-support/CRUDprovinsi.php',
        method : 'POST',
        data : {
            kode_unik : 'Delete',
            id_provinsi: $(position).closest("tr").find("#data_id_provinsi").html()
        },
        success : function(data){
            generate_id_provinsi();
            read_all_provinsi();
        }
    });
    
}

function generate_id_provinsi(){
    $.ajax({
        url : '../php/data-support/CRUDprovinsi.php',
        method : 'POST',
        data : {
            kode_unik : 'Generate_ID'
        },
        success : function(data){
            $('#id_provinsi').val(data);
        }
    });
}

function read_all_provinsi(){
    $.ajax({
        url : '../php/data-support/CRUDprovinsi.php',
        method : 'POST',
        data : {
            kode_unik : 'Read_All'
        },
        success : function(data){
            $('#data_provinsi').html(data);
        }
    });
}

function read_all_dropdown_provinsi(){
    $.ajax({
        url : '../php/data-support/CRUDprovinsi.php',
        method : 'POST',
        data : {
            kode_unik : 'Read_All_Dropdown'
        },
        success : function(data){
            $('#kode_provinsi').html(data);
            $('#provinsi').html(data);
        }
    });
}
//End CRUD Provinsi Function

//Start CRUD Kota Function
function show_modal_input_kota(position){
    $('#modal_input_kota').modal('setting','closable',false).modal('show');
    generate_id_kota();
    read_all_dropdown_provinsi();
    read_all_kota();
}

function simpan_kota(){
    $('#form_kota').form({
        fields:{
            nama_kota:{
                identifier:'nama_kota',
                rules:[{
                    type : 'empty',
                    prompt : 'Nama Provinsi Tidak Boleh Kosong'
                }]
            },
            kode_provinsi:{
                identifier: 'kode_provinsi',
                rules:[{
                    type: 'empty',
                    prompt: 'Provinsi Tidak Boleh Kosong'
                }]
            }
        },
        inline: true,
        on : 'blur',
        onSuccess: function(event){
            event.preventDefault();
            $.ajax({
                url : '../php/data-support/CRUDkota.php',
                method : 'POST',
                data : {
                    kode_unik : 'Create',
                    id_kota: $('#id_kota').val(),
                    kode_provinsi: $('#kode_provinsi').val(),
                    nama_kota: $('#nama_kota').val()
                },
                success : function(){
                    $('#nama_kota').val("");
                    generate_id_kota();
                    read_all_dropdown_provinsi();
                    read_all_kota();
                    $('.second.modal').modal('attach events', '.first.modal .button');
                }
            });
        }
    });
}

function get_kota(position){
    var $id_kota = $(position).closest('tr').find('#data_id_kota').html();
    var $nama_kota = $(position).closest('tr').find('#data_nama_kota').html();
    
    $.ajax({
        url : '../php/data-support/CRUDprovinsi.php',
        method : 'POST',
        async: false,
        data : {
            kode_unik : 'Read_All_Dropdown_Update',
            id_kota: $id_kota
        },
        success : function(data){
            $('#kode_provinsi').html(data);
        }
    });
    
    $('#id_kota').val($id_kota);
    $('#nama_kota').val($nama_kota);
    $('#simpankota').attr('disabled',true);
    $('#updatekota').removeAttr('disabled');
    $('#batalupdate_kota').removeAttr('disabled');
}

function batal_update_kota(position){
    $('#id_kota').val("");
    $('#nama_kota').val("");
    $('#simpankota').removeAttr('disabled');
    $('#updatekota').attr('disabled',true);
    $('#batalupdate_kota').attr('disabled',true);
    generate_id_kota();
    read_all_dropdown_provinsi();
}

function update_kota(){
    $('#form_kota').form({
        fields:{
            nama_kota:{
                identifier:'nama_kota',
                rules:[{
                    type : 'empty',
                    prompt : 'Nama Provinsi Tidak Boleh Kosong'
                }]
            },
            kode_provinsi:{
                identifier: 'kode_provinsi',
                rules:[{
                    type: 'empty',
                    prompt: 'Provinsi Tidak Boleh Kosong'
                }]
            }
        },
        inline: true,
        on : 'blur',
        onSuccess: function(event){
            event.preventDefault();
            $.ajax({
                url : '../php/data-support/CRUDkota.php',
                method : 'POST',
                data : {
                    kode_unik: 'Update',
                    id_kota: $('#id_kota').val(),
                    kode_provinsi: $('#kode_provinsi').val(),
                    nama_kota: $('#nama_kota').val()
                },
                success : function(data){
                    $('#nama_kota').val("");
                    $('#simpankota').removeAttr('disabled');
                    $('#updatekota').attr('disabled',true);
                    $('#batalupdate_kota').attr('disabled',true);
                    generate_id_kota();
                    read_all_dropdown_provinsi();
                    read_all_kota();
                }
            });
        }
    });
}

function hapus_kota(position){
    $.ajax({
        url : '../php/data-support/CRUDkota.php',
        method : 'POST',
        data : {
            kode_unik : 'Delete',
            id_kota: $(position).closest("tr").find("#data_id_kota").html()
        },
        success : function(){
            generate_id_kota();
            read_all_kota();
        }
    });
}

function read_all_kota(){
    $.ajax({
        url : '../php/data-support/CRUDkota.php',
        method : 'POST',
        data : {
            kode_unik : 'Read_All'
        },
        success : function(data){
            $('#data_kota').html(data);
        }
    });
}

function generate_id_kota(){
    $.ajax({
        url : '../php/data-support/CRUDkota.php',
        method : 'POST',
        data : {
            kode_unik : 'Generate_ID'
        },
        success : function(data){
            $('#id_kota').val(data);
        }
    });
}

function read_all_dropdown_kota(data){
    $.ajax({
        url : '../php/data-support/CRUDkota.php',
        method : 'POST',
        data : {
            kode_unik : 'Read_All_Dropdown_By_Provinsi',
            kode_provinsi : data
        },
        success : function(data){
            $('#kota').html(data);
        }
    });
}
//End CRUD Kota Function

//Start CRUD Jabatan Function
function show_modal_input_jabatan(position){
    $('#modal_input_jabatan').modal('setting','closable',false).modal('show');
    generate_id_jabatan();
    read_all_jabatan();
}

function simpan_jabatan(a){
    $('#form_jabatan').form({
        fields:{
            nama_jabatan:{
                identifier:'nama_jabatan',
                rules:[{
                    type : 'empty',
                    prompt : 'Nama Jabatan Tidak Boleh Kosong'
                }]
            },
            gaji_jabatan:{
                identifier: 'gaji_jabatan',
                rules:[{
                    type: 'empty',
                    prompt: 'Gaji Jabatan Tidak Boleh Kosong'
                }]
            },
            status_shift: {
                identifier: 'status_shift',
                rules:[{
                    type: 'checked',
                    prompt: 'Status Jabatan Tidak Boleh Kosong'
                }]
            }
        },
        inline: true,
        on : 'blur',
        onSuccess: function(event){
            event.preventDefault();
            $.ajax({
                url : '../php/data-support/CRUDjabatan.php',
                method : 'POST',
                data : $('#form_jabatan').serialize()+"&kode_unik=Create",
                success : function(data){
                    $('#nama_jabatan').val("");
                    $('#gaji_jabatan').val("");
                    show_modal_tunjangan(data);
                }
            });
        }
    });
}

function get_jabatan(position){
    var $id_kota = $(position).closest('tr').find('#data_id_jabatan').html();
    var $nama_jabatan = $(position).closest('tr').find('#data_nama_jabatan').html();
    var $gaji_jabatan = $(position).closest('tr').find('#data_gaji_jabatan').html();
    
    $('#id_jabatan').val($id_kota);
    $('#nama_jabatan').val($nama_jabatan);
    $('#gaji_jabatan').val($gaji_jabatan);
    $('#simpanjabatan').attr('disabled',true);
    $('#updatejabatan').removeAttr('disabled');
    $('#batalupdate_jabatan').removeAttr('disabled');
}

function batal_update_jabatan(position){
    $('#id_jabatan').val("");
    $('#nama_jabatan').val("");
    $('#gaji_jabatan').val("");
    $('#simpanjabatan').removeAttr('disabled');
    $('#updatejabatan').attr('disabled',true);
    $('#batalupdate_jabatan').attr('disabled',true);
    generate_id_jabatan();
}

function update_jabatan(){
    $('#form_jabatan').form({
        fields:{
            nama_jabatan:{
                identifier:'nama_jabatan',
                rules:[{
                    type : 'empty',
                    prompt : 'Nama Jabatan Tidak Boleh Kosong'
                }]
            },
            gaji_jabatan:{
                identifier: 'gaji_jabatan',
                rules:[{
                    type: 'empty',
                    prompt: 'Gaji Jabatan Tidak Boleh Kosong'
                }]
            }
        },
        inline: true,
        on : 'blur',
        onSuccess: function(event){
            event.preventDefault();
            $.ajax({
                url : '../php/data-support/CRUDjabatan.php',
                method : 'POST',
                data : {
                    kode_unik: 'Update',
                    id_jabatan: $('#id_jabatan').val(),
                    nama_jabatan: $('#nama_jabatan').val(),
                    gaji_jabatan: $('#gaji_jabatan').val()
                },
                success : function(data){
                    $('#nama_jabatan').val("");
                    $('#gaji_jabatan').val("");
                    $('#simpanjabatan').removeAttr('disabled');
                    $('#updatejabatan').attr('disabled',true);
                    $('#batalupdate_jabatan').attr('disabled',true);
                    generate_id_jabatan();
                    read_all_jabatan();
                }
            });
        }
    });
}

function hapus_jabatan(position){
    $.ajax({
        url : '../php/data-support/CRUDjabatan.php',
        method : 'POST',
        data : {
            kode_unik : 'Delete',
            id_jabatan: $(position).closest("tr").find("#data_id_jabatan").html()
        },
        success : function(data){
            generate_id_jabatan();
            read_all_jabatan();
        }
    });
}

function generate_id_jabatan(){
    $.ajax({
        url : '../php/data-support/CRUDjabatan.php',
        method : 'POST',
        data : {
            kode_unik : 'Generate_ID'
        },
        success : function(data){
            $('#id_jabatan').val(data);
        }
    });
}

function read_all_jabatan(){
    $.ajax({
        url : '../php/data-support/CRUDjabatan.php',
        method : 'POST',
        data : {
            kode_unik : 'Read_All'
        },
        success : function(data){
            $('#data_jabatan').html(data);
        }
    });
}
function read_all_dropdown_jabatan(){
    $.ajax({
        url : '../php/data-support/CRUDjabatan.php',
        method : 'POST',
        data : {
            kode_unik : 'Read_All_Dropdown'
        },
        success : function(data){
            $('#jabatan').html(data);
        }
    });
}
//End CRUD Jabatan Function

//Start CRUD Shift Jabatan
function shift_jabatan(data){
    $.ajax({
        url: '../php/data-support/CRUDjabatan.php',
        method: 'POST',
        data:{
            kode_unik : 'Read_Shift_Dalam_Jabatan',
            kode_jabatan : data
        },
        success : function(data){
            if(data == "Y"){
                $('#table_shift').removeAttr('hidden');
            }
            else{
                $('#table_shift').attr('hidden',true);
            }
        }
    });
}

function reset_shift(position){
    $(position).closest('tr').find('#radio1').find('#mark_position').removeAttr('checked');
    $(position).closest('tr').find('#radio2').find('#mark_position').removeAttr('checked');
    $(position).closest('tr').find('#radio3').find('#mark_position').removeAttr('checked');
}
//End CRUD Shift Jabatan Function

//Start CRUD Tunjangan Function
function show_modal_tunjangan(a){
    $('#nama_jabatan_1').val(a);
    $('#nama_jabatan_2').val(a);
    $('#nama_jabatan_3').val(a);
    $('#nama_jabatan_4').val(a);
    $('#modal_input_tunjangan').modal('setting','closable',false).modal('show');
}

function show_modal_tunjangan_ptt(a){
    read_tunjangan_ptt();
    $('#modal_tunjangan_ptt').modal('setting','closable',false).modal('show');
}

function simpan_tunjangan_1(){
    $.ajax({
        url: '../php/data-support/CRUDtunjangan.php',
        method: 'POST',
        data: $('#form_tunjangan_1').serialize() + '&kode_unik=Create',
        success:function(data){
            console.log(data);
            $('#form_tunjangan_1').attr('hidden',true);
            $('#form_tunjangan_2').removeAttr('hidden');
        }
    });
}

function simpan_tunjangan_2(){
    $.ajax({
        url: '../php/data-support/CRUDtunjangan.php',
        method: 'POST',
        data: $('#form_tunjangan_2').serialize() + '&kode_unik=Create',
        success:function(data){
            console.log(data);
            $('#form_tunjangan_2').attr('hidden',true);
            $('#form_tunjangan_3').removeAttr('hidden');
        }
    });
}

function simpan_tunjangan_3(){
    $.ajax({
        url: '../php/data-support/CRUDtunjangan.php',
        method: 'POST',
        data: $('#form_tunjangan_3').serialize() + '&kode_unik=Create',
        success:function(data){
            console.log(data);
            $('#form_tunjangan_3').attr('hidden',true);
            $('#form_tunjangan_4').removeAttr('hidden');
        }
    });
}

function simpan_tunjangan_4(){
    $.ajax({
        url: '../php/data-support/CRUDtunjangan.php',
        method: 'POST',
        data: $('#form_tunjangan_4').serialize() + '&kode_unik=Create',
        success:function(data){
            $('#modal_tunjangan_ptt').modal('hide');
        }
    });
}

function simpan_tunjangan_ptt(a){
    $.ajax({
        url: '../php/data-support/CRUDtunjangan.php',
        method: 'POST',
        data: $('#form_tunjangan_ptt').serialize() + '&kode_unik=Create_Tnjngn_PTT',
        success:function(data){
            console.log(data);
            $('#modal_tunjangan_ptt').modal('hide');
        }
    });
}

function update_tunjangan_ptt(){
    
}

function batal_update_tunjangan_ptt(){
    $('#modal_input_tunjangan').modal('hide');
}

function read_tunjangan_ptt(){
    $.ajax({
        url: '../php/data-support/CRUDtunjangan.php',
        method: 'POST',
        data:{
            kode_unik: 'Read_Tnjngn_PTT'
        },
        success: function (data) {
            if(data == "false"){
                $('#tunjangan_makan').val("0");
                $('#tunjangan_transportasi').val("0"); 
            }
            else{
                var $json_parse = JSON.parse(data);
                $('#tunjangan_makan').val($json_parse.TNJNGN_MKN);
                $('#tunjangan_transportasi').val($json_parse.TNJNGN_TRNSPRT);
                $('#simpantunjanganptt').attr('disabled',true);
                $('#updatetunjanganptt').removeAttr('disabled');
                $('#batalupdate_tunjanganptt').removeAttr('disabled');
            }
        }
    });
}
//End CRUD Tunjangan Function

//Start CRUD Otoritas Function
function simpan_otoritas(a){
    $.ajax({
      url : '../php/data-primary/CRUDotoritas.php',
        method : 'POST',
        data: $('#form_pt_3').serialize() + "&kode_unik=Create",
        success: function (data) {
            $('#form_pt_3').attr('hidden', true);
            $('#pt_tersimpan').removeAttr('hidden');
        }  
    });
}

function update_otoritas_pegawai_tetap(){
    
}

function hapus_otoritas_pegawai_tetap(){
    
}

function read_otoritas_pegawai_tetap(){
    
}
//End CRUD Otoritas Function

//Start Simpan Jabatan dan Shift Function
function simpan_jabatan_dan_shift(a){
    $.ajax({
        url: '../php/data-primary/CRUDhistoryjabatan.php',
        method: 'POST',
        data: $('#form_pt_2').serialize() + '&kode_unik=Create',
        success: function(data){
            
        }
    });
    $.ajax({
        url: '../php/data-primary/CRUDhistorytunjangan.php',
        method: 'POST',
        data: $('#form_pt_2').serialize() + '&kode_unik=Create',
        success: function(data){
            
        }
    });
    $.ajax({
      url : '../php/data-primary/CRUDdetailshift.php',
        method : 'POST',
        data: $('#form_pt_2').serialize() + "&kode_unik=Create",
        success: function (data) {
            console.log(data);
        }  
    });
    console.log('#form_pt_2');
    $('#form_pt_2').attr('hidden',true);
    $('#form_pt_3').removeAttr('hidden');
}

function simpan_shift_ptt(a){
    $.ajax({
      url : '../php/data-primary/CRUDdetailshift.php',
        method : 'POST',
        data: $('#form_ptt_2').serialize() + "&kode_unik=Create",
        success: function (data) {
            console.log(data);
        }  
    });
    $('#form_ptt_2').attr('hidden',true);
    $('#ptt_tersimpan').removeAttr('hidden');
}
//End Simpan Jabatan dan Shift Function

//Start Check Presensi Function
function check_presensi(a){
    $.ajax({
        url: '',
        method: 'POST',
        
    })
}
//End Check Presensi Function