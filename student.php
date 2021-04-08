<?php 
session_start();

include_once("db.php");

include_once("header.php");
include_once("sidebar.php");
include_once("navbar.php");
if ( !isset($_SESSION['email'])){
 	 header('location: ' . $_SERVER['HTTP_REFERER']);
	// header('location: login.php');
	// return; 
}

if ($_REQUEST['case']=="edit"){

	$sql="select * from poperties where id={$_GET["id"]}";
	$stmt=$con->prepare($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$id=$_GET['id'];
?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Forms</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Student Form :</h4>
						</div>
						<div class="form-body">
							<form action="student-process.php?case=update" method="post" enctype="multipart/form-data">
							 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="name" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $row['name'] ;?>" placeholder="Name">
							 </div> <div class="form-group"> <label for="exampleInputPassword1">Location</label> <input type="text" name="location" class="form-control" id="exampleInputPassword1" placeholder="Location" value="<?php echo $row['location'] ;?>">
							 </div>
							  <div class="form-group"> <label for="exampleInputPassword1">Details</label> <input type="text" name="details" class="form-control" id="exampleInputPassword1" placeholder="Details" value="<?php echo $row['details'] ;?>">
							 </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Price</label> <input type="text" class="form-control" name="price" id="exampleInputPassword1" value="<?php echo $row['price'] ;?>" placeholder="Price">
							 </div>
							 <input type="hidden" name="id" value="<?php echo $id;?>">


							  <div class="form-group"> <label for="exampleInputFile">File input</label>
							  <img src="<?= 'avatars/'.$row['image'] ?>" height="25" width="25"/>
							   <input type="file" id="exampleInputFile" name="image"> <p class="help-block">Example block-level help text here.</p> </div> <div class="checkbox"> <label> <input type="checkbox"> Check me out </label> </div> <button type="submit" class="btn btn-default">Submit</button> </form> 
						</div>
					</div>
			<!-- 		
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer-->
	</div>
	<?php
	}

	if ($_REQUEST['case']=="multiple_input") { ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Forms</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Student Form :</h4>
						</div>
						<div class="form-body">
							<form action="student-process.php?case=muliple" id="form" method="post">
							 <div class="form-group"> <label for="exampleInputEmail1">Select Class</label>
							  <select class="form-control" id="class_id" name="class_id" placeholder="Select Class">
							  <?php
							  	$sql3="select * from class";
							  	$stmt3=$con->prepare($sql3);
								$stmt3->execute();
								while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
							  ?>
							      <option value="<?php echo $row3['id']; ?>"><?php echo $row3['name']; ?></option>
							 <?php } ?>
							   </select>
							 </div> 
							 <div class="row">
							 	<div class="form-group col-md-5" style="padding-left: 0px;">
								  <input type="text" name="component[]" class="form-control" id="exampleInputPassword1" placeholder="Enter class Fess component Name">
								 </div>
								 <div class="form-group col-md-5">
								  <input type="text" name="amount[]" class="form-control" id="exampleInputPassword1" placeholder="Enter class Fess component Amount">
								 </div>
							 </div>
							 <div class="add">
							 	
							 </div>
							</form>
							<button class="btn btn-danger" onclick="add_input()">Add+</button>
							<button type="submit" onclick="submit_form()" class="btn btn-default">Submit</button> 
						</div>

					</div>
					
					
					<!-- <script
					  src="https://code.jquery.com/jquery-3.6.0.js"
					  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
					  crossorigin="anonymous"></script> -->
					  
					<script type="text/javascript">
						function add_input(){

							$(".add").append(`<div class="row">
					  		<div class="form-group col-md-5" style="padding-left: 0;">
							  <input type="text" name="component[]" class="form-control" id="exampleInputPassword1" placeholder="Enter class Fees component Name">
							 </div>
					  		<div class="form-group col-md-5">
							  <input type="text" name="amount[]" class="form-control" id="exampleInputPassword1" placeholder="Enter class Fess component Amount">
							 </div>
					  		<a href="#" class="remove_field btn btn-danger">X</a>
					  	</div>`);
						}
						$(".add").on("click",".remove_field", function(e){ //user click on remove text
						e.preventDefault();
						$(this).parent("div").remove();
						});

						function submit_form(){
							document.getElementById("form").submit();
						}

					</script>
			
				</div>

			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer-->
	</div>
	<?php
	}

		if ($_REQUEST['case']=="class") { ?>
			
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Class Table</h4>
						<a href="student.php?case=multiple_input"><button class="btn btn-primary">Add</button></a>
						<br><br>
						<table class="table table-bordered"> 
						<thead>
						 <tr> 
						 	 <th scope="col">Class</th>
						     <th scope="col">Amount</th>
						 </tr> 
						 </thead>
						 <tbody> 
						<?php
						  	$sql1="select * from class";
						  	$stmt1=$con->prepare($sql1);
							$stmt1->execute();
							while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
						  ?>
						    <tr>
						      <th scope="row"><?= $row1["name"]?></th>
						      <td><?php 
						      $id=$row1["id"];
						      $sql2="select sum(amount) as amount from student where class_id={$id}";
						      $stmt2=$con->prepare($sql2);
							  $stmt2->execute();
							  $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
							  echo $row2['amount'];
						      ?>
						      	
						 <?php }  ?>
						 		  </tbody>
						 	 </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer-->
	</div>
	<?php
		}
		if ($_REQUEST["case"]=="teacher") { ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Forms</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Teacher Form</h4>
						</div>
						<div class="form-body">
							<form action="student-process.php?case=teacher" method="post" enctype="multipart/form-data">
							 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
							 </div>

							  <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email">
							 </div>
							  <div class="form-group"> <label for="exampleInputPassword1">Address</label> <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
							 </div>

							 <div class="form-group"> <label for="exampleInputPassword1">Subject</label> <input type="text" class="form-control" name="subject" id="exampleInputPassword1" placeholder="Subject">
							 </div>

							 <div class="form-group"> <label for="exampleInputPassword1">Password</label> <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
							 </div>

							  <div class="form-group"> <label for="exampleInputFile">Image</label> <input type="file" name="image" id="exampleInputFile">
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
        <!--//footer-->
	<?php	} ?>
	<?php
	if ($_REQUEST['case']=="display_teacher") { ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<div class="table-responsive bs-example widget-shadow">
						<h4>Student Table</h4>
						<a href="student.php?case=teacher"><button class="btn btn-primary">Add</button></a>
						<br><br>
						<table class="table table-bordered"> 
						<thead>
						 <tr> 
						 	<th scope="col">Sl no.</th>
		                    <th scope="col">Name</th>
		                    <th scope="col">Eamil</th>
		                    <th scope="col">image</th>
		                    <th scope="col">Address</th>
		                    <th scope="col">Subject</th>
		                    <th scope="col">Password</th>
		                    <th scope="col">Update</th>
		                    <th scope="col">Delete</th>
						 </tr> 
						 </thead>
						 <tbody> 
							<?php
		                     $sql="select * from teacher";
		                     $stmt=$con->prepare($sql);
		                     $stmt->execute();
		                     $i=1;
		                     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		                    {
		                    // Display all data
		                    ?>
						 	<tr> 
						 		<td><?= $i ?></td>
				                    <?php $i++ ?>
			                    <td><?= $row['name'] ?></td>
			                    <td><?= $row['email'] ?></td>
					 		    <td><img src="<?= 'avatars/'.$row['image'] ?>" height="25" width="25"/></td>
					 		    <td><?= $row['address'] ?></td>
			                    <td><?= $row['subject'] ?></td>
			                    <td><?= $row['password'] ?></td>
			                    <td> <a href="student.php?case=teacher_edit&id=<?php echo $row['id'];?>" name="edit" class="btn btn-outline-primary" >Update</a> </td>
			                    <td>
				                    <form action="student-process.php?case=teacher_delete" onclick="return confirm('Do you want to delete')" method="post">
					                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					                    <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
					                    <input type="submit" name="delete" class="btn btn-danger" value="Delete">
				                    </form>
			                    </td>
						 	</tr>
						 <?php }  ?>
						 		  </tbody>
						 	 </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer-->
	</div>

<?php	
	}

	if ($_REQUEST['case']=="teacher_edit") {
	?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Forms</h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Teacher Form</h4>
						</div>
				
						<?php
		                     $sql="select * from teacher where id={$_GET['id']}";
		                     $stmt=$con->prepare($sql);
		                     $stmt->execute();
		                     $i=1;
		                     $row=$stmt->fetch(PDO::FETCH_ASSOC);

		                   ?>
						<div class="form-body">
							<form action="student-process.php?case=teacher_update" method="post" enctype="multipart/form-data">
							 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="name" name="name" class="form-control" value="<?php echo $row['name'] ?>" id="exampleInputEmail1" placeholder="Name">
							 </div>

							  <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" id="exampleInputPassword1" placeholder="Email">
							 </div>
							  <div class="form-group"> <label for="exampleInputPassword1">Address</label> <input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" id="exampleInputPassword1" placeholder="Address">
							 </div>
							 <input type="hidden" name="id" value="<?= $_GET['id']?>">
							 <div class="form-group"> <label for="exampleInputPassword1">Subject</label> <input type="text" class="form-control" value="<?php echo $row['subject'] ?>" name="subject" id="exampleInputPassword1" placeholder="Subject">
							 </div>

							  <div class="form-group"> <label for="exampleInputPassword1">Password</label> <input type="text" class="form-control" value="<?php echo $row['password'] ?>" name="password" id="exampleInputPassword1" placeholder="Password">
							 </div>
							  <div class="form-group"> <label for="exampleInputFile">Image</label>
							  <img src="<?= 'avatars/'.$row['image'] ?>" height="25" width="25"/>
							   <input type="file" name="image" id="exampleInputFile">
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


	<?php
	}
	if ($_REQUEST['case']=="student1") {
	?>
	
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
				
						<?php
		                     // $sql="select * from teacher where id={$_GET['id']}";
		                     // $stmt=$con->prepare($sql);
		                     // $stmt->execute();
		                     // $i=1;
		                     // $row=$stmt->fetch(PDO::FETCH_ASSOC);

		                   ?>
						<div class="form-body">
							<form action="student-process.php?case=student1_insert" method="post" enctype="multipart/form-data">
							 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="name" name="name" class="form-control" required id="exampleInputEmail1" placeholder="Name">
							 </div>

							 <div class="form-group"> <label for="exampleInputPassword1">Rollno.</label> <input type="text" class="form-control" required="" name="rollno" id="exampleInputPassword1" placeholder="Rollno">
							 </div>

							  <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="email" class="form-control" name="email" required="" id="exampleInputPassword1" placeholder="Email">
							 </div>

							  <div class="form-group"> <label for="exampleInputPassword1">Address</label> <input type="text" name="address" required="" class="form-control" id="exampleInputPassword1" placeholder="Address">
							 </div>
							  <div class="form-group"> <label for="exampleInputPassword1">Password</label> <input type="password" name="password" required="" class="form-control" id="exampleInputPassword1" placeholder="Password">
							 </div>

							<div class="form-group"> <label for="exampleInputEmail1">Select Class</label>
							  <select class="form-control" id="class_id" name="class_id" placeholder="Select Class">
							  <?php
							  	$sql3="select * from class";
							  	$stmt3=$con->prepare($sql3);
								$stmt3->execute();
								while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
							  ?>
							      <option value="<?php echo $row3['id']; ?>"><?php echo $row3['name']; ?></option>
							 <?php } ?>
							   </select>
							 </div> 

							  <div class="form-group"> <label for="exampleInputFile">Image</label>
							   <input type="file" name="image" required="" id="exampleInputFile">
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


	<?php
	}
	if ($_REQUEST["case"]=="display_student1") { ?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<div class="table-responsive bs-example widget-shadow">
						<h4>Student Table</h4>
						<a href="student.php?case=student1"><button class="btn btn-primary">Add</button></a>
						<br><br>
						<table class="table table-bordered"> 
						<thead>
						 <tr> 
						 	<th scope="col">Sl no.</th>
		                    <th scope="col">Name</th>
		                    <th scope="col">Rollno</th>
		                    <th scope="col">Eamil</th>
		                    <th scope="col">image</th>
		                    <th scope="col">Address</th>
		                    <th scope="col">class</th>
		                    <th scope="col">Password</th>
		                    <th scope="col">Update</th>
		                    <th scope="col">Delete</th>
						 </tr> 
						 </thead>
						 <tbody> 
							<?php
		                     $sql="select * from studen1";
		                     $stmt=$con->prepare($sql);
		                     $stmt->execute();
		                     $i=1;
		                     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		                    {
		                    // Display all data
		                    ?>
						 	<tr> 
						 		<td><?= $i ?></td>
				                    <?php $i++ ?>
			                    <td><?= $row['name'] ?></td>
			                    <td><?= $row['rollno'] ?></td>
			                    <td><?= $row['email'] ?></td>
					 		    <td> <img src="<?= 'avatars/'.$row['image'] ?>" height="25" width="25"/></td>
					 		    <td><?= $row['address'] ?></td>
			                    <td>
			                    	<?php
			                    	$sql2="select name from class where id={$row['class_id']}";
			                    	$stmt2=$con->prepare($sql2);
		                     		$stmt2->execute();
		                     		$row12=$stmt2->fetch(PDO::FETCH_ASSOC);
		                     		echo $row12["name"];
			                    	?>
			                    </td>
			                    <td><?= $row['password'] ?></td>
			                    <td> <a href="student.php?case=student1_edit&id=<?php echo $row['id'];?>" name="edit" class="btn btn-outline-primary" >Update</a> </td>
			                    <td>
				                    <form action="student-process.php?case=student1_delete" onclick="return confirm('Do you want to delete')" method="post">
					                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					                    <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
					                    <input type="submit" name="delete" class="btn btn-danger" value="Delete">
				                    </form>
			                    </td>
						 	</tr>
						 <?php }  ?>
						 		  </tbody>
						 	 </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer-->
	</div>
<?php
	}
	if ($_REQUEST['case']=='student1_edit') { ?>

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
				
						<?php
		                     $sql="select * from studen1 where id={$_GET['id']}";
		                     $stmt=$con->prepare($sql);
		                     $stmt->execute();
		                     $i=1;
		                     $row=$stmt->fetch(PDO::FETCH_ASSOC);

		                   ?>
						<div class="form-body">
							<form action="student-process.php?case=student1_update" method="post" enctype="multipart/form-data">
							 <div class="form-group"> <label for="exampleInputEmail1">Name</label> <input type="name" name="name" class="form-control" value="<?php echo $row['name'] ?>" required id="exampleInputEmail1" placeholder="Name">
							 </div>

							 <div class="form-group"> <label for="exampleInputPassword1">Rollno.</label> <input type="text" class="form-control" required="" name="rollno" id="exampleInputPassword1" value="<?php echo $row['rollno'] ?>" placeholder="Rollno">
							 </div>

							  <div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required="" id="exampleInputPassword1" placeholder="Email">
							 </div>
							 <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
							 <div class="form-group"> <label for="exampleInputPassword1">Address</label> <input type="text" name="address" required="" class="form-control" id="exampleInputPassword1" value="<?php echo $row['address'] ?>" placeholder="Address">
							 </div>
							 <div class="form-group"> <label for="exampleInputPassword1">Password</label> <input type="password" name="password" required="" class="form-control" id="exampleInputPassword1" value="<?php echo $row['password'] ?>" placeholder="Password">
							 </div>

							<div class="form-group"> <label for="exampleInputEmail1">Select Class</label>
							  <select class="form-control" id="class_id" name="class_id" placeholder="Select Class">
							  <?php
							  	$sql3="select * from class";
							  	$stmt3=$con->prepare($sql3);
								$stmt3->execute();
								while($row3=$stmt3->fetch(PDO::FETCH_ASSOC)){
							  ?>
							      <option value="<?php echo $row3['id']; ?>"><?php echo $row3['name']; ?></option>
							 <?php } ?>
							   </select>
							 </div> 

							  <div class="form-group"> <label for="exampleInputFile">Image</label>
							   <input type="file" name="image" id="exampleInputFile">
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
<?php
	}
	?>
<?php

	include_once("footer.php");
	?>





