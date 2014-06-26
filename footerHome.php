<!--footer starts-->
    <footer class="gradient">
        <div id="footerTop">
            <ul class="footerL">
                <li><a href="#">Sitemap</a></li>
                <li><a href="#">Recipes</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="#">Games</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>              
                <li><a href="#">Careers</a></li>
                <li><a href="#"><img id="youtube" class="floatRfooter" src="img/home/footer/youtube-icon.png" alt="Youtube Icon"></a></li>
                <li><a href="#"><img id="twitter" class="floatRfooter" src="img/home/footer/twitter-icon.png" alt="Twitter Icon"></a></li>
                <li><a href="#"><img id="rss" class="floatRfooter" src="img/home/footer/rss-icon.png" alt="RSS Icon"></a></li>
                <li><a href="#"><img id="linkedin" class="floatRfooter" src="img/home/footer/linked-in-icon.png" alt="Linkedin Icon"></a></li>
                <li><a href="#"><img id="google" class="floatRfooter" src="img/home/footer/google-plus-icon.png" alt="Googleplus Icon"></a></li>
                <li><a href="#"><img id="facebook" class="floatRfooter" src="img/home/footer/facebook-icon.png" alt="Facebook Icon"></a></li>
            </ul>
        </div>
    <div class="border"></div>
    <div id="footerBottom">
        <ul>
            <li>www.recipea.com</li>
            <li class="textCenter">&copy; Copyright 2014. Recipea. All rights reserved.</li>
        </ul>            
    </div>
    </footer>
    <!--footer ends-->
    
    <!--sign-up form-->
    <section id="sign_up">
        <img id="signup_logo" src="img/home/logo.png" alt="Recipea logo">
        <p id="signup_header">Please enter your username and password.</p>
        <form id="sign_up_form" action="login.php" method="POST">
            User Name: <input type="text" id="user_name" class="signup_style" name="user_name" placeholder=" User name" /><br />
            Password: <input type="password" id="password" class="signup_style" name="password" placeholder=" Password" /><br />
            <input id="log_in" class="form_button roundcorner" type="submit" name="login" value="Login" />
            <input id="cancel" class="form_button roundcorner" type="button" name="cancel" value="Cancel" onclick="window.location='index.php';" />               
        </form>
        <br>
    </section>
    </div><!--wrapper-->
    
    <!--registration form-->
    <section id="newuser">
        <img id="signup_logo" src="img/home/logo.png" alt="Recipea logo">
        <p id="signup_header">Sign Up For Recipea</p>
        <form id="sign_up_form" action="adduser.php" method="POST">
            User Name: <input type="text" id="user_name" class="signup_style" name="user_name" placeholder=" User name" autofocus /><br />
            Password: <input type="password" id="password" class="signup_style" name="password" placeholder=" Password" /><br />
            Email: <input type="email" name="email" id="cemail" class="signup_style" placeholder=" email" /><br />
            Registration Type<br />
            <input type="radio" name="flag" value="user" checked>User
            <input type="radio" name="flag" value="admin">Administrator<br />
            Would you like a newsletter?<br />
            <input type="radio" name="newsletter" value="male" checked />Yes
            <input type="radio" name="newsletter" value="female" />No<br />           
            <input id="log_in" class="form_button roundcorner" type="submit" name="login" value="Register" />
            <input id="cancel" class="form_button roundcorner" type="button" name="cancel" value="Cancel" onclick="window.location='index.php';" />               
        </form>
        <br>
        <a href="index.php"><img id="close_x" src="img/home/close_x.png" /></a>
    </section>