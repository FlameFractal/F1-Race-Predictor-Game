<html>
<head>
    <title>Sign Up</title>
    <link type="text/css" rel="stylesheet" href="signup_style.css"/>
</head>
<body>
    <div>
        <div>
            <?php
            session_start();
            $name=$_POST["name"];
            $email=$_POST["email"];
            $pass=$_POST["password"];
            $servername="localhost";
            if(empty($name)&&empty($email)&&empty($pass))   {
                header("location:signup_form.php");
            }
            $username="root";
            $password="tiger";
            $database="dbms";
            $t=time();
            $id=NULL;
            $conn=mysqli_connect($servername,$username,$password,$database);
            if(!$conn)  {
                die("Connection failed".mysqli_connect_error($conn));
            }
            else    {
                $sql="insert into `users` (user_name, email_id, password, reg_date) values ('".$name."','".$email."','".$pass."',CURRENT_TIMESTAMP);";
                $result=mysqli_query($conn,$sql);
                if(!$result) {
                    $_SESSION["wrong_email"]=TRUE;
                    header('Refresh: 2; url=http://127.0.0.1/F1-Race-Predictor-Game/signup_form.php');
                    echo "An account already exists for this email ID";
                    echo "<br>Please enter a new email ID";

                }
                else    {
                    $_SESSION["wrong_email"]=FALSE;
                    $_SESSION['auth'] =1;
                    $_SESSION['user_name']=$name;
                    echo "Signup successful! Redirecting you to home page! ";     
                    header('Refresh: 2; url=http://127.0.0.1/F1-Race-Predictor-Game/welcome.php');
                }

            }
            ?>
        </div>
    </div>
</body>
</html>