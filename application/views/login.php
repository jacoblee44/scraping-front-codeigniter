<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login-CI Login Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
  </head>
  <body>

    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Please do Login here</h3>
                </div>
                

                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo site_url(); ?>/user/login_user">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Enter Username" name="user_name" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Password" name="user_password" type="password" value="">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                        </fieldset>
                    </form>
                		<center><b>You are not registered ?</b> <br></b><a href="<?php echo site_url(); ?>/user">Register here</a></center>for centered text

                </div>
            </div>
        </div>
    </div>
</div>


  </body> -->
<!-- </html> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/select2/select2.min.css">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>css/toastr.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
<!--===============================================================================================-->
<style>
.container1 {
  position: relative;
  width: 320px;
  margin: 100px auto 0 auto;
  perspective: 1000px;
}

.carousel {
  position: absolute;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d; 
  animation: rotate360 60s infinite forwards linear;
}
.carousel__face { 
  position: absolute;
  width: 300px;
  height: 187px;
  top: 20px;
  left: 10px;
  right: 10px;
  background-size: cover;
  box-shadow:inset 0 0 0 2000px rgba(0,0,0,0.3);
  display: flex;
}

span {
  margin: auto;
  color: white;
  font-size: 2rem;
}


.carousel__face:nth-child(1) {
  background-image: url("https://c4.wallpaperflare.com/wallpaper/679/723/812/las-vegas-strip-at-night-seen-from-the-balcony-of-the-cosmopolitan-hotel-desktop-wallpaper-for-pc-tablet-and-mobile-download-2560%C3%971600-wallpaper-preview.jpg");
  transform: rotateY(  0deg) translateZ(430px); }
.carousel__face:nth-child(2) { 
  background-image: url("https://www.arabianbusiness.com/public/styles/landscape/public/images/2019/11/07/The-Collective-Community-2.jpg?iQmy1Whd");
    transform: rotateY( 45deg) translateZ(430px); }
.carousel__face:nth-child(3) {
  background-image: url("https://vistapointe.net/images/hostel-wallpaper-11.jpg");
  transform: rotateY( 90deg) translateZ(430px); }
.carousel__face:nth-child(4) {
  background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgmWfHjwwFmpP6Fg_GEkHmTBV9CNrorykHDdbiGq8twCz4xCw4Kryc0qrG2iHP7JWO8fg&usqp=CAU");
  transform: rotateY(135deg) translateZ(430px); }
.carousel__face:nth-child(5) { 
  background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIGShIbIDsAdWxIGgHGBcVFCrBv3FtEoUqfw&usqp=CAU");
 transform: rotateY(180deg) translateZ(430px); }
.carousel__face:nth-child(6) { 
  background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1rTUphfYXBbBRL-vOlilSRs7NSnedtgE9gw&usqp=CAU");
 transform: rotateY(225deg) translateZ(430px); }
.carousel__face:nth-child(7) { 
  background-image: url("https://c0.wallpaperflare.com/preview/151/311/804/stanford-university-campus-tower.jpg");
 transform: rotateY(270deg) translateZ(430px); }
.carousel__face:nth-child(8) {
  background-image: url("https://www.csinow.edu/wp-content/uploads/2021/11/housing.jpg");
  transform: rotateY(315deg) translateZ(430px); }



@keyframes rotate360 {
  from {
    transform: rotateY(0deg);
  }
  to {
    transform: rotateY(-360deg);
  }
}

</style>
</head>
<body style="background-color: #666666; ">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="post" action="<?php echo site_url(); ?>/user/login_user">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="user_name">
						<span class="focus-input100"></span>
						<span class="label-input100">UserName</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="user_password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
					<?php
						$success_msg= $this->session->flashdata('success_msg');
						$error_msg= $this->session->flashdata('error_msg');
						$flag = false;
						if($success_msg){
						?>
						<div class="alert alert-success">
							<?php echo $success_msg; ?>
						</div>
						<?php
						}
						if($error_msg){
						?>
						<div class="alert alert-danger">
							<?php echo $error_msg; ?>
						</div>
						<?php
						}
						?>
          
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<br>
					<br>
					<div style="display: block; margin-left: auto; margin-right: auto; width: 50%; position: relative">
						<a href="<?php echo site_url(); ?>/user" style="position: absolute; left: 37%"><strong>Sign up</strong></a>
					</div>
				</form>
				<div style="text-align: center; margin-right: 25%; margin-top: 9%">
					<div class="container1">
						<div class="carousel">
							<div class="carousel__face"><span>Hotel</span></div>
							<div class="carousel__face"><span>Co-living Space</span></div>
							<div class="carousel__face"><span>Hostel</span></div>
							<div class="carousel__face"><span>Vacation Rental</span></div>
							<div class="carousel__face"><span>RV Park</span></div>
							<div class="carousel__face"><span>Camping Ground</span></div>
							<div class="carousel__face"><span>University</span></div>
							<div class="carousel__face"><span>Student housing</span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>vendor/countdowntime/countdowntime.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/toastr.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>js/main1.js"></script>

</body>
</html>