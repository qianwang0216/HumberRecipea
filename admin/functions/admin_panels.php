<?php

//= = = MAKE AN ADMIN TABLE START = = = 
function makeAdminTable($feature, $callingFile, $tableData, $pageNum) {

    switch ($feature) {

        case 'rating':
            $columns = array(4, 'idRecipe', 'vote', 'voteTotal', 'numOfVotes');

            $columnHeadings = array();
            $columnHeadings[] = 'Recipe ID';
            $columnHeadings[] = 'Rating';
            $columnHeadings[] = 'Rating Total';
            $columnHeadings[] = 'Number of ratings';

            makeAdminTableRows($feature, $callingFile, $tableData, $columns, $columnHeadings, $pageNum);
            break;

        case 'world_map':
            $columns = array(3, 'id', 'country', 'continent');

            $columnHeadings = array();
            $columnHeadings[] = 'Id'; //columns[1]
            $columnHeadings[] = 'Country'; //columns[2]
            $columnHeadings[] = 'Continent'; // columns[3]

            makeAdminTableRows($feature, $callingFile, $tableData, $columns, $columnHeadings, $pageNum);
            break;
        case 'event':
            $columns = array(6, 'id', 'eventMonth', 'eventDay', 'eventYear', 'title', 'content');

            $columnHeadings = array();
            $columnHeadings[] = 'Id'; //columns[1]
            $columnHeadings[] = 'Month'; //columns[2]
            $columnHeadings[] = 'Day'; // columns[3]
            $columnHeadings[] = 'Year';
            $columnHeadings[] = 'Title';
            $columnHeadings[] = 'Content';


            makeAdminTableRows($feature, $callingFile, $tableData, $columns, $columnHeadings, $pageNum);
            break;
        default:
            echo '<script>alert("Sorry, an error occured.");</script>';
            exit();
    }
}

function makeAdminTableRows($feature, $callingFile, $tableData, $columns, $columnHeadings, $pageNumber) {

//    <div class = "articleTitle2">
//    <ul class = "category">

    switch ($feature) {
        case "rating":
            adminTableSetup($feature);
            break;

        case "world_map":
            adminTableSetup($feature);
            break;
        case "event":
            adminTableSetup($feature);
            break;
    }
    echo <<<_END
                                                            
                    <br />
    
                    <div class="clearfix">
                    <div class="articleText2">
                        
_END;
    echo '<div style=padding-left:5%;>';
    // a table for the data (id, countries, continents)
    foreach ($tableData as $row) {

        // column headings
        echo '<div class="floatL"><ul>';
        for ($i = 0; $i < count($columnHeadings); $i++) {
            echo "<li>$columnHeadings[$i]:</li>";
        }
        echo '</ul></div>';

        //div for each row
        echo '<div class="floatL margin-left-m"><ul>';

        renderTableRows($feature, $row, $columns);

        echo '</ul><br /></div>';

//        echo '<div>';
        // DELETE button form 
        echo '<form action="' . $callingFile . '"' . 'method="post">';

        echo '<input type= "hidden" name="' . $feature . 'ID" value="' . $row[$columns[1]] . '" />';
        echo "<input type= 'hidden' name='pageNum' value='$pageNumber' />";
        echo '<input type= "hidden" name="action" value="delete" />';

        echo '<input id = "deletebutton" type = "submit" class = "roundcorner" type = "button" value = "DELETE"  />';
        echo '</form>';

        // EDIT button form 
        echo '<form action="' . $callingFile . '" method="post">';

        echo '<input type= "hidden" name="' . $feature . 'ID" value="' . $row[$columns[1]] . '" />';

        switch ($feature) {

            case 'rating':
                echo '<input type= "hidden" name="' . $feature . 'Value" value="' . $row[$columns[2]] . '" />';
                break;

            case 'world_map':
                echo '<input type= "hidden" name="countryValue" value="' . $row[$columns[2]] . '" />';
                echo '<input type= "hidden" name="continentValue" value="' . $row[$columns[3]] . '" />';

                break;

//            $eventMonthValue = $_POST['eventMonthValue'];
//            $eventDayValue = $_POST['eventDayValue'];
//            $eventYearValue = $_POST['eventYearValue'];
//            $eventTitleValue = $_POST['eventTitleValue'];
//            $eventContentValue = $_POST['eventContentValue'];

            case 'event':
                echo '<input type= "hidden" name="eventMonthValue" value="' . $row[$columns[2]] . '" />';
                echo '<input type= "hidden" name="eventDayValue" value="' . $row[$columns[3]] . '" />';
                echo '<input type= "hidden" name="eventYearValue" value="' . $row[$columns[4]] . '" />';
                echo '<input type= "hidden" name="eventTitleValue" value="' . $row[$columns[5]] . '" />';
                echo '<input type= "hidden" name="eventContentValue" value="' . $row[$columns[6]] . '" />';

                break;

            default:
                echo '<script>alert("Sorry, an error occured.");</script>';
                exit();
        }

        echo '<input type= "hidden" name="action" value="edit" />';

        echo '<input id = "editbutton" type = "submit" class = "roundcorner" type = "button" value = "EDIT"  />';
        echo '</form>';

        echo <<<_END
        
        <div style = 'clear:both; margin-bottom:2%;'><hr /></div>

_END;
    }

//  </ul>
//                        </div><!--articleTitle2-->

    echo <<<_END
                          
                    </div><!--articleText2-->
                </div><!--clearfix-->
_END;
}

