<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Login Page</title>
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
                <form id='login' class='input-login' method="post" action=" validation.php">
                    <input type='text' class='input-field' placeholder='&#xf007; Username'name="username" required><br><br>
                    <input type='password' class='input-field' placeholder='&#xf084; Password'name="password" required><br><br>
                    <input type="submit" value="&#xf090; Login" name="submit" class="submit-btn"/>
                </form>
               
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.getElementById('logo').setAttribute('draggable', false);
    </script>

    </body>
</html>