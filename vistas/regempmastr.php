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
  #urlexist, #urlInvalida{
    font-size: 14px;
    padding-left: 35px;
  }
  .modal-footer .btn{
    color: #fff !important;
  }
  .error-validacion::-webkit-input-placeholder {
    color: #f00;
}
.red::selection {
  background: #f00;
  color: #fff;
}
</style>
</head>
<body class="login-page authentication">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title">Es un placer conocerte. <span class="msg">Bienvenido a <?php echo PRO_NAME; ?></span></h1>
        <div class="col-sm-12">
            <form id="emp_master" name="emp_master" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="fas fa-globe-americas"></i>
                      </span>
                      <div class="form-line">
                          <input type="text" class="form-control" name="url" id="url" placeholder="Url del sitio web" autofocus>
                          <input type="hidden" name="urlvalida" id="urlvalida" value="no">
                      </div>
                  </div>
                </div>
              </div>
              <div id="urlexist" style="display: none;">
                Otra cuenta esta usando esta dirección url
              </div>
              <div id="urlInvalida" style="display: none;">
                Dirección Url invalida el formato debe ser en el formato <span style="color:#f00">www.tuempresa.com</span>
              </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="far fa-building"></i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="empresa" id="empresa" placeholder="Nombre de la empresa">
                    <input type="hidden" name="empresavalida" id="empresavalida" value="no">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_GET['userid']; ?>">
                </div>
            </div>
            <div id="empresaexist" style="display: none;">Otra cuenta esta usando este nombre de empresa.</div>
            <div class="text-center">
              <a href="#" class="btn btn-raised g-bg-blush2 waves-effect" id="registrar" >Guardar y Continuar</a>
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
<script src="scripts/regempresamaestra.js">

</script>
<script type="text/javascript" src="../public/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="../public/plugins/sweetalert/sweetalert.min.js"></script>
</body>
</html>
