<!DOCTYPE html>
<html>
<head>
    <title>Race Predictor Challenge</title>
    <link type="text/css" rel="stylesheet" href="home_pre.css"/>
<body>
    <!--<img src="chequered-flag.png" id="logo" alt="Image couldn't be displayed"></img>-->
    <!--<div id="backg">
    </div>-->
    <div id="images">
        <img src="racingline.jpg" id="logo" alt="Image could not be displayed"></img>
        <div id="cars" onload="mainfunc()"><img src="ferrari.jpg"  ></img></div>
        <div id="merc"><img src="mercedes.png" id="merc"></img></div>
        <a href="#outer"><div id = "continue">
            <p>Continue</p>
        </div></a>
    </div>
    <div id = "outer">
        
        <div id="schedule">
                <h4>Schedule</h4>
                <ul type="none">
                    <li>Australian GP</li>
                    <li>Malaysian GP</li>
                    <li>Bahrain GP</li>
                    <li>Chinese GP</li>
                    <li>Spanish GP</li>
                    <li>Monaco GP</li>
                    <li>Canadian GP</li>
                    <li>Austrian GP</li>
                    <li>British GP</li>
                    <li>Hungarian GP</li>
                    <li>Belgian GP</li>
                    <li>Italian GP</li>
                    <li>Singapore GP</li>
                    <li>Japanese GP</li>
                    <li>US GP</li>
                    <li>Brazilian GP</li>
                    <li>Abu Dhabi GP</li>
                </ul>
        </div>
        <div id = "inner">
        <h3 id="log">Login/Signup</h3>
        <form action="welcome.php" id = "forrm" method="post">
        Email:<input type="text" name="email"></input><br/>
       
        <br/>
        <br/>
        Password:<input type="password" name="pass"></input>
        <br/>
        <br/>
        <br/>
        <input type="submit"></input>
        <!--<button onclick="myFunction()">Submit</button>-->
        </form>
        </div>
    </div>
   
    <script>
        //window.alert("Welcome User!");
        //window.alert("Hello");
        //mainfunc();
        
        window.onload=mainfunc();
        
        function mainfunc() {
            var pos=document.getElementById("cars");
            var i=0;
            var id=setInterval(moving,1);
            //mainfunc();
            //window.alert("I now is:"+i);
            function moving()   {
                
                if(i==1100) {
                    clearInterval(id);
                    document.getElementById("cars").style.visibility="hidden";
                }
                else    {
                    i=i+1;
                    //window.alert(i);
                    var val=Number(pos.style.left);
                    pos.style.left=i+"px";
                    //window.alert(typeof pos.style.left);
                }
            }
        }
    </script>
    </body>
</head>
</html>