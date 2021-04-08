<?php
session_start();  
include_once("db.php");

switch ($_GET['case']) {
  case 'admin':
  	   if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $_SESSION['msg']="<script type='text/javascript'>alert('<label>All fields are required</label>')</script>";
                header("location:login.php?case=admin"); 
           }  
           else  
           {  
                
           		$email=$_POST['email'];
           		$password=$_POST['password'];
                $query = "SELECT * FROM admin WHERE email=? AND password=?";  
                $statement = $con->prepare($query);  
                $statement->execute([$email,$password]);

                if($statement->rowCount())
                {  
	                 $_SESSION["email"] = $_POST["email"];  
	                 header("location:index.php");
                }  
                else  
                {  
                    $_SESSION['msg']="<script type='text/javascript'>alert('Email or password incorrect')</script>";
                    header("location:login.php?case=admin");

                }  
           }


    break;
  case "teacher":
    
    break;
  default:
    break;

}