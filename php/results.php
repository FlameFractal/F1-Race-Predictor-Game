<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../css/results_style.css"/>
    </head>
    <body>
        <div>
        <a href="welcome.php">
        <div id="home">
            <h3>Home</h3>
        </div>
        </a>
        <?php
        error_reporting (E_ALL ^ E_NOTICE); /* 1st line (recommended) */
        session_start();
        $user_name=$_SESSION['user_name'];
        if(!$user_name) {
            header("Location:index.php");
        }
        $type=$_GET['win'];
        $race=$_GET['race'];
        //$pid=$_GET['practice'];
        $server="localhost";
        $username="root";
        $password="tiger";
        $database="dbms";
        $lineup=array();
        
        $conn=mysqli_connect($server,$username,$password,$database);
        if($conn->connect_error)  {
            die('mysqli_error($conn)');
            //header("location:www.google.com");
        }
        else    {
            $sql='select `position`,`driver_name`,`id`,`team` from `races` r,`drivers` d WHERE r.driver_id=d.id AND r.Race_ID=\''.$race.'_R\'';
            //echo $sql;
            $results=mysqli_query($conn,$sql);
            if(mysqli_num_rows($results)==0)  {
                //header("location:www.google.com");
                die('mysqli_error($conn)');
            }
            else    {
                echo '<div id="results">';
                echo '<table>';
                echo '<thead>
                        
                            <th>Position</th>
                            <th>Name</th>
                            <th>Driver Number</th>
                            <th>Team</th>
                        
                        </thead>';    
                while($data=$results->fetch_assoc()) {
                    array_push($lineup,$data['driver_name']);
                    echo "<tbody>
                            <tr>
                                <td>".$data['position']."</td>
                                <td>".$data['driver_name']."</td>
                                <td>".$data['id']."</td>
                                <td>".$data['team']."</td>";
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            }
        }
        ?>
        <?php
        $query='select `total_points` from `users` WHERE `user_name`=\''.$_SESSION['user_name'].'\';';
        $result=mysqli_query($conn,$query);
        while($dat=$result->fetch_assoc())  {
            $points=$dat['total_points'];
        }
        $tpoint=0;
        switch($type)   {
            case 'Winner':
                            $temp=mysql_real_escape_string($_POST['driver']);
                            //echo 'Inside winner';
                            //echo $lineup[0];
                            //echo $temp;
                            if($temp==$lineup[0])   {
                                $tpoint=50;
                                //echo $points;
                                //echo $lineup[0];
                            }    
                            break;
            case 'Topten':  
                            $pred=array();
                            $i=0;
                            for(;$i<10;$i++)    {
                                array_push($pred,$_POST['driver'.$i]);
                            }
                            for($i=0;$i<10;$i++)    {
                                for($j=0;$j<10;$j++)    {
                                    if($lineup[i]==$pred[j])    {
                                        $difference=abs($i-$j);
                                        $tpoint+=(45-($difference*5));
                                        break;
                                    }
                                }
                            }
                            break;
            case 'Podium':  $i=0;
                            $pred=array();
                            $j=0;
                            for(;$i<3;$i++) {
                                array_push($pred,$_POST['driver'.$i]);
                            }
                            for($i=0;$i<3;$i++) {
                                for(;$j<3;$j++) {
                                    if($lineup[i]==$pred[j])    {
                                        $difference=abs($i-$j);
                                        $tpoint+=(45-($difference*5));
                                    }
                                }
                            }
                            break;
                            
        }

        $points+=$tpoint;
        $query='UPDATE `users` SET `total_points`='.$points.' WHERE user_name=\''.$_SESSION['user_name'].'\';';
        //echo $query;
        $result=mysqli_query($conn,$query);
        

        $query='INSERT INTO `points` VALUES (\''.$_SESSION['user_name'].'\',\''.$race.'\',\''.$tpoint.'\');';
        
        //echo $query;
        $result=mysqli_query($conn,$query);
        echo '<div id="point">';
        echo '<h3>Points scored:'.$tpoint.'</h3>';
        echo '</div>';
        //header("location:welcome.php");
        ?>
        </div>
    </body>
</html>