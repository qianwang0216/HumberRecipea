<!--THIS IS AN INCLUDED FILE

ADD AN EVENT FORM-->
<?php 
$year = date("Y"); // current year

?>

<div>
    <p>
        This is a form to add an event post to the collection on the Recipea site. <br />
        An event post is about a special day that has customs related to food. <br />
        Basically, you're sharing some cultural background to a recipe that you want to share about.<br />
        Have fun!
    </p>

    <p>Below is a table that shows the number of days in each month.</p>
    <p>The current year is: <?php echo $year; ?>.</p>

    <table class='monthDaysTable'>                                            
        <?php
        $monthNamesAbr = array('Jan', 'Feb', 'March', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        echo '<tr><td>Month</td>';
        for ($i = 0; $i < 12; $i++) {
            echo "<td style='padding: 0 0.8rem;'>$monthNamesAbr[$i]</td>";
        }
        echo '</tr>';

        $daysInMonths = array();
        $daysInMonths[] = 'an array that holds the number of days in each month';

        echo '<tr><td>Number of Days</td>';
        for ($j = 1; $j < 13; $j++) {
            $numOfDays = cal_days_in_month(CAL_GREGORIAN, $j, $year);
            echo "<td style='padding: 0 0.8rem;'>$numOfDays</td>";
            $daysInMonths[$j] = $numOfDays;
        }
        echo '</tr>';
        ?>                                            
    </table>

    <br /><br />

    <!-- = = = = ADD EVENT FORM STARTS = = = = = -->

    <form id="addEventForm" action="add-event.php" method="post">
        <input type="hidden" name="view" value="posted" />                                    
        <input type="hidden" name="action" value="save" />
        <input type="hidden" name="formName" value="addEventForm" />  
        <?php $daysInMonthsArrayString = serialize($daysInMonths); ?>

        <input type="hidden" name="daysInMonthsArray" value='<?php echo $daysInMonthsArrayString; ?>' />  

        <label for="monthsDDL">Month</label>

        <select id="dictonaryCountry"  name="monthsDDL" required="required">
            <?php
            //$monthsByNum = $obj->getMonths();

            $monthNames = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

            // if we want to make the names of the months database-driven, we would use the commented code below
//                                        $months = array();
//                                        
//                                        foreach ($monthsByNum as $num) { // 1 - 12
//                                            $index = $num['month'] - 1;  // 0 - 11
//                                            $months[$index] = $monthNames[$index]; // month[0] = monthNames[0] = 'January'
//                                        }

            foreach ($monthNames as $key => $value) { //$months
                $monthValue = $key + 1;
                if ($selectedMonth == $monthValue) {
                    echo "<option value=$monthValue selected='selected'>" . $value . "</option>";
                } else {
                    echo "<option value=$monthValue>" . $value . "</option>";
                }
            }
            ?>

        </select>

        <label for="daysDDL">Day</label>

        <select id="dictonaryCountry"  name="daysDDL" required="required">

            <?php
            for ($k = 1; $k < 32; $k++) {
                if ($selectedDay == $k) {
                    echo "<option value='$k' selected='selected'>" . $k . "</option>";
                } else {
                    echo "<option value='$k'>" . $k . "</option>";
                }
            }

//                                                foreach ($daysInMonths as $key => $value) { //$months
//                                                    if ($key > 0) {
//                                                        if ($selectedDay == $key) {
//                                                            echo "<option value=$key selected='selected'>" . $value . "</option>";
//                                                        } else {
//                                                            echo "<option value=$key>" . $value . "</option>";
//                                                        }
//                                                    }
//                                                }
            ?>
        </select> <br /><br />

        <?php
//                                            $daysInMonths = array();
//                                            $daysInMonths[] = 'an array that holds the number of days in each month';
//
//                                            for ($i = 1; $i < 13; $i++) {
//                                                $numOfDays = cal_days_in_month(CAL_GREGORIAN, $i, $year);
//                                                $daysInMonths[$i] = $numOfDays;
//                                                echo "month: $i, numOfDays: $numOfDays, daysInMonth: $daysInMonths[$i]<br />";
//                                            }
//                                            var_dump($daysInMonths)
        ?>

        <span>Year: <?php echo $year; ?></span><br /><br />

        <label for="titleTB">Title: </label>

        <input type='text' name='title' maxlength="45" width="100" required="required" /><br /><br />

        <label for="contentTA">Content: </label><br /><br />

        <textarea name='content' rows="10" cols="100" required="required"></textarea><br />