function adminTableSetup($featureName) {
    switch ($featureName) {
        case "rating":

            echo '<ul class = "category">';
            echo '<li style = "padding-left:5%;font-size:1.25em;">Recipe Ratings</li>';
            echo '<li style = "padding-left:5%;">(You can change pages at the bottom. <a href="#pages">Go to the bottom of the page</a>)</li>';
            echo '</ul>';
            break;

        case "world_map":
            echo '<ul class = "category">';
            echo '<li style = "padding-left:5%;font-size:1.25em;">Countries and Continents of the World</li>';
            echo '<li style = "padding-left:5%;">(You can change pages at the bottom. <a href="#pages">Go to the bottom of the page</a>)</li>';
            echo '</ul>';
            break;

        case "event":
            echo '<ul class = "category">';
            echo '<li style = "padding-left:5%;font-size:1.25em;">Events & Stories (food related)</li>';
            echo '<li style = "padding-left:5%;">(You can change pages at the bottom. <a href="#pages">Go to the bottom of the page</a>)</li>';
            echo '</ul>';
            break;
    }
}

function renderTableRows($feature, $row, $columns) {

    //iterating data for each  row
    for ($i = 1; $i <= $columns[0]; $i++) {

        if ($i == $columns[0]) {            
                    echo '<li style="margin-right:50px;width: 435px;">' . $row[$columns[$i]] . '</li>';                                           
        } else {
            echo '<li style="margin-right:50px;">' . $row[$columns[$i]] . '</li>';
        }
    }
}

//= = = MAKE AN ADMIN TABLE END = = = 

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//= = = EDIT PANEL START = = = 
function displayAdminEditPanel($id, $valuesArray, $feature, $callingFile, $countriesResultSet, $continentsResultSet) {

//    echo '<div>';
//    echo '<div>';

    if ($feature == 'world_map') {
        // instructions
        echo '<p>You can only choose a unique country. (If there are two countries with the same name, the update will not work.)'
        . '<br />To add a new country or continent, click on the "Add new country/continent" button.</p>';
    }

    renderEditPanelSaveForm($callingFile, $feature, $id);

    switch ($feature) {

        case 'rating':

            renderEditPanelEditFields_ratings($valuesArray);
            break;

        case 'world_map':

            renderEditPanelEditFields_worldMap($valuesArray, $countriesResultSet, $continentsResultSet);
            break;
        
        case 'event':
//            The form is 'addEventForm', because the same form is being used twice (once in the public page, and again in the admin page for this feature).
            echo "<input type= 'hidden'  name='eventID' value='$id' form='addEventForm' />";
            include '../addEventForm.php';
            break;
    }

    echo '</div>';

    echo '</form>';

    renderEditPanelCancelForm($callingFile);
}

function renderEditPanelSaveForm($callingFile, $feature, $id) {
    // === SAVE button form ===
    echo '<form id="saveBtnForm" action="' . $callingFile . '" method="post">';

    // hiddenField for action (save)
    echo '<input type= "hidden" name="action" value="save" />';

    // display ID
    echo '<div class="floatL"><span>Id:</span></div>' . "<div class='floatL margin-left-m'><span>$id</span></div>";

    // hiddenField for featureID ($id)
    echo '<input type= "hidden" name="' . $feature . 'ID" value="' . $id . '" />';
//    echo '</div>';
    echo '<br />';
    echo '<div style="margin-left-m; clear:left;">';
}

