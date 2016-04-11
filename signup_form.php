<html>
<head>

    <title>Sign Up</title>
    <link type="text/css" rel="stylesheet" href="signup_form_style.css"/>
</head>
<body>
    <div id="wrapper">
        <div id="outer">
            <div id="heading">
                <h2>Sign Up</h2>
            </div>

            <?php
            session_start();
            if(isset($_SESSION['email'])){
                $email=$_SESSION['email'];
            }
            if(isset($_SESSION['password'])){
                $password=$_SESSION['password'];
            }
                // foreach ($_SESSION as $key=>$val)
                // echo $key." ".$val."<br/>";
            ?>

            <div id="inner">
                <form name="signup" id="s_form" action="signup.php" onsubmit="return check_form()" method="post">
                    Name<br/>
                    <input type="text" name="name"></input>
                    <span><p style="visibility:hidden">Name is required!</p></span>
                    Email<br/>
                    <input type="email" name="email" value=<?php if(isset($_SESSION['email'])) print $_SESSION['email'] ?>></input>
                    <span><p style="visibility:hidden">Email is required!</p></span>
                    Password<br/>
                    <input type="password" name="password" value=<?php if(isset($_SESSION['password'])) print $_SESSION['password']  ?>></input>
                    <span><p style="visibility:hidden">Password is required!</p></span>
                    Confirm password<br/>
                    <input type="password" name="np"></input><br>
                    <span style="visibility:hidden">Passwords don't match!</span>
                    <br/>
                    <br/>
                    
                    <input type="submit" value="Submit"></input>
                </form>
                
                
                
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

                <script>
                  document.firstElementChild.style.zoom = "reset";
              </script>


          </div>
      </div>
  </div>
</body>
</html>