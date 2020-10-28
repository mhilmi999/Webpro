<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PTKI.Inc | Sign In</title>

  <!-- Custom fonts for this template-->
  <link href="<?= BASEURL;?>/asset2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= BASEURL;?>/asset2/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="icon" href="<?= BASEURL; ?>/asset/images/fevicon/fevicon.png" type="image/png" />

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6" style="margin-top: 40px;">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
             
              <div class="col">
              <div class="text-center" style="margin-top:20px;margin-bottom:-20px;"><a href="<?= BASEURL;?>">
                    <img  style="height:50px;width:200px;  " src="<?= BASEURL; ?>/asset/images/logo.png" alt="#" /></a>
                  </div>
                <div class="p-5">
                  <div class="text-center">
                    <?php Flasher::flash();?>
                    <h1 class="h6 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form method="POST" action="<?= BASEURL;?>/Account/checkingLogin" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username"  placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-user btn-block" name="submit" type="sumbit" value="submit" id="submit">
                    Masuk
                </button>
                <hr>
                  <div class="text-center">
                    <a class="small" href="<?= BASEURL;?>/Account/register">Belum punya Akun? Buat Sekarang!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= BASEURL;?>/asset2/vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASEURL;?>/asset2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->    
  <script src="<?= BASEURL;?>/asset2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= BASEURL;?>/asset2/js/sb-admin-2.min.js"></script>

</body>

</html>
