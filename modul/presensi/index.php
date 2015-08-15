<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistem Informasi Penggajian PT E-Plast Surabaya</title>
        <link rel="stylesheet" type="text/css" href="../../vendor/semantic/ui/dist/semantic.css">
        <style>
            body > .grid{
                height: 100%;
            }
            .column{
                max-width: 500px;
            }
        </style>
    </head>
    <body>
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                <div class="ui horizontal divider header">
                    <h4 class="blue text">Presensi Pegawai</h4>
                </div>
                <div class="ui raised segment">
                    <form class="ui form" id="form_presensi">
                        <div class="field">
                            <div class="ui left icon input fluid">
                                <i class="users icon"></i>
                                <input type="text" name="id_pegawai" placeholder="ID Pegawai Anda" >
                            </div>
                        </div>
                        <div class="field">
                            <button class="ui blue submit button fluid" onclick="check_presensi(this)">Check Presensi</button>
                        </div>
                    </form>
                </div>
                <div class="ui inverted red segment" id="warning_presensi" hidden>
                    <p>NIP / Kode pegawai anda tidak terdaftar pada database kami</p>
                </div>
                <div class="ui raised segment">
                    <div class="ui horizontal divider header">
                        <h4>Keterangan Presensi</h4>
                    </div>
                    <div class="left align">
                        <p>Nama</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="../../vendor/components/jquery/jquery.js"></script>
<script type="text/javascript" src="../../vendor/semantic/ui/dist/semantic.js"></script>
<script type="text/javascript" src="../../vendor/eplast/custom.js"></script>