function renderEditPanelEditFields_ratings($valuesArray) {

    $rating = $valuesArray[0]; //ratingValue
    echo '<label for="ddl_ratings">Rating:</label>';
    echo '<select name="rating-edit">';

    for ($i = 1; $i < 6; $i++) {
        if ($i == $rating) {
            echo '<option selected="selected">' . $i . '</option>';
        } else {
            echo '<option>' . $i . '</option>';
        }
    }

    echo '</select>';
}

function renderEditPanelEditFields_worldMap($valuesArray, $countriesResultSet, $continentsResultSet) {

    //countriesDDL
    echo '<label for="ddl_countries">Country:</label>';
    echo '<select name="country-edit">';

    foreach ($countriesResultSet as $crs) {
        if ($crs['country'] == $valuesArray[0]) {   // if country in row matches selected country in DDL
            echo '<option selected="selected">' . $crs['country'] . '</option>';
        } else {
            echo '<option>' . $crs['country'] . '</option>';
        }
    }
    echo '</select>';

    //continentsDDL
    echo '<label for="ddl_continents">Continent:</label>';
    echo '<select name="continent-edit">';

    foreach ($continentsResultSet as $crs) {
        if ($crs['continent'] == $valuesArray[1]) {   // if continent in row matches selected continent in DDL
            echo '<option selected="selected">' . $crs['continent'] . '</option>';
        } else {
            echo '<option>' . $crs['continent'] . '</option>';
        }
    }

    echo '</select>';
}

function renderEditPanelCancelForm($callingFile) {
    // === CANCEL button form ===
    echo '<form id="cancelBtnForm" action="' . $callingFile . '" method="post">';

    // hiddenField for action (cancel)
    echo '<div>';
    echo '<input type= "hidden" name="action" value="cancel" />';
    echo '</div>';
    echo '</form>';

    // cancel button
    echo '<input id = "editbutton" form="cancelBtnForm" type = "submit" class = "roundcorner" type = "button" value = "CANCEL"  />';

    // SAVE button
    echo '<input id = "deletebutton" form="saveBtnForm" type = "submit" class = "roundcorner" type = "button" value = "SAVE"  />';


    echo <<<_END
    
                </div><!--mainContent-->
            </article>
        </section>
    </div><!--clearfix-->

_END;
}

//= = = EDIT PANEL END = = = 

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//= = = MAKE PAGING BUTTONS START = = = 

function makePagingButtons($pageNumber, $callingPath, $pagesArray) {

    echo '<div style=padding-left:5%;>';
    echo "<span id='pages'>You are on page: <b>$pageNumber</b>.<br /></span>";
    $numOfPages = count($pagesArray);
    for ($i = 1; $i < $numOfPages; $i++) {
        if ($i > 0) {
            echo '<div style="float:left;">';
            
            // A PAGING BUTTON (which is a form)
            echo "<form action='$callingPath' method='post'>";
            echo "<input type='hidden' name='action' value='page' />";
            echo "<input type='hidden' name='pageNum' value='$i' />";
            echo "<input type='hidden' name='limitBegin' value='$pagesArray[$i]' />";
            echo "<input type='submit' value='$i' />&nbsp;&nbsp;&nbsp";
            echo '</form>';
            echo '</div>';
        }
    }
    echo '</div>';
    echo '<br style="clear:both;" />';
}

//= = = MAKE PAGING BUTTONS END = = = 

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//= = = DISPLAY INSERT PANEL START = = = 

function displayAdminInsertPanel($callingFile) {
    echo '<div style=padding-left:5%;>';
    echo "<p style='font-size:1.25em;'>Add a Country/Continent</p>";
    echo "<p>This section is currently under construction. (Please click/tap on the 'cancel' button to go back).</p>";

    // === CANCEL button form ===
    echo '<form id="cancelBtnForm" action="' . $callingFile . '" method="post">';

    // hiddenField for action (cancel)
    echo '<div>';
    echo '<input type= "hidden" name="action" value="cancel" />';
    echo '</div>';
    echo '</form>';

    // cancel button
    echo '<input id = "editbutton" form="cancelBtnForm" type = "submit" class = "roundcorner" type = "button" value = "CANCEL"  />';

    echo '</div>';
}

//= = = DISPLAY INSERT PANEL END = = = 

// -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

