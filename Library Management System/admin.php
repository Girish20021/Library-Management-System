<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Page</title>
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
        <div class="HomePage1">
            <h1>Library Management System</h1>
            <a href="Issue book.php">Issue Book</a>
            <h2> Library will be open from 8:00 AM - 6:00 PM Every day</h2><br>
            <h2> To create new account navigate to create new Admin<a href="Create admin.php">Click here</a></h2>
        </div>
    </div>
    </body>

    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.getElementById('logo').setAttribute('draggable', false);
    </script>

</html>