<?php require '../config/global.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: <?php echo PRO_NAME; ?> ::</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="../public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<!-- Custom Css -->
<link href="../public/css/main.css" rel="stylesheet">
<link href="../public/css/login.css" rel="stylesheet">

<link href="../public/css/themes/all-themes.css" rel="stylesheet" />
<script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
<style>
  #confirmaciones li{
    list-style: none;
    margin-left: -15px;
    font-size: 14px;
  }
  #confirmaciones .fa-circle, #confirmaciones .fa-check-circle{
    color: green;
    font-size: 16px;
  }
  .container{
    max-width: none !important;
  }
</style>
</head>
<body class="login-page authentication">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title">Registro <span class="msg">Registrar una nueva cuenta</span></h1>
        <div class="col-sm-12">
            <form id="sign_up" method="POST">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-account"></i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="namesurname" id="namesurname" placeholder="Nombre Apellido" autofocus>
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-email"></i>
                </span>
                <div class="form-line">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-lock"></i>
                </span>
                <div class="form-line">
                    <input type="password" id="password" class="form-control" name="password" minlength="6" placeholder="Password">
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-lock"></i>
                </span>
                <div class="form-line">
                    <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirmar Password" required="">
                </div>
            </div>
            <div id="confirmaciones">
              <ul>
                <li><i id="condicion1" class="far fa-circle"></i> Al menos 8 caracteres de longitud</li>
                <li><i id="condicion2" class="far fa-circle"></i> Un caracter en minuscula</li>
                <li><i id="condicion3" class="far fa-circle"></i> Un caracter en mayusculas</li>
                <li><i id="condicion4" class="far fa-circle"></i> Un número</li>
                <li><i id="condicion5" class="far fa-circle"></i> Un simbolo o caracter especial</li>
              </ul>
            </div>
            <div class="form-group">
                <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                <label for="terms">He leido y estoy de acuero a los <a href="javascript:void(0);">terminos de uso</a>.</label>
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-raised g-bg-blush2 waves-effect" >REGISTRAR</a>
            </div>
            <div class="m-t-10 m-b--5 align-center">
                <a href="sign-in.html">¿Tienes una cuenta?</a>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="theme-bg"></div>

<!-- Jquery Core Js -->
<script src="../public/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="../public/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="../public/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="scripts/sign_up.js">

</script>
</body>
</html>
