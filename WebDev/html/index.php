<!DOCTYPE html>
<html>
<head>
    <title>Race Predictor Challenge</title>
    <link type="text/css" rel="stylesheet" href="../css/index.css"/>
</head>

<body>
    <div id="images">
        <img src="../images/racingline.jpg" id="logo" alt="Image could not be displayed"></img>
        <div id="cars" onload="mainfunc()()"><img src="../images/ferrari.jpg"  ></img></div>
        <div id="merc" onload="mainfunc()"><img src="../images/mercedes.png" id="merc"></img></div>
        <div id="williams" onload="mainfunc2()"><img src="../images/williams.png" id="williams"></img></div>
        <div id="redbull" onload="mainfunc2()"><img src="../images/redbull.jpg" id="redbull"></img></div>
        <a id="continue" href="#outer">Continue</a>
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
            <h3 id="log">Sign in to your account!</h3>
            <form name="myform" action="welcome.php" id = "forrm" method="post" onsubmit="return validate_form()" >
                <ul>
                    <li>    
                        <label>Email:</label>
                        <input type="text" name="email"></input>
                        <br>
                    </li>
                    <br>
                    <li>
                        <label>Password:</label>
                        <input type="password" name="pass"></input>
                        <br>
                    </li>
                    <br>
                    <li>
                        <input type="submit" value="Log In"></input>
                        <a id="signup" href="signup.php">Sign Up!</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>

    <script>
        window.onload=mainfunc();

        function mainfunc() {
            var pos=document.getElementById("cars");
            var elem=document.getElementById("merc");
            var i=0;
            
            var id=setInterval(moving,1);
            function moving(){

                if(8*i==2200) {
                    clearInterval(id);
                    document.getElementById("cars").style.visibility="hidden";
                    elem.style.animationDelay="1s";
                    document.getElementById("merc").style.visibility="hidden";
                    
                }
                else    {
                    i=i+1;
                    pos.style.left=(4*i)+"px";
                    elem.style.left=(3.5*i)+"px";
                }
                else if  {

                }
            }
        }
    </script>
    <script>
        function validate_form(){
            var email=document.forms["myform"]["email"].value;
            var pass=document.forms["myform"]["pass"].value;
            if(email==null||email=="")  {
                alert("Email required!");
                return false;
            }
            else if(pass==null||pass=="")   {
                alert("Password required!");
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
                if(6*i==2880)   {
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
    <script>
        function checkSubmit(e){
            if(e && e.keyCode == 13){
              document.forms["myform"].submit();
            }
        } 
    </script>


</body>
</head>
</html>