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
	header("location:home_predict.php");
}


$conn=new mysqli($servername,$name,$password,$database);

if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}
else{
	$sql="select * from `users` WHERE email_id='".$email."';";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0) {
		echo "<br/>You're not a user, please sign-up";
		echo "<div id =\"signup\">
		<a href=\"signup_form.php\">Sign up for an account</a>
	</div>";
	echo mysqli_error($conn);
}
else{
	$sql1="select * from `users` WHERE email_id='".$email."' AND password='".$pass."';";
	$result=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result)==0) {
		$_SESSION["wrong_password"]=TRUE;
			                    //echo "<br/>Wrong user name/password";
		echo "<script>
		window.open(\"home_predict.php\",\"_self\");
	</script>";
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