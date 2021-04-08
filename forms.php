

<?php
	include_once("db.php");
	include_once("header.php");
	include_once("sidebar.php");
?>
	
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
					
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
									<div class="user-name">
										<p>Admin Name</p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
								<li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li> 
								<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Forms</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Student Form</h4>
						</div>
						<div class="form-body">
							<form action="student-process.php?case=insert" method="post" enctype="multipart/form-data">
							 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
							 </div> <div class="form-group"> <label for="exampleInputPassword1">Location</label> <input type="text" name="location" class="form-control" id="exampleInputPassword1" placeholder="Location">
							 </div>
							  <div class="form-group"> <label for="exampleInputPassword1">Details</label> <input type="text" class="form-control" name="details" id="exampleInputPassword1" placeholder="Details">
							 </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Price</label> <input type="text" class="form-control" name="price" id="exampleInputPassword1" placeholder="Price">
							 </div>



							  <div class="form-group"> <label for="exampleInputFile">File input</label> <input type="file" name="image" id="exampleInputFile">
							  </div>
							   <button type="submit" class="btn btn-default">Submit</button> 
						</form> 
						</div>
					</div>
			
				</div>
			</div>
		</div>
		<!-- footer -->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer
	</div>-->
	<?php
	include_once("footer.php");
	?>
