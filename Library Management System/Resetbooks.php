<html>
    <head>
    <style>
    h3{
        color:lightblue;
        font-size:15px;
    }
    </style>
        <meta charset="UTF-8">
        <title>Resetbooks page</title>
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
                <form id='login' class='input-login' method='POST'>
                <input type='text' class='input-field' placeholder='&#xf007; Book id' name='bid' required><br><br>
                    <input type='text' class='input-field' placeholder='&#xf007; Title' name='bname' required><br><br>
                    <input type='text' class='input-field' placeholder='&#xf007; Author' name='author' required><br><br>
<input type='text' class='input-field' placeholder='&#xf007; No Of Books' name='quantity' required><br><br>
                    <input type="submit" value="&#xf2b5; Reset" name="resetbook"class="submit-btn"/>
                </form>
                <?php
error_reporting(0);
session_start();
$bookId=$_POST['bid'];
$title=$_POST['bname'];
$author=$_POST['author'];
$bookQuantity=$_POST['quantity'];
if(isset($_POST['resetbook']))
{
    $conn=new mysqli('localhost','root','','lms');
    if($conn->connect_error)
        die("No connection");
    $sqlcheck="select * from books where bookid=$bookId";
    $record=$conn->query($sqlcheck);
    if($record->num_rows)
    {
        //if row is available
    $sqlupdate="update books set title='$title',author='$author',book_quantity=$bookQuantity where bookid=$bookId"; 
        if($conn->query($sqlupdate))
        {
            echo "
        <h3>The Book details with id:$bookId is done with resetting</h3><br/>
        ";
        }
        else
        {
            echo "
            <h3>Something Went wrong please try again</h3><br/>
            ";
        }
    }
    else
    {
        echo "
        <h3>The Book details with id:$bookId is not present in database please add it first</h3><br/>
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