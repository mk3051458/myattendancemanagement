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
    <link href="build/css/mycss.css" rel="stylesheet">
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
         function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
      }
  </script>
  </head>

  <body class="login" >
     <nav class="navbar d-print fixed-top navbar-inverse" style="border-radius: 1px; box-shadow: 0 2px 5px rgba(255,255,255); ">
        <img src="images/logo1.jpg" class="navbar-left"  style="max-height:45px;min-width:40px;margin: 10px 0px 10px 10px">   
        <a href="index.php" class="navbar-brand" style="font-family: 'Roboto', sans-serif; margin-top: 5px;position:absolute;"> Attendance Management System </a>
        <span class="nav navbar-nav navbar-right" style="padding-top: 5px">
            <a href="index.php" class="navbar-brand vi"  style="font-family: 'Roboto', sans-serif; color:white;padding-left: 0px;padding-right: 0px">Home</a>    
            <a href="student_section/index.php" class="navbar-brand vis"  style="font-family: 'Roboto', sans-serif;color:white;padding-right: 0px">Student's Corner</a>
            <a href="teacher_section/index.php" class="navbar-brand vis"style="font-family: 'Roboto', sans-serif;padding-right: 0px"> Teacher's Corner</a>
            <a href="hod_section/index.php" class="navbar-brand vis"style="font-family: 'Roboto', sans-serif;padding-right: 0px"> HOD's Corner</a>
            <a href="director_section/index.php" class="navbar-brand vis"  style="font-family: 'Roboto', sans-serif;, cursive; color:white;padding-right: 0px">Director Corner</a>
            <a href="admin_login.php" class="navbar-brand vis" style="font-family: 'Roboto', sans-serif;">Campus Director</a>
            <div id="mySidenav" class="sidenav visi">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="index.php"   style="font-family: 'Roboto', sans-serif; color:white;">Home</a>
                <a href="student_section/index.php" style="font-family: 'Roboto', sans-serif;color:white;">Student's Corner</a>
                <a href="teacher_section/index.php" style="font-family: 'Roboto', sans-serif;color: white"> Teacher's Corner</a>
                <a href="hod_section/index.php" style="font-family: 'Roboto', sans-serif;color: white"> HOD's Corner</a>
                <a href="director_section/index.php"   style="font-family: 'Roboto', sans-serif;, cursive; color:white;">Director Corner</a>
                <a href="admin_login.php" style="font-family: 'Roboto', sans-serif;color: white">Campus Director</a>
            </div>
            <span class="visi" style="font-size:30px;cursor:pointer;margin-top:-50px;margin-right: 0px; margin-left: 90%;position: absolute;" onclick="openNav()">&#9776;</span>     
            <div class="dropdown">
                <button class="dropbtn vi"><span style="font-family: 'Roboto', sans-serif;">Log in </span><i class="fa fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="student_section/index.php" style="font-family: 'Roboto', sans-serif;color:black;">Student's Corner</a>
                    <a href="teacher_section/index.php" style="font-family: 'Roboto', sans-serif;color: black"> Teacher's Corner</a>
                    <a href="hod_section/index.php" style="font-family: 'Roboto', sans-serif;color: black"> HOD's Corner</a>
                    <a href="director_section/index.php"   style="font-family: 'Roboto', sans-serif;, cursive; color:black;">Director Corner</a>
                    <a href="admin_login.php" style="font-family: 'Roboto', sans-serif;color: black">Campus Director</a>
               </div>
            </div>
        </span>
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
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
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