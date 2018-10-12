
<?php
session_cache_limiter('private_no_expire');
session_start();
session_regenerate_id();

//lets Assume This is a Dummy data Base!(It has 2 record)//

$output="";


$file = fopen("DATABASE/userTable.txt", "r") or die("Unable connect to DATABASE!");
$string= fread($file,filesize("DATABASE/userTable.txt"));
fclose($file);
$records=explode("#",$string);
$recordCount=count($records);

if($recordCount==3)
{

    $userNameARR = preg_split("/:/", $records[0]);
    $passwordARR = preg_split("/:/", $records[1]);
    
    
    
    $userNameDB=$userNameARR[1];
    $passwordDB=$passwordARR[1];
    


}else
{
    exit;

}


 //Simple Check for Valid user

if(isset($_POST["submit"]))
{

$userName=$_POST["userName"];
$password=$_POST["password"];
$output="";




	if($userNameDB==$userName && $passwordDB == $password)
	{
	
		Redirect($userName);
    		
						

			


	}else
							{

    								$output="Sorry Your Not a Valid User!";

										}



}
if(isset($_SESSION['user']))
{


	
	header('Location: https://localhost/double/account.php');
	exit;







}



function Redirect($userName)
{


	
	$minutes=1;

	$time=time();
	
	$_SESSION['user']=$userName;
	$_SESSION['ActivetedTime']=$time;
	$_SESSION['DeactivateTime']=$_SESSION['ActivetedTime']+(60+$minutes);
	setcookie("token",bin2hex(random_bytes(32)),time()+$minutes*60,'/','localhost',true);
	setcookie("SessionID",session_id(),time()+$minutes*60,'/','localhost',true);
	header('Location: https://localhost/double/account.php');
	exit;

}












?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/cover.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
</head>
<body class="text-center">
	
	<div class="limiter" >
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" action="login.php" method="post">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="userName" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
						

						
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<?php 
	
	
	if($output=="")
	{
		
		echo "<span class=\"login100-form-title p-b-51\" id=\"customLog\">Double Submit Cookie Pattern! </span>";
	
	}else
	{

		echo "<span class=\"login100-form-title p-b-51\" id=\"customLog\">{$output}</span>";
		echo $output;


	}
	
	
	
	
	?>


	
	


	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>