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
                            <div style=\"border-image:url(\"australia.jpg\") 10 round;\">
                                <h3>Albert Park Circuit</h3>
                                <img src=\"albertpark.jpg\"></img>
                            </div>";
                            break;
            case 'PMGP':    echo "
                                <div style=\"border-image:url(\"malaysia.jpg\") 10 round;\">
                                    <h3>Sepang International Circuit</h3>
                                    <img src=\"sepang.png\"></img>
                                </div>
                            ";
                            break;
            case 'CGP': 
                            echo "
                                    <div style=\"border-image:url(china.jpg) 10 round;\">
                                        <h3>Shanghai International Circuit</h3>
                                        <img src=\"shanghai.png\"></img>
                                    </div>";
                            break;
            case 'GABGP':     
                            echo "
                                    <div style=\"border-image:url(bahrain.jpg) 10 round;\">
                                        <h3>Sakhir International Circuit</h3>
                                        <img src=\"sakhir.png\"></img>
                                    </div>";
                            break;
            case 'GPDM':
                            echo "
                                    <div style=\"border-image:url(monaco.jpg) 10 round;\">
                                        <h3><Circuit de Monte Carlo</h3>
                                        <img src=\"cmonaco.png\"></img>
                                    </div>";
                            break;
            case 'GPDC':    
                            echo "
                                    <div style=\"border-image:url(canada.jpg) 10 round;\">
                                        <h3>Circuit de Gilles Villeneuve</h3>
                                        <img src=\"gilles.png\"></img>
                                    </div>";
                            break;
            case 'BGP':
                            echo "
                                    <div style=\"border-image:url(british.jpg) 10 round;\">
                                        <h3>Silverstone Grand Prix Circuit</h3>
                                        <img src=\"silverstone.png\"></img>
                                    </div>";
                            break;
            case 'SBGP':    
                            echo "
                                    <div style=\"border-image:url(belgium.jpg) 10 round;\">
                                        <h3>Spa Francorchamps</h3>
                                        <br>
                                        <img src=\"spa.png\"></img>
                                    </div>";
                            break;
            case 'SAGP':    
                            echo "
                                    <div  style=\"border-image:url(singapore.jpg) 10 round;\">
                                        <h3>Marina Bay Street Circuit</h3>
                                        <img src=\"marina.png\"></img>
                                    </div>";
                            break;
            case 'RGP':
                            echo "
                                    <div style=\"border-image:url(russia.jpg) 10 round;\">
                                        <h3>Sochi Autodrom</h3>
                                        <img src=\"sochi.png\"></img>
                                    </div>";
                            break;
            case 'USGP':   
                            echo "
                                    <div style=\"border-image:url(us.jpg) 10 round;\">
                                        <h3>Circuit of the Americas</h3>
                                        <img src=\"cota.png\"></img>
                                    </div>";
                            break;
            case 'JGP':     
                            echo "
                                    <div style=\"border-image:url(japan.jpg) 10 round;\">
                                        <h3>Suzuka Circuit</h3>
                                        <img src=\"suzuka.png\"></img>
                                    </div>";
                            break;
                            
        }
        
    ?>
        </div>
    </div>
    </div>
    </body>
</html>