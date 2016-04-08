<html>
    <head>
        <title>Sign Up</title>
        <link type="text/css" rel="stylesheet" href="signup_style.css"/>
    </head>
    <body>
        <div>
            <div>
                <?php
                    $servername="localhost";
                    $username="root";
                    $password="password";
                    $database="login";
                    $t=time();
                    $id=NULL;
                    $conn=mysqli_connect($servername,$username,$password,$database);
                    if(!$conn)  {
                        die("Connection failed".mysqli_connect_error($conn));
                    }
                    else    {
                          
                        
                        $name=$_POST["name"];
                        $email=$_POST["email"];
                        $password=$_POST["password"];
                        $sql="insert into `users` values ('".$name."','".$email."','".$password."',CURRENT_TIMESTAMP);";
                        //echo $sql;
                        $result=mysqli_query($conn,$sql);
                        if(!$result) {
                            //echo "Add unsuccessful :(";
                            echo mysqli_error($conn);
                        }
                        else    {
                            echo "Successful :)";
                        
                        }
                            
                    }
                ?>
            </div>
        </div>
    </body>
</html>