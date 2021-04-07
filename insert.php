<?php
// session_start();
// if ( !isset($_SESSION['email'])){

//     header("location:login.php");
// }
require_once("db.php");

$rand=rand(1,9999999999999);
$name=$_POST["name"];
$location=$_POST["location"];
$details=$_POST["details"];
$category=$_POST["category"];
$date=$_POST["date"];
$price=$_POST["price"];
$file=$_FILES["image"]['tmp_name'];
$file_name=$rand.$_FILES["image"]['name'];

move_uploaded_file($file,"avatars/".$file_name);

// echo "$name and $roll";

$insert= "INSERT INTO poperties (name,location,details,category,date,price,image) VALUES(?,?,?,?,?)";
$run=$con->prepare($insert)->execute([$name,$location,$details,$date,$category,$price,$file_name]);
   
header("location:./tables.php");