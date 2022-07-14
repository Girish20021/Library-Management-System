
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Login Page</title>
        <style>
        h3{
            color:lightblue;
            font-size:25px;
        }
        </style>
    </head>
    <body>
    <div class="full-page">
        <div class="navbar">
           <nav>
                <ul id='MainMenu'>
                   <li><a href='Home.php'>Home</a></li>
                   <li><a href='Aboutus.php'>About Us</a></li>
                   <li><a href='booksavailable.php'>Books Available</a></li>
                   <li><a href='login.php'>Login</a></li>
               </ul>
           </nav>
        </div>
        <div id='login-form' class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                <?php 
session_start();
$con=mysqli_connect('localhost','root','','lms');
$username=$_POST['username'];
$password=$_POST['password'];
if($con->connect_error){
        die("No connection");}
$s="select * from userslogin where user ='$username'&& pass='$password'";
$result=$con->query($s);
if($result->num_rows!=0){
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];
    header('location:admin.php');
}else{
                   echo "
                  <h3>Incorrect  Username/password.</h3><br/>
                  <p class='link' style = 'color: red ;'>Click here to  <a href='login.php'> Login</a>    again.</p>
                  ";
}
?>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.getElementById('logo').setAttribute('draggable', false);
    </script>

    </body>
</html>