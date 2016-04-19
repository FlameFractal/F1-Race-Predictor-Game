<!DOCTYPE html>
<html>
<head>
    <title>Race Predictor Challenge</title>
    <link type="text/css" rel="stylesheet" href="index_style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css"> -->
    <link  href="http://fonts.googleapis.com/css?family=Cabin:400,500,600,bold" rel="stylesheet" type="text/css" >


    <body>
        <div id="heading"><h1>F1 Race Predictor Game!</h1></div>

<div id="images">
    <img src="racingline.jpg" id="logo" alt="Image could not be displayed"></img>
    <div id="cars" onload="mainfunc()()"><img src="ferrari.jpg"  ></img></div>
    <div id="merc" onload="mainfunc()"><img src="mercedes.png" id="merc"></img></div>
    <div id="williams" onload="mainfunc2()"><img src="williams.png" id="williams"></img></div>
    <div id="redbull" onload="mainfunc2()"><img src="redbull.jpg" id="redbull"></img></div>
    <!-- <a id="continue" href="#outer">Continue</a> -->
      <button type="button" id="continue" >▼</button>
      
</div>


<div id = "outer" class="outer">
    <div id="schedule">
        <h1>Schedule</h1>
        <ol>
            <li>Australian GP</li>
            <li>Malaysian GP</li>
            <li>Bahrain GP</li>
            <li>Chinese GP</li>
            <li>Monaco GP</li>
            <li>Canadian GP</li>
            <li>British GP</li>
            <li>Belgian GP</li>
            <li>Singapore GP</li>
            <li>Russian GP</li>
            <li>Japanese GP</li>
            <li>US GP</li>
        </ol>
    </div>
    <div id = "inner">
        <h3 id="log">Sign in to your account!</h3>
        
        <form name="myform" action="login.php" id = "forrm" method="post" onsubmit="return validate_form()">
            <ul>
                <li>    
                    <label>Email:</label>
                    <input type="email" name="email"></input>
                    <span style="visibility:hidden">Email required!</span>
                    <br>
                </li>
                <br>
                <li>
                    <label>Password:</label>
                    <input type="password" name="pass"></input>
                    <span style="visibility:hidden">Password required!</span>
                    <br>
                </li>
                <br>
                <li>
                    <input type="submit" value="Log In"></input>
                    <a id="signup" href="signup_form.php">Sign Up!</a>
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
        }</script>
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
                    document.getElementById('heading').style.animationDelay='4s';
                    document.getElementById('heading').style.visibility='visible';
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

  <script>
      document.firstElementChild.style.zoom = "reset";
  </script>
<script >
$("button").click(function() {
    $('html,body').animate({
        scrollTop: $(".outer").offset().top},
        'slow');
});
</script>
  

</body>
</head>
</html>