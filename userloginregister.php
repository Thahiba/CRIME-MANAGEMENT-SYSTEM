<?php
// define variables and set to empty values
$usernameErr = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  
  if (empty($_POST["username"])) {
    $usernameErr = "Please enter username/password";
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $usernameErr = "Please enter username/password";
  } 
}

if (!empty($_POST["username"]) && !empty($_POST["password"]))
{
	$servername= "localhost";
    $usernamed = "root";
    $password = "";
    $dbname = "cybercrimedatabase";
	
    $conn = new mysqli($servername, $usernamed, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
    $uname=$_POST["username"];
    $pass=$_POST["password"];
    $sql = "SELECT password from user where username='$uname'";
    $result=$conn->query($sql);
    
    while ($row=$result->fetch_assoc()){
        if($row["password"]==$pass){
            $_SESSION['user_name']= $uname; 
            header("Location: userwelcome.php?q=$uname"); 
        }
        else {
            $usernameErr="Incorrect credentials!!! Please enter again.";
            //header("Location: userloginregister.php?q=1"); 
        }
    }
	$conn->close();
}
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
                margin: 0;
                box-sizing: border-box;
            }	
            #mk
            {
                
                height: 880px;
                width: 100%;

            }
			.error {color: #FF0000;}
            header {
                height: 90px;
                background-color: black; 
                font-family: inherit;
                color: wheat;
                font-size: 20px;
                text-align: center;
            }
            .body {
                height: calc()
            }
            h4 {
                font-size: 30px;
                padding: 10px;
                text-align: center;

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
            #div {
                
                display: block;
                text-align: center;

            }
            #div2{
                padding: 100px 0;
                box-sizing: border-box;
            }
            .body #name{
                display: inline;
            }
            table {
                 height:200px;
                 width:500px;
                 color:gray;
                 font:white;
                 text-align: center;
                 box-sizing: border-box;
            }
            form {
                display: inline-block;
                padding: 25px;
            }
		</style>
    </head>
    <body id="mk">
        <header> 
			<h1>CYBER CRIME RECORDS MANAGEMENT SYSYTEM</h1>
		</header>
		<div class="body">
            <a href="mainpage.html" class="button">Back</a>
        </div>
           
        <div id="div2">
			
			<div>&nbsp;
                <h4>LOGIN</h4>
            </div>
            <div>
                <span class="error"></span>
            	<div id="div">
				    <form method="POST" action="#">
				    <table border="6.0"> 
                        <tr>
                            <td>&nbsp;&nbsp;Username:</td>
                            <td >&nbsp;&nbsp;&nbsp;
                                <input type="text" name="username" placeholder="Enter Your User Name" value="<?php echo $username;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;Password:</td>
                            <td >&nbsp;&nbsp;&nbsp;
                                <input type="password" name="password" placeholder="Enter Your Password">
                                <br>
                                <span class="error"><?php echo $usernameErr;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;<input type="submit" name="submit" value="Submit" style="height:30px; width: 90px;">
                            </td>
                            <td>
                                &nbsp;&nbsp;<a href="userreg.php">New User? Register here!!!</a>
                            </td>
                        </tr> 
                    </table>   
					</form>
                </div>
            </div>  
    <div class="footer" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: gray; color: white; text-align: center;">
	  <p>&copy;2021&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cyber Crime Records Management System</p>
	</div>		
    </body>
</html>