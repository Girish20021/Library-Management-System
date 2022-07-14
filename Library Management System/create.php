

<html>
    <head>
    <style>
    h3{
        color:lightblue;
        font-size:15px;
    }
    h2{
        color:orange;
        font-size:15px;
    }
    </style>
        <meta charset="UTF-8">
        <title>Admin creation page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="full-page1">
        <div class="navbar1"> 
        <nav>
               <ul id='MainMenu'>
                   <li><a href='admin.php'>Home</a></li>
                   <li><a href='Issue book.php'>Issue book</a></li>
                   <li><a href='returnbook.php'>Return Book</a></li>
                   <li><a href='Create user.php'>Create user</a></li>
                   <li><a href='Create admin.php'>Create new admin</a></li>
                   <li><a href='Password.php'>Change Password</a></li>
                   <li><a href='logout.php'>Logout</a></li>
               </ul>
            </nav>
        </div>
        <div id='issue-form' class='issue-page'>
            <div class="form-box">
                <div class='button-box'>
               
<?php 
session_start();
$con=mysqli_connect('localhost','root','','lms');
if(isset($_POST['submitadmin'])){
    $email=$_POST['emailid'];
    $password=$_POST['password'];
    $username=$_POST['username'];
    $dates = date('Y-m-d',strtotime($_POST['doj']));
    if($con->connect_error)
        die("No connection");
    $result=$con->query("INSERT INTO `userslogin`(`user`, `email`, `pass`,`date`) VALUES ('$username','$email','$password','$dates')");
    if($result==TRUE)
        {
            echo "<div>
                  <h3>Admin account created.</h3><br/>
                  <p class='link' style = 'color: red ;'>Userid:<h2>$username</h2>.</p>
                  </div>"; 
        }
    else{
        echo "<div>
        <h3>Admin exist.</h3><br/>
        <p class='link' style = 'color: red ;'>Userid:<h2>$username</h2>.</p>
        </div>"; 
    }
}
?>

            </div>
        </div>
    </div>
        <div class="navbar2">
        <nav1>
        <li><a href=' '>Issue Status</a></li>
           <li><a href=' '>Issue Status</a></li>
           <li><a href=' '>Issue Status</a></li>
          <img id = "logo" src="https://i.pinimg.com/originals/0a/cd/50/0acd5002683fbcf2b720004f201ee530.jpg">
            <ul id='MainMenu1'>
             <li><a href='Issuestatus.php'>Issue Status</a></li>
             <li><a href='Returnstatus.php'>Return Status</a></li>
             <li><a href='Addbook.php'>Add New books</a></li>
             <li><a href='removebook.php'>Remove books</a></li>
             <li><a href='Resetbooks.php'>Reset book details</a></li>
             <li><a href='searchuser.php'>Search a user</a></li>
             <li><a href='Suggestions.php'>Suggestions or comments</a></li>
            </ul>
         </nav1>
        </div>
    </div>
    </body>

    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.getElementById('logo').setAttribute('draggable', false);
    </script>

</html>











<?php 
session_start();
$con=mysqli_connect('localhost','root','','lms');
if(isset($_POST['submitadmin'])){
    $email=$_POST['emailid'];
    $password=$_POST['password'];
    $username=$_POST['username'];
    $dates = date('Y-m-d',strtotime($_POST['doj']));
    if($con->connect_error)
        die("No connection");
    $result=$con->query("INSERT INTO `userslogin`(`user`, `email`, `pass`,`date`) VALUES ('$username','$email','$password','$dates')");
   require "Create admin.php";
    if($conn->query($sql))
        {
            echo "<script>";
            echo "var mydiv=document.getElementById('section');";
            echo "mydiv.innerHTML='<h2 style=\"color: green;\">you have successfully added.<br>The username is => <u><span style=\"color: blue;font-size:30px;\">".$username."<span></u></h2>';";
            echo "</script>";
        }
}
?>