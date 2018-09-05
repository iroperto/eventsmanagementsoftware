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
input {
    border: 1px solid #000 !important;
    margin-right: 4px !important;
    padding-left: 12px !important;
    margin-bottom: 0px !important;
}
.btn-primary, .btn-raised.bg-deep-orange {
  margin: 0px 2px !important;
  padding: 0px 10px !important;
}
.btn-raised.bg-deep-orange i{
  font-weight: bold;
}
#container .row{
  margin-bottom: 10px;
}
</style>
</head>
<body class="login-page authentication">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title">La opinión de tu equipo importa <span class="msg">No lo hagas solo. Invita a tu equipo y evalúen juntos las herramientas de <br /><?php echo PRO_NAME; ?>.</span></h1>
        <div class="col-sm-12">

              <div class="row">
                <div class="col-md-12 form-group input-group" style="margin-right: 5px;">
                  <input type="text" class="form-control" placeholder="E-mail" id="mailadd" autofocus>
                  <input type="text" class="form-control" placeholder="Nombre" id="nameadd">
                  <button class="btn btn-raised btn-primary" id="add">Agregar</button>
                </div>
              </div>
              <form id="inv_equipo" name="inv_equipo" method="POST">
              <div class="row">
                <div class="col-md-12" id="container">
                </div>
              </div>
            <div class="text-center">
              <a href="#" class="btn btn-raised g-bg-blush2 waves-effect" id="registrar" >Invitar</a>
              <input type="hidden" name="usuario" value="<?php echo $_GET['userid']; ?>" id="usuario">
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
<script src="scripts/join_team.js">

</script>
<script type="text/javascript" src="../public/plugins/toastr/toastr.min.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="../public/plugins/sweetalert/sweetalert.min.js"></script>
<!--Select 2 js-->
<script type="text/javascript" src='../public/plugins/select2/dist/js/select2.js'>

</script>
</body>
</html>
