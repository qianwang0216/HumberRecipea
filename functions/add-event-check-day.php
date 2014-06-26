<?php

function validateAddEventForm($chosenMonth, $chosenDay, $daysInMonthsArrayString) {

    $daysInMonthsArray = unserialize($daysInMonthsArrayString);

    $validDay = ($chosenDay <= $daysInMonthsArray[$chosenMonth] ? 'valid' : 'not valid');

    if ($validDay == 'not valid') {
        $validDay = 'not valid. Please refer to the table that shows the number of days in each month, and chose a proper day.'
                . ' For example, you may not choose 30 as a day for February, because February does not have 30 days.';
    }
    echo "<script>alert('The day you chose is $validDay.');</script>";
    return $validDay;
}

