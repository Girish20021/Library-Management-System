<html>
    <head>
    <style>
table {
        
        width: auto;
        height:auto;
    }
    table,th,td {
        padding:7px;
        border: 3px solid lightblue;
        border-collapse: collapse;
    }
h3{
color:red;}
th{
color:lightsalmon;
        font-size: 20px;
}
    td {
color:lightgray;
        font-size: 17px;
    }
    </style>
        <meta charset="UTF-8">
        <title>Search user page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="full-page1">
        <div class="navbar1"> 
           <nav>
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
            <div class="suggestion-box">
                <div class='button-box'>
              <?php

$search = $_POST['username'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "lms";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from users where username like '%$search%'";

$result = $conn->query($sql);
if($result->num_rows!=0)
{
//if row exist
    ?>
    <table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Contact</th>
    </tr>
    <?php
    while($row=$result->fetch_assoc())
    {
    ?>
    <tr>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['contact'];?></td>
        
    </tr>
    <?php    
    }
    ?>
    </table>
<?php
} else {
	echo "
        <h3>The user with username:$search is not found</h3><br/>
        ";
}

$conn->close();
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