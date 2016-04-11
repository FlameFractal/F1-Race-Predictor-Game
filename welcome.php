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
                ?>


                
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
                                    <a href="main_predict.php?race=RAGP"><div>
                                        <img src="australia.jpg"></img>
                                        <div>
                                            <p>Australian Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>


                                <td>
                                    <a href="main_predict.php?race=PMGP"><div>
                                        <img src="malaysia.jpg"></img>
                                        <div>
                                            <p>Malaysian Grand Prix</p>
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
                                            <p>Bahrain Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>   
                                <td>
                                    <a href="main_predict.php?race=GPDM"><div>
                                        <img src="monaco.jpg"></img>
                                        <div>
                                            <p>Monaco Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>                                    

                                <td>
                                    <a href="main_predict.php?race=GPDC"><div>
                                        <img src="canada.jpg"></img>
                                        <div>
                                            <p>Canadian Grand Prix</p>
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
                                            <p>Belgium Grand Prix</p>
                                        </div>
                                    </div></a>
                                </td>                                    

                                <td>
                                    <a href="main_predict.php?race=SAGP"><div>
                                        <img src="singapore.jpg"></img>
                                        <div>
                                            <p>Singapore Grand Prix</p>
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
                                            <p>Japan Grand Prix</p>
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
