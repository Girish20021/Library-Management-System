

<html>
    <head>
    <style>
    h3{
    color:lightblue;
    }</style>
        <meta charset="UTF-8">
        <title>Adding the books</title>
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
error_reporting(0);
session_start();
function lastId() {
   $myconn=new mysqli('localhost','root','','lms');
    if($myconn->connect_error)
        die("No connection");
    $sql1="select * from books";
    $records=$myconn->query($sql1);
     $myid=0;
    if($records->num_rows!=0)
    {
         while($row=$records->fetch_array())
         {
             $myid=$row['bookid']; 
         //this while loop is used to obtain the last id in the table
         }
    $myconn->close();
    }
    else
         $myid=0;
    return $myid;
}
$myLastId=lastId();
$myLastId++;
$title=$_POST['bname'];
$author=$_POST['author'];
$category=$_POST['genre'];
$bookQuantity=$_POST['qunatity'];
if(isset($_POST['submitbook']))
{
    $conn=new mysqli('localhost','root','','lms');
    if($conn->connect_error)
        die("No connection");
    $sql="INSERT INTO `books`(`bookid`, `title`,`author`,`genre`,`book_quantity`) VALUES ('$myLastId','$title','$author','$category','$bookQuantity')";
    if($conn->query($sql)==TRUE)
    {
        echo "
        <h3>The Book:$title is added into database</h3><br/>
        <p class='link' style = 'color: red ;'>Click here to  <a href='Addbook.php'>Add Book</a>    again.</p>
        ";
    }
    else
    {
        echo "
        <h3>Something went wrong </h3><br/>
        <p class='link' style = 'color: red ;'>Click here to  <a href='Addbook.php'>Add Book</a>    again.</p>
        ";
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




