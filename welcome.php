<html>
<head>
    <title></title>
    <link type="text/css" rel="stylesheet" href="welcome_page.css"/>
</head>
<body>
    
    
    <div id = "info">
        <div id = "inner">
    
    
    <?php
        session_start();
        $incorrect=FALSE;
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        if(empty($email)&&empty($pass)) {
            header("Location:home_predict.php");
        }
        $servername="localhost";
        $name="root";
        $password="tiger";
        $database="dbms";
        $conn=new mysqli($servername,$name,$password,$database);
        if($conn->connect_error)    {
            die("Connection failed:".$conn->connect_error);
        }
        else    {
            //echo "Connection successful";
            
            $sql="select * from `users` WHERE email_id='".$email."';";
            
            //echo '<br/>'.$sql;
            $result=mysqli_query($conn,$sql);
            //echo mysqli_num_rows($result);
            //$result1=mysqli_query($conn,"select * from 'users' where email_id='samin_rooney@yahoo.co.in'");
            
            if(mysqli_num_rows($result)==0)  {
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
                else    {
                    while($rows=mysqli_fetch_assoc($result))   {
                    echo "<h2>Welcome, ".$rows["user_name"]."</h2>";
                    echo "    
        <div id=\"stats\">
            <h3>Player Stats</h3>
        </div>
        <div id=\"races\">
            <h3>Select a race to start predicting!</h3>
            <table>
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href=\"main_predict.php?race=australia\"><div>
                                <img src=\"australia.jpg\"></img>
                                <div>
                                    <p>Australian Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"main_predict.php?race=\"malaysia\"\"><div>
                                <img src=\"malaysia.jpg\"></img>
                                <div>
                                    <p>Malaysian Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"bahrain.jpg\"></img>
                                <div>
                                    <p>Bahrain Grand Prix</p>
                                </div>    
                            </div><a href=\"\">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"china.jpg\"></img>
                                <div>
                                    <p>Chinese Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"spain.jpg\"></img>
                                <div>
                                    <p>Spanish Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"monaco.jpg\"></img>
                                <div>
                                    <p>Monaco Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"canada.jpg\"></img>
                                <div>
                                    <p>Canadian Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"austria.jpg\"></img>
                                <div>
                                    <p>Austrian Grand Prix</p>
                                </div>
                                
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"british.jpg\"></img>
                                <div>
                                    <p>British Grand Prix</p>
                                </div>    
                            </div></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"hungary.jpg\"></img>
                                <div>
                                    <p>Hungarian Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"belgium.jpg\"></img>
                                <div>
                                    <p>Belgian Grand Prix</p>
                                </div>    
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"italy.jpg\"></img>
                                <div>
                                    <p>Italian Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"singapore.jpg\"></img>
                                <div>
                                    <p>Singaporean Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"japan.jpg\"></img>
                                <div>
                                    <p>Japanese Grand Prix</p>
                                </div>    
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"russia.jpg\"></img>
                                <div>
                                    <p>Russian Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"us.jpg\"></img>
                                <div>
                                    <p>United States Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"mexico.jpg\"></img>
                                <div>
                                    <p>Mexican Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"brazil.jpg\"></img>
                                <div>
                                    <p>Brazilian Grand Prix</p>
                                </div>    
                            </div></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href=\"\"><div>
                                <img src=\"uae.jpg\"></img>
                                <div>
                                    <p>Abu Dhabi Grand Prix</p>
                                </div>
                            </div></a>
                        </td>
                    </tr>
                </tbody>
            <table>
            
        </div>
            
                    
                    
                    
             ";
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
        
    </div>
    
    
</body>
</html>
