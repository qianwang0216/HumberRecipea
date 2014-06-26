<?php

require_once 'rate-sub-pageA.php';

$rating = $_POST['ratings'];
$rating = (int) $rating;

require 'Database_1.php';
require_once 'DBclass.php';

$pdb = new DBclass();

  $pdb->commitInsertRating($rating); 

$ratings = $pdb->getRatingData10();

echo '<div style=padding-left:4.5%;><h3>Here are the latest ratings (only 10 are displayed): </h3>';
echo 'Your rating is number 10. <br /><br />';

$count = 10;

echo <<<_END
<table>
<tr>
<th colspan="2">Number &nbsp;</th>
<th colspan="2">Rating</th>
</tr>
_END;

foreach ($ratings as $rating) {
    
    echo '<tr><td colspan="2" align="center">' . $count . '</td><td colspan="2"  align="center">' . $rating['rating'] .  '</td><tr>';
    $count--;
}
echo '</table>';

echo '<p><a href="index.php">Back to homepage</a></p></div>';

require_once 'rate-sub-pageB.php';


        




  


        



