<html>
<head>
    <title></title>
    <link type="text/css" rel="stylesheet" href="../css/welcome_page.css"/>
</head>
<body>
    
    
    <div id = "info">
        <div id = "inner">
    
    
    <?php
        $incorrect=FALSE;
        $servername="localhost";
        $name="root";
        $password="password";
        $database="dbms";
        $conn=new mysqli($servername,$name,$password,$database);
        if($conn->connect_error)    {
            die("Connection failed:".$conn->connect_error);
        }
        else    {
            //echo "Connection successful";
            $email=$_POST["email"];
            $password=$_POST["pass"];
            $sql="select * from `users` WHERE Email='".$email."';";
            
            //echo '<br/>'.$sql;
            $result=mysqli_query($conn,$sql);
            //$result1=mysqli_query($conn,"select * from 'users' where Email='samin_rooney@yahoo.co.in'");
            
            if(mysqli_num_rows($result)==0)  {
                echo "<br/>You're not a user, please sign-up";
                echo "<div id =\"signup\">
                        <a href=\"signup_form.php\">Sign up for an account</a>
                </div>";
                echo mysqli_error($conn);
            }
            else{
                
                $sql1="select * from `users` WHERE Email='".$email."' AND Password='".$password."';";
                $result=mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result)==0) {
                    $incorrect=TRUE;
                    //echo "<br/>Wrong user name/password";
                    echo "<script>
                        window.open(\"home_predict.php\",\"_self\");
                    </script>";
                }
                else    {
                    while($rows=mysqli_fetch_assoc($result))   {
                    echo "<h2>Welcome, ".$rows["Name"]."</h2>";
                    }
                }
            }
            
            /*
            if(mysqli_query($conn,$sql))    {
                echo "Table created successfully";
            }
            else    {
                echo "Table creation Unsuccessful".mysqli_error($conn);
            }*/
        }
           
            
            
        
        //echo $_POST["email"];
        
    ?>
        </div>
        <div id="stats">
            <h3>Player Stats</h3>
        </div>
        <div id="races">
            <h3>Select a race to start predicting!</h3>
            <table>
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                        <td>
                            <div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            <table>
            
        </div>
    </div>
    
    
</body>
</html>
