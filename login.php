<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
include_once("header.php");
// include_once("sidebar.php");
if (isset($_SESSION['msg'])) {
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
?>

		<!--left-fixed -navigation-->		
		<!-- header-starts -->
		
		<!-- //header-ends -->
		<!-- main content start-->

		<?php
		if ($_REQUEST["case"]=="admin") {
		?>

		<div>
			<div class="main-page login-page ">
				<h2 class="title1">Admin Login</h2>
				<div class="widget-shadow">
					<div class="login-body" style="border-bottom: 1px solid black">
						<form action="login-process.php?case=admin" method="post">
							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
							<input type="password" name="password" class="lock" placeholder="Enter Your Password" required="">
							<!-- div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div> -->
							<input type="submit" name="Sign In" value="Sign In">
							<!-- <div class="registration">
								Don't have an account ?
								<a class="" href="signup.html">
									Create an account
								</a>
							</div> -->
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<!--footer-->
		<!-- <div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
		</div> -->
        <!--//footer-->
<?php
}else{ 
	if ($_REQUEST["case"]=="teacher") { ?>
			<div>
			<div class="main-page login-page ">
				<h2 class="title1">Teacher Login</h2>
				<div class="widget-shadow">
					<div class="login-body" style="border-bottom: 1px solid black">
						<form action="login-process.php?case=teacher" method="post">
							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
							<input type="password" name="password" class="lock" placeholder="Password" required="">
							<!-- <div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div> -->
							<input type="submit" name="Sign In" value="Sign In">
							<!-- <div class="registration">
								Don't have an account ?
								<a class="" href="signup.html">
									Create an account
								</a>
							</div> -->
						</form>
					</div>
				</div>
				
			</div>

<?php
	}else{

	?>

	<div>
			<div class="main-page login-page ">
				<h2 class="title1"> Student Login</h2>
				<div class="widget-shadow">
					<div class="login-body" style="border-bottom: 1px solid black">
						<form action="login-process.php?case=student1" method="post">
							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
							<input type="password" name="password" class="lock" placeholder="Password" required="">
							<!-- <div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div> -->
							<input type="submit" name="Sign In" value="Sign In">
							<!-- <div class="registration">
								Don't have an account ?
								<a class="" href="signup.html">
									Create an account
								</a>
							</div> -->
						</form>
					</div>
				</div>
				
			</div>
<?php
}
}//else part
// include_once("footer.php");


 ?>