<html>
<head>
    <title>Predict</title>
    <link type="text/css" rel="stylesheet" href="main_predict_style.css"/>
</head>
    <body>
    <div>
        <div id="menu">
            <ul>
                <li>
                    
                    Winner
                    
                </li>
                <li>
                    
                    Podium Finish
                    
                </li>
                <li>
                    
                    Top Ten
                    
                </li>
                
                
            </ul>
        </div>
        <div id="circuit">
        <?php
        /*$url="http://localhost/learner/DBMS/welcome.php";
        $html=file_get_contents($url);
        $doc=new DOMDocument();
        @$doc->loadHTML($html);
        $tag=$doc->getElementsByTagName("img");
        */
        $tag=$_GET['race'];
        echo $tag;      
        switch($tag)    {
            case 'RAGP':
            
                            echo 'Race selected is australia';
                            echo "
                            <div>
                                <h3>Albert Park Circuit</h3>
                                <img src=\"albertpark.jpg\"></img>
                            </div>";
                            break;
            case 'PMGP':    echo "
                                <div>
                                    <h3>Sepang International Circuit</h3>
                                    <img src=\"sepang.png\"></img>
                                </div>
                            ";
                            break;
            case 'CGP': 
                            echo "
                                    <div>
                                        <h3>Shanghai International Circuit</h3>
                                        <img src=\"shanghai.png\"></img>
                                    </div>";
                            break;
            case 'GABGP':     
                            echo "
                                    <div>
                                        <h3>Sakhir International Circuit</h3>
                                        <img src=\"sakhir.png\"></img>
                                    </div>";
                            break;
            case 'GPDM':
                            echo "
                                    <div>
                                        <h3><Circuit de Monte Carlo</h3>
                                        <img src=\"cmonaco.png\"></img>
                                    </div>";
                            break;
            case 'GPDC':    
                            echo "
                                    <div>
                                        <h3>Circuit de Gilles Villeneuve</h3>
                                        <img src=\"gilles.png\"></img>
                                    </div>";
                            break;
            case 'BGP':
                            echo "
                                    <div>
                                        <h3>Silverstone Grand Prix Circuit</h3>
                                        <img src=\"silverstone.png\"></img>
                                    </div>";
                            break;
            case 'SBGP':    
                            echo "
                                    <div>
                                        <h3>Spa Francorchamps</h3>
                                        <img src=\"spa.png\"></img>
                                    </div>";
                            break;
            case 'SAGP':    
                            echo "
                                    <div>
                                        <h3>Marina Bay Street Circuit</h3>
                                        <img src=\"marina.png\"></img>
                                    </div>";
                            break;
            case 'RGP':
                            echo "
                                    <div>
                                        <h3>Sochi Autodrom</h3>
                                        <img src=\"sochi.png\"></img>
                                    </div>";
                            break;
            case 'USGP':   
                            echo "
                                    <div>
                                        <h3>Circuit of the Americas</h3>
                                        <img src=\"cota.png\"></img>
                                    </div>";
                            break;
            case 'JGP':     
                            echo "
                                    <div>
                                        <h3>Suzuka Circuit</h3>
                                        <img src=\"suzuka.png\"></img>
                                    </div>";
                            break;
                            
        }
        
    ?>
        </div>
    </div>
    </body>
</html>