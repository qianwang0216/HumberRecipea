<?php
$sources = array("From a friend", "Newspaper", "Online", "Visited the library", "Other");

$receiveChoices = array("Monthly newsletter", "Important updates", "News on special events");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home - Centre Street Library &#45; Handen &#44; Ontario</title>
        <meta name="description" content="Homepage for Centre Street Library website, located in Handen, Ontario.">
        <link rel="stylesheet" href="css/styles-1-2-15.css" /> 
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <p class="heading3">Please complete the form below to receive monthly emails about Centre Street 
                Library.</p>
            <form action="processcontact.php" method="get">
                <div>
                    <?php
                    if (isset($err)) {
                        echo $err;
                    }
                    ?>
                </div>
                <p>First name : <input type="text" name="firstName" />     

                </p>

                <p>Last name : <input type="text" name="lastName" />     

                </p>

                <p>email : 
                    <input type="text" name="email" />     

                </p>

                <p>    
                    <label for='source'>How did you hear about Centre Street Library?</label> &nbsp;&nbsp;&nbsp;

                    <select name='source' id='source'>

                        <?php
//                    echo "<label for='source'>How did you hear about Centre Street Library?</label> &nbsp;&nbsp;&nbsp;";
//                    
//                    echo "<select name='source' id='source'>";

                        for ($i = 0; $i < count($sources); $i++) 
                        {
                            echo "<option value=$i>$sources[$i]</option>";
                        }
                        ?>
                        
                    </select>
                </p>
                
                <p>
                    Receive:
                    <input type="checkbox" name="receiveChoice" value="Monthly newsletter" ><?php echo "$receiveChoices[0]"; ?></input>
                    
                    <input type="checkbox" name="receiveChoice" value="Important updates"><?php echo "$receiveChoices[1]"; ?></input>
                    
                    <input type="checkbox" name="receiveChoice" value="News on special events"><?php echo "$receiveChoices[2]"; ?></input>
                </p>

                <p> 
                    <input type="submit" value="Send" />     

                </p>
            </form>
            <hr />

        </div> <!--/container-->
    </body>
</html>
