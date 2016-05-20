<html>
<head>

    <title>Predict the Winner</title>
    <link type="text/css" rel="stylesheet" href="../css/prediction_style.css"/>
</head>
<body onload="">
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
            //$pid=$_GET['practice'];
            $server="localhost";
            $username="root";
            $password="password";
            $database="f1";
            $temp1=$race."_PR1";
            $temp2=$race."_PR2";
            $temp3=$race."_PR3";
            $conn=mysqli_connect($server,$username,$password,$database);
            
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

            $que='select * from `points` WHERE user_name=\''.$_SESSION['user_name'].'\' AND gp_id=\''.$race.'\';';
            
            $res=mysqli_query($conn,$que);
            

            if(mysqli_num_rows($res)!=0)   {
                $query='select `position`,`driver_name`,`id`,`team` from `races` r,`drivers` d WHERE r.driver_id=d.id AND r.Race_ID=\''.$race.'_R\';'; 
                $result=mysqli_query($conn,$query);
                if(!$result)    {
                    echo 'mysqli_error($conn)';
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
                while($data=$result->fetch_assoc())    {
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

            else    {

                echo "<div id=\"predict\">";
                $lin="results.php?race=".$race."&win=".$type;
                switch($type)   {
                    case 'Winner':  
                    $query1='select `name` from `practice_sessions` t, `drivers` d WHERE t.driver_id=d.id AND `session_id`=\''.$temp1.'\'ORDER BY `name`;';
                    $result=mysqli_query($conn,$query1);
                    if(mysqli_num_rows($result)!=0) {
                        echo "<h3>Enter your predicted winner</h3>";
                        echo "<form action=".$lin." method=\"post\">";
                        echo "
                        <select name=\"driver\" onchange=\"mfunction()\">";
                            echo "<option value=\"\"></option>";
                            while($test=$result->fetch_assoc()) {
                                echo "<option value=\"".$test['name']."\"style=\"visibility:true;\">".$test['name']."</option>";
                            }
                            echo "</select>";
                            echo "<br/>";
                            echo "<input type=\"submit\" value=\"submit\"></input>
                        </form>";

                    }
                    else    {
                        echo 'mysqli_error($conn)';
                    }

                    break;
                    case 'Podium':  
                    $i=0;
                    $query1='select `name` from `practice_sessions` t, `drivers` d WHERE t.driver_id=d.id AND `session_id`=\''.$temp1.'\'ORDER BY `name`;';
                    $result=mysqli_query($conn,$query1);
                    if(mysqli_num_rows($result)!=0) {
                        echo "<h3>Enter your predicted Podium finishers</h3>";
                        echo "<form method=\"post\" action=".$lin.">";
                        for($i=0;$i<3;$i++) {
                           $value="driver".$i;
                           echo "
                           <select name=".$value." onchange=\"mfunction()\" >
                            ";
                            echo "<option value=\"\"></option>";    
                            $result=mysqli_query($conn,$query1);    
                            while($test=$result->fetch_assoc()) {
                                            //$r=$i+1;
                                echo $test['name'];
                                echo "<option value=".$test['name']." style=\"visibility:true;\">".$test['name']."
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

        $query1='select `name` from `practice_sessions` t, `drivers` d WHERE t.driver_id=d.id AND `session_id`=\''.$temp1.'\'ORDER BY `name`;';
        $result=mysqli_query($conn,$query1);
                                //echo $query1;
                                //echo 'mysqli_num_rows($result)';
        $r=0;
                                //print_r($result->fetch_assoc());

        if(mysqli_num_rows($result)!=0) {
            echo "<h3>Enter your predicted Top Ten</h3>";
            echo "<form action=".$lin." method=\"post\" >";
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
                        echo $test['name'];
                        echo "<option value=".$test['name']." style=\"visibility:true;\">".$test['name']."
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
echo '   
<div id="practice_sessions">
    <ul>
        <li>
            <button id="btn_pr1" onclick="f(event)">
                Practice 1
            </button>
        </li>
        <li>
            <button id="btn_pr2" onclick="f(event)">
                Practice 2
            </button>
        </li>
        <li>
            <button id="btn_pr3" onclick="f(event)">
                Practice 3
            </button>
        </li>
    </ul>
</div> ';       




} 
?>
           <!-- <div id="practice_sessions">
                <ul>
                    <li>
                    <button onclick="f(event)">
                        Practice 1
                    </button>
                    </li>
                    <li>
                    <button onclick="f(event)">
                        Practice 2
                    </button>
                    </li>
                    <li>
                    <button onclick="f(event)">
                        Practice 3
                    </button>
                    </li>
                </ul>
            </div>-->
            <?php

            if(!$conn)  {
                die('mysqli_error($conn)');
            }
            else    {
                $query="SELECT `position`,`name`,`lap_time`,`gap` FROM `practice_sessions` t,`drivers` d WHERE t.driver_id=d.id AND session_id='".$temp1."' ORDER BY `position` ASC;";
                $query1="SELECT `position`,`name`,`lap_time`,`gap` FROM `practice_sessions` t,`drivers` d WHERE t.driver_id=d.id AND session_id='".$temp2."' ORDER BY `position` ASC;";
                $query2="SELECT `position`,`name`,`lap_time`,`gap` FROM `practice_sessions` t,`drivers` d WHERE t.driver_id=d.id AND session_id='".$temp3."' ORDER BY `position` ASC;";
                    //echo $query;
                $result=mysqli_query($conn,$query);
                $result1=mysqli_query($conn,$query1);
                $result2=mysqli_query($conn,$query2);
                if(mysqli_num_rows($result)==0 || mysqli_num_rows($result1)==0||mysqli_num_rows($result2)==0) {
                    //echo "mysqli_error($conn)";
                }
                else    {
                        //print_r($result);
                        //$row=mysqli_fetch_assoc($result);

                        //print_r($row);

                    echo "
                    <div id=\"practice_table\">";

                        echo " <table id=\"p1\" style=\"visibility:hidden\">
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
                            while($data=$result->fetch_assoc())  {

                                echo '
                                <tr>
                                    <td>'.$data["position"].'</td>
                                    <td>'.$data["name"].'</td>
                                    <td>'.$data["lap_time"].'</td>
                                    <td>'.$data["gap"].'</td>
                                </tr>
                                ';
                            }
                            echo "      </tbody>
                        </table>
                        ";

                        echo " <table id=\"p2\" style=\"visibility:hidden\">
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
                            while($data=$result1->fetch_assoc())  {

                                echo '
                                <tr>
                                    <td>'.$data["position"].'</td>
                                    <td>'.$data["name"].'</td>
                                    <td>'.$data["lap_time"].'</td>
                                    <td>'.$data["gap"].'</td>
                                </tr>
                                ';
                            }
                            echo "      </tbody>
                        </table>   ";


                        echo " <table id=\"p3\" style=\"visibility:hidden\">
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
                            while($data=$result2->fetch_assoc())  {

                                echo '
                                <tr>
                                    <td>'.$data["position"].'</td>
                                    <td>'.$data["name"].'</td>
                                    <td>'.$data["lap_time"].'</td>
                                    <td>'.$data["gap"].'</td>
                                </tr>
                                ';
                            }
                            echo "      </tbody>
                        </table>   
                    </div>";
                    



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
                                    //window.alert(elem.value);
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
            <script>
                function f(event)    {
                    var e=document.getElementsByTagName("button");
                    /*window.alert("Hello");
                    window.alert(event.target);
                    window.alert("Now ");
                    window.alert(e[0]);*/
                    if(Object.is(event.target,e[0]))    {
                        //window.alert("button 1 has been pressed");
                        document.getElementById("btn_pr1").style.backgroundColor="black";
                        document.getElementById("btn_pr2").style.backgroundColor="transparent";
                        document.getElementById("btn_pr3").style.backgroundColor="transparent";
                        document.getElementById("p1").style.visibility="visible";
                        document.getElementById("p2").style.visibility="hidden";
                        document.getElementById("p3").style.visibility="hidden";
                    }
                    else if(Object.is(event.target,e[1]))   {
                        document.getElementById("btn_pr1").style.backgroundColor="transparent";
                        document.getElementById("btn_pr2").style.backgroundColor="black";
                        document.getElementById("btn_pr3").style.backgroundColor="transparent";
                        document.getElementById("p2").style.visibility="visible";
                        document.getElementById("p1").style.visibility="hidden";
                        document.getElementById("p3").style.visibility="hidden";
                    }
                    else if(Object.is(event.target,e[2]))   {
                        document.getElementById("btn_pr1").style.backgroundColor="transparent";
                        document.getElementById("btn_pr2").style.backgroundColor="transparent";
                        document.getElementById("btn_pr3").style.backgroundColor="black";
                        document.getElementById("p3").style.visibility="visible";
                        document.getElementById("p2").style.visibility="hidden";
                        document.getElementById("p1").style.visibility="hidden";
                    }
                }
            </script>
            <!--<script>
                function formfunc() {
                    window.alert("Form submitted");
                    window.location.href="results.php?race=USGP&win=Podium";
                }
            </script>-->

        </body>
        </html>