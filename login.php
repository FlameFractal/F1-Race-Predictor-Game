<?php
session_start();

$servername="localhost";
$name="root";
$password="tiger";
$database="dbms";

$email=$_POST["email"];
$pass=$_POST["pass"];

$incorrect=FALSE;

if(empty($email)&&empty($pass)) {
	header("location:index.php");
}


$conn=new mysqli($servername,$name,$password,$database);

if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}
else{
	$sql="select * from `users` WHERE email_id='".$email."';";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0) {
		$_SESSION['email']=$email;
		$_SESSION['password']=$pass;
		echo "<br>You're not a user, please sign-up!";
		echo "<br>Redirecting back to Sign Up page !";
		header('refresh:2; url=http://127.0.0.1/F1-Race-Predictor-Game/signup_form.php');
	echo mysqli_error($conn);
}
else{
	$sql1="select * from `users` WHERE email_id='".$email."' AND password='".$pass."';";
	$result=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result)==0) {
		$_SESSION["wrong_password"]=TRUE;
		header("refresh:2; url=http://127.0.0.1/F1-Race-Predictor-Game/index.php#outer");
		echo "<br><br>Wrong user name or password!";
		echo "<br>Redirecting back to sign in page!.";
}
else{
	while($rows=mysqli_fetch_assoc($result)){
		$_SESSION['auth']=1;
		$_SESSION['user_name']=$rows["user_name"];
		header("location:welcome.php");
	}

}
}
}
?>