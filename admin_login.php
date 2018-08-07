<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="favicon2.png" type="image/x-icon" rel="shortcut icon">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  <style type="text/css">

  </style>
  <script type="text/javascript">
    function myFunction(element_id) {
            var x = document.getElementById(element_id);
            if (x.type === "password") {
                x.type = "text";
             } 
             else {
                x.type = "password";
            }
        }
        function check(){
          var a=document.getElementById('email').value;
          var b=document.getElementById('password').value;
          if(a==""){
            alert("Please Fill out the email field.");
            return 0;
          }
          else if(b==""){
            alert("Please Fill out the Password field.");
            return 0;
          }

        } 
  </script>
  </head>

  <body class="login" >
     <nav class="navbar d-print fixed-top navbar-inverse" style="border-radius: 0px">
        <a href="index.php" class="navbar-brand " style="font-family: 'Roboto', sans-serif;"> Attendance Management System</a>
        <ul class="nav navbar-nav navbar-right">
                <a href="index.php" class="navbar-brand"  style="font-family:'Roboto', sans-serif; color:white">Home</a>

            
                <a href="student_section/index.php" class="navbar-brand"  style="'Roboto', sans-serif; color:white">Student's Corner</a>
            
            <a href="teacher_section/index.php" class="navbar-brand"style="font-family: 'Roboto', sans-serif;"> Teacher's Corner</a>
            
            <a href="hod_section/index.php" class="navbar-brand"style="font-family: 'Roboto', sans-serif;"> HOD's Corner</a>
            
            <a href="admin_login.php" class="navbar-brand"style="font-family:'Roboto', sans-serif;">Campus Director</a> 

        </ul>
    </nav>
    <div class="row text-center" style="font-family: 'Roboto', sans-serif;color:white;height:40px;background:rgba(34,34,34,0.8);"><h4>Campus Director Section</h4></div>
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php 
                    if(isset($_REQUEST['msg'])){
                        echo "<div class='row'><h4 class='text-center alert alert-danger'>".$_REQUEST['msg']."</h4></div>";
                    }
                ?>
            <form method="post" name="login" action="check_for_admin.php" autocomplete="on">
              <h1>Login Please</h1>
              <div>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
              </div>
              <div>
                <input type="password" name="password" id="password" class="form-control"  />
                <div class="checkbox">
                <label><input type="checkbox" onclick="myFunction('password')" class="checkbox" >Show Password</label>
              </div>
              </div>
              <div>
                  <button type="submit" name="submit" class="btn btn-default" onclick="return check()">Log in</button>
              </div>


                    <?php if(isset($msg)){?>
                <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $msg; ?>
                </div>
                 <?php   } 
                 ?>


              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>

      </div>
    </div>

    <!-- Jquery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Jquery Validation -->
    <script type="text/javascript" src="vendors/js/validate.min.js"></script>
    <!-- Login Js -->
    <script src="vendors/js/login.js"></script>
  </body>
</html>
