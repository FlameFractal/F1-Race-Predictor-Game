<html>
<head>
    <title></title>
    <link type="text/css" rel="stylesheet" href="welcome_page.css"/>
</head>
<body>
    
    
    <div id = "info">
        <div id = "inner">
    
    
    <?php
        $servername="";
        $name="";
        $password="";
        $database="";
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
                echo mysqli_error($conn);
            }
            else{
                
                $sql1="select * from `users` WHERE Email='".$email."' AND Password='".$password."';";
                $result=mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result)==0) {
                    echo "<br/>Wrong user name/password";
                }
                else    {
                    while($rows=mysqli_fetch_assoc($result))   {
                    echo "Welcome, ".$rows["Name"];
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
