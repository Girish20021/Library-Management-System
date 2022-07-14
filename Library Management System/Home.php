<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </div>
    <div class="HomePage">
        <h1>Library Management System</h1>
        <a href="Contactus.php">Contact us</a>
        <h2> Library will be open from 8:00 AM - 6:00 PM Every day</h2>
    </div>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.getElementById('logo').setAttribute('draggable', false);
    </script>
    </body>
</html>