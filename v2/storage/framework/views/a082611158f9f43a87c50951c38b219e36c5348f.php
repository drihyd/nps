<?php
$theme_options_data=DB::table('themeoptions')->get()->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo e(env('APP_NAME')); ?> - <?php echo e($pageTitle??""); ?></title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->favicon??'')); ?>">
    <!-- Start css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="<?php echo e(URL::to('assets/css/bootstrap')); ?>.min.css" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo e(URL::to('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::to('assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo e(route('adminlogin.verification')); ?>" method="post" id="loginform" data-parsley-validate>
                                       <?php echo csrf_field(); ?> 
                                        <div class="form-head">
                                            <a href="index.html" class="logo"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->header_logo??'')); ?>" class="img-fluid" alt="logo"></a>
                                        </div>                                        
                                        <h4 class="text-primary my-4">Admin Login !</h4>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="username" placeholder="Enter Email" required data-parsley-type="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <!-- <div class="custom-control custom-checkbox text-left">
                                                  <input type="checkbox" class="custom-control-input" id="rememberme">
                                                  <label class="custom-control-label font-14" for="rememberme">Remember Me</label>
                                                </div>  -->                               
                                            </div>
                                            <!-- <div class="col-sm-6">
                                              <div class="forgot-psw"> 
                                                <a id="forgot-psw" href="user-forgotpsw.html" class="font-14">Forgot Password?</a>
                                              </div>
                                            </div> -->
                                        </div>                          
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script src="<?php echo e(URL::to('assets/js/modernizr.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('assets/js/detect.js')); ?>"></script>
    <script src="<?php echo e(URL::to('assets/js/jquery.slimscroll.js')); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- End js -->

    <script>
  $('form').parsley();
</script>
<script>
   $("#loginform").validate({
  rules: {
  email: {
      required: true,
      
    },
     description: {
      required: true,
      
    },
    max_admissions: {
      required: true,
      number:true,
      minlength:1,
      maxlength:100
    },course_fee: {
      required: true,
      number:true,
      minlength:2,
      maxlength:100
    },
    institute_id: {
      required: true
    }
  }
});
 </script> 
    <script>
  <?php if(Session::has('message')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("<?php echo e(session('message')); ?>");
  <?php endif; ?>
  
    <?php if(Session::has('success')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("<?php echo e(session('success')); ?>");
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.error("<?php echo e(session('error')); ?>");
  <?php endif; ?>

  <?php if(Session::has('info')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("<?php echo e(session('info')); ?>");
  <?php endif; ?>

  <?php if(Session::has('warning')): ?>
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.warning("<?php echo e(session('warning')); ?>");
  <?php endif; ?>
  
  

  
</script>
</body>
</html><?php /**PATH /home/deepred/public_html/demos/nps/v1/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>