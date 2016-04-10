<html>
    <head>
        <title>Sign Up</title>
        <link type="text/css" rel="stylesheet" href="signup_form_style.css"/>
    </head>
    <body>
        <div id="outer">
            <div id="heading">
                <h2>Sign Up</h2>
            </div>
            <div id="inner">
                <form name="signup" id="s_form" action="signup.php" onsubmit="return check_form()" method="post">
                    Name<br/>  <input type="text" name="name"></input><span>*<p style="visibility:hidden">Name is required!</p></span>
                    
                    Email<br/> <input type="email" name="email"></input><span>*<p style="visibility:hidden">Email is required!</p></span>
                    Password<br/>   <input type="password" name="password"></input><span>*<p style="visibility:hidden">Password is required!</p></span>
                    Confirm password<br/>  <input type="password" name="np"></input><span style="visibility:hidden">Passwords don't match!</span>
                    <br/>
                    <br/>
                    
                    <input type="submit" value="Submit"></input>
                </form>
                <?php
                    session_start();
                    //$_SESSION["wrong_email"]=FALSE;
                    if($_SESSION["wrong_email"])    {
                        echo "<p>An account already exists with the current email address</p>";
                    }
                ?>
                <script>
                    function check_form()   {
                        var name=document.forms["signup"]["name"].value;
                        var email=document.forms["signup"]["email"].value;
                        var password=document.forms["signup"]["password"].value;
                        var cpassword=document.forms["signup"]["np"].value;
                        if(name==""||name==null)    {
                            document.getElementsByTagName("p")[0].style.visibility="visible";
                            return false;
                        }
                        else if(email==""||email==null) {
                            document.getElementsByTagName("p")[1].style.visibility="visible";
                            return false;
                        }
                        else if(password==""||password==null)   {
                            document.getElementsByTagName("p")[2].style.visibility="visible";
                            return false;
                        }
                        else if(password!=cpassword)    {
                            document.getElementsByTagName("span")[3].style.visibility="visible";
                            return false;
                        }
                    }   
                </script>
            </div>
        </div>
    </body>
</html>