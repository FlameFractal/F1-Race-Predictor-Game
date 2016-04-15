<html>
    <head>
        
        <title>Predict the Winner</title>
        <link type="text/css" rel="stylesheet" href="prediction_style.css"/>
    </head>
    <body>
    <div id="wrapper">
        
        <div>
        <?php
            session_start();
            $user_name=$_SESSION['user_name'];
            if(!$user_name) {
                header("Location:index.php");
            }
            $type=$_GET['win'];
            $race=$_GET['race'];
            $pid=$_GET['practice'];
            $server="localhost";
            $username="root";
            $password="tiger";
            $temp=$race."_".$pid;
            $conn=mysqli_connect($server,$username,$password,"dbms");
            switch($race)   {
                case 'RAGP':
                            echo '
                            <h2>Rolex Australian Grand Prix</h2>';
                            break;
                case 'PMGP':
                            echo '
                            <h2>Petronas Malaysian Grand Prix</h2>';
                            break;                           
                case 'GABGP':
                            echo '
                            <h2>Gulf Air Bahrain Grand Prix</h2>';
                            break;
                case 'CGP':
                            echo '
                            <h2>Chinese Grand Prix</h2>';
                            break;
                case 'GPDM':
                            echo '
                            <h2>Grand Prix du Monaco</h2>';
                            break;            
                case 'GPDC':
                            echo '
                            <h2>Grand Prix du Canada</h2>';
                            break;
                case 'BGP':
                            echo '
                            <h2>British Grand Prix</h2>';
                            break;
                case 'SBGP':
                            echo '
                            <h2>Shell Belgian Grand Prix</h2>';
                            break;
                case 'SAGP':
                            echo '
                            <h2>Singapore Airlines Grand Prix</h2>';
                            break;            
                case 'RGP':
                            echo '
                            <h2>Russian Grand Prix</h2>';
                            break;
                case 'USGP':
                            echo '
                            <h2>United States Grand Prix</h2>';
                            break;            
                case 'JGP':
                            echo '
                            <h2>Japanese Grand Prix</h2>';
                            break;
            }
            echo "<div id=\"predict\">";
            switch($type)   {
                case 'winner':  
                                $query1='select `driver_name` from `table 6` t, `drivers` d WHERE t.driver_id=d.driver_id AND `session_id`=\''.$temp.'\'ORDER BY `driver_name`;';
                                $result=mysqli_query($conn,$query1);
                                if(mysqli_num_rows($result)!=0) {
                                    echo "<h3>Enter your predicted winner</h3>";
                                    echo "<form action=\"\" type=\"GET\">";
                                    echo "
                                         <select name=\"winner\">";
                                    while($test=$result->fetch_assoc()) {
                                        echo "<option value=".$test['driver_name'].">".$test['driver_name']."</option>";
                                    }
                                    echo "</select>";
                                    echo "<br/>";
                                    echo "<input type=\"submit\" value=\"submit\"></input>
                                            </form>";
                                    
                                }
                                
                                break;
                case 'Podium':  
                                $i=0;
                                $query1='select `driver_name` from `table 6` t, `drivers` d WHERE t.driver_id=d.driver_id AND `session_id`=\''.$temp.'\'ORDER BY `driver_name`;';
                                $result=mysqli_query($conn,$query1);
                                if(mysqli_num_rows($result)!=0) {
                                    echo "<h3>Enter your predicted Podium finishers</h3>";
                                    echo "<form action=\"\" type=\"GET\">";
                                    for($i=0;$i<3;$i++) {
                                             $value="driver".$i;
                                        echo "
                                            <select name=".$value." >
                                            ";
                                        $result=mysqli_query($conn,$query1);    
                                        while($test=$result->fetch_assoc()) {
                                            //$r=$i+1;
                                            echo $test['driver_name'];
                                            echo "<option value=".$test['driver_name'].">".$test['driver_name']."
                                            </option>;";
                                        }                                    
                                        echo "</select>";
                                        echo "<br/>";
                                        //echo $test;
                                    }
                                    echo $test;
                                     echo "
                                       
                                     <input type=\"submit\" value=\"Submit\">
                                           </input>
                                        </form>
                                        ";
                                }
                                break;
                case 'Topten':  $i=0;
                                
                                $query1='select `driver_name` from `table 6` t, `drivers` d WHERE t.driver_id=d.driver_id AND `session_id`=\''.$temp.'\'ORDER BY `driver_name`;';
                                $result=mysqli_query($conn,$query1);
                                //echo $query1;
                                //echo 'mysqli_num_rows($result)';
                                $r=0;
                                //print_r($result->fetch_assoc());
                                
                                if(mysqli_num_rows($result)!=0) {
                                    echo "<h3>Enter your predicted Top Ten</h3>";
                                    echo "<form action=\"\" type=\"GET\">";
                                    for($i=0;$i<10;$i++)    {
                                        $test=0;
                                        
                                        $value="driver".$i;
                                        echo "
                                            <select name=".$value." onchange=\"mfunction()\">
                                            ";
                                        echo "<option value=\"\"></option>";
                                        $result=mysqli_query($conn,$query1);    
                                        while($test=$result->fetch_assoc()) {
                                            //$r=$i+1;
                                            echo $test['driver_name'];
                                            echo "<option value=".$test['driver_name']." style=\"visibility:true;\">".$test['driver_name']."
                                            </option>;";
                                        }                                    
                                        echo "</select>";
                                        echo "<br/>";
                                        //echo $test;
                                    }
                                    echo $test;
                                     echo "
                                       
                                     <input type=\"submit\" value=\"Submit\">
                                           </input>
                                        </form>
                                        ";
                                }
                               
                                break;
                                
            }
            echo "</div>";
            $lin="prediction.php?race=".$race."&win=".$type;
            //echo $lin;
            
        ?>
            <div id="practice_sessions">
                <ul>
                    <a href="<?php echo $lin."&practice=PR1";?>">
                    <li>
                        Practice 1
                    </li>
                    </a>
                    <a href="<?php echo $lin."&practice=PR2";?>">
                    <li>
                        Practice 2
                    </li>
                    </a>
                    <a href="<?php echo $lin."&practice=PR3";?>">
                    <li>
                        Practice 3
                    </li>
                    </a>
                </ul>
            </div>
            <?php
               
                if(!$conn)  {
                    die('mysqli_error($conn)');
                }
                else    {
                    echo 'success!';
                    
                    echo $temp;
                    $query="SELECT `position`,`driver_name`,`lap_time`,`gap` FROM `table 6` t,`drivers` d WHERE t.driver_id=d.driver_id AND session_id='".$temp."' ORDER BY `position` ASC;";
                    //echo $query;
                    $result=mysqli_query($conn,$query);
                    
                    if(mysqli_num_rows($result)==0) {
                        echo "mysqli_error($conn)";
                    }
                    else    {
                        //print_r($result);
                        //$row=mysqli_fetch_assoc($result);
                        
                        //print_r($row);
                        
                        echo "
                              <div id=\"practice_table\">
                                   <table>
                                        <thead>
                                            <th>
                                                Position
                                            </th>
                                            <th>
                                                Driver Name
                                            </th>
                                            <th>
                                                Time
                                            </th>
                                            <th>
                                                Gap
                                            </th>
                                        </thead>
                                        <tbody>
                                ";   
                        switch($pid)    {
                            case 'PR1':
                                        echo "<h4>Practice 1</h4>";
                                        break;
                            case 'PR2':
                                        echo "<h4>Practice 2</h4>";
                                        break;
                            case 'PR3':
                                        echo "<h4>Practice 3</h4>";
                                        break;
                                        
                        }
                        
                        
                        while($data=$result->fetch_assoc())  {
                            /*echo 'Position'.$data["position"].'Driver'.$data["driver_name"].'Lap Time'.$data["lap_time"].'Gap'.$data["gap"];
                            echo "<br/>";*/
                            //echo 'Position:'.$data["position"];
                            echo '
                                    <tr>
                                        <td>'.$data["position"].'</td>
                                        <td>'.$data["driver_name"].'</td>
                                        <td>'.$data["lap_time"].'</td>
                                        <td>'.$data["gap"].'</td>
                                    </tr>
                                ';
                        }
                        echo '      </tbody>
                                </table>
                             </div>';
                    }
                }
                
            
            
            ?>
            
            </div>
            </div>
            <script>
                var drivers=[];
                var i=0,j=0,k=0;
                function mfunction()  {
                    for(i=0;i<10;i++)   {
                        var elem=document.getElementsByTagName("select")[i];
                        drivers.push(elem.value);
                        for(j=0;j<20;j++)   {
                            var elem1=elem.getElementsByTagName("option")[j];
                            for(k=0;k<drivers.length;k++)   {
                                
                                if(drivers[k]==elem1.value) {
                                    //window.alert(elem1.value);
                                    elem1.style.visibility='hidden';
                                }
                            }
                        }
                        //window.alert(elem1);
                    }
                //window.alert(elem.name);
                }
                //document.getElementsByTagName("select")[0].addEventListener("click",mfunction);
            </script>
    </body>
</html>