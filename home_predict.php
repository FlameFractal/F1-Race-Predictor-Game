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
        <div id="cars" onload="mainfunc()()"><img src="ferrari.jpg"  ></img></div>
        <div id="merc" onload="mainfunc()"><img src="mercedes.png" id="merc"></img></div>
        <div id="williams" onload="mainfunc2()"><img src="williams.png" id="williams"></img></div>
        <div id="redbull" onload="mainfunc2()"><img src="redbull.jpg" id="redbull"></img></div>
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
        
        <form name="myform" action="welcome.php" id = "forrm" method="post" onsubmit="return validate_form()">
        Email:<input type="text" name="email"></input><br/><span style="visibility:hidden">Email required!</span>
       
        <br/>
        <br/>
        Password:<input type="password" name="pass"></input><span style="visibility:hidden">Password required!</span>
        <br/>
        <br/>
        <br/>
        <input type="submit"></input>
        <!--<button onclick="myFunction()">Submit</button>-->
        </form>
        <a href="signup_form.php">Signup</a>
        </div>
    </div>
   
    <script>
        //window.alert("Welcome User!");
        //window.alert("Hello");
        //mainfunc();
        
        window.onload=mainfunc();
        
        function mainfunc() {
            var pos=document.getElementById("cars");
            var elem=document.getElementById("merc");
            var i=0;
            
            
            var id=setInterval(moving,1);
            //mainfunc();
            //window.alert("I now is:"+i);
            function moving()   {
                
                if(8*i==2200) {
                    clearInterval(id);
                    document.getElementById("cars").style.visibility="hidden";
                    elem.style.animationDelay="1s";
                    document.getElementById("merc").style.visibility="hidden";
                    
                 }
                else    {
                    i=i+1;
                    //window.alert(i);
                    pos.style.left=(4*i)+"px";
                    elem.style.left=(3.5*i)+"px";
                    
                    //window.alert(typeof pos.style.left);
                }
            }
        }
        /*var pos=0;
        function animation()    {
            window.alert("Inside the animation function");
            pos+=1;
            document.getElementById("cars").style.left=pos+"px";
            window.requestAnimationFrame(animation);
        }
        window.requestAnimationFrame(animation);*/
    </script>
    <script>
        function validate_form()    {
            var email=document.forms["myform"]["email"].value;
            var pass=document.forms["myform"]["pass"].value;
            if(email==null||email=="")  {
                //alert("Email required!");
                document.getElementsByTagName("span")[0].style.visibility="visible";
                return false;
            }
            else if(pass==null||pass=="")   {
                document.getElementsByTagName("span")[1].style.visibility="visible";
                //alert("Password required!");
                return false;
            }                
        }
    </script>
    <script>
        window.onload=mainfunc2();
        function mainfunc2()    {
            var element=document.getElementById("williams");
            var red=document.getElementById("redbull");
            element.style.animationDelay="1s";
            red.style.animationDelay="2s";
            var i=0;
            var id=setInterval(moving,1);
            function moving()   {
                if(6*i==3900)   {
                    clearInterval(id);
                    element.style.visibility="hidden";
                    red.style.visibility="hidden";
                }
                else    {
                    i=i+1;
                    element.style.left=(2.5*i)+"px";
                    red.style.left=(2*i)+"px";
                }
            }
        }
    </script>
    

    </body>
</head>
</html>