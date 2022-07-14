<html>
    <head>
    <style>
    h3{
        color:lightblue;
        font-size:15px;
    }
    </style>
        <meta charset="UTF-8">
        <title>Return Page</title>
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
function getDifferenceInTotalDay($rDayNum,$rMonth,$rYear,$cDayNum,$cMonth,$cYear)
{
    //jan feb march april may june july august sep octo nov dec
$totalDayMon=[31,28,31,30,31,30,31,31,30,31,30,31];//the total date in month of the Grigorian calender
$totalDayUpToReturn=0;
$totalDayUpToCurrent=0;
////////calculating total day up to return date///
$totalDayUpToReturn=365*$rYear+$rDayNum;
$rMonth--;//because the number of the last month is added in the above
$rMonth--;//to match with array
for($i=1;$i<=$rMonth;$i++)
   $totalDayUpToReturn+= $totalDayMon[$i];
////////calculating total day up to current date///
$totalDayUpToCurrent=365*$cYear+$cDayNum;
$cMonth--;//because the number of the last month is added in the above
$cMonth--;//to match with array
for($i=1;$i<=$cMonth;$i++)
   $totalDayUpToCurrent+= $totalDayMon[$i];
$totalDifferenceInDay=$totalDayUpToCurrent - $totalDayUpToReturn;
    return $totalDifferenceInDay;
}
if(isset($_POST['returnbook']))
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
            $numberOfBooksIssuedByUser=$studentRow['noofbooksissued'];
            $sql3="select * from issuebook where book_Id=$bookId and username='$username'";
            $myrecord=$conn->query($sql3);
            if($myrecord->num_rows!=0)
            {
                //book was issued before
                $Row=$myrecord->fetch_assoc();
                //date of issue which is previuosly saved in the database
                $dateOfIssue=$Row['date_Of_Issue'];
                $dateOfIssueInArr=explode('-',$dateOfIssue);
                $issueYear=0+$dateOfIssueInArr[0];
                $issueMonth=0+$dateOfIssueInArr[1];
                $issueDayNum=0+$dateOfIssueInArr[2];
                //date of return which is previuosly saved in the database
                $dateOfReturn=$Row['date_Of_Return'];
                $dateOfReturnInArr=explode('-',$dateOfReturn);
                $returnYear=0+$dateOfReturnInArr[0];
                $returnMonth=0+$dateOfReturnInArr[1];
                $returnDayNum=0+$dateOfReturnInArr[2];
                //current date
                $currentDate=Date("m-d-Y");
                $currentDateInArr=explode('-',$currentDate);//converting date in string form to the array form
                $currentmonth=0+$currentDateInArr[0];
                $currentdayNum=0+$currentDateInArr[1];
                $currentyear=0+$currentDateInArr[2];
$totalDayAfterFormalReturn=getDifferenceInTotalDay($returnDayNum,$returnMonth,$returnYear,$currentdayNum,$currentmonth,$currentyear);
                if($totalDayAfterFormalReturn==0)
                {
                    //the book is returned on time
                    $numberOfBooksIssued--;
                    $numberOfBooksIssuedByUser--;
                    $sql4="update books set noofbooksissued=$numberOfBooksIssued where bookid=$bookId";
                    $sql5="update users set noofbooksissued=$numberOfBooksIssuedByUser where username='$username'";
                    $sql6="delete from issuebook where book_Id=$bookId and username='$username'";
                    if($conn->query($sql4) && $conn->query($sql5) && $conn->query($sql6))
                    {
                        echo "<div>
                  <h3>Book Returned.</h3><br/>
                  <p class='link' style = 'color: red ;'>Thank you.</p>
                  </div>"; 
                    }
                    else
                    {
                        echo "<div>
                  <p class='link' style = 'color: red ;'>Sorry return again<a href='returnbook.php'>Issue</a>.</p>
                  </div>";
                    }
                    
                }
                else if($totalDayAfterFormalReturn<0)
                {
                  //if the book is being returned before the date of return
                    
                    $numberOfBooksIssued--;
                    $numberOfBooksIssuedByUser--;
                    $sql4="update books set noofbooksissued=$numberOfBooksIssued where bookid=$bookId";
                    $sql5="update users set noofbooksissued=$numberOfBooksIssuedByUser where username='$username'";
                    $sql6="delete from issuebook where book_Id=$bookId and username='$username'";
                    if($conn->query($sql4) && $conn->query($sql5) && $conn->query($sql6))
                    {
                       echo "<div>
                  <h3>Book Returned.</h3><br/>
                  <p class='link' style = 'color: red ;'>Thanking you for returning it before time.</p>
                  </div>";
                    }
                    else
                    {
                        echo "<div>
                        <p class='link' style = 'color: red ;'>Sorry return again<a href='returnbook.php'>Issue</a>.</p>
                        </div>";
                          }
                }
                else if($totalDayAfterFormalReturn > 0)
                {
                    //if the book is returne after the date of return ,therefore the user will be punished
                    $tempPunishment=2*$totalDayAfterFormalReturn;
                    $currentPunishmentInBirr=$prevPunishmentInBirr + 2*$totalDayAfterFormalReturn;
                    $numberOfBooksIssued--;
                    $numberOfBooksIssuedByUser--;
                    $sql4="update books set noofbooksissued=$numberOfBooksIssued where bookid=$bookId";
                    $sql5="update users set noofbooksissued=$numberOfBooksIssuedByUser where username='$username'";
                    $sql6="delete from issuebook where book_Id=$bookId and username='$username'";
                    if($conn->query($sql4) && $conn->query($sql5) && $conn->query($sql6))
                    {
                        echo "<div>
                  <h3>Book Returned.</h3><br/>
                  <p class='link' style = 'color: red ;'>Contact Adminstrator for late submission.</p>
                  </div>";
                    }
                    else
                    {
                        echo "<div>
                        <p class='link' style = 'color: red ;'>Sorry return again<a href='returnbook.php'>Issue</a>.</p>
                        </div>";
                          }
                }
            }
            else
            {
                //book was not issued before
                echo "<div>
                  <h3>Not Issued the book with id:$bookId and
                  Title:$book_Title.</h3><br/>
                  </div>";
            }
        }
        else
        {
            //the book with id.... does not exist here
            echo "<div>
                  <h3>Book id with:$bookId is not valid.</h3><br/>
                  <p class='link' style = 'color: red ;'>Sorry return again<a href='returnbook.php'>Issue</a>.</p>
                  </div>";
        } 
}else{
            echo "<div>
            <h3>The username:$username does not exist</h3><br/>
            <p class='link' style = 'color: red ;'>Click here to <a href=' returnbook.php'> Issue</a> again.</p>
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








