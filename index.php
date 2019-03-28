<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="favicon2.png" type="image/x-icon" rel="shortcut icon">
    <title>Student Attendance management system</title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Spirax" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom Theme Style -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="build/css/mycss.css">
    <style type="text/css">
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(black,white);
        font-family:'Roboto', sans-serif;
        font-size: 12px;

    }
    * {
        box-sizing: border-box;
    }
    .myimage{
        background-image: url("images/hoshiarpur_campus.jpg");
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display:none;
    }
    @media screen and (max-width: 830px){
	.myCarousel{
		display:none;
    }
    .myimage{
        display:block;
       
    }
} 
   
</style>
    
    <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
  </head>

  <body>
  
 
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
            <div id="mySidenav" class="sidenav visi" style="z-index:125">
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
   
   
    <div class="row">
  
        <div id="myCarousel" class="carousel slide myCarousel" data-ride="carousel">
        <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active mystyle">
                    <img  class="mystyle d-block img img-fluid w-100 img-responsive" src="images/campus4.jpg"  >
                </div>

                <div class="item mystyle">
                    <img class="mystyle d-block img img-fluid w-100 img-responsive" src="images/hoshiarpur_campus.jpg"  >
                </div>
    
                <div class="item mystyle">
                    <img class="mystyle d-block img img-fluid w-100 img-responsive" src="images/campus2.jpg"  >
                </div>
             </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
        <div class="myimage" style="height:350px;width:100%">
           <!-- <img class="myimage" src="images/hoshiarpur_campus.jpg" style="height:350px;width:100%">-->
        </div>
    </div>
    <div class="conainer" style="background:#c1c2c2;font-family: 'Roboto', sans-serif;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2" style="padding-top: 30px ;color: black;">
                <img  class="img img-fluid img-responsive img-thumbnail" src="images/chander_mohan.jpg" >
                <h5 style="font-family: 'Indie Flower', cursive;"> Dr.Chander Mohan</h5>

                <h5> Campus Director</h5>

            </div>
            <div class="col-md-5" style="color:black;margin-top: 30px;border: 1px solid black;">
                <h4>Institutes @ Hoshiarpur Campus</h4>
                <ul style="border: 10px">
                    <li><h6>Rayat-Bahra Institute of Engineering & Nano-Technology</h6></li>
                    <li><h6>Rayat - Bahra Institute of Management</h6></li>
                    <li><h6>Rayat - Bahra Institute of Pharmacy</h6></li>
                    <li><h6>Rayat - Bahra College of Education</h6></li>
                    <li><h6>Rayat - Bahra College of Nursing</h6></li>
                    <li><h6>Rayat - Bahra Institute of Engineering & Nano-Technology (School Wing)</h6></li>
                    <li><h6>Rayat - Bahra College of Law</h6></li>



                </ul>

            </div>
            <div class="col-md-3" style="padding-top: 30px;padding-left: 30px;color: black">
                <h4>Nearest</h4>
                <div style="height:60px width:40px;border: 1px solid black;padding: 6px">
                    <img src="images/bus.svg" style="height:20px"> 
                    Bus Stand : Hoshiarpur(12.3KM)
                </div>
                <div style="height:60px width:40px;border: 1px solid black;padding: 6px; margin-top: 10px">
                    <img src="images/train.svg" style="height:20px"> 
                    Railway Station : Hoshiarpur(11 KM)
                </div>
                <div style="height:60px width:40px;border: 1px solid black;padding: 6px;margin-top:10px">
                    <img src="images/plane.svg" style="height:20px"> 
                    Airport : Chandigarh(151 KM)
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
            
       </div>
     
    <!-- Footer -->
        <footer class="page-footer container-fluid" style="background:#222222;color: white ">

        <!-- Footer Links -->
        <div class="container-fluid text-center">

          <!-- Grid row -->
          <div class="row text-center">

            <!-- Grid column -->
            <div class=" ">

              <!-- Content -->
              <h5 class="text-uppercase">Rayat - Bahra Hoshiarpur Campus</h5>
              

              <p>V.P.O Bohan, Tehsil & Distt. Hoshiarpur, Punjab- 146001</p>
              <p>Website designed and developed by : MOHIT KUMAR, B.TECH(IT) 2016 BATCH</p>


            </div>
            <!-- Grid column -->

            

            <!-- Grid column -->
            

          </div>
          <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        
        
      </footer>
  <!-- Footer -->
  

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
