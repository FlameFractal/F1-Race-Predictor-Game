<html>
    <head>
    </head>
    <body>
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
        switch($type)   {
            case 'Winner':
                            $temp=$_GET['driver'];
                            echo '<h3>Your predicted winner is:</h3>'.$temp;
                            break;
            case 'Topten':  echo '<h3>Your predicted Top Ten is </h3>';
                            $i=0;
                            echo '<table>';
                            echo '<thead>
                                        <th>
                                            <td>Position</td>
                                            <td>Driver</td>
                                        </th>
                                    </thead>';
                            echo '<tbody>';
                            for($i=0;$i<10;$i++) {
                                $value='driver'.$i;
                                echo '<tr>';
                                echo  '<td>'.($i+1).'</td>
                                        <td>'.$_GET[$value].'</td>
                                      </tr>';
                            }
                            echo '</tbody
                                </table>';
                            break;
            case 'Podium':  echo '<h3>Your predicted Podium Finishers are</h3>';
                            $i=0;
                            echo '<table>';
                            echo '<thead>
                                        <th>
                                            <td>Position</td>
                                            <td>Driver</td>
                                        </th>
                                    </thead>';
                            echo '<tbody>';
                            for($i=0;$i<3;$i++) {
                                $value='driver'.$i;
                                echo '<tr>
                                        <td>'.($i+1).'</td>
                                        <td>'.$_GET[$value].'</td>
                                      </tr>';
                            }
                            echo '</tbody
                                </table>';
                            break;
                            
        }
        ?>
    </body>
</html>