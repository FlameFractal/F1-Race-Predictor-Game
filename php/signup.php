<html>
<head>
    <title>Sign Up</title>
    <link type="text/css" rel="stylesheet" href="../css/signup_style.css"/>
</head>
<body>
<div id="wrapper">
    <div>
        <div>
            <?php
            session_start();
            $name=$_POST["name"];
            $email=$_POST["email"];
            $pass=$_POST["password"];
            if(empty($name)&&empty($email)&&empty($pass))   {
                header("location:signup_form.php");
            }
            $server="localhost";
            $username="root";
            $password="password";
            $database="f1";
            $t=time();
            $id=NULL;
            $conn=mysqli_connect($server,$username,$password,$database);
            if(!$conn)  {
                die("Connection failed".mysqli_connect_error($conn));
            }
            else    {
                $sql="insert into `users` (user_name, email_id, password, reg_date) values ('".$name."','".$email."','".$pass."',CURRENT_TIMESTAMP);";
                $result=mysqli_query($conn,$sql);
                if(!$result) {
                    $_SESSION["wrong_email"]=TRUE;
                    header('Refresh: 2; url=signup_form.php');
                    echo "An account already exists for this email ID";
                    echo "<br>Please enter a new email ID";

                }
                else    {
                    $_SESSION["wrong_email"]=FALSE;
                    $_SESSION['auth'] =1;
                    $_SESSION['user_name']=$name;
                    echo "Signup successful! ";
                    echo "<br>Redirecting you to home page! ";     
                    header('Refresh: 2; url=welcome.php');
                }

            }
            ?>
        </div>
    </div>
    </div>
</body>
</html>