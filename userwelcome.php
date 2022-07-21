<?php
$login_user="";
if(isset($_GET['q'])) {
    $login_user = $_GET['q'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cyber Crime Records Management System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            *{
                padding: 0;
                margin: 0;
                text-align: center;
            }
            header {
                height: 90px;
                background-color: black; 
                font-family: inherit;
                color: wheat;
                font-size: 20px;
                text-align: center;
            }
            h2 {
                padding: 20px;
                font-size: 50px;
            }
            div.selection{
                margin: 100px 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .button {
                background-color: red; 
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }
            div.selection .button{
                margin: 25px;
            }
        </style>
    </head>
    <body>
        <header style="background-color: black;">
             <h1 >
                CYBER CRIME RECORDS MANAGEMENT SYSTEM
            </h1>  
        </header>
        <div>
            <h2 >WELCOME &nbsp;
                <i><?php echo $login_user; ?></i>
            </h2>
        </div>
        <div class="selection">
            <a class="button" href="userviewupdate.php?q=<?php echo $login_user; ?>">
            VIEW AND UPDATE MY DETAILS
            </a>
            
            <a class="button" href="newcomplaint.php?q=<?php echo $login_user; ?>">
                NEW COMPLAINT
            </a>
            
            <a class="button" href="checkstatus.php?q=<?php echo $login_user; ?>">
                COMPLAINT STATUS
            </a>
            
            <a class="button" href="mainpage.html">
                LOGOUT
            </a>
        </div>
        
	<div class="footer" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: gray; color: white; text-align: center;">
	  <p>&copy;2021&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cyber Crime Records Management System</p>
	</div>
    </body>
</html>