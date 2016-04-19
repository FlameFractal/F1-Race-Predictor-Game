<html>
<head>
    <title>Predict</title>
    <link type="text/css" rel="stylesheet" href="main_predict_style.css"/>
</head>
    <body>
    <div id="wrapper">
    <div>
        <div id="menu">
            <ul>
                <a href="<?php echo "prediction.php?race=".$_GET['race']."&win=Winner";?>"><li>
                    
                    Winner
                    
                </li>
                </a>
                <a href="<?php echo "prediction.php?race=".$_GET['race']."&win=Podium";?>">
                <li>
                    
                    Podium Finish
                    
                </li>
                </a>
                <a href="<?php echo "prediction.php?race=".$_GET['race']."&win=Topten";?>">
                <li>
                    
                    Top Ten
                    
                </li>
                </a>
                
                
            </ul>
        </div>
        <div id="circuit">
        <?php
        session_start();
        if(!$_SESSION['user_name']){
            header("location:index.php");
        }
        $tag=$_GET['race'];
        echo $tag;      
        switch($tag)    {
            case 'RAGP':
            
                            echo 'Race selected is australia';
                            echo "
                            <div>
                                <h3>Albert Park Circuit</h3>
                                <img src=\"albertpark.jpg\" style=\"-moz-border-image:url(australia.jpg) 10 round;\"></img>
                            </div>";
                            break;
            case 'PMGP':    echo "
                                <div >
                                    <h3>Sepang International Circuit</h3>
                                    <img src=\"sepang.png\" style=\"-moz-border-image:url(malaysia.jpg) 10 round;\"></img>
                                </div>
                            ";
                            break;
            case 'CGP': 
                            echo "
                                    <div>
                                        <h3>Shanghai International Circuit</h3>
                                        <img src=\"shanghai.png\"  style=\"border-image:url(china.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'GABGP':     
                            echo "
                                    <div>
                                        <h3>Sakhir International Circuit</h3>
                                        <img src=\"sakhir.png\"  style=\"border-image:url(bahrain.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'GPDM':
                            echo "
                                    <div>
                                        <h3><Circuit de Monte Carlo</h3>
                                        <img src=\"cmonaco.png\" style=\"border-image:url(monaco.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'GPDC':    
                            echo "
                                    <div>
                                        <h3>Circuit de Gilles Villeneuve</h3>
                                        <img src=\"gilles.png\"  style=\"border-image:url(canada.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'BGP':
                            echo "
                                    <div>
                                        <h3>Silverstone Grand Prix Circuit</h3>
                                        <img src=\"silverstone.png\"  style=\"border-image:url(british.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'SBGP':    
                            echo "
                                    <div>
                                        <h3>Spa Francorchamps</h3>
                                        <br>
                                        <img src=\"spa.png\" style=\"border-image:url(belgium.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'SAGP':    
                            echo "
                                    <div>
                                        <h3>Marina Bay Street Circuit</h3>
                                        <img src=\"marina.png\" style=\"border-image:url(singapore.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'RGP':
                            echo "
                                    <div>
                                        <h3>Sochi Autodrom</h3>
                                        <img src=\"sochi.png\" style=\"border-image:url(russia.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'USGP':   
                            echo "
                                    <div>
                                        <h3>Circuit of the Americas</h3>
                                        <img src=\"cota.png\" style=\"border-image:url(us.jpg) 10 round;\"></img>
                                    </div>";
                            break;
            case 'JGP':     
                            echo "
                                    <div>
                                        <h3>Suzuka Circuit</h3>
                                        <img src=\"suzuka.png\" style=\"border-image:url(japan.jpg) 10 round;\"></img>
                                    </div>";
                            break;
                            
        }
        
    ?>
        </div>
    </div>
    </div>
    </body>
</html>