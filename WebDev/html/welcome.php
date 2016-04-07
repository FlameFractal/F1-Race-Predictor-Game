<html>
<head>
    <title></title>
    <link type="text/css" rel="stylesheet" href="welcome_page.css"/>
</head>

<body>


    <?php
    $servername='127.0.0.1';
    $name='root';
    $password='password';
    $database='dbms';
    $con = new mysqli("$servername", $name, $password, $database);
    if($con->connect_error){
        die("Connection failed:".$con->connect_error);
    }
    else    {
        echo "Connection successful";        
        $sql="select driver_name from `drivers`;";
        $result=mysqli_query($con,$sql);
        
        while($row = mysqli_fetch_assoc($result)){
           print $row['driver_name'];
            echo "\r\n\n";
        }

    }
    ?>



</body>
</html>
