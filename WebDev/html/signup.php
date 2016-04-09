<html>
    <head>
        <title>Sign Up</title>
        <link type="text/css" rel="stylesheet" href="signup_style.css"/>
    </head>
    <body>
        <div>
            <div>
                <?php
                    $name=$_POST["name"];
                    $email=$_POST["email"];
                    $pass=$_POST["password"];
                    $servername="localhost";
                    if(empty($name)&&empty($email)&&empty($pass))   {
                        header("Location:signup_form.php");
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
                          
                        $point=0;
                        
                        $sql="insert into `users` values ('".$email."','".$name."','".$pass."',".$point.",CURRENT_TIMESTAMP);";
                        //echo $sql;
                        $result=mysqli_query($conn,$sql);
                        if(!$result) {
                            //echo "Add unsuccessful :(";
                            echo mysqli_error($conn);
                        }
                        else    {
                            echo "<div id=\"success\">
                                        <h3>Successful :)<h3>
                                        <a href=\"home_predict.php\">
                                            <div id=\"login\">
                                                Login
                                            </div>
                                        </a>    
                                  </div> ";     
                            
                        }
                            
                    }
                ?>
            </div>
        </div>
    </body>
</html>