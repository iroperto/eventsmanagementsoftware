<?php require '../config/global.php'; ?>
<?php $terminos = implode("<br>", file('../public/text/terminos.txt', FILE_SKIP_EMPTY_LINES)) ;  ?>
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

<!-- Sweeet Alerts -->
<link href="../public/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

<link href="../public/css/themes/all-themes.css" rel="stylesheet" />
<link rel="stylesheet" href="../public/plugins/toastr/toastr.min.css">
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
    max-width: 550px;
  }
  #mailexist{
    color: #f00;
    font-size: 13px;
    padding-left: 35px;
  }
  .modal-footer .btn{
    color: #fff !important;
  }
  .error-validacion::-webkit-input-placeholder {
    color: #f00;
}
</style>
</head>
<body class="login-page authentication">
  <div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Términos de Servicio</h4>
          <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <?php echo $terminos; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
        </div>
      </div>
    </div>
  </div>
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title">Registro <span class="msg">Registrar una nueva cuenta</span></h1>
        <div class="col-sm-12">
            <form id="sign_up" name="sign_up" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="zmdi zmdi-account"></i>
                      </span>
                      <div class="form-line">
                          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" autofocus>
                      </div>
                  </div>
                </div>
                <div class="col-md-6 input-group">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
                  </div>
                </div>
              </div>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-email"></i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="correo" id="email" placeholder="Email">
                    <input type="hidden" name="emailValido" id="emailValido" value="no">
                    <input type="hidden" name="nivel_usuario" id="nivel_usuario" value="1">
                </div>

            </div>
            <div id="mailexist" style="display: none;">
              Otra cuenta esta usando esta dirección de correo ¿Es tuya? <a href="sign-in.php">Iniciar sesión</a>
            </div>
            <div class="row">
              <div class="col-md-6 input-group">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-lock"></i>
                </span>
                <div class="form-line">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                </div>
              </div>
              <div class="col-md-6 input-group">
                <div class="form-line">
                    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirmar Password">
                    <input type="hidden" name="validconfirm" id="validconfirm" value="no">
                </div>
              </div>
            </div>

            <div id="confirmaciones">
              <ul>
                <li><i id="condicion1" class="far fa-circle"></i> Al menos 8 caracteres de longitud</li>
                <li><i id="condicion2" class="far fa-circle"></i> Un carácter en minúscula</li>
                <li><i id="condicion3" class="far fa-circle"></i> Un carácter en mayúsculas</li>
                <li><i id="condicion4" class="far fa-circle"></i> Un número</li>
                <li><i id="condicion5" class="far fa-circle"></i> Un símbolo o carácter especial</li>
              </ul>
            </div>
            <div class="form-group">
                <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                <label for="terms">He leido y estoy de acuero a los <a href="#" data-toggle="modal" data-target="#terminos">terminos de uso</a>.</label>

            </div>
            <div class="text-center">
                <a href="#" class="btn btn-raised g-bg-blush2 waves-effect" id="registrar" >REGISTRAR</a>                
            </div>
            <div class="m-t-10 m-b--5 align-center">
                <a href="sign-in.php">¿Tienes una cuenta?</a>
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
<script type="text/javascript" src="../public/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="../public/plugins/sweetalert/sweetalert.min.js"></script>
</body>
</html>
