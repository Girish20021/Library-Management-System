<html>
    <head>
    <style>
    h3{
        font-size:15px;
        color:lightblue;
    }
    </style>
        <meta charset="UTF-8">
        <title>Remove Books page</title>
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
                <form id='login' class='input-login' method="POST">
                    <input type='text' class='input-field' placeholder='&#xf007; Bookid'name="bookid" required><br><br>
                    <input type="submit" value="&#xf090; Remove" name="deletebook" class="submit-btn"/>
                </form>
                <?php
error_reporting(0);
session_start();
$myid=$_POST['bookid'];
if(isset($_POST['deletebook']))
{
    $conn=new mysqli('localhost','root','','lms');
    if($conn->connect_error)
        die("N ocnnection");
    $sql1="select * from books where bookid=$myid";
    $record=$conn->query($sql1);
    if($record->num_rows)
    {//if row exist
           $sql2="delete from books where bookid=$myid";
        if($conn->query($sql2))
        {
            echo "
        <h3>The Book:$title is deleted from database</h3><br/>
        ";
        }
        else
        {
            echo "
            <h3>Something went wrong</h3><br/>
            ";
        }  
    }
   else
   {//if no row exist
    echo "
    <h3>There is no such book exist in database</h3><br/>
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
