<?php 
session_start();
$con=mysqli_connect('localhost','root','','lms');
if(isset($_POST['submitmsg'])){
$username=$_POST['username'];
$email=$_POST['email'];
$message=$_POST['message'];
if($con->connect_error){
        die("No connection");}
$result=$con->query("INSERT INTO `comments`(`username`, `email`, `message`) VALUES ('$username','$email','$message')");
if($result ==TRUE){
echo '<script>alert("You have submitted the form successfully")</script>';
echo'<script>window.location.replace("Home.php")</script>';
}else{
    echo "<script>";
    echo "var mydiv=document.getElementById('section');";
    echo "mydiv.innerHTML='<h2 style=\"color: green;\">Sorry, some thing went wrong while submitting your comment.<br><br><br><a id=\"back\" href=\"Home.php\">&larr;Back</a></h2>';";
    echo "</script>";
}
}
?>