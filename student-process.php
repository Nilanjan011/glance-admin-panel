<?php
include_once("db.php");

if ($_REQUEST["case"]=="logout") {
	session_destroy();//session destroy
    unset($_SESSION['email']); //destroy session array
    header("location: login.php");
}


if ($_REQUEST['case']=="update") {
	// var_dump($_POST);
	// var_dump($_FILES);
	// exit;
	$rand=rand(1,9999999999999);
	$id=$_POST["id"];
	$name=$_POST["name"];
	$location=$_POST["location"];
	$details=$_POST["details"];
	$price=$_POST["price"];
	$file=$_FILES["image"]['tmp_name'];
	$file_name=$rand.$_FILES["image"]['name'];

	 if(isset($file) && $file!="") {// new image update 
	        $sql="update poperties set name=?, location=?,price=?,image=? where id=?";
	        $run=$con->prepare($sql)->execute([$name,$location,$price,$file_name,$id]);
	        move_uploaded_file($file,"avatars/".$file_name);
	       	header("location:./tables.php");
	        
	    }else{
	        // without image update 
	        $sql="update poperties set name=?, location=?,price=? where id=?";

	        $run=$con->prepare($sql)->execute([$name,$location,$price,$id]);
	        header("location:./tables.php");;
	      
	    }

	}

if ($_REQUEST['case']=="insert") {
	$rand=rand(1,9999999999999);
	$name=$_POST["name"];
	$location=$_POST["location"];
	$details=$_POST["details"];
	$price=$_POST["price"];
	$file=$_FILES["image"]['tmp_name'];
	$file_name=$rand.$_FILES["image"]['name'];

	move_uploaded_file($file,"avatars/".$file_name);



	// echo "$name and $roll";

	$insert= "INSERT INTO poperties (name,location,details,price,image) VALUES(?,?,?,?,?)";
	$run=$con->prepare($insert)->execute([$name,$location,$details,$price,$file_name]);
	   
	header("location:./tables.php");
}

if($_REQUEST['case']=="delete"){
	$img=$_POST["image"];
    $sql="DELETE FROM poperties WHERE id={$_POST["id"]}";
    $con->prepare($sql)->execute(); 
    unlink("avatars/".$img);
    header("location:./tables.php");
}

	if($_REQUEST['case']=="muliple"){
		// print_r($_POST);
		$class_id=$_POST["class_id"];
		$component=$_POST["component"];

		$amount=$_POST["amount"];
		$count=(count($amount));
		for ($i=0; $i < $count; $i++) {
			$com=$component[$i];
			$amt=$amount[$i];
			$insert= "INSERT INTO student (class_id,component,amount) VALUES(?,?,?)";
			$run=$con->prepare($insert)->execute([$class_id,$com,$amt]);
		}
		header('location:student.php?case=class');

	}

	if ($_REQUEST['case']=="teacher") {
		$rand=rand(1,9999999999999);
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST["password"];
		$address=$_POST['address'];
		$subject=$_POST['subject'];
		$file=$_FILES["image"]['tmp_name'];
		$file_name=$rand."-".$_FILES["image"]['name'];

		move_uploaded_file($file,"avatars/".$file_name);

		$insert= "INSERT INTO teacher (name,email,address,subject,image,password) VALUES(?,?,?,?,?,?)";
		$run=$con->prepare($insert)->execute([$name,$email,$address,$subject,$file_name,$password]);

		header('location:student.php?case=display_teacher');

	}

	if ($_REQUEST['case']=="teacher_delete") {
		$img=$_POST["image"];
	    $sql="DELETE FROM teacher WHERE id={$_POST["id"]}";
	    $con->prepare($sql)->execute(); 
	    unlink("avatars/".$img);
	    header("location:./student.php?case=display_teacher");
	}
	if ($_REQUEST['case']=="teacher_update") {
		$rand=rand(1,9999999999999);
		$id=$_POST["id"];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$subject=$_POST['subject'];
		$password=$_POST['password'];
		$file=$_FILES["image"]['tmp_name'];
		$file_name=$rand."-".$_FILES["image"]['name'];

		 if(isset($file) && $file!="") {// new image update 
		        $sql="update teacher set name=?, email=?,address=?,subject=?,password=? image=? where id=?";
		        $run=$con->prepare($sql)->execute([$name,$email,$address,$subject,$password,$file_name,$id]);
		        move_uploaded_file($file,"avatars/".$file_name);
		       	header("location:./student.php?case=display_teacher");
		        
		    }else{
		        // without image update 
		        $sql="update teacher set name=?, email=?,address=?,subject=?,password=? where id=?";

		        $run=$con->prepare($sql)->execute([$name,$email,$address,$subject,$password,$id]);
		        header("location:./student.php?case=display_teacher");
		      
		    }
	}
	if ($_REQUEST["case"]=="student1_insert") {
		// echo "<pre>";
		// print_r($_POST);
		// print_r($_FILES);
		// die();
		$rand=rand(1,9999999999999);
		$name=$_POST['name'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$rollno=$_POST['rollno'];
		$class_id=$_POST['class_id'];
		$password=$_POST['password'];

		$file=$_FILES["image"]['tmp_name'];
		$file_name=$rand."-".$_FILES["image"]['name'];

		move_uploaded_file($file,"avatars/".$file_name);

		$insert= "INSERT INTO studen1 (name,email,address,rollno,image,class_id,password) VALUES(?,?,?,?,?,?,?)";
		$run=$con->prepare($insert)->execute([$name,$email,$address,$rollno,$file_name,$class_id,$password]);

		header('location:student.php?case=display_student1');
	}

	if ($_REQUEST['case']=="student1_delete") {
		$img=$_POST["image"];
	    $sql="DELETE FROM studen1 WHERE id={$_POST["id"]}";
	    $con->prepare($sql)->execute(); 
	    unlink("avatars/".$img);
	    header("location:./student.php?case=display_student1");
	}

	if ($_REQUEST['case']=="student1_update") {
		// echo "<pre>";
		// var_dump($_POST);
		// var_dump($_FILES);die();
		$rand=rand(1,9999999999999);
		$id=$_POST["id"];
		$name=$_POST['name'];
		$rollno=$_POST['rollno'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$password=$_POST['password'];
		$class_id=$_POST['class_id'];
		$file=$_FILES["image"]['tmp_name'];
		$file_name=$rand."-".$_FILES["image"]['name'];

		 if(isset($file) && $file!="") {// new image update 
		        $sql="update studen1 set name=?, email=?, rollno=?,address=?,class_id=?, image=?,password where id=?";
		        $run=$con->prepare($sql)->execute([$name,$email,$rollno,$address,$class_id,$file_name,$password,$id]);
		        move_uploaded_file($file,"avatars/".$file_name);
		       	header("location:./student.php?case=display_student1");
		        
		    }else{
		        // without image update 
		        $sql="update studen1 set name=?, email=?, rollno=?,address=?,class_id=?,password=? where id=?";

		        $run=$con->prepare($sql)->execute([$name,$email,$rollno,$address,$class_id,$password,$id]);
		        header("location:./student.php?case=display_student1");
		      
		    }
	}


?>