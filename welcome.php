<html>
<meta http-equiv="Content-Language" content="en">
<meta name="google" content="notranslate" />
<head>
    <title></title>
    <link type="text/css" rel="stylesheet" href="welcome_page_style.css"/>
</head>
<body>
    <div id="wrapper">


        <div id = "info">
            <div id = "inner">

                <?php
                session_start();
                if (isset($_SESSION['email'])) {
                    unset($_SESSION['email']);
                }
                if (isset($_SESSION['password'])) {
                    unset($_SESSION['password']);
                }        
                $user_name=$_SESSION['user_name'];

                if (!$_SESSION['user_name']) {
                    header("location:index.php");
                }

                    // foreach ($_SESSION as $key=>$val)
                    // echo $key." ".$val."<br/>";

                echo "<h2>Welcome, ".$user_name."</h2>";
                echo "<a id=\"logout\" href=\"logout.php\">Log Out</a>";
                //echo "<a id='\"pts\" href=\"\">Points</a>";
                
                ?>


                
                <div id="stats">
                    <h3>Player Stats</h3>
                    <?php
                        $server="localhost";
                        $username="root";
                        $password="tiger";
                        $pts=0;
                        $conn=mysqli_connect($server,$username,$password,"dbms");
                        if($conn->connect_error)   {
                            echo 'Can\'t conncect';
                        }
                        else    {
                            $query='select `points` from `users` WHERE user_name=\''.$user_name.'\';';
                            $result=mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)==0) {
                            
                            }
                            else    {
                                while($data=$result->fetch_assoc()) {
                                        $pts=$data['points'];
                                }
                                echo '<h4>Points Scored:'.$pts.'</h4>';
                                echo '<h4>Games Played:</h4>';
                            }
                        }
                    ?>
                </div>
                <div id="races">
                    <h3>Select a race to start predicting!</h3>
                    <table>
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="main_predict.php?race=RAGP"><div>
                                        <img src="australia.jpg"></img>
                                        <div>
                                            <p>Rolex Australian Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>


                                <td>
                                    <a href="main_predict.php?race=PMGP"><div>
                                        <img src="malaysia.jpg"></img>
                                        <div>
                                            <p>Petronas Malaysian Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>


                                <td>
                                    <a href="main_predict.php?race=CGP"><div>
                                        <img src="china.jpg"></img>
                                        <div>
                                            <p>Chinese Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>                                    
                            </tr>
                            <tr>
                                <td>
                                    <a href="main_predict.php?race=GABGP"><div>
                                        <img src="bahrain.jpg"></img>
                                        <div>
                                            <p>Gulf Air Bahrain Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>   
                                <td>
                                    <a href="main_predict.php?race=GPDM"><div>
                                        <img src="monaco.jpg"></img>
                                        <div>
                                            <p>Grand Prix du Monaco</p>
                                        </div>
                                    </div></a>
                                </td>                                    

                                <td>
                                    <a href="main_predict.php?race=GPDC"><div>
                                        <img src="canada.jpg"></img>
                                        <div>
                                            <p>Grand Prix du Canada</p>
                                        </div>
                                    </div></a>
                                </td> 
                            </tr>
                            <tr>                                   
                                <td>
                                    <a href="main_predict.php?race=BGP"><div>
                                        <img src="british.jpg"></img>
                                        <div>
                                            <p>British Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>                                    

                                <td>
                                    <a href="main_predict.php?race=SBGP"><div>
                                        <img src="belgium.jpg"></img>
                                        <div>
                                            <p>Shell Belgium Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>                                    

                                <td>
                                    <a href="main_predict.php?race=SAGP"><div>
                                        <img src="singapore.jpg"></img>
                                        <div>
                                            <p>Singapore Airlines Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>  
                            </tr>
                            <tr>                                  

                                <td>
                                    <a href="main_predict.php?race=RGP"><div>
                                        <img src="russia.jpg"></img>
                                        <div>
                                            <p>Russian Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>                                   

                                <td>
                                    <a href="main_predict.php?race=USGP"><div>
                                        <img src="us.jpg"></img>
                                        <div>
                                            <p>US Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>                                    

                                <td>
                                    <a href="main_predict.php?race=JGP"><div>
                                        <img src="japan.jpg"></img>
                                        <div>
                                            <p>Japanese Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>
                            </tr>
                        </tbody>
                        <table>

                        </div>




                        <?php


            /*
            if(mysqli_query($conn,$sql))    {
                echo "Table created successfully";
            }
            else    {
                echo "Table creation Unsuccessful".mysqli_error($conn);
            }*/





        //echo $_POST["email"];

            ?>
        </div>

    </div>

    <script>
      document.firstElementChild.style.zoom = "reset";
  </script>



</div>
</body>
</html>
