<?php

if(isset($_GET['firstname'])  && !empty($_GET['firstname']) && 
        isset($_GET['email'])  && !empty($_GET['email']) ){
    echo "Thank you " . $_GET['firstname'] . '<br /><br />We will send you monthly emails to: ' . $_GET['email'] ;
}
else{
    echo "Please fill in the form.";
    echo "<br /><br />You will need to click the back button to complete the form.";
}
?>
