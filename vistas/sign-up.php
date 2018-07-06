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
    max-width: none !important;
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
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title">Registro <span class="msg">Registrar una nueva cuenta</span></h1>
        <div class="col-sm-12">
            <form id="sign_up" method="POST">
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
                    <input type="text" class="form-control" name id="email" placeholder="Email">
                    <input type="hidden" name="emailValido" id="emailValido" value="no">
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
                <div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4>Términos de Servicio</h4>
                        <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus porttitor diam ut lobortis. Suspendisse pellentesque efficitur vestibulum. Vivamus volutpat eros metus, eget venenatis ipsum auctor quis. Curabitur eget aliquam lectus. Fusce dui metus, pellentesque ac tellus vel, cursus malesuada odio. Etiam aliquam gravida felis, tincidunt bibendum magna molestie ut. Praesent hendrerit faucibus ex, vel vehicula neque semper sed. Mauris elit lacus, pharetra ut purus feugiat, lobortis suscipit sapien. Vivamus tristique quam aliquet, congue arcu a, feugiat purus. Sed non est ut arcu auctor cursus. Vestibulum tellus lorem, aliquam eget mi et, vehicula lacinia tortor. Nulla interdum sapien non semper tempus.</p>
                        <p>Nullam ultricies semper convallis. Mauris bibendum ante quis ligula tempor, ut pretium felis ultricies. Vestibulum augue leo, iaculis non nisl id, tempor tempor felis. Pellentesque consequat justo sit amet justo dictum volutpat. Nam volutpat hendrerit ornare. Donec scelerisque urna quis diam placerat, at volutpat nunc bibendum. In lorem tortor, rhoncus sit amet accumsan ut, consectetur in urna. Integer tristique nulla a metus consequat volutpat. Quisque lacinia posuere nunc. Pellentesque non tincidunt nunc. Nulla volutpat arcu non arcu venenatis convallis.</p>
                        <p>Donec venenatis sem at eleifend euismod. Sed at lectus commodo, pharetra est quis, semper neque. Mauris enim arcu, commodo eget nibh vestibulum, suscipit lobortis arcu. Quisque sed feugiat lectus. Mauris in justo in diam porta pellentesque. Duis varius interdum vehicula. Vivamus ac nisl dictum, vestibulum ligula in, iaculis metus. Vivamus ullamcorper felis consequat pharetra feugiat. Suspendisse lacinia maximus metus, at pharetra diam mattis sed. Duis pretium urna vitae maximus lacinia. Sed dictum aliquet ipsum nec convallis. Donec eu posuere ipsum, eget mattis sapien. Nunc gravida, arcu sit amet efficitur efficitur, libero ante venenatis nulla, non congue erat purus in erat.</p>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-raised g-bg-blush2 waves-effect" onclick="toast_campos('Debe proporcionar su(s) nombre(s)','Nombre')" >REGISTRAR</a>
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
</body>
</html>
