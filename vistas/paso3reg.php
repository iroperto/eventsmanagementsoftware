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
<!--Select 2-->
<link rel="stylesheet" href='../public/plugins/select2/dist/css/select2.min.css'>
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
        <h1 class="title">Cuéntanos un poco sobres ti <span class="msg">Mereces herramientas que funcionen a la perfección. Responde unas breves preguntas y ayúdanos a adaptar el software a tus necesidades.</span></h1>
        <div class="col-sm-12">
            <form id="paso3reg" name="paso3reg" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="input-group">
                      <div class="form-line" style="border: none;">
                          <label for="cant_empleados">¿Cuántas personas trabajan en tu empresa?<span style="color:#f00;">*</span></label>
                          <br>
                          <select class="form-control" name="cant_empleados" id="cant_empleados">
                            <option></option>
                          </select>
                          <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_GET['userid']; ?>">
                      </div>
                  </div>
                  <div class="input-group">
                      <div class="form-line" style="border: none;">
                          <label for="uso_software">¿Para qué usarás <?php echo PRO_NAME; ?>?<span style="color:#f00;">*</span></label>
                          <br>
                          <select class="form-control" name="uso_software" id="uso_software">
                            <option></option>
                          </select>
                      </div>
                  </div>
                  <div class="input-group">
                      <div class="form-line" style="border: none;">
                          <label for="rol_usuario">¿Cuál de las siguientes opciones describen mejor tu rol?<span style="color:#f00;">*</span></label>
                          <br>
                          <select class="form-control" name="rol_usuario" id="rol_usuario">
                            <option></option>
                          </select>
                      </div>
                  </div>
                </div>
              </div>
            <div class="text-center">
              <a href="#" class="btn btn-raised g-bg-blush2 waves-effect" id="registrar" >Guardar y Continuar</a>
              <input type="hidden" name="val_empleados" value="0" id="val_empleados">
              <input type="hidden" name="val_uso" value="0" id="val_uso">
              <input type="hidden" name="val_rol" value="0" id="val_rol">
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
<script src="scripts/paso3reg.js">

</script>
<script type="text/javascript" src="../public/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="../public/plugins/sweetalert/sweetalert.min.js"></script>
<!--Select 2 js-->
<script type="text/javascript" src='../public/plugins/select2/dist/js/select2.js'>

</script>
</body>
</html>
