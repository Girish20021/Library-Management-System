<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Books Available</title>
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
            <div class="book-box">
                <div class='button-box'>
                <?php
error_reporting(0);
session_start();
?>
   <style>
table { 
        width: auto;
        height:auto;
    }
    table,th,td {
        padding:5px;
        border: 3px solid lightblue;
        border-collapse: collapse;
    }
th{
color:lightsalmon;
        font-size: 20px;
}
    td {
color:lightgray;
        font-size: 17px;
    }
</style>
<?php
$conn=new mysqli('localhost','root','','lms');
if($conn->connect_error)
    die("N ocnnection");
$sql="select * from books";
$records=$conn->query($sql);
if($records->num_rows!=0)
{
//if row exist
    ?>
    <table>
    <tr>
        <th>BookId</th>
        <th>BookName</th>
        <th>AuthorName</th>
        <th>Genre</th>
        <th>Quantity</th>
        <th>BooksIssued</th>
    </tr>
    <?php
    while($row=$records->fetch_assoc())
    {
    ?>
    <tr>
        <td><?php echo $row['bookid'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['author'];?></td>
        <td><?php echo $row['genre'];?></td>
        <td><?php echo $row['book_quantity'];?></td>
        <td><?php echo $row['noofbooksissued'];?></td>
    </tr>
    <?php    
    }
    ?>
    </table>
<?php
}
else
{
    require "Home.php";
     echo "<script>";
    echo "var mydiv=document.getElementById('section');";
    echo "mydiv.innerHTML='<h2 style=\"color: red;\">No record is found.</h2>';";
    echo "</script>";
}
?>
<br>
<?php
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

