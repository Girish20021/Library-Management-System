<html>
    <head>
    <style>
    h3{
        color:lightblue;
        font-size:15px;
    }
    </style>
        <meta charset="UTF-8">
        <title>Issue Page</title>
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
?>
<style>
</style>
<script>
function printContent() {
    var originalBodyPage=document.body.innerHTML;
    var toBePrinted=document.getElementById('sectionToBePrinted').innerHTML;
    document.body.innerHTML=toBePrinted;
    window.print();
    document.body.innerHTML=originalBodyPage;
}
</script>
<?php
if(isset($_POST['submitbook']))
{
    $bookId=$_POST['bookid'];
    $username=$_POST['username'];
    $conn=new mysqli('localhost','root','','lms');
    if($conn->connect_error)
        die("No connection");
    $sql1="select * from users where username='$username'";
    $sql2="select * from books where bookid='$bookId'";
    $record1=$conn->query($sql1);
    $record2=$conn->query($sql2);
    if($record1->num_rows!=0)
    {
        if($record2->num_rows!=0)
        {
            $bookRow=$record2->fetch_assoc();
            $studentRow=$record1->fetch_assoc();
            $book_Title=$bookRow['title'];
            $author_Name=$bookRow['author'];
            $bookQuantity=$bookRow['book_quantity'];//used to check book if it is free 
            $numberOfBooksIssued=$bookRow['noofbooksissued'];
            $Category=$bookRow['genre'];
            $contact=$studentRow['contact'];
            $numberOfBooksIssuedByUser=$studentRow['noofbooksissued'];
            $sql3="insert into issuebook (date_Of_Issue,book_Id,book_Title,username,contact) values(NOW(),$bookId,'$book_Title','$username','$contact')";
            if($bookQuantity-$numberOfBooksIssued>0)
            {
                //check not to issue same book
                $sql4="select * from issuebook where book_Id=$bookId and username='$username'";
                $myCheckRecord=$conn->query($sql4);
                if($myCheckRecord->num_rows==0)
                {
                    //if no such book is not issued before
                    if($conn->query($sql3))
                    {
                         //book issued successfuly
                         $numberOfBooksIssuedByUser++;
                         $numberOfBooksIssued++;
                         $sql6="update users set noofbooksissued=$numberOfBooksIssuedByUser where username='$username'";
                         $sql5="update books set noofbooksissued=$numberOfBooksIssued where bookid=$bookId";
                         $conn->query($sql5);
                         $conn->query($sql6);
                        $currentDate=Date("m-d-Y");
                        $currentDateInArr=explode('-',$currentDate);//converting date in string form to the array form
                        $currentMonth=$currentDateInArr[0];
                        $currentDayNum=$currentDateInArr[1];
                        $currentYear=$currentDateInArr[2];
                        ////////////////////
                        //jan feb march april may june july august sep octo nov dec
                        $totalDayMon=[31,28,31,30,31,30,31,31,30,31,30,31];//the total date in month of the Grigorian calender
                        if($currentDayNum<26)
                        {
                            $newDayNum=$currentDayNum+3;
                            $newMonth=$currentMonth;
                            $newYear=$currentYear;
                        }
                        else
                        { 
                        switch($currentMonth)
                        {
                                //if totalDay of month is 31
                            case 1:
                            case 3:
                            case 5:
                            case 7:
                            case 8:
                            case 10:
                            case 12:
                                switch($currentDayNum)
                                {
                                    case 29:
                                        $newDayNum=1;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    case 30:
                                        $newDayNum=2;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    case 31:
                                        $newDayNum=3;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    default://to include dates such as 26,27,28
                                        $newDayNum=$currentDayNum+3;
                                        $newMonth=$currentMonth;
                                        $newYear=$currentYear;
                                }
                                ///
                                
                                break;
                                ///
                                //if total day of month is 30
                            case 4:
                            case 6:
                            case 9:
                            case 11:
                                switch($currentDayNum)
                                {
                                    case 28:
                                        $newDayNum=1;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    case 29:
                                        $newDayNum=2;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    case 30:
                                        $newDayNum=3;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    default://to include dats such as 26,27
                                        $newDayNum=$currentDayNum+3;
                                        $newMonth=$currentMonth;
                                        $newYear=$currentYear;
                                }
                                
                                break;
                                ////
                                //if total day of month is 28 that is february
                            case 2:
                                switch($currentDayNum)
                                {
                                    case 26:
                                        $newDayNum=1;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    case 27:
                                        $newDayNum=2;
                                       if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    case 28:
                                        $newDayNum=3;
                                        if($currentMonth==12)
                                        {
                                            $newMonth=1;
                                            $newYear=$currentYear+1;
                                        }
                                        else
                                        {
                                            $newMonth=$currentMonth+1;
                                            $newYear=$currentYear;
                                        }
                                        break;
                                    default:
                                        break;
                                }
                            
                            default:
                                break;
                                
                        }
                        }
                        //set the return date oof the book in the issuebook
                        $dateOfReturn=$newYear.'-'.$newMonth.'-'.$newDayNum;
                        $sql7="update issuebook set date_Of_Return='$dateOfReturn' where book_Id=$bookId and username='$username'";
                        $conn->query($sql7);
                        /////////////////////
                        echo "<div>
                  <h3>Book Issued.</h3><br/>
                  <p class='link' style = 'color: red ;'>Click here to <a href='Issue book.php'>Issue</a>.</p>
                  </div>";    
                    }
                    else
                    {

                        echo "<div>
                  <h3>Something went wrong.</h3><br/>
                  <p class='link' style = 'color: red ;'>Not valid<a href='Issue book.php'>Issue</a>.</p>
                  </div>";
                        
                    }
                }
                else
                {
                    //if it is intended to issue book more than one
echo "<div>
                  <h3>Intended to issue book more than one</h3><br/>
                  <p class='link' style = 'color: red ;'>Return the book First<a href='returnbook.php'></a>.</p>
                  </div>";
                    
                }
            }
            else
            {
                //there is no free book i.e all books are issued
echo "<div>
                  <h3>There is no free book i.e all books are issued.</h3><br/>
                  <p class='link' style = 'color: red ;'>No free book<a href='Issue book.php'>Issue</a>.</p>
                  </div>";
                
            }
        }
        else
        {
           // echo "the book with id.... does not exist here";
echo "<div>
                  <h3>The book with id:$bookId does not exist</h3><br/>
                  <p class='link' style = 'color: red ;'>Click here to <a href='Issue book.php'> Issue</a> again.</p>
                  </div>";
           
        }
    }
        else{
            echo "<div>
            <h3>The username:$username does not exist</h3><br/>
            <p class='link' style = 'color: red ;'>Click here to <a href='Issue book.php'> Issue</a> again.</p>
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
    </body>

    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.getElementById('logo').setAttribute('draggable', false);
    </script>

</html>