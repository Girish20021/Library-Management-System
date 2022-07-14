<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Contactus</title>
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
        <div id='query-form' class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <form id='query' class='query-submit' method="post" action="Message.php">
                        <input type='text' class='input-field'placeholder='&#xf007; Username' name="username" required><br><br>
                        <input type='text' class='input-field'placeholder='&#xf2be; Email'  name="email"required><br><br>
                        <TEXTAREA type='text' class='input-field'placeholder='&#xf27a; Suggestion' name="message"required ROWS="4" COLS="25"></TEXTAREA><br><br>
                        <input type="submit" value="&#xf1d8; Submit" name="submitmsg" class="submit-btn" id="submitbtn">
                    </form>
            </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.getElementById('logo').setAttribute('draggable', false);
    </script>

    </body>
</html>