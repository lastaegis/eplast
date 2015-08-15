<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistem Informasi Penggajian PT E-Plast Surabaya</title>
        <link rel="stylesheet" type="text/css" href="vendor/semantic/ui/dist/semantic.css">
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
                    <h4 class="blue text">Login Penggajian PT E-Plast</h4>
                </div>
                <div class="ui raised segment">
                    <form class="ui form" id="form_login">
                        <div class="field">
                            <div class="ui left icon input fluid">
                                <i class="users icon"></i>
                                <input type="text" placeholder="Username" id="username">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input fluid">
                                <i class="lock icon"></i>
                                <input type="password" placeholder="Password" id="password">
                            </div>
                        </div>
                        <div class="field">
                            <button class="ui blue submit button fluid" onclick="login(username.value, password.value)">Login</button>
                        </div>
                    </form>
                </div>
                <span>Lupa password anda ? Klik <a href="#">disini</a></span>
                <div class="ui inverted red segment" id="warning_login" hidden>
                    <p>Maaf username dan password anda tidak terdaftar pada database kami.</p>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="vendor/components/jquery/jquery.js"></script>
<script type="text/javascript" src="vendor/semantic/ui/dist/semantic.js"></script>
<script type="text/javascript" src="vendor/eplast/custom.js"></script